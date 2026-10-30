# Global Digital Trust Commons (GDTC)

**Open-source, community-oriented digital-security learning and self-assessment tools for small civil-society organisations worldwide.**

**Current release: v0.1.0 — experimental synthetic-data demonstration (October 2026).**

The initiative originates in Mauritius. Its first working demonstration is the **African Digital Trust Commons (ADTC)**, a bilingual English/French browser-only pilot. The global project identity is **GDTC**; the v0.1 application retains its original ADTC branding to preserve the provenance of the deployed prototype.

> **Not a security audit or a security product.** This demonstration does not scan domains, inspect mailboxes, connect to accounts, verify settings, or establish compliance. It generates observations entirely from fictional answers entered by a user. **Do not enter real credentials, sensitive configurations, client information, or personal data.**

## Try the demonstration

- Open [`demo/index.html`](demo/index.html) locally in a modern browser. No installation, backend, account or network access is necessary.
- Default fictional example: choose **Generate observations** to obtain **six** observations (this is a demonstration fixture, not a measurement of a real organisation).
- Switch the interface using **FR / EN**. Modify synthetic values to see the report change, then download a locally generated JSON report.
- To expose a **public, synthetic-only** demo after creating the repository, optionally enable GitHub Pages from **`main` → `/docs`**. The site will then use `docs/index.html`; verify its actual URL in GitHub before sharing it. See [Publication guide](docs/PUBLICATION.md).

**Private pilot:** An invitation-only v0.1 version has been activated on [IGF Mauritius](https://igf-mu.org/adtc-pilot/), using a WordPress password-protected page. The public demo here does **not** provide access to the private pilot. That deployment is **not** an endorsement or certification by ICANN, Mozilla or any At-Large organisation.

## What exists and what is planned

| Area | Present in v0.1 | Planned; not implemented |
| --- | --- | --- |
| Local browser example | Self-reported fictional permissions and email settings | Real, opt-in inventory ingestion |
| Email baseline | Hypothetical SPF, DKIM and DMARC labels | Evidence-labelled authorised DNS checks |
| AI/email integrations | Illustrative permission patterns | Read-only, user-supplied export and scope analysis |
| Reporting | In-memory bilingual observations, JSON export and print | Signed or reproducible assessment evidence |
| History | No storage | Optional local-only change tracking |
| Security | Basic isolation and synthetic-only use | Independent code review, threat modelling and accessibility audit |

## Repository structure

```text
demo/index.html                      Standalone HTML/JS/CSS v0.1 prototype
docs/index.html                      Identical static copy for optional GitHub Pages
wordpress/adtc-secure-pilot/         Source of WordPress pilot plugin v0.1.0
tests/                               Automated source and behaviour checks
scripts/                             Source-consistency and packaging helpers
docs/ARCHITECTURE.md                 Architecture and trust boundaries
docs/THREAT_MODEL.md                 Threats, mitigations and limitations
docs/ROADMAP.md                      Milestones and open development commitments
docs/PUBLICATION.md                  How to publish and configure public demo
.github/workflows/                   Automated tests (GitHub Actions)
```

## Local development

Requirements to run the demo: **modern browser only**. To execute tests, install **Node.js 20+**, **Python 3.10+**, and optionally **PHP 7.4+** for syntax linting.

```bash
node --test tests/demo.test.mjs
python3 scripts/check_source_sync.py
php -l wordpress/adtc-secure-pilot/adtc-secure-pilot.php
```

The WordPress plugin is tied to a published page with slug `adtc-pilot` whose **Visibility** is **Password protected**. See [WordPress deployment](docs/WORDPRESS.md). This is an experimental access mechanism, not a replacement for individual accounts, MFA and an independently reviewed authentication design.

## Global community participation

GDTC is intended for volunteer-run NGOs, civil-society organisations and local technical stewards. Its initial test site is in Mauritius; participation by external organisations and people across ICANN's five geographic At-Large regions is **prospective, voluntary and not yet an institutional commitment**. Any invitation or prior professional relationship is not a claim of endorsement. The project is independent of ICANN, the RALOs, Mozilla and other institutions unless they separately state otherwise.

Review [CONTRIBUTING.md](CONTRIBUTING.md), [GOVERNANCE.md](GOVERNANCE.md), and [SECURITY.md](SECURITY.md). Please open an issue for language clarity or accessibility suggestions, but **never include security-sensitive system information or real organisational assessment data in public issues**.

## License and provenance

The source is released under **GNU General Public License, version 2 or (at your option) any later version** (`GPL-2.0-or-later`); see [LICENSE](LICENSE). The v0.1 WordPress plugin already declared this license. Third-party product or platform names appearing in synthetic examples are descriptive only and do not imply endorsement.

The October 2026 v0.1 demonstration was developed and verified locally using synthetic test data and later tested by the project organiser via the private, bilingual WordPress pilot. Tests in this repository are reproducible programmatic checks; they are **not** an independent security audit, external validation or proof of any real-world security improvement.

**AI-assistance transparency:** AI assistance was used for drafting, implementation, debugging and documentation during prototype preparation. All statements, code and licenses remain subject to the project maintainer's review. A source publication does not imply independent code-review approval.