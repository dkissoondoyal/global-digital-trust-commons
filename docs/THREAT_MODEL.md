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

## Validation needed before non-synthetic use

1. Independent code and web-platform security review.
2. Hosting/caching and password authentication tests by an unauthenticated reviewer.
3. Accessibility, usability and language testing.
4. Threat model revision with consented pilot organisations.
5. Decision on appropriate user-specific authentication, retention, encryption and incident response arrangements.

Current project status: experimental, educational and **not certified**.
