import { test } from 'node:test';
import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import { resolve } from 'node:path';
import vm from 'node:vm';

// Minimal deterministic DOM harness. No external packages or network access.
// Tests the actual inline JavaScript from demo/index.html rather than a rewrite.
const html = readFileSync(resolve('demo/index.html'), 'utf8');
const match = html.match(/<script>([\s\S]*?)<\/script>/);
assert.ok(match, 'Demo must have an inline script');

function element(id='') {
  return {
    id,
    value: '', checked: false, dataset: {}, className: '',
    _textContent: '',
    get textContent() { return this._textContent; },
    set textContent(v) { this._textContent = v; this.children = []; },
    children: [], listeners: {}, attributes: {},
    appendChild(child) { this.children.push(child); return child; },
    append(...children) { this.children.push(...children); },
    remove() { }, click() { this.listeners.click?.(); },
    addEventListener(name, handler) { this.listeners[name] = handler; },
    getAttribute(name) { return this.attributes[name] ?? null; },
    setAttribute(name, value) { this.attributes[name] = value; }
  };
}

function loadDemo() {
  const ids = [...html.matchAll(/\bid="([^"]+)"/g)].map(x => x[1]);
  const elems = new Map(ids.map(id => [id, element(id)]));
  elems.get('hero').textContent = 'Digital trust self-assessment';
  elems.get('org').value = 'Example Community NGO (synthetic data)';
  elems.get('spf').value = 'present';
  elems.get('dkim').value = 'unknown';
  elems.get('dmarc').value = 'missing';
  elems.get('recovery').checked = true;
  const scopes = [
    ['https://mail.google.com/', 'Example volunteer assistant', true],
    ['offline_access', 'Example volunteer assistant', true],
    ['https://www.googleapis.com/auth/gmail.send', 'Example newsletter connector', true],
    ['Mail.ReadWrite', 'Example file collaboration tool', false]
  ].map(([scope, app, checked]) => {
    const e = element(); e.dataset = { scope, app }; e.checked = checked; return e;
  });
  const headings = [...html.matchAll(/<h2\s+data-en="([^"]+)"\s+data-fr="([^"]+)"/g)]
      .map(([, en, fr]) => {
        const e = element(); e.attributes['data-en'] = en; e.attributes['data-fr'] = fr; return e;
      });
  const options = ['present','missing','unknown'].map(value => ({...element(), value}));
  const document = {
    documentElement: { lang:'en' },
    getElementById: id => elems.get(id) ?? null,
    querySelectorAll: selector => ({
      '[data-scope]': scopes,
      '[data-en][data-fr]': headings,
      'select option': options
    }[selector] ?? []),
    createElement: tag => element(tag),
    body: element('body')
  };
  let download = null;
  const URL = {
    createObjectURL: blob => { download = blob; return 'blob:synthetic-test'; },
    revokeObjectURL: () => {}
  };
  const context = { document, window: { print(){} }, Blob, URL, setTimeout(){} };
  vm.runInNewContext(match[1], context, {timeout:1000});
  return {document, elems, scopes, getDownload:() => download};
}

test('default fictional case produces six observations and never reports a verified scan', () => {
  const t=loadDemo();
  assert.equal(t.elems.get('total').textContent, '6');
  assert.equal(t.elems.get('findings').children.length, 6);
  assert.equal(t.document.documentElement.lang, 'en');
  assert.match(t.elems.get('hero').textContent, /Digital trust/);
});

test('French interface preserves assessment count', () => {
  const t=loadDemo();
  t.elems.get('langBtn').click();
  assert.equal(t.document.documentElement.lang, 'fr');
  assert.equal(t.elems.get('total').textContent, '6');
  assert.match(t.elems.get('hero').textContent, /confiance numérique/);
  assert.equal(t.elems.get('langBtn').textContent, 'EN');
});

test('extra fictional missing control changes finding count', () => {
  const t=loadDemo();
  t.elems.get('spf').value='missing';
  t.elems.get('assess').click();
  assert.equal(t.elems.get('total').textContent, '7');
});

test('all present and no selected permission/control produces zero observations, not a security certificate', () => {
  const t=loadDemo();
  for (const s of t.scopes) s.checked=false;
  for (const id of ['spf','dkim','dmarc']) t.elems.get(id).value='present';
  t.elems.get('recovery').checked=false;
  t.elems.get('assess').click();
  assert.equal(t.elems.get('total').textContent, '0');
  assert.match(t.elems.get('findings').children[0].textContent, /not a verification/i);
});

test('reset restores the English six-observation sample', () => {
  const t=loadDemo();
  t.elems.get('langBtn').click();
  t.scopes.forEach(s => {s.checked=false;});
  t.elems.get('spf').value='missing';
  t.elems.get('reset').click();
  assert.equal(t.document.documentElement.lang,'en');
  assert.equal(t.elems.get('total').textContent,'6');
  assert.equal(t.elems.get('spf').value,'present');
});

test('JSON export preserves synthetic-data and no-network limitation flags', async () => {
  const t=loadDemo();
  t.elems.get('download').click();
  assert.ok(t.getDownload(), 'Expected generated client-side JSON Blob');
  const report=JSON.parse(await t.getDownload().text());
  assert.equal(report.findings.length,6);
  assert.equal(report.synthetic_data_only,true);
  assert.equal(report.network_checks,false);
  assert.match(report.organization,/synthetic data/);
});
