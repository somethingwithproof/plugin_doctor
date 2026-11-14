# Releasing Doctor

Doctor uses [Semantic Versioning 2.0.0](https://semver.org/spec/v2.0.0.html).
`INFO` is the version source of truth. Tags are `vMAJOR.MINOR.PATCH`, optionally
followed by a prerelease identifier such as `-rc.1`. Before 1.0, breaking changes
increment the minor version; compatible fixes increment the patch version.
After 1.0, incompatible changes increment major, compatible features increment
minor, and compatible fixes increment patch.

The compatibility contract includes supported Cacti/PHP versions, CLI options
and exit codes, report check IDs and JSON fields, monitoring output, settings,
and plugin lifecycle behavior. Document changes to these contracts in the
changelog. Never move an existing release tag or replace published assets.

## Prepare and publish

1. Create a release PR against `develop`. Update `INFO` and add a dated version
   heading and notes in `CHANGELOG.md`. Keep `Unreleased` for later work.
2. Run `composer test`, `python3 -m unittest discover -s tests -p 'test_release.py' -v`,
   and the repository CI matrix. Resolve review findings and merge only when
   the current revision passes the required checks.
3. Check out the merged commit and create a signed tag, for example:

   ```sh
   git fetch origin
   git checkout --detach origin/develop
   git tag -s v0.5.1 -m 'Doctor 0.5.1'
   git push origin v0.5.1
   ```

4. The Release workflow runs the existing syntax, unit, packaging, and Cacti
   integration jobs at the tagged revision. It publishes only after all pass.
   It validates the tag against `INFO` and the changelog, builds packages,
   uploads them into a draft, and publishes that draft after upload succeeds.
   Tags containing prerelease identifiers produce GitHub prereleases.
5. Verify the published assets and download checksums. Install the package in
   staging before upgrading production. Back up the Cacti database and existing
   `plugins/doctor` directory before an upgrade.

A failed upload leaves a draft that a workflow rerun can complete. A published
release is never overwritten. Account billing or other service failures are
blocking failures, not permission to skip tests or publish a passing status.

## Packages

The release contains `doctor-VERSION.tar.gz`, `doctor-VERSION.zip`,
`SHA256SUMS`, and `release.json` with the source commit and archive hashes.
Both archives unpack into `doctor/`, ready to place under Cacti's `plugins/`.
They contain runtime files, logos, translation catalogs (`locales/po` and the compiled `locales/LC_MESSAGES`), and user documentation. Git metadata,
development dependencies, tests, workflow files, and untracked files are excluded.
GitHub's automatically generated source archives are not the installable packages.

For a local preview from the committed `HEAD`, using Python 3.10 or newer:

```sh
python3 tools/build_release.py --tag v0.5.1 --output dist
cd dist
shasum -a 256 -c SHA256SUMS
```

Use a new output directory for each build. Uncommitted edits are deliberately
excluded. Archive ordering and timestamps are stable for a given commit and
build toolchain. Preview assets may be attached to a draft for review; they do
not establish CI success and must be rebuilt from the final merged tag.

Rollback means restoring the previous plugin directory and, if a release changed
stored data, following its documented database restoration procedure. Release
0.5.1 has no schema changes.
