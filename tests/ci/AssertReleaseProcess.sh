#!/usr/bin/env bash

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
VERSION="$(php "$ROOT/scripts/release.php" version)"

php "$ROOT/scripts/release.php" validate "v${VERSION}"
NOTES="$(php "$ROOT/scripts/release.php" notes)"
printf '%s\n' "$NOTES" | grep -q '[^[:space:]]'
if printf '%s\n' "$NOTES" | grep -q '^## '; then
	echo 'Release notes include the next changelog section.' >&2
	exit 1
fi

for VALID in 0.1.0 1.0.0 1.2.3-alpha 1.2.3-rc.1 1.2.3+build.7 1.2.3-rc.1+build.7; do
	php "$ROOT/scripts/release.php" semver "$VALID"
done

for INVALID in v1.2.3 1 1.2 01.2.3 1.02.3 1.2.03 1.2.3-01 1.2.3- 1.2.3+; do
	if php "$ROOT/scripts/release.php" semver "$INVALID"; then
		echo "Accepted invalid SemVer: ${INVALID}" >&2
		exit 1
	fi
done

test "$(printf '%s\n' '[]' | jq -s -r --arg tag v1.2.3 -f "$ROOT/scripts/release-state.jq")" = $'missing\t'
test "$(printf '%s\n' '[{"id":42,"tag_name":"v1.2.3","draft":true}]' | jq -s -r --arg tag v1.2.3 -f "$ROOT/scripts/release-state.jq")" = $'draft\t42'
test "$(printf '%s\n' '[{"id":43,"tag_name":"v1.2.3","draft":false}]' | jq -s -r --arg tag v1.2.3 -f "$ROOT/scripts/release-state.jq")" = $'published\t43'
test "$(printf '%s\n%s\n' '[{"id":41,"tag_name":"v1.0.0","draft":false}]' '[{"id":42,"tag_name":"v1.2.3","draft":true}]' | jq -s -r --arg tag v1.2.3 -f "$ROOT/scripts/release-state.jq")" = $'draft\t42'
if printf '%s\n' '[{"id":42,"tag_name":"v1.2.3","draft":true},{"id":43,"tag_name":"v1.2.3","draft":false}]' |
	jq -s -r --arg tag v1.2.3 -f "$ROOT/scripts/release-state.jq" >/dev/null 2>&1; then
	echo 'Accepted duplicate GitHub releases for a tag.' >&2
	exit 1
fi
if jq -s -r --arg tag v1.2.3 -f "$ROOT/scripts/release-state.jq" </dev/null >/dev/null 2>&1; then
	echo 'Accepted an empty GitHub release API response.' >&2
	exit 1
fi

if php "$ROOT/scripts/release.php" validate v999.999.999; then
	echo 'Accepted a tag that differs from INFO.' >&2
	exit 1
fi

TEMP_ROOT="$(mktemp -d)"
trap 'rm -rf "$TEMP_ROOT"' EXIT
FIXTURE="$TEMP_ROOT/fixture"
mkdir -p "$FIXTURE"
printf '[info]\nversion = 1.2.3\n' > "$FIXTURE/INFO"

assert_invalid_changelog() {
	printf '%b\n' "$1" > "$FIXTURE/CHANGELOG.md"
	if DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" validate >/dev/null 2>&1; then
		echo "Accepted invalid changelog fixture: $2" >&2
		exit 1
	fi
}

assert_invalid_changelog '# Changelog\n\n## 9.9.9 - 2026-09-06\n\n- Missing version.' 'missing heading'
assert_invalid_changelog '# Changelog\n\n## 1.2.3\n\n- Missing date.' 'missing date'
assert_invalid_changelog '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n## 1.2.2 - 2026-09-05\n\n- Older.' 'empty section'
assert_invalid_changelog '# Changelog\n\n## 1.2.3 - 2026-02-30\n\n- Impossible date.' 'impossible date'
assert_invalid_changelog '# Changelog\n\n### 1.2.3 - 2026-09-06\n\n- Wrong heading depth.' 'heading anchoring'

