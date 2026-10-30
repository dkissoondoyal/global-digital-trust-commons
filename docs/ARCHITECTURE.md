# Architecture and evidence boundaries

## v0.1 components

```text
Synthetic values entered by volunteer
             |
             v
 Browser-only form (demo/index.html)
             |
             v
 Local assessment rules -> sorted observations -> in-memory report
             |                              |
             v                              v
        Print view                     JSON export
```

The illustrative rules are directly in the HTML's inline JavaScript. There is no backend. Observations are reported, not independently checked. The user can keep the generated JSON locally; no central upload exists.

## Optional password-gated WordPress route

```text
Browser -> WordPress /adtc-pilot/ -> WordPress password gate
                                      |
                               denied: login form
                                      |
                               allowed: srcdoc iframe
                                      |
                           sandboxed synthetic-only demo
```

The plugin filters WordPress content on the page slug `adtc-pilot` and checks the page's published status, non-empty WordPress post password, and `post_password_required()`. It injects the demo only after that check and adds cache-control and noindex headers. The iframe sandbox permits scripts and downloads but not same-origin access; it also declares a restrictive CSP for network operations.

**Boundary and limitations:** These are application-level checks in experimental code. Do not assume server/proxy caches, hosting analytics, browser extensions, password-sharing, misconfiguration or WordPress vulnerabilities are eliminated. A qualified security review is required before real-world assessments. Content in a public repo is public by design; publication does not reveal the WordPress page password.

## Future modularisation

Future versions should extract assessment rules into a small audited library, separate translation data from rule logic, support locally stored history only with consent, verify authorised DNS records while preserving evidence provenance, and expand accessible language support. These features **do not exist in v0.1**.
