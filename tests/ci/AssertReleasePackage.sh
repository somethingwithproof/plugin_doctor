#!/usr/bin/env bash

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
# shellcheck source=scripts/release-files.sh
. "$ROOT/scripts/release-files.sh"
VERSION="${1:-}"
DIST="${2:-dist}"
TARBALL="${DIST}/doctor-${VERSION}.tar.gz"
ZIPFILE="${DIST}/doctor-${VERSION}.zip"

test -n "$VERSION"
test -s "$TARBALL"
test -s "$ZIPFILE"

for ASSET in "$(basename "$TARBALL")" "$(basename "$ZIPFILE")"; do
	if [[ ! "$ASSET" =~ ^[A-Za-z0-9._-]+$ ]]; then
		echo "Release asset name is not GitHub-safe: ${ASSET}" >&2
		exit 1
	fi
done

TAR_LIST="$(tar -tzf "$TARBALL")"
ZIP_LIST="$(unzip -Z1 "$ZIPFILE")"

for LIST in "$TAR_LIST" "$ZIP_LIST"; do
	while IFS= read -r ENTRY; do
		if ! doctor_archive_path_is_safe "$ENTRY"; then
			echo "Release archive contains an unsafe path: ${ENTRY}" >&2
			exit 1
		fi
	done <<< "$LIST"

	if printf '%s\n' "$LIST" | grep -E '(^|/)(\.git|\.github|composer\.(json|lock)|scripts|tests|vendor)(/|$)' >/dev/null; then
		echo 'Release archive contains development-only files.' >&2
		exit 1
	fi

	if printf '%s\n' "$LIST" | grep -E '(^|/)(\.DS_Store|\._[^/]+)$' >/dev/null; then
		echo 'Release archive contains macOS metadata.' >&2
		exit 1
	fi

done

EXPECTED_LIST="$(doctor_release_files "$ROOT" | tr '\0' '\n' | sed 's#^#doctor/#' | LC_ALL=C sort)"
if ! diff -u <(printf '%s\n' "$EXPECTED_LIST") <(printf '%s\n' "$TAR_LIST" | sed 's#/$##' | LC_ALL=C sort); then
	echo 'Release archive differs from the tracked runtime payload.' >&2
	exit 1
fi

if ! diff -u \
	<(printf '%s\n' "$TAR_LIST" | sed 's#/$##' | LC_ALL=C sort) \
	<(printf '%s\n' "$ZIP_LIST" | sed 's#/$##' | LC_ALL=C sort); then
	echo 'TAR and ZIP archives do not contain the same paths.' >&2
	exit 1
fi

TAR_VERSION="$(tar -xOzf "$TARBALL" doctor/INFO | sed -n 's/^version[[:space:]]*=[[:space:]]*//p' | tr -d '\r')"
ZIP_VERSION="$(unzip -p "$ZIPFILE" doctor/INFO | sed -n 's/^version[[:space:]]*=[[:space:]]*//p' | tr -d '\r')"
test "$TAR_VERSION" = "$VERSION"
test "$ZIP_VERSION" = "$VERSION"

echo "Validated release archives for ${VERSION}."
