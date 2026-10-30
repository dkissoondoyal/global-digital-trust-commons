#!/usr/bin/env python3
"""Verify the public demo, GitHub Pages demo, and embedded plugin HTML match."""
from pathlib import Path
import re

ROOT = Path(__file__).resolve().parents[1]
DEMO = (ROOT / 'demo/index.html').read_text(encoding='utf-8').strip()
PAGES = (ROOT / 'docs/index.html').read_text(encoding='utf-8').strip()
PLUGIN = (ROOT / 'wordpress/adtc-secure-pilot/adtc-secure-pilot.php').read_text(encoding='utf-8')
m = re.search(r"<<<'ADTC_DEMO_EMBED'\n(.*?)\nADTC_DEMO_EMBED;", PLUGIN, re.S)
assert m, 'Embedded prototype heredoc missing'
assert DEMO == PAGES, 'GitHub Pages and canonical demo are not identical'
assert DEMO == m.group(1).strip(), 'WordPress embedded demo differs from standalone demo'
assert "post_password_required( $page )" in PLUGIN, 'WordPress password check missing'
assert "'publish' !== $page->post_status" in PLUGIN, 'WordPress page publication gate missing'
assert "! (string) $page->post_password" in PLUGIN, 'WordPress password fail-closed check missing'
print('PASS: source-sync and WordPress password-gate static checks')
