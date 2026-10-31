# Integration testing: evidence → knowledge → guidance

**Date:** 1 November 2026 (Mauritius). **Status:** local experimental integration tests; not a production release.

## What was tested
A standalone experimental English/French browser interface was built locally to load synthetic GDTC assessment JSON and map three HTTP controls (HSTS, CSP, X-Content-Type-Options) to explanatory and remediation guidance.

Tests executed with Node.js 22's built-in test runner, using a mocked document interface:
1. Synthetic example renders three observation/guidance cards: PASS
2. Language change preserves observations and renders French: PASS
3. Expected assessor JSON schema accepted: PASS
4. Unknown controls, statuses, duplicate findings, and incorrect evidence types rejected: PASS
5. Untrusted source string displayed as text, not interpreted as HTML: PASS

**Result: 5/5 passing; 0 failures.**

## Important limits
The test harness uses a minimal mocked DOM, not a full browser. This does not validate file-input handling in a real browser, screen-reader accessibility, or security against all malicious inputs. No real website was scanned. The prototype is not independently audited and has not been deployed to the WordPress pilot.

## Next engineering steps
- Add the experimental integrated interface and test harness to the repository as reviewed source files.
- Run a real-browser test of local JSON import, keyboard interaction and English/French content.
- Review report schema and provenance; ensure the report does not contain sensitive data.
- Connect actual authorised observations only after the local evidence path is independently reviewed.
- Keep draft PR unmerged until maintainers review tests and code.

**Mozilla evidence statement:** This documents a local proof-of-concept integration test, not a validated field deployment or NGO adoption.
