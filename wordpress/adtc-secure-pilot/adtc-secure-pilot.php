<?php
/**
 * Plugin Name: ADTC Secure Pilot (IGF Mauritius)
 * Description: An invitation-only, browser-based synthetic-data cybersecurity training demonstration for the password-protected page /adtc-pilot/.
 * Version: 0.1.0
 * Author: IGF Mauritius Pilot Project
 * License: GPL-2.0-or-later
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * This plugin intentionally does NOT store any credentials or questionnaire
 * answers, register public REST routes, or upload separate downloadable demo
 * assets. WordPress owns the password verification.
 */
function adtc_is_target_page() {
    return is_page( 'adtc-pilot' );
}

/** Ensure caches and crawlers don't expose an authenticated response. */
function adtc_pilot_privacy_headers() {
    if ( adtc_is_target_page() ) {
        nocache_headers();
        if ( ! headers_sent() ) {
            header( 'X-Robots-Tag: noindex, nofollow, noarchive, nosnippet', true );
            header( 'Cache-Control: private, no-store, no-cache, max-age=0, must-revalidate', true );
            header( 'Referrer-Policy: no-referrer', true );
        }
    }
}
add_action( 'template_redirect', 'adtc_pilot_privacy_headers', 0 );

function adtc_pilot_robots( $robots ) {
    if ( adtc_is_target_page() ) {
        $robots['noindex'] = true;
        $robots['nofollow'] = true;
        $robots['noarchive'] = true;
    }
    return $robots;
}
add_filter( 'wp_robots', 'adtc_pilot_robots' );

