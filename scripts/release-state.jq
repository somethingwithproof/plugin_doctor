if length == 0 then
	error("release API returned no pages")
elif any(.[]; type != "array") then
	error("release API returned an unexpected response")
else
	[.[][] | select(.tag_name == $tag)] |
	if length == 0 then
		["missing", ""] | @tsv
	elif length == 1 then
		[(if .[0].draft then "draft" else "published" end), (.[0].id | tostring)] | @tsv
	else
		error("multiple releases use tag " + $tag)
	end
end
