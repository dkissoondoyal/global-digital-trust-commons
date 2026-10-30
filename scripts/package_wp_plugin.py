#!/usr/bin/env python3
"""Build a source-equivalent WordPress plugin install ZIP (for experimental use)."""
from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED
root=Path(__file__).resolve().parents[1]
src=root/'wordpress/adtc-secure-pilot'
out=root/'build/adtc-secure-pilot-v0.1.0.zip'
out.parent.mkdir(exist_ok=True)
with ZipFile(out,'w',ZIP_DEFLATED) as z:
    for path in sorted(src.rglob('*')):
        if path.is_file():
            z.write(path, Path('adtc-secure-pilot') / path.relative_to(src))
print('Created:',out)