printf '%b\n' '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n- Current notes.\n\n## 1.2.2 - 2026-09-05\n\n- Older notes.' > "$FIXTURE/CHANGELOG.md"
DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" validate >/dev/null
FIXTURE_NOTES="$(DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" notes)"
test "$FIXTURE_NOTES" = '- Current notes.'

printf '%b\n' '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n- Current notes.\n\n### Migration details\n\nKeep this nested section.\n\n## 1.2.2 - 2026-09-05\n\n- Older notes.' > "$FIXTURE/CHANGELOG.md"
FIXTURE_NOTES="$(DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" notes)"
printf '%s\n' "$FIXTURE_NOTES" | grep -q '^### Migration details$'
if printf '%s\n' "$FIXTURE_NOTES" | grep -q 'Older notes'; then
	echo 'Release notes include an older release section.' >&2
	exit 1
fi

# Backticks are literal Markdown fixture content.
# shellcheck disable=SC2016
printf '%b\n' '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n- Current notes.\n\n```markdown\n## This is example text\n```\n\n- Notes continue.\n\n## 1.2.2 - 2026-09-05\n\n- Older notes.' > "$FIXTURE/CHANGELOG.md"
FIXTURE_NOTES="$(DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" notes)"
printf '%s\n' "$FIXTURE_NOTES" | grep -q '^## This is example text$'
printf '%s\n' "$FIXTURE_NOTES" | grep -q 'Notes continue.'
if printf '%s\n' "$FIXTURE_NOTES" | grep -q 'Older notes'; then
	echo 'Fenced changelog notes include an older release section.' >&2
	exit 1
fi

assert_invalid_changelog '# Changelog\n\n## 1.2.3 - 2026-09-06\n## 1.2.2 - 2026-09-05\n\n- Older notes.' 'adjacent release heading'
printf '%b\n' '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n- Current notes.\n\n## 1.2.2 (2026-09-05)\n\n- Malformed older notes.' > "$FIXTURE/CHANGELOG.md"
test "$(DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" notes)" = '- Current notes.'

printf '%b' '[info]\r\nversion = 1.2.3\r\n' > "$FIXTURE/INFO"
printf '%b' '# Changelog\r\n\r\n## 1.2.3 - 2026-09-06\r\n\r\n- CRLF notes.\r\n' > "$FIXTURE/CHANGELOG.md"
DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" validate >/dev/null
test "$(DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" notes)" = '- CRLF notes.'

printf '%b' '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n- No trailing newline.' > "$FIXTURE/CHANGELOG.md"
DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" validate >/dev/null
test "$(DOCTOR_RELEASE_ROOT="$FIXTURE" php "$ROOT/scripts/release.php" notes)" = '- No trailing newline.'

assert_invalid_root() {
	if DOCTOR_RELEASE_ROOT="$1" php "$ROOT/scripts/release.php" validate >/dev/null 2>&1; then
		echo "Accepted invalid release root: $2" >&2
		exit 1
	fi
}

file_mtime() {
	stat -c '%Y' "$1" 2>/dev/null || stat -f '%m' "$1"
}

MISSING_INFO="$TEMP_ROOT/missing-info"
MISSING_SECTION="$TEMP_ROOT/missing-section"
MISSING_VERSION="$TEMP_ROOT/missing-version"
INVALID_VERSION="$TEMP_ROOT/invalid-version"
BUILD_VERSION="$TEMP_ROOT/build-version"
PARSE_ERROR="$TEMP_ROOT/parse-error"
mkdir -p "$MISSING_INFO" "$MISSING_SECTION" "$MISSING_VERSION" "$INVALID_VERSION" "$BUILD_VERSION" "$PARSE_ERROR"
printf '# Changelog\n' > "$MISSING_INFO/CHANGELOG.md"
printf 'version = 1.2.3\n' > "$MISSING_SECTION/INFO"
printf '[info]\nname = doctor\n' > "$MISSING_VERSION/INFO"
printf '[info]\nversion = 01.2.3\n' > "$INVALID_VERSION/INFO"
printf '[info]\nversion = 1.2.3+build.7\n' > "$BUILD_VERSION/INFO"
printf '[info]\nversion = |\n' > "$PARSE_ERROR/INFO"
assert_invalid_root "$MISSING_INFO" 'absent INFO'
assert_invalid_root "$MISSING_SECTION" 'missing info section'
assert_invalid_root "$MISSING_VERSION" 'missing version key'
assert_invalid_root "$INVALID_VERSION" 'non-SemVer version'
assert_invalid_root "$BUILD_VERSION" 'build metadata in a publishable version'
assert_invalid_root "$PARSE_ERROR" 'unparseable INFO'

