#!/usr/bin/env python3
"""Offline, user-supplied HTTP response header assessor. No network operations."""
import argparse
import json
import re
from pathlib import Path

MAX_BYTES = 65536
CHECKS = {
    "hsts": ("strict-transport-security", "Strict-Transport-Security"),
    "csp": ("content-security-policy", "Content-Security-Policy"),
    "nosniff": ("x-content-type-options", "X-Content-Type-Options"),
}

def assess(raw: str, source: str = "user-supplied-header-file") -> dict:
    if len(raw.encode("utf-8")) > MAX_BYTES:
        raise ValueError("Header input exceeds 64 KiB")
    lines = raw.replace("\r\n", "\n").split("\n")
    if not lines or not re.match(r"^HTTP/\d(?:\.\d)?\s+\d{3}(?:\s|$)", lines[0], re.I):
        raise ValueError("Expected HTTP status line, e.g. HTTP/1.1 200 OK")
    headers = {}
    for line in lines[1:]:
        if not line.strip():
            break
        if line[0] in " \t":
            raise ValueError("Folded headers are not supported")
        if ":" not in line:
            raise ValueError("Invalid header line")
        name, value = line.split(":", 1)
        if not re.fullmatch(r"[!#$%&'*+.^_`|~0-9A-Za-z-]+", name):
            raise ValueError("Invalid header name")
        headers.setdefault(name.lower(), []).append(value.strip())
    findings = []
    for key, (header, display) in CHECKS.items():
        values = headers.get(header, [])
        if not values:
            status = "not_observed"
        elif key == "nosniff" and not any(v.lower() == "nosniff" for v in values):
            status = "requires_review"
        elif key == "hsts" and not any(re.search(r"(?:^|;)\s*max-age\s*=\s*\d+", v, re.I) for v in values):
            status = "requires_review"
        elif key == "csp" and not any(v.strip() for v in values):
            status = "requires_review"
        else:
            status = "observed_review_configuration"
        findings.append({"control_id": key, "header": display, "status": status,
                         "evidence_type": "user_supplied_http_headers",
                         "recommendation": "Review this observation with an authorised administrator; presence alone does not establish secure configuration."})
    return {"schema_version": "0.2-experimental", "source": source, "scope": "single supplied HTTP response",
            "limitations": ["No network access or scanning", "No vulnerability exploitation",
                            "Header presence is not proof of application security",
                            "HTTP-only responses cannot establish effective HSTS"],
            "findings": findings}

def main():
    p = argparse.ArgumentParser(description=__doc__)
    p.add_argument("file", type=Path, help="Locally saved HTTP response headers (no secrets)")
    p.add_argument("--output", type=Path, help="Optional JSON report destination")
    args = p.parse_args()
    raw = args.file.read_bytes()
    if len(raw) > MAX_BYTES:
        p.error("Header input exceeds 64 KiB")
    try:
        report = assess(raw.decode("utf-8"))
    except (UnicodeError, ValueError) as e:
        p.error(str(e))
    output = json.dumps(report, indent=2, ensure_ascii=False) + "\n"
    if args.output:
        args.output.write_text(output, encoding="utf-8")
    else:
        print(output, end="")

if __name__ == "__main__":
    main()
