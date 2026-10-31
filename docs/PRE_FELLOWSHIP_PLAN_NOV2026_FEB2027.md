# GDTC Pre-Fellowship Development and Validation Plan
**Period:** November 2026 – February 2027  
**Project:** Global Digital Trust Commons (GDTC), beginning with the African Digital Trust Commons (ADTC)  
**Status:** Working planning document, not a Mozilla-approved programme or commitment of partner organisations  
**Version:** 1.0 — 1 November 2026

## 1. Strategic objective

Demonstrate **technical feasibility, safe operation, genuine civil-society need, and a credible implementation pathway**, while preserving a substantive, clearly justified programme of research, community validation, governance and sustainable development for a potential 2027–2028 Mozilla Independent Fellowship.

**Principle:** Build enough to demonstrate trust. Preserve enough ambition to justify transformation.

We will not artificially withhold necessary security fixes or misrepresent a prototype as production-ready.

## 2. What already exists (evidence as of 1 November 2026)

- Public open-source GitHub repository with v0.1 synthetic demonstration and documentation.
- Experimental v0.2 offline HTTP-header assessor accepting **user-supplied evidence only**.
- Experimental EN/FR evidence-to-guidance interface for HSTS, CSP and X-Content-Type-Options observations.
- Reproducible Python, Node.js and Chromium integration tests on a draft development branch.
- GitHub Actions successes on the tested v0.2 branch (see PR #1 and CI run records).
- Initial security and accessibility review with outstanding recommendations.
- An IGF Mauritius-hosted password-protected pilot demonstration; this is **not evidence of an NGO field validation**.
- Invitations or exploratory contact with prospective civil-society organisations are **not** confirmed partnerships or completed pilots.

**Non-claims:** no real-time network scanning, automatic remediation, independently verified security posture, full WCAG compliance, production deployment, independent security audit, or Mozilla selection.

## 3. Pre-Fellowship boundary

### In scope (November 2026–February 2027)
1. Finish essential v0.2 usability, bilingual-feedback, privacy and accessibility improvements.
2. Keep the draft PR unmerged until the defined release gates pass.
3. Maintain reproducible automated tests, limitations and a changelog.
4. Prepare a safe, synthetic demonstration and a short facilitator guide.
5. Invite a **small number** of organisations for voluntary, structured feedback, without requiring real operational data.
6. Consolidate feedback, risks, evidence, governance questions and a defensible fellowship work plan.

### Reserved as substantive Fellowship-phase work (subject to programme fit and selection)
1. Design and evaluation of a broader, evidence-based Knowledge and Remediation Engine.
2. Community-governed and consent-based contribution of anonymised knowledge, including quality assurance and provenance.
3. Expanded multilingual and low-bandwidth accessibility, with evaluation in diverse settings.
4. Participatory governance, maintenance and accountability mechanisms.
5. Iterative NGO co-design, evaluation and carefully controlled scaling.
6. Long-term stewardship, sustainability and independent evaluation.

## 4. Phased timeline and decision gates

| Period | Deliverable | Evidence required | Gate |
| --- | --- | --- | --- |
| **November 2026** | v0.2 safe demonstration candidate | Passing CI; bilingual status/error fixes; screen-reader/keyboard/zoom checks; privacy/security checklist | **Gate A:** maintainer approves controlled demo only |
| **December 2026** | Small external-review cycle | Voluntary feedback from a few invited NGOs; documented consent; no sensitive evidence; issues triaged | **Gate B:** decide whether usability is sufficient for another review cycle |
| **January 2027** | Consolidated learning and scope | Anonymised feedback themes; prioritised issues; limitations; governance and research questions | **Gate C:** confirm the fellowship research questions are supported by evidence |
| **February 2027** | Application-ready evidence package, if invited | Demonstration; CI records; pilot feedback with permission; roadmap; realistic work plan and risks | **Gate D:** submit only if invited and compliant with official instructions |

Dates are planning targets, **not Mozilla deadlines**; verify all official application milestones and criteria before submitting.

## 5. External review protocol

- Start with a small, diverse group of civil-society organisations. Invitations are not endorsements or confirmed pilot participation.
- Offer a synthetic demonstration and a 20–30 minute facilitated walkthrough or asynchronous review; avoid unnecessary meetings.
- Seek informed, voluntary consent for feedback and publication of any quotes, logos or names.
- **Do not request passwords, internal security reports, private domains, personal data or live scans.**
- Collect only minimal feedback: role/organisation category (optional), language, whether the guidance was understandable, whether actions seemed feasible, missing guidance, accessibility barriers and willingness to participate again.
- Record participation counts accurately; distinguish invited, responded, reviewed and consented to attribution.
- Allow anonymous or unattributed feedback; store notes securely, restrict access and set a retention/deletion policy before collection.
- Document negative feedback and unresolved issues as carefully as positive findings.

## 6. Proposed measurement framework

| Measure | Definition | Interpretation |
| --- | --- | --- |
| CI reproducibility | Passed workflows / attempted runs, with run links | Engineering confidence, **not** security certification |
| Task comprehension | Reviewers who correctly explain one finding and next step / reviewers attempting | Early usability signal, not population-level effectiveness |
| Actionability | Reviewers reporting they could identify a feasible next step | Self-reported signal requiring later validation |
| Accessibility issues | Unique blockers found by keyboard, zoom, screen-reader and language review | Prioritised backlog, not a WCAG conformance claim |
| NGO feedback coverage | Number invited, responded, completed review and consented to attribution | No invented partners or inflated pilot numbers |
| Remediation verification | Ability to describe how to recheck a finding | Prototype-level verification guidance, **not** actual system remediation |

Avoid statistical claims from a very small convenience sample.

## 7. Risk register

| Risk | Mitigation |
| --- | --- |
| Prototype mistaken for a security audit | Prominent experimental notices, scope statements, synthetic examples |
| Sensitive data collected during pilot | No real data required; data minimisation, explicit consent and deletion process |
| Overstated partnerships or outcomes | Track invitation, response, review and attribution separately |
| Inaccessible interface | Manual keyboard, zoom, screen-reader and EN/FR testing; resolve blockers |
| Premature scaling or feature creep | Strict pre-Fellowship boundary and Gate A–D approvals |
| Fellowship application not invited or funded | Continue the open-source public-good project at a sustainable pace |
| Dependence on one maintainer | Open documentation, contribution guide, transparent decisions and handover plan |

## 8. Application evidence register

Maintain an indexed record of:
- Git commit SHA, PR and GitHub Actions run IDs for each claimed milestone.
- Dated screenshots or screen recordings of **synthetic** demonstrations.
- Dated reviewer invitations, responses, consent and anonymised feedback.
- Known defects and mitigations, not only successes.
- Architectural decisions, licensing and community-governance proposals.
- Explicit distinctions among **built**, **tested**, **reviewed**, **deployed** and **proposed**.

## 9. Fellowship rationale — working language

> GDTC has demonstrated the technical feasibility of translating locally supplied digital-security evidence into understandable, bilingual, practical guidance. The proposed Fellowship would support the more demanding next phase: participatory validation with civil society, rigorous knowledge and remediation design, accessible multilingual delivery, accountable community governance, and a sustainable open-source digital public resource.

This language must be revised to fit the actual Mozilla programme's criteria and evidence requirements; **no endorsement or funding is implied**.

## 10. Immediate next actions

1. Address the accessibility and localisation findings in `docs/SECURITY_ACCESSIBILITY_REVIEW_V02.md`.
2. Rerun all CI workflows; manually test keyboard, screen-reader, zoom and file import.
3. Maintain PR #1 as draft until Gate A is satisfied.
4. Prepare a one-page synthetic demo guide and a short, voluntary NGO feedback form.
5. Confirm prospective organisations' interest without representing invitations as agreements.
6. Reassess scope monthly; protect the substantive Fellowship research and implementation agenda.

**Decision rule:** A milestone is complete only when its evidence is documented. An invitation is not a partnership; a passing test is not an audit; a demonstration is not a deployment.