if DOCTOR_RELEASE_ROOT="$TEMP_ROOT/does-not-exist" php "$ROOT/scripts/release.php" validate >/dev/null 2>&1 ||
	DOCTOR_RELEASE_ROOT="$FIXTURE/INFO" php "$ROOT/scripts/release.php" validate >/dev/null 2>&1; then
	echo 'Accepted a release root that is not a directory.' >&2
	exit 1
fi

if php "$ROOT/scripts/release.php" unknown >/dev/null 2>&1 ||
	php "$ROOT/scripts/release.php" semver >/dev/null 2>&1 ||
	php "$ROOT/scripts/release.php" normalize "$TEMP_ROOT" invalid >/dev/null 2>&1; then
	echo 'Accepted invalid release command arguments.' >&2
	exit 1
fi

NORMALIZE_ROOT="$TEMP_ROOT/normalize"
OUTSIDE_NORMALIZE="$TEMP_ROOT/outside-normalize.txt"
mkdir -p "$NORMALIZE_ROOT/child"
printf 'normalize\n' > "$NORMALIZE_ROOT/child/file.txt"
printf 'outside\n' > "$OUTSIDE_NORMALIZE"
touch -t 202001010000 "$OUTSIDE_NORMALIZE"
OUTSIDE_MTIME_BEFORE="$(file_mtime "$OUTSIDE_NORMALIZE")"
php "$ROOT/scripts/release.php" normalize "$NORMALIZE_ROOT" 123456789
test "$(file_mtime "$NORMALIZE_ROOT")" = '123456789'
test "$(file_mtime "$NORMALIZE_ROOT/child/file.txt")" = '123456789'
OUTSIDE_MTIME_AFTER="$(file_mtime "$OUTSIDE_NORMALIZE")"
test "$OUTSIDE_MTIME_BEFORE" = "$OUTSIDE_MTIME_AFTER"

SYMLINK_ROOT="$TEMP_ROOT/symlink-normalize"
SYMLINK_TARGET="$TEMP_ROOT/symlink-target.txt"
mkdir -p "$SYMLINK_ROOT"
printf 'target\n' > "$SYMLINK_TARGET"
touch -t 202001010000 "$SYMLINK_TARGET"
SYMLINK_MTIME_BEFORE="$(file_mtime "$SYMLINK_TARGET")"
ln -s "$SYMLINK_TARGET" "$SYMLINK_ROOT/link.txt"
if php "$ROOT/scripts/release.php" normalize "$SYMLINK_ROOT" 123456789 >/dev/null 2>&1; then
	echo 'Normalized a tree containing a symbolic link.' >&2
	exit 1
fi
SYMLINK_MTIME_AFTER="$(file_mtime "$SYMLINK_TARGET")"
test "$SYMLINK_MTIME_BEFORE" = "$SYMLINK_MTIME_AFTER"

# shellcheck source=scripts/release-files.sh
. "$ROOT/scripts/release-files.sh"
for UNSAFE_PATH in '../evil' '/doctor/evil' 'other/evil' 'doctor/../evil' 'doctor/path/../../evil' $'doctor/good\nother/evil'; do
	if doctor_archive_path_is_safe "$UNSAFE_PATH"; then
		echo "Accepted unsafe archive path: ${UNSAFE_PATH}" >&2
		exit 1
	fi
done

