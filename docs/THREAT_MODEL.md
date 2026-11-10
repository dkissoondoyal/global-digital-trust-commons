# Preliminary threat model v0.1 (not independently reviewed)

## Intended usage

A volunteer uses the standalone demo or an invited person opens a password-protected WordPress page, enters only **fictional** values and examines illustrative remediation suggestions.

## Assets and boundaries

- **Assets:** Participant privacy, WordPress password gate integrity, accurate labelling of fictional observations and optional locally downloaded JSON file.
- **Trust boundaries:** Browser sandbox; host WordPress application; any reverse-proxy cache; participants' own devices; the public GitHub repository.
- **Not in scope:** Real OAuth integrations, mailbox content, credentials, DNS scanning, SIEM functions, live production data, partner reports.

## Threats, mitigations and gaps

| Threat | Present mitigation | Remaining concern |
| --- | --- | --- |
| Unauthorised browsing of private pilot | WordPress page-password check before iframe HTML is emitted | Shared password; no per-person access, rate-limiting guarantee or MFA |
| Sensitive data submitted by testers | Clear synthetic-data warnings and no submission endpoint | Users may ignore warnings; hosting analytics and browsers are outside this tool's control |
| Browser-to-network exfiltration by demo | Inline CSP `connect-src 'none'`, no network features, iframe sandbox in plugin | Browser extensions, implementation error, or injected/modified hosting content require independent review |
| HTML or script injection through fictional label | DOM report uses `textContent` for values | Comprehensive XSS testing not performed |
| External access via publication | All committed material is synthetic code and docs | Git history is durable; do not ever commit secrets or partner data |
| False sense of security | Explicitly labelled self-reported observations, no numerical compliance score | Human interpretation can still be misleading; independent evaluation planned |
| WordPress caching | `nocache_headers` and private no-store response headers on target page | Site/proxy/CDN behavior must be validated independently |

## November 2026 addendum: private local companion pilot (preliminary)

The v0.1 model above covers the **public synthetic demo only**. A separate invitation-controlled IGF Mauritius internal pilot now includes an optional browser-side XML reader and locally installed Windows/macOS companion capable of explicitly authorised localhost scanning. Its version-matched source and binaries are not part of the public v0.1 repository; the observations below are **design assumptions requiring independent code review**.

**Additional assets:** Individual volunteer approval state, pairing secrets/tokens, integrity of the local service, native scan confirmation, Nmap invocation parameters, locally generated XML and exported reports, and platform signing identity.

**Additional trust boundaries:** WordPress account/download authorisation; authenticated HTTPS portal to browser; browser to local loopback companion; companion to separately installed Nmap; local evidence returned to browser; browser export to participant's disk. macOS permissions to automate Chrome are a broad OS-level boundary and should be optional/minimised.

| Threat / failure mode | Intended control or current test observation | Independent validation needed |
| --- | --- | --- |
| Unauthorised download of internal binaries | Per-user approval/internal-tester flag, site option and nonce controls in private deployment | Test unauthenticated, pending, revoked, admin/unflagged, expired nonce and direct endpoint paths |
| Remote network client accessing companion | Reported localhost bind and restricted allowed browser origin | Verify actual bind, DNS rebinding, CORS, browser extensions, localhost HTTP handling and malformed requests |
| Pairing spoofing/replay | One-time pairing shown in native app; internal pairing passed | Verify token lifetime, entropy, reuse/restart, concurrent clients and origin binding |
| Scan without explicit target authorisation | Two browser checkboxes plus separate native approval; internal scan passed | Test bypass/rapid repetition/cancellation and foreground display on both operating systems |
| Target/scope expansion | Initial external tests limited to `127.0.0.1`; fixed six TCP ports observed | Verify strict parsing, command argument handling and hard deny of disallowed targets/flags |
| Accidental transmission or disclosure of raw XML/IPs | Browser-side XML reader and local exports; Mac redaction test passed | Inspect network flows, logging, cache, analytics, print/export paths and error handling |
| Signed but unsafe / tampered distribution | Mac signature and notarization validated on test Mac, Windows unsigned | Verify provenance, version-matched reproducible builds, dependency updates and independent source review |
| Misleading security interpretation | Reports label observations rather than vulnerabilities | Test wording/accessibility and feedback comprehension across languages |

**Release gates:** Independent review; clean-machine/denial-path tests; full companion and portal source/build publication; platform-specific signing/distribution controls; privacy and accessibility review; explicit informed volunteer consent. No full production approval is claimed.

## Validation needed before non-synthetic use

1. Independent code and web-platform security review.
2. Hosting/caching and password authentication tests by an unauthenticated reviewer.
3. Accessibility, usability and language testing.
4. Threat model revision with consented pilot organisations.
5. Decision on appropriate user-specific authentication, retention, encryption and incident response arrangements.

Current project status: experimental, educational and **not certified**.
