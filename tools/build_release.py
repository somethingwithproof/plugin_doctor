#!/usr/bin/env python3
"""Build installable Doctor archives from a committed Git revision."""

import argparse
import configparser
import gzip
import hashlib
import io
import json
from pathlib import Path
import re
import subprocess
import tarfile
import time
import zipfile


ROOT_FILES = {
    "INFO", "LICENSE", "README.md", "CHANGELOG.md", "SECURITY.md",
    "doctor.php", "doctor_functions.php", "index.php", "setup.php",
}


def git(root, *args):
    return subprocess.check_output(["git", "-C", str(root), *args])


def version_from_tag(tag):
    match = re.fullmatch(
        r"v(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)"
        r"(?:-([0-9A-Za-z-]+(?:\.[0-9A-Za-z-]+)*))?"
        r"(?:\+([0-9A-Za-z-]+(?:\.[0-9A-Za-z-]+)*))?", tag
    )
    if not match:
        raise ValueError("Tag must be v followed by a SemVer 2.0.0 version")
    if match[4] and any(part.isdigit() and len(part) > 1 and part[0] == "0"
                        for part in match[4].split(".")):
        raise ValueError("Numeric prerelease identifiers cannot have leading zeros")
    return tag[1:]


def build(root, tag, output):
    version = version_from_tag(tag)
    revision = git(root, "rev-parse", "HEAD").decode().strip()
    info = configparser.ConfigParser(interpolation=None)
    info.read_string(git(root, "show", f"{revision}:INFO").decode())
    if info["info"]["name"] != "doctor" or info["info"]["version"] != version:
        raise ValueError("Tag must match the committed doctor version in INFO")
    changelog = git(root, "show", f"{revision}:CHANGELOG.md").decode()
    if not re.search(r"^## " + re.escape(version) + r" - \d{4}-\d{2}-\d{2}$", changelog, re.M):
        raise ValueError("CHANGELOG.md must contain a dated heading for this version")

    tracked = git(root, "ls-tree", "-r", "--name-only", revision).decode().splitlines()
    paths = sorted(path for path in tracked if path in ROOT_FILES
                   or path.startswith(("cli/", "images/", "docs/screenshots/"))
                   or path == "docs/releasing.md")
    missing = ROOT_FILES - set(paths)
    if missing or "cli/doctor.php" not in paths:
        raise ValueError("Release is missing required runtime or documentation files")
    source = git(root, "archive", "--format=tar", revision, "--", *paths)
    timestamp = int(git(root, "show", "-s", "--format=%ct", revision))
    archive = io.BytesIO()
    zipped = io.BytesIO()
    included = set()
    with tarfile.open(fileobj=io.BytesIO(source)) as original, \
            tarfile.open(fileobj=archive, mode="w", format=tarfile.PAX_FORMAT) as tar, \
            zipfile.ZipFile(zipped, "w", compression=zipfile.ZIP_DEFLATED) as zip_file:
        for member in original:
            if member.isdir():
                continue
            if not member.isfile() or member.name not in paths:
                raise ValueError("Release inputs must be regular tracked files")
            data = original.extractfile(member).read()
            included.add(member.name)
            name = "doctor/" + member.name
            entry = tarfile.TarInfo(name)
            entry.size, entry.mode, entry.mtime = len(data), 0o644, timestamp
            tar.addfile(entry, io.BytesIO(data))
            zip_entry = zipfile.ZipInfo(name, time.gmtime(max(timestamp, 315532800))[:6])
            zip_entry.create_system = 3
            zip_entry.external_attr = (0o100644 << 16)
            zip_file.writestr(zip_entry, data, compress_type=zipfile.ZIP_DEFLATED)

    if included != set(paths):
        raise ValueError("Git export attributes omitted release files")

    assets = {
        f"doctor-{version}.tar.gz": gzip.compress(archive.getvalue(), mtime=0),
        f"doctor-{version}.zip": zipped.getvalue(),
    }
    hashes = {name: hashlib.sha256(data).hexdigest() for name, data in assets.items()}
    assets["SHA256SUMS"] = "".join(f"{digest}  {name}\n" for name, digest in hashes.items()).encode()
    assets["release.json"] = (json.dumps({
        "version": version, "tag": tag, "commit": revision, "sha256": hashes,
    }, indent=2) + "\n").encode()
    # A fresh directory prevents accidental replacement of published assets.
    output.mkdir(parents=True, exist_ok=False)
    for name, data in assets.items():
        with (output / name).open("xb") as target:
            target.write(data)
    return hashes


if __name__ == "__main__":
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--tag", required=True)
    parser.add_argument("--source", type=Path, default=Path(__file__).resolve().parents[1])
    parser.add_argument("--output", type=Path, default=Path("dist"))
    args = parser.parse_args()
    try:
        result = build(args.source, args.tag, args.output)
    except (ValueError, KeyError, OSError, subprocess.CalledProcessError) as error:
        parser.exit(1, f"Release build failed: {error}\n")
    for name, digest in result.items():
        print(f"{digest}  {name}")