BUILD_DIST="$TEMP_ROOT/dist"
STALE_ROOT="$TEMP_ROOT/stale"
"$ROOT/scripts/build-release.sh" "v${VERSION}" "$BUILD_DIST" >/dev/null
mkdir -p "$STALE_ROOT/doctor"
printf 'stale\n' > "$STALE_ROOT/doctor/stale.txt"
(
	cd "$STALE_ROOT"
	zip -q "$BUILD_DIST/doctor-${VERSION}.zip" doctor/stale.txt
)
"$ROOT/scripts/build-release.sh" "v${VERSION}" "$BUILD_DIST" >/dev/null
if unzip -Z1 "$BUILD_DIST/doctor-${VERSION}.zip" | grep -q 'stale.txt'; then
	echo 'A rebuilt ZIP retained a stale path.' >&2
	exit 1
fi
"$ROOT/tests/ci/AssertReleasePackage.sh" "$VERSION" "$BUILD_DIST" >/dev/null

cp "$BUILD_DIST/doctor-${VERSION}.tar.gz" "$TEMP_ROOT/doctor-before.tar.gz"
cp "$BUILD_DIST/doctor-${VERSION}.zip" "$TEMP_ROOT/doctor-before.zip"
"$ROOT/scripts/build-release.sh" "v${VERSION}" "$BUILD_DIST" >/dev/null
cmp "$TEMP_ROOT/doctor-before.tar.gz" "$BUILD_DIST/doctor-${VERSION}.tar.gz"
cmp "$TEMP_ROOT/doctor-before.zip" "$BUILD_DIST/doctor-${VERSION}.zip"

COMMITTED_ROOT="$TEMP_ROOT/committed-source"
COMMITTED_DIST="$TEMP_ROOT/committed-dist"
mkdir -p "$COMMITTED_ROOT/scripts"
cp "$ROOT/scripts/build-release.sh" "$ROOT/scripts/release-files.sh" "$ROOT/scripts/release.php" "$COMMITTED_ROOT/scripts/"
printf '[info]\nversion = 1.2.3\n' > "$COMMITTED_ROOT/INFO"
printf '# Changelog\n\n## 1.2.3 - 2026-09-06\n\n- Fixture release.\n' > "$COMMITTED_ROOT/CHANGELOG.md"
printf 'committed payload\n' > "$COMMITTED_ROOT/doctor.php"
git -C "$COMMITTED_ROOT" init -q
git -C "$COMMITTED_ROOT" add .
git -C "$COMMITTED_ROOT" -c user.name='Doctor CI' -c user.email='doctor-ci@example.invalid' \
	-c commit.gpgsign=false -c core.hooksPath=/dev/null commit -q -m fixture
printf 'dirty payload\n' > "$COMMITTED_ROOT/doctor.php"
"$COMMITTED_ROOT/scripts/build-release.sh" v1.2.3 "$COMMITTED_DIST" >/dev/null
test "$(tar -xOzf "$COMMITTED_DIST/doctor-1.2.3.tar.gz" doctor/doctor.php)" = 'committed payload'

DIRTY_ROOT="$TEMP_ROOT/dirty"
DIRTY_DIST="$TEMP_ROOT/dirty-dist"
mkdir -p "$DIRTY_ROOT/doctor" "$DIRTY_DIST"
cp "$BUILD_DIST/doctor-${VERSION}.tar.gz" "$DIRTY_DIST/doctor-${VERSION}.tar.gz"
cp "$BUILD_DIST/doctor-${VERSION}.zip" "$DIRTY_DIST/doctor-${VERSION}.zip"
printf 'metadata\n' > "$DIRTY_ROOT/doctor/.DS_Store"
(
	cd "$DIRTY_ROOT"
	zip -q "$DIRTY_DIST/doctor-${VERSION}.zip" doctor/.DS_Store
)
if "$ROOT/tests/ci/AssertReleasePackage.sh" "$VERSION" "$DIRTY_DIST" >/dev/null 2>&1; then
	echo 'Accepted an archive containing macOS metadata.' >&2
	exit 1
fi

echo "Validated GitHub release process for ${VERSION}."