function adtc_pilot_inline_demo() {
    return <<<'ADTC_DEMO_EMBED'
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="default-src 'none'; script-src 'unsafe-inline'; style-src 'unsafe-inline'; img-src data:; connect-src 'none'; font-src 'none'; object-src 'none'; form-action 'none'; base-uri 'none'">
<title>African Digital Trust Commons – Controlled Pilot</title>
<style>
:root{font-family:system-ui,-apple-system,'Segoe UI',sans-serif;color:#163048;background:#edf4f5;line-height:1.5}
*{box-sizing:border-box} body{margin:0}button,select,input{font:inherit} button{cursor:pointer}
header{background:linear-gradient(120deg,#09233b,#0c5a67);color:#f5ffff;padding:32px 22px}header>div,.wrap{max-width:1050px;margin:auto}header small{color:#bcdee1;text-transform:uppercase;letter-spacing:.18em;font-size:11px;font-weight:800}header h1{font:normal clamp(30px,5vw,50px)/1.1 Georgia,serif;letter-spacing:-.03em;margin:10px 0}header p{max-width:700px;color:#d2e7e8}header .headtop{display:flex;justify-content:space-between;gap:18px;align-items:center}.lang{background:#fff;color:#09283c;border:0;border-radius:7px;padding:7px 11px;font-size:12px;font-weight:800}
.wrap{padding:26px 20px 70px}.notice{background:#fff5e4;border:1px solid #e9c788;border-left:4px solid #bb8731;padding:15px 17px;border-radius:7px;font-size:13px;margin-bottom:24px}.columns{display:grid;grid-template-columns:1.05fr .95fr;gap:20px;align-items:start}.pane{background:white;border:1px solid #d5e4e5;border-radius:12px;padding:23px;box-shadow:0 12px 32px #0e39440b;margin-bottom:18px}h2{font:normal 25px Georgia,serif;margin:0 0 8px;color:#123449}h3{margin:0 0 10px;font-size:16px;color:#21435a}.desc{font-size:13px;color:#58727c;margin:0 0 18px}.formgrid{display:grid;grid-template-columns:repeat(3,1fr);gap:11px}.field{display:flex;flex-direction:column;gap:7px;margin:15px 0}.field>label{font-size:13px;font-weight:800;color:#334d5c}.field input,.field select{width:100%;border:1px solid #bed1d5;border-radius:7px;padding:10px 11px;background:white;color:#183649}.field input:focus,.field select:focus{outline:2px solid #0e7783;outline-offset:1px}.checkrow{display:flex;align-items:start;gap:10px;margin:12px 0;font-size:14px}.checkrow input{margin-top:5px;width:16px;height:16px;accent-color:#146d75}.subtle{font-size:12px;color:#637881}.actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px}.btn{border-radius:7px;border:1px solid #b8d0d4;padding:10px 14px;font-size:13px;font-weight:750;background:#fff;color:#0b5260}.btn.primary{background:#0b5966;color:white;border-color:#0b5966}.btn:disabled{opacity:.4;cursor:default}.metric{display:flex;align-items:center;justify-content:space-between;margin-bottom:19px}.count{font:normal 51px Georgia,serif;color:#0c5869}.finding{padding:15px 0;border-top:1px solid #e1e9e9}.finding:first-of-type{border-top:0}.sev{display:inline-flex;padding:3px 8px;border-radius:5px;text-transform:uppercase;font-size:10px;font-weight:900;letter-spacing:.1em}.high{color:#a12323;background:#fbe7e6}.medium{color:#815100;background:#fff0d5}.info{color:#166278;background:#e6f5f7}.finding .area{color:#53717a;font-size:12px;margin-left:9px}.finding h3{font-size:15px;margin:8px 0 5px}.finding p{font-size:13px;color:#4f6871;margin:0}.resultnote{font-size:12px;color:#5e7881;margin-top:25px;padding-top:18px;border-top:1px solid #d5e4e4}.empty{color:#496875;font-size:14px}.footer{color:#5b7078;font-size:12px;margin-top:20px;text-align:center}footer a{color:inherit}
@media(max-width:730px){.columns{grid-template-columns:1fr}.formgrid{grid-template-columns:1fr}header{padding:22px 14px}.wrap{padding:18px 11px}.pane{padding:19px}.headtop{align-items:flex-start}.metric{gap:10px}}
@media print{header{background:#123d47!important;-webkit-print-color-adjust:exact;print-color-adjust:exact}.inputs,.notice,.actions,.lang{display:none!important}.columns{display:block}.pane{box-shadow:none}.wrap{padding:10px}.report{page-break-before:avoid}}
</style>
</head>
<body>
<header><div><div class="headtop"><small>African Digital Trust Commons · Pilot v0.1</small><button type="button" id="langBtn" class="lang">FR</button></div><h1 id="hero">Digital trust self-assessment</h1><p id="subtitle">A safe, browser-only demonstration for civil-society organisations. All findings come from your answers; nothing is scanned or transmitted.</p></div></header>
<div class="wrap">
<div class="notice" id="warning" role="note">EXPERIMENTAL DEMO · Use fictional data only. Do not enter passwords, names of real users, real configuration values, domain secrets or sensitive information. No data leaves your browser through this tool, but this is not an audited security product.</div>
<div class="columns">
<div class="inputs">
<div class="pane"><h2 data-en="1 · Example organisation" data-fr="1 · Organisation fictive">1 · Example organisation</h2><p class="desc" id="intro">Change the example answers to see how the report responds. The default case reproduces six observations from the offline prototype.</p>
<div class="field"><label for="org" id="orgLabel">Fictional organisation label</label><input id="org" type="text" value="Example Community NGO (synthetic data)" maxlength="95" spellcheck="false" autocomplete="off"></div></div>
<div class="pane"><h2 data-en="2 · Email security baseline" data-fr="2 · Paramètres de messagerie">2 · Email security baseline</h2><p class="desc" id="emailNote">Reported status only, no DNS lookup or account connection.</p>
<div class="formgrid"><div class="field"><label for="spf">SPF</label><select id="spf"><option value="present">Present</option><option value="missing">Missing</option><option value="unknown">Unknown</option></select></div><div class="field"><label for="dkim">DKIM</label><select id="dkim"><option value="present">Present</option><option value="missing">Missing</option><option value="unknown" selected>Unknown</option></select></div><div class="field"><label for="dmarc">DMARC</label><select id="dmarc"><option value="present">Present</option><option value="missing" selected>Missing</option><option value="unknown">Unknown</option></select></div></div></div>
<div class="pane"><h2 data-en="3 · Example connected-app permissions" data-fr="3 · Autorisations d’applications fictives">3 · Example connected-app permissions</h2><p class="desc" id="scopesNote">Select only hypothetical permission patterns; do not connect accounts.</p>
<label class="checkrow"><input type="checkbox" data-scope="https://mail.google.com/" data-app="Example volunteer assistant" checked><span id="fullMail">Example volunteer assistant — full Gmail mailbox access</span></label>
<label class="checkrow"><input type="checkbox" data-scope="offline_access" data-app="Example volunteer assistant" checked><span id="offline">Example volunteer assistant — persistent refresh-token access</span></label>
<label class="checkrow"><input type="checkbox" data-scope="https://www.googleapis.com/auth/gmail.send" data-app="Example newsletter connector" checked><span id="sendmail">Example newsletter connector — send email permission</span></label>
<label class="checkrow"><input type="checkbox" data-scope="Mail.ReadWrite" data-app="Example file collaboration tool"><span id="readwrite">Example collaboration tool — read/write mailbox</span></label></div>
<div class="pane"><h2 data-en="4 · Self-reported controls" data-fr="4 · Contrôles autodéclarés">4 · Self-reported controls</h2>
<label class="checkrow"><input type="checkbox" id="recovery" checked><span id="recoverLabel">No documented account recovery owner (unresolved)</span></label>
<p class="subtle" id="controlNote">Two-factor authentication is marked complete in the example and does not create a finding.</p>
<div class="actions"><button class="btn primary" type="button" id="assess">Generate observations</button><button class="btn" type="button" id="reset">Reset sample</button></div>
</div></div>
<div class="report"><div class="pane" aria-live="polite"><h2 id="reportTitle">Assessment report</h2><p class="desc" id="reportIntro">Local, self-reported snapshot · no independent verification</p><div class="metric"><span id="orgName">Example Community NGO (synthetic data)</span><strong class="count" id="total">6</strong></div><div id="findings"></div><p class="resultnote" id="limits">Limitations: self-reported snapshot only; no account, host or third-party service has been probed. Not a compliance assessment, penetration test or security certificate.</p><div class="actions"><button class="btn" type="button" id="download">Download JSON report</button><button class="btn" type="button" id="print">Print report</button></div></div></div>
</div>
<p class="footer" id="footnote">Pilot preparation, October 2026 · No persistent storage, no remote checks and no network permissions inside this demo.</p>
</div>
<script>
'use strict';
(function(){
const $=id=>document.getElementById(id);
const catalog={
'https://mail.google.com/':['high','Connected apps','Full mail access','Use a narrower permission where possible and review why unrestricted mailbox access is needed.','Applications connectées','Accès complet à la messagerie','Privilégier une autorisation plus limitée et vérifier la nécessité d’un accès complet.'],
'https://www.googleapis.com/auth/gmail.modify':['high','Connected apps','Read/change Gmail','Consider a read-only scope or remove access.','Applications connectées','Lire ou modifier Gmail','Envisager une autorisation de lecture seule ou retirer l’accès.'],
'https://www.googleapis.com/auth/gmail.send':['medium','Connected apps','Send mail as a user','Limit sending permissions and review the business purpose.','Applications connectées','Envoyer des courriels','Limiter l’autorisation et vérifier son utilité.'],
'Mail.ReadWrite':['high','Connected apps','Read/write mailbox','Require a documented purpose and periodic review.','Applications connectées','Lecture et modification du courrier','Justifier la nécessité et revoir régulièrement l’autorisation.'],
'Mail.Send':['medium','Connected apps','Send mail','Confirm the integration needs to send mail.','Applications connectées','Envoi de courriels','Vérifier que l’intégration nécessite l’envoi de courriels.'],
'offline_access':['medium','Connected apps','Persistent refresh tokens','Review the duration and necessity of persistent access.','Applications connectées','Accès persistant','Réévaluer la durée et la nécessité de l’accès persistant.']
};
const english={hero:'Digital trust self-assessment',subtitle:'A safe, browser-only demonstration for civil-society organisations. All findings come from your answers; nothing is scanned or transmitted.',warning:'EXPERIMENTAL DEMO · Use fictional data only. Do not enter passwords, names of real users, real configuration values, domain secrets or sensitive information. No data leaves your browser through this tool, but this is not an audited security product.',intro:'Change the example answers to see how the report responds. The default case reproduces six observations from the offline prototype.',orgLabel:'Fictional organisation label',emailNote:'Reported status only, no DNS lookup or account connection.',scopesNote:'Select only hypothetical permission patterns; do not connect accounts.',fullMail:'Example volunteer assistant — full Gmail mailbox access',offline:'Example volunteer assistant — persistent refresh-token access',sendmail:'Example newsletter connector — send email permission',readwrite:'Example collaboration tool — read/write mailbox',recoverLabel:'No documented account recovery owner (unresolved)',controlNote:'Two-factor authentication is marked complete in the example and does not create a finding.',assess:'Generate observations',reset:'Reset sample',reportTitle:'Assessment report',reportIntro:'Local, self-reported snapshot · no independent verification',limits:'Limitations: self-reported snapshot only; no account, host or third-party service has been probed. Not a compliance assessment, penetration test or security certificate.',download:'Download JSON report',print:'Print report',footnote:'Pilot preparation, October 2026 · No persistent storage, no remote checks and no network permissions inside this demo.',missing:'reported missing',unknown:'not confirmed',emailArea:'Email baseline',unknownAct:'Verify with an administrator; no DNS check was performed.',selfArea:'Self-reported controls',recoveryIssue:'No documented account recovery owner',recoveryAct:'Assign an owner, date and evidence for remediation.',policyAct:{spf:'Publish a suitable SPF record for authorised senders.',dkim:'Enable DKIM for legitimate mail providers.',dmarc:'Publish and monitor a DMARC policy, then tighten it after validation.'},policy:{spf:'SPF policy',dkim:'DKIM signing',dmarc:'DMARC policy'},labelOrg:'Example volunteer assistant',labelNewsletter:'Example newsletter connector',labelCollab:'Example collaboration tool',empty:'No observations with these sample answers. This is not a verification that the organisation is secure.'};
const french={hero:'Autoévaluation de la confiance numérique',subtitle:'Une démonstration sécurisée dans le navigateur pour les organisations de la société civile. Les observations proviennent uniquement des réponses fournies.',warning:'DÉMONSTRATION EXPÉRIMENTALE · N’utilisez que des données fictives. Ne saisissez aucun mot de passe, nom d’utilisateur réel, configuration réelle ou secret. Aucun résultat n’est transmis par cet outil ; celui-ci n’a pas fait l’objet d’un audit indépendant.',intro:'Modifiez les réponses fictives pour voir le résultat. Le scénario initial reproduit six observations du prototype hors ligne.',orgLabel:'Nom fictif de l’organisation',emailNote:'États déclarés uniquement : aucune recherche DNS ni connexion aux comptes.',scopesNote:'Cochez uniquement des autorisations fictives ; ne connectez aucun compte.',fullMail:'Assistant bénévole fictif — accès complet à Gmail',offline:'Assistant bénévole fictif — accès persistant',sendmail:'Connecteur de newsletter fictif — autorisation d’envoi',readwrite:'Outil de collaboration fictif — lecture et modification du courrier',recoverLabel:'Aucun responsable de récupération des comptes documenté (non résolu)',controlNote:'L’authentification à deux facteurs est considérée comme déjà mise en place dans cet exemple.',assess:'Générer les observations',reset:'Réinitialiser',reportTitle:'Rapport d’évaluation',reportIntro:'Déclaration locale · aucune vérification indépendante',limits:'Limites : informations autodéclarées uniquement. Aucun compte, hôte ou service tiers n’a été inspecté. Ce document n’est ni un audit de conformité ni un certificat de sécurité.',download:'Exporter le rapport JSON',print:'Imprimer',footnote:'Préparation du pilote, octobre 2026 · Aucune conservation persistante, aucun contrôle distant.',missing:'déclaré manquant',unknown:'non confirmé',emailArea:'Messagerie',unknownAct:'Vérifier auprès d’un administrateur ; aucune recherche DNS n’a été effectuée.',selfArea:'Contrôles autodéclarés',recoveryIssue:'Absence de responsable de récupération des comptes',recoveryAct:'Désigner un responsable, fixer une date et conserver la preuve de correction.',policyAct:{spf:'Publier un enregistrement SPF adapté aux expéditeurs autorisés.',dkim:'Activer DKIM auprès des fournisseurs de courrier autorisés.',dmarc:'Publier et surveiller DMARC, puis renforcer la politique après validation.'},policy:{spf:'Politique SPF',dkim:'Signature DKIM',dmarc:'Politique DMARC'},labelOrg:'Assistant bénévole fictif',labelNewsletter:'Connecteur de newsletter fictif',labelCollab:'Outil collaboratif fictif',empty:'Aucune observation à partir de ces réponses fictives. Ceci ne prouve pas que l’organisation est sécurisée.'};
let locale='en', last=null;const labels=()=>locale==='fr'?french:english;const set=(id,value)=>{const e=$(id);if(e)e.textContent=value;};
function escapeDomain(x){return String(x||'').trim().toLowerCase()}
function assess(){const tr=labels(),findings=[];for(const key of ['spf','dkim','dmarc']){const v=escapeDomain($(key).value);if(v==='missing')findings.push({severity:'medium',area:tr.emailArea,issue:tr.policy[key]+' '+tr.missing,action:tr.policyAct[key]});else if(v==='unknown')findings.push({severity:'info',area:tr.emailArea,issue:tr.policy[key]+' '+tr.unknown,action:tr.unknownAct});}for(const box of document.querySelectorAll('[data-scope]'))if(box.checked){const scope=box.dataset.scope,c=catalog[scope];if(c){const a=locale==='fr',area=c[a?4:1],issue=c[a?5:2],action=c[a?6:3],app=box.dataset.app==='Example newsletter connector'?tr.labelNewsletter:box.dataset.app==='Example file collaboration tool'?tr.labelCollab:tr.labelOrg;findings.push({severity:c[0],area,issue:app+' : '+issue,action,scope});}}
if($('recovery').checked)findings.push({severity:'medium',area:tr.selfArea,issue:tr.recoveryIssue,action:tr.recoveryAct});const priority={high:0,medium:1,info:2};findings.sort((a,b)=>priority[a.severity]-priority[b.severity]);return {organization:$('org').value.trim().slice(0,95)||'Example NGO',findings,version:'0.1 browser demonstration',limitations:tr.limits,synthetic_data_only:true,network_checks:false};}
function render(){last=assess();set('orgName',last.organization);set('total',String(last.findings.length));const root=$('findings');root.textContent='';if(!last.findings.length){const x=document.createElement('p');x.className='empty';x.textContent=labels().empty;root.appendChild(x)}for(const f of last.findings){const card=document.createElement('div');card.className='finding';const badge=document.createElement('span');badge.className='sev '+f.severity;badge.textContent=f.severity;const area=document.createElement('span');area.className='area';area.textContent=f.area;const h=document.createElement('h3');h.textContent=f.issue;const p=document.createElement('p');p.textContent=f.action;card.append(badge,area,h,p);root.appendChild(card)}}
function changeLanguage(){locale=locale==='en'?'fr':'en';const tr=labels();document.documentElement.lang=locale;for(const [id,value] of Object.entries(tr)){if(typeof value==='string'&&$(id))set(id,value);}for(const node of document.querySelectorAll('[data-en][data-fr]'))node.textContent=node.getAttribute('data-'+locale);$('langBtn').textContent=locale==='en'?'FR':'EN';for(const e of document.querySelectorAll('select option')){const map={present:['Present','Présent'],missing:['Missing','Absent'],unknown:['Unknown','Inconnu']};e.textContent=map[e.value]?.[locale==='en'?0:1]||e.textContent;}render();}
function reset(){locale='en';for(const e of document.querySelectorAll('[data-scope]'))e.checked=['https://mail.google.com/','offline_access','https://www.googleapis.com/auth/gmail.send'].includes(e.dataset.scope);$('spf').value='present';$('dkim').value='unknown';$('dmarc').value='missing';$('recovery').checked=true;$('org').value='Example Community NGO (synthetic data)';changeLanguage();if(locale!=='en')changeLanguage();}
function exportReport(){render();const txt=JSON.stringify(last,null,2),blob=new Blob([txt],{type:'application/json'}),url=URL.createObjectURL(blob),a=document.createElement('a');a.href=url;a.download='adtc-synthetic-report.json';document.body.appendChild(a);a.click();a.remove();setTimeout(()=>URL.revokeObjectURL(url),1500);}
$('assess').addEventListener('click',render);$('reset').addEventListener('click',reset);$('download').addEventListener('click',exportReport);$('print').addEventListener('click',()=>window.print());$('langBtn').addEventListener('click',changeLanguage);render();
})();
</script>
</body></html>
ADTC_DEMO_EMBED;
}

/**
 * Render only inside the main post content after WordPress successfully checks
 * the password. Fail closed if the page loses its password accidentally.
 */
function adtc_pilot_protected_content( $content ) {
    if ( ! adtc_is_target_page() || ! is_main_query() || ! in_the_loop() ) {
        return $content;
    }

    $page = get_queried_object();
    if ( ! $page instanceof WP_Post || 'publish' !== $page->post_status || ! (string) $page->post_password ) {
        return '<section class="adtc-access-not-ready" role="status"><h2>Pilot access not enabled</h2><p>This pilot requires a published WordPress page with <strong>Password Protected</strong> visibility. The demonstration remains unavailable until protection is restored.</p></section>';
    }
    if ( post_password_required( $page ) ) {
        // Do not put any demo HTML into the response before WordPress validates access.
        return get_the_password_form( $page );
    }

    $demo = adtc_pilot_inline_demo();
    return '<section class="adtc-protected-portal" aria-labelledby="adtc-heading" style="max-width:1100px;margin:0 auto;padding:16px 0 40px">'
        . '<p style="font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:#287680">Invitation-only experimental pilot · Projet pilote sur invitation</p>'
        . '<h2 id="adtc-heading">African Digital Trust Commons</h2>'
        . '<p>This is a browser-only demonstration. Use <strong>fictional data only</strong>. No passwords, domain secrets, account permissions, or real organisational configurations should be entered.</p>'
        . '<iframe title="African Digital Trust Commons controlled pilot demonstration" srcdoc="' . esc_attr( $demo ) . '" sandbox="allow-scripts allow-downloads" referrerpolicy="no-referrer" loading="eager" style="display:block;width:100%;height:1250px;border:1px solid #cddfe1;border-radius:12px;background:#edf4f5;margin:20px 0"></iframe>'
        . '<p style="color:#60717d;font-size:13px">The tool does not scan a website or access accounts and its results are not an independent security audit. Results are not submitted to the IGF Mauritius server by this tool. Site traffic may still be recorded by the web host.</p>'
        . '</section>';
}
add_filter( 'the_content', 'adtc_pilot_protected_content', 50 );
