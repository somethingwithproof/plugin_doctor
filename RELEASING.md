# Releasing Cacti Doctor

Cacti Doctor follows [Semantic Versioning 2.0.0](https://semver.org/). The version in `INFO` is the release source of truth.

## Version policy

- Increment **MAJOR** for incompatible changes to installation, diagnostics, CLI output, repair identifiers, or supported Cacti versions.
- Increment **MINOR** for backward-compatible diagnostics, repairs, CLI options, or user-interface features.
- Increment **PATCH** for backward-compatible fixes, documentation corrections, and test or packaging improvements.
- Use prerelease identifiers such as `1.0.0-rc.1` for release candidates. The workflow marks these GitHub releases as prereleases.
- Published versions and tags are immutable. Correct a release with a new PATCH version; never move or reuse a published tag.

## Release pull request

Prepare releases through a pull request against `develop`:

1. Choose the next version using the policy above.
2. Set `version` in `INFO` to the exact SemVer value without a leading `v`.
3. Add a matching `## VERSION - YYYY-MM-DD` section at the top of `CHANGELOG.md`.
4. Run `php scripts/release.php validate`.
5. Run `scripts/build-release.sh vVERSION dist` and `tests/ci/AssertReleasePackage.sh VERSION dist`.
6. Confirm the pull request's complete CI matrix passes, then merge it.

CI verifies the version and changelog contract and dry-builds both installable archives on every branch and pull request.

## Publish through GitHub

After the release pull request is merged:

1. Open the repository's **Actions** tab.
2. Select the **Release** workflow and choose **Run workflow**.
3. Select the `develop` branch.
4. Enter the exact version from `INFO`, without the leading `v`.
5. Review and approve the `release` environment if repository rules require it.

The workflow validates the requested version, runs the complete compatibility matrix, and stops on any failure. After qualification, GitHub creates the versioned `vMAJOR.MINOR.PATCH` tag and release from the tested `develop` commit. The workflow publishes:

- `doctor-VERSION.tar.gz`
- `doctor-VERSION.zip`
- `doctor-VERSION.sha256`
- release notes taken from the matching changelog section
- GitHub artifact-provenance attestations for every downloadable asset

Both archives unpack to a directory named `doctor`, as required by Cacti. They are built from the tested commit rather than uncommitted working-tree content. Composer dependencies, tests, scripts, workflow files, and repository metadata are excluded from release archives.

The workflow refuses to release from any branch other than `develop`, rejects a version that differs from `INFO`, and atomically reserves the tag at the tested commit. An orphan tag at that exact commit is adopted on retry; a tag at any other commit is rejected. Assets are uploaded to a draft release, and their exact names and completed upload states are verified before it becomes public. If any publication step fails or is cancelled, the workflow attempts to remove the incomplete release and any tag created by that run. An adopted tag is preserved so cleanup never deletes a pre-existing ref.

If GitHub interrupts cleanup after a cancellation, delete the incomplete draft and tag from the repository's **Releases** and **Tags** pages before retrying. Never delete or move a successfully published release tag.

## Verify a downloaded release

Download all three release assets, then run:

```console
sha256sum --check doctor-VERSION.sha256
tar -tzf doctor-VERSION.tar.gz
gh attestation verify doctor-VERSION.tar.gz --repo somethingwithproof/plugin_doctor
gh attestation verify doctor-VERSION.zip --repo somethingwithproof/plugin_doctor
```

Install by extracting one archive as `plugins/doctor` in the Cacti installation and enabling it from **Configuration > Plugin Management**.
