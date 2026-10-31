# GDTC v0.2: Knowledge and Remediation Engine (experimental)
This branch introduces a **standalone bilingual, synthetic-data demonstration** at `prototype/remediation/index.html`. It is a proof of concept for the progression **observation → explanation → human-approved action → verification**, not a vulnerability scanner or a completed v0.2 release.

## Run
Open `prototype/remediation/index.html` in a current browser. Select English/French and a fictional finding. It makes no network calls on its own; external reference links open only if clicked. No credentials, organisational data, persistence, uploads, external AI calls or automatic remediation.

## Initial knowledge records
- HSTS header not observed (synthetic HTTP observation)
- DMARC not confirmed (synthetic self-report)
- Privileged-account MFA unknown (synthetic self-report)

Each record contains an identifier, bilingual observation, explanation, recommended steps, verification guidance, source and **explicit synthetic evidence type**. A technical observation does not automatically establish a vulnerability.

## Design principles
1. No real assessment is claimed until an authorised evidence collector exists.
2. Recommendations are guidance, not automatic configuration changes.
3. Human approval and change-control precede production remediation.
4. The local user controls any data; do not submit real security details to GitHub issues.
5. Future evidence records should include timestamps, scope, consent, provenance, confidence and reviewer status.
6. Knowledge contributions require editorial and technical review before publication.

## Proposed next increments (not implemented)
- Separate versioned knowledge data from UI, add schema validation and automated tests.
- Build a strictly scoped, authorised, non-intrusive HTTP/TLS observation adapter.
- Add locally exported remediation checklists and evidence-based rechecks.
- Independent security and accessibility review; NGO usability feedback with consent.

## Verification checklist
- Open the HTML file offline and switch languages.
- Select each of the three records and confirm explanations, guidance, verification and sources update.
- Check browser developer tools: no background requests or storage writes.
- Review references and recommendations before using any procedure in a production environment.

**Status:** Prototype code proposed for review. No independent audit, field trial or real security findings are claimed.
