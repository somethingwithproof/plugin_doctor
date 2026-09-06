#!/usr/bin/env bash

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
# shellcheck source=scripts/release-files.sh
. "$ROOT/scripts/release-files.sh"
TAG="${1:-}"
OUTPUT="${2:-${ROOT}/dist}"

if [[ -z "$TAG" ]]; then
	echo 'Usage: scripts/build-release.sh vVERSION [OUTPUT_DIRECTORY]' >&2
	exit 2
fi

php "${ROOT}/scripts/release.php" validate "$TAG"
VERSION="$(php "${ROOT}/scripts/release.php" version)"
STAGE="$(mktemp -d)"
trap 'rm -rf "$STAGE"' EXIT

mkdir -p "$OUTPUT" "$STAGE/doctor"
OUTPUT="$(cd "$OUTPUT" && pwd)"
TARBALL="$OUTPUT/doctor-${VERSION}.tar.gz"
TARFILE="$OUTPUT/doctor-${VERSION}.tar"
ZIPFILE="$OUTPUT/doctor-${VERSION}.zip"
rm -f "$TARBALL" "$TARFILE" "$ZIPFILE"

MANIFEST="$STAGE/release-files"
doctor_release_files "$ROOT" > "$MANIFEST"
FILES=()
while IFS= read -r -d '' FILE; do
	FILES+=("$FILE")
done < "$MANIFEST"
if [ "${#FILES[@]}" -eq 0 ]; then
	echo 'The release payload is empty.' >&2
	exit 1
fi
git -C "$ROOT" archive --format=tar HEAD "${FILES[@]}" | tar -xf - -C "$STAGE/doctor"
rm -f "$MANIFEST"

find "$STAGE" -type d -exec chmod 0755 {} +
find "$STAGE" -type f -exec chmod 0644 {} +
SOURCE_DATE_EPOCH="${SOURCE_DATE_EPOCH:-$(git -C "$ROOT" log -1 --format=%ct)}"
php "$ROOT/scripts/release.php" normalize "$STAGE" "$SOURCE_DATE_EPOCH"
export COPYFILE_DISABLE=1
export LC_ALL=C
export TZ=UTC

if tar --version 2>/dev/null | grep -q 'GNU tar'; then
	(
		cd "$STAGE"
		find doctor -type f -print | sort | tar --no-recursion --mtime="@${SOURCE_DATE_EPOCH}" \
			--owner=0 --group=0 --numeric-owner -cf "$TARFILE" -T -
	)
else
	(
		cd "$STAGE"
		find doctor -type f -print | sort | tar --no-recursion --uid 0 --gid 0 \
			--uname root --gname root -cf "$TARFILE" -T -
	)
fi
gzip -n -f "$TARFILE"
(
	cd "$STAGE"
	find doctor -type f -print | sort | zip -X -q "$ZIPFILE" -@
)

echo "Built doctor-${VERSION}.tar.gz and doctor-${VERSION}.zip."
