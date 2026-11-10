# November 2026 cross-platform internal acceptance checkpoint

**Checkpoint date:** 10 November 2026  
**Status:** Maintainer-run internal functional QA completed on tested Windows and macOS computers; **not approved for unrestricted external distribution**.

## Scope and provenance

This checkpoint reports observations from the IGF Mauritius invitation-controlled volunteer pilot, not from the public v0.1 source tree. The current public repository still provides the original synthetic-only ADTC v0.1 demonstration. The separately deployed GDTC Network Evidence Lab and desktop companion builds are **internal release candidates**, and their corresponding source/build materials have not yet been published here. This document is therefore **not** a source-level verification, independent audit or binary provenance attestation.

## Internal observations (maintainer-reported)

| Test area | Windows internal QA | macOS internal QA |
| --- | --- | --- |
| Companion launch | Passed | Passed |
| Browser-to-local companion pairing | Passed | Passed |
| Explicit approval for an authorised `127.0.0.1` scan | Passed | Passed |
| Six fixed TCP-port observations reported in the browser | Passed | Passed |
| Local JSON/PDF report generation | Passed | Passed |
| IP-redacted local exports | Exercised during internal pilot | Passed in two uploaded report formats |
| Package/hash verification | Downloaded ZIP SHA-256 matched coordinator's published internal QA checksum | Not recorded as a separate ZIP hash test in this checkpoint |
| Platform signing | Unsigned QA executable | Developer ID signature verified; stapled notarization validated; Gatekeeper accepted |
| Clean-machine external replication | Not yet completed | Not yet completed |
| Independent security review | Not yet completed | Not yet completed |

On macOS, the maintainer verified `codesign --verify --deep --strict`, `xcrun stapler validate` and `spctl --type execute` on the extracted app. The local scan contained one loopback host and six fixed TCP port records (22, 80, 443, 445, 3389, 8080), all reported closed **in that particular test**. The JSON and PDF outputs retained port observations while redacting host values when inclusion was disabled. In a separate opt-in export, IP values were explicitly included; these personal/network details are deliberately **not** reproduced here.

**Limits:** These tests provide functional evidence only. They do not establish the absence of vulnerabilities, cross-device compatibility, a complete privacy audit, independent confirmation of all claimed network flows or compliance certification. Signing/notarization does not guarantee application security.

## Current safety boundaries

- Public registration remains closed. Windows/Mac internal downloads are intended only for individually approved and flagged IGF testers.
- The browser assessment remains synthetic by default; the optional active scan requires pairing, explicit browser-side acknowledgements, and separate native approval for each scan.
- The initial real-scan scope is **the participant's own localhost (`127.0.0.1`) only**. Do not scan other devices, public networks, third-party systems or production infrastructure during initial evaluation.
- The reported design uses a local companion and browser-side XML processing rather than WordPress running Nmap. Independent validation of this data-flow claim remains part of the security review.
- Reports must default to redacting host/IP values when being shared.
- The Windows QA executable is unsigned. Volunteers must not be asked to disable antivirus, Gatekeeper, Defender or other security safeguards.

## Next gates

1. Review the paired local API and consent implementation, browser-origin restrictions, packaging/dependencies, download-endpoint authorisation, privacy, threat model and negative cases. Seek independent review.
2. Perform clean-machine tests for both operating systems, including native scan-approval foreground behavior and denied-permission scenarios.
3. Publish version-matched companion and updated WordPress source, reproducible build instructions, dependency/licensing notes and provenance records **before describing these deployed binaries as a publicly released open-source version**.
4. Complete Windows publisher signing and repeat checksum, signature and SmartScreen-disclosure verification for the rebuilt package.
5. Provide clear English/French volunteer consent, installation, security and feedback instructions; invite a small evaluation cohort only when the relevant controls have passed.

## Relationship to the proposed fellowship

This checkpoint is evidence of iterative preparatory work, not project completion, external NGO adoption, fellowship funding or endorsement by Mozilla, ICANN or other organisations. Future research, independent review, governance, accessibility, sustainability and NGO co-design remain central work items.

*Prepared as a public, non-sensitive summary of maintainer-supplied internal acceptance evidence. No volunteer identities, pairing codes, private network addresses, credentials, signed binaries or raw reports are included.*
