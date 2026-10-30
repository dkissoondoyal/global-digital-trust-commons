# Security policy — experimental software

GDTC/ADTC v0.1 is a **synthetic-data demonstration**, not an independently audited security product. No live scans or integrations are implemented. Do not use it for actual risk decisions, compliance attestations, live organisational security evaluations, or processing secrets.

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