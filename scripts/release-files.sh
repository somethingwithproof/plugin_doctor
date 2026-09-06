#!/usr/bin/env bash

doctor_release_files() {
	local root="$1"
	local file

	while IFS= read -r -d '' file; do
		case "$file" in
			.github/*|.gitattributes|.gitignore|composer.json|composer.lock|scripts/*|tests/*)
				continue
				;;
		esac

		if [[ ! "$file" =~ ^[A-Za-z0-9._/-]+$ ]] || [[ "$file" = /* ]] || [[ "$file" == *'../'* ]] || [[ "$file" == *'/..' ]]; then
			echo "Release path is not safe: ${file}" >&2
			return 1
		fi

		printf '%s\0' "$file"
	done < <(git -C "$root" ls-tree -r -z --name-only HEAD)
}

doctor_archive_path_is_safe() {
	local file="$1"

	[[ "$file" =~ ^doctor(/[A-Za-z0-9._-]+)+/?$ ]] &&
		[[ "$file" != /* ]] &&
		[[ "$file" != *'/../'* ]] &&
		[[ "$file" != *'/..' ]]
}
