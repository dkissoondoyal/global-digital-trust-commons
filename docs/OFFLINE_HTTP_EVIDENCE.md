# GDTC experimental offline HTTP-header evidence assessment

This is a **local, no-network evidence importer** for a single HTTP response header block. It complements the bilingual remediation prototype and is **not a scanner or vulnerability test**.

## Demonstration
```bash
python3 scripts/assess_http_headers.py examples/synthetic-response-headers.txt
python3 -m unittest discover -s tests -p 'test_header_assessment.py'
```
The example is **fictional**. Results are JSON records for HSTS, CSP and X-Content-Type-Options with evidence provenance. `not_observed` means absent in the **supplied response**, not necessarily absent across the site. `observed_review_configuration` means a header was present, **not** that its policy is secure. HSTS is only effective when delivered over HTTPS.

## Real-world authorised evidence (future controlled evaluation)
Only an organisation's authorised administrator should collect response headers for a site they control, after agreeing scope and data handling. Save a single response's headers locally, **remove cookies, authentication tokens and other sensitive values**, then run the importer on that local file. Do not publish raw headers or assessment reports to public issues. The script itself does not connect to any website.

## Next engineering tasks
- Connect these JSON evidence records to bilingual knowledge guidance using a reviewed mapping and schema.
- Add provenance fields for approved target, collection method and review timestamp without exposing identifiers publicly.
- Add safe, opt-in evidence collection after threat modelling, SSRF/redirect/DNS-rebinding controls, tests and approval.
- Perform independent security and accessibility review before any NGO production pilot.
