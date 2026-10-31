import test from 'node:test';
import assert from 'node:assert/strict';
import { chromium } from 'playwright';
import { spawnSync } from 'node:child_process';
import { mkdtempSync, readFileSync, rmSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join, resolve } from 'node:path';
import { pathToFileURL } from 'node:url';

const root=resolve(import.meta.dirname,'..');
const temp=mkdtempSync(join(tmpdir(),'gdtc-browser-'));
const reportPath=join(temp,'report.json');
const python=spawnSync('python3',[join(root,'scripts/assess_http_headers.py'),join(root,'examples/synthetic-response-headers.txt'),'--output',reportPath],{encoding:'utf8'});
assert.equal(python.status,0,python.stderr);
const report=JSON.parse(readFileSync(reportPath,'utf8'));
assert.equal(report.findings.length,3);

test('real Chromium: local JSON import, EN/FR, keyboard, error handling, offline behavior',async()=>{
  const browser=await chromium.launch({headless:true});
  try{
    const page=await browser.newPage();
    const requests=[];
    page.on('request',r=>requests.push(r.url()));
    await page.goto(pathToFileURL(join(root,'prototype/remediation/integrated.html')).href);
    await assert.equal(await page.locator('#results article').count(),0);
    await page.locator('#file').setInputFiles(reportPath);
    await assert.equal(await page.locator('#results article').count(),3);
    await assert.match(await page.locator('#results').innerText(),/HSTS/);
    await page.locator('#language').selectOption('fr');
    assert.equal(await page.locator('html').getAttribute('lang'),'fr');
    assert.match(await page.locator('#results').innerText(),/Vérification/);
    await page.locator('#file').setInputFiles({name:'invalid.json',mimeType:'application/json',buffer:Buffer.from('{"schema_version":"bad"}')});
    assert.equal(await page.locator('#results article').count(),0);
    assert.match(await page.locator('#feedback').innerText(),/Rapport invalide/);
    await page.locator('#sample').focus();
    await page.keyboard.press('Enter');
    assert.equal(await page.locator('#results article').count(),3);
    assert.equal(await page.locator('#sample').evaluate(el=>el===document.activeElement),true);
    assert.deepEqual(requests.filter(url=>/^https?:/i.test(url)),[],'unexpected network request');
  }finally{await browser.close();}
});
process.on('exit',()=>rmSync(temp,{recursive:true,force:true}));
