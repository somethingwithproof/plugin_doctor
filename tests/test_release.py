"""Release-contract checks; no network access or third-party dependencies."""

import hashlib
import importlib.util
import json
from pathlib import Path
import subprocess
import tarfile
import tempfile
import unittest
import zipfile

spec = importlib.util.spec_from_file_location("build_release", Path(__file__).parents[1] / "tools/build_release.py")
release = importlib.util.module_from_spec(spec)
spec.loader.exec_module(release)


class ReleaseTests(unittest.TestCase):
    def setUp(self):
        self.temp = tempfile.TemporaryDirectory()
        self.addCleanup(self.temp.cleanup)
        self.root = Path(self.temp.name) / "source"
        self.root.mkdir()
        self.out = Path(self.temp.name) / "dist"
        for name in release.ROOT_FILES | {"cli/doctor.php", "images/logo.png", "vendor/private", ".env"}:
            path = self.root / name
            path.parent.mkdir(parents=True, exist_ok=True)
            path.write_text("fixture\n")
        (self.root / "INFO").write_text("[info]\nname = doctor\nversion = 0.5.1\n")
        (self.root / "CHANGELOG.md").write_text("## 0.5.1 - 2026-11-08\n\n- Fixes.\n")
        self.git("init", "-q")
        self.git("add", "-f", "--", *sorted(release.ROOT_FILES), "cli", "images", "vendor", ".env")
        self.git("-c", "user.name=Release Fixture", "-c", "user.email=fixture@example.invalid",
                 "-c", "commit.gpgsign=false", "commit", "-qm", "fixture")

    def git(self, *args):
        return release.git(self.root, *args)

    def test_semver(self):
        for tag in ["v1.0.0", "v0.5.1-rc.1", "v1.2.3+build.01"]:
            self.assertEqual(release.version_from_tag(tag), tag[1:])
        for tag in ["1.0.0", "v01.2.3", "v1.2", "v1.2.3-01", "v1.2.3-", "v1.2.3/a"]:
            with self.subTest(tag=tag), self.assertRaises(ValueError):
                release.version_from_tag(tag)

    def test_version_mismatch_creates_nothing(self):
        with self.assertRaises(ValueError):
            release.build(self.root, "v0.5.2", self.out)
        self.assertFalse(self.out.exists())

    def commit(self, *paths):
        self.git("add", "-f", "--", *paths)
        self.git("-c", "user.name=Release Fixture", "-c", "user.email=fixture@example.invalid",
                 "-c", "commit.gpgsign=false", "commit", "-qm", "fixture update")

    def test_missing_release_notes_are_rejected(self):
        (self.root / "CHANGELOG.md").write_text("## Unreleased\n")
        self.commit("CHANGELOG.md")
        with self.assertRaises(ValueError):
            release.build(self.root, "v0.5.1", self.out)

    def test_export_attributes_cannot_hide_runtime_files(self):
        (self.root / ".gitattributes").write_text("doctor.php export-ignore\n")
        self.commit(".gitattributes")
        with self.assertRaises(ValueError):
            release.build(self.root, "v0.5.1", self.out)

    def test_symlinks_are_not_packaged(self):
        (self.root / "images/link").symlink_to("../.env")
        self.commit("images/link")
        with self.assertRaises(ValueError):
            release.build(self.root, "v0.5.1", self.out)

    def test_archives_use_committed_runtime_files_and_checksums(self):
        (self.root / "doctor.php").write_text("uncommitted edit")
        release.build(self.root, "v0.5.1", self.out)
        with tarfile.open(self.out / "doctor-0.5.1.tar.gz") as tar, \
                zipfile.ZipFile(self.out / "doctor-0.5.1.zip") as zipped:
            self.assertEqual(sorted(tar.getnames()), sorted(zipped.namelist()))
            self.assertIn("doctor/cli/doctor.php", tar.getnames())
            self.assertNotIn("doctor/.env", tar.getnames())
            self.assertNotIn("doctor/vendor/private", tar.getnames())
            self.assertEqual(tar.extractfile("doctor/doctor.php").read(), b"fixture\n")
            for member in tar:
                self.assertTrue(member.isfile())
                self.assertEqual(tar.extractfile(member).read(), zipped.read(member.name))
        manifest = json.loads((self.out / "release.json").read_text())
        self.assertEqual(manifest["commit"], self.git("rev-parse", "HEAD").decode().strip())
        for line in (self.out / "SHA256SUMS").read_text().splitlines():
            digest, name = line.split("  ")
            self.assertEqual(digest, hashlib.sha256((self.out / name).read_bytes()).hexdigest())
        second = self.out.with_name("second")
        release.build(self.root, "v0.5.1", second)
        for path in self.out.iterdir():
            self.assertEqual(path.read_bytes(), (second / path.name).read_bytes())
        with self.assertRaises(FileExistsError):
            release.build(self.root, "v0.5.1", self.out)


if __name__ == "__main__":
    unittest.main()
