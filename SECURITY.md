# Security policy — experimental software

GDTC/ADTC v0.1 is a **synthetic-data demonstration**, not an independently audited security product. No live scans or integrations are implemented. Do not use it for actual risk decisions, compliance attestations, live organisational security evaluations, or processing secrets.

## November 2026 private pilot expansion — important boundary

The statement above that no live scans are implemented applies **only to public v0.1 source/demo**, not to the separately deployed invitation-controlled IGF Mauritius GDTC development pilot. That newer pilot includes a local desktop companion capable of an expressly authorised, fixed-port Nmap scan of the participant's own localhost. Its current private Windows/Mac builds and full version-matched source are **not released through this repository**.

The maintainer has reported internal functional success on Windows and Mac and verified Apple code-signing/notarization on the Mac test app. This is **not an independent security audit, certification or guarantee**. Windows remains an unsigned internal QA executable. The site should not open general download access or registration based on functional QA alone.

Pilot safety expectations:
- No third-party, public-IP, organisational or production scanning in the initial external evaluation; limit to one's own `127.0.0.1`.
- Active scanning requires informed browser consent, pairing and separate native confirmation for every scan.
- Never advise testers to disable operating-system security protections to run unsigned applications.
- Keep private credentials, pairing codes, raw Nmap XML, personal IP addresses, volunteer contact information and unredacted reports out of public issues/commits.
- A public copy of a downloaded file or signature is **not** proof of security; independently verify access controls and software supply chain.
- Review localhost bind/origin restrictions, pairing, CSRF, consent bypasses, scan parameter validation, download gating, data handling and denial cases before wider release.

See [internal acceptance checkpoint](docs/INTERNAL_ACCEPTANCE_2026-11-10.md) and [expanded preliminary threat model](docs/THREAT_MODEL.md). Report sensitive bugs privately, not in GitHub issues.

## Reporting security issues

Please **do not disclose exploit details, secrets or private data in public GitHub issues**. Use GitHub's **Private vulnerability reporting** feature once enabled for the repository. If unavailable, contact the repository maintainer through an established private channel; do not post sensitive exploit details publicly. We will publish a remediation note if appropriate after validation.

## Public-versus-private boundary

- Public GitHub repository: application source, synthetic demo, non-sensitive documentation and tests.
- Password-protected WordPress demonstration: access-controlled copy of the **same synthetic-only** prototype; WordPress controls the gate, not the demo itself.
- Private operations: contact lists, organisational consent records, individual pilot reports and credentials **must not** be committed to this repository.
- WordPress page passwords are **shared-secret access controls**, not user-specific logins. They are inadequate for storing real security assessments or authenticating multiple users with independent accountability.

## Known limitations

The app runs inline JavaScript and uses a CSP permitting inline scripts inside the sandboxed example; this is a demonstration architecture, not a hardened production application. The hosting WordPress site may load third-party analytics outside the isolated iframe. The synthetic demo contains no `fetch`, XHR or outbound integration and is designed to operate offline. This repository has not had an independent security audit, and statements about privacy are limited to this code and its stated environment. Review the [threat model](docs/THREAT_MODEL.md).

## Supported versions

Only version `0.1.0` exists at initial publication; no supported production version is offered. Issues affecting v0.1 may be fixed in subsequent experimental releases.