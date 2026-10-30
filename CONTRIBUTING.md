# Contributing

Thank you for helping build a public-interest, local-first digital trust commons.

1. Open a public issue describing the problem, accessibility concern, language suggestion or proposed feature **without real organisational data**.
2. Before a major feature, discuss scope and risks. Security-relevant changes should be reviewed by an independent qualified contributor where possible.
3. Keep dependencies minimal and the user in control of data. Prefer testable functions and evidence-labelled output.
4. For changes to the demo, update `demo/index.html`, `docs/index.html` and the embedded HTML in the WordPress plugin together. `python3 scripts/check_source_sync.py` validates exact consistency.
5. Run `node --test tests/demo.test.mjs`, `python3 scripts/check_source_sync.py`, and `php -l wordpress/adtc-secure-pilot/adtc-secure-pilot.php` before opening a pull request.
6. Document limitations and avoid claims of security certification.
7. Add a changelog entry and include a reproducible, fictional test case for any change to assessment logic.

**Translation:** English and French are the only current languages; others are potential future contributions. Reviewers should check meaning and usability, not only grammatical translation.

**Code of conduct:** Follow [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md). Contributor submissions are assumed to be offered under the repository's GPL-2.0-or-later license unless otherwise agreed in advance.

Do not submit passwords, personal names, protected documents, actual mailbox contents, partner correspondence, real domain configurations, or private pilot notes.