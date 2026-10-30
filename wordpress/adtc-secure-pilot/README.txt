ADTC Secure Pilot - IGF Mauritius
==================================
Version 0.1.0 | 30 October 2026

PURPOSE
An offline-first demonstration served only after the WordPress password on the
published page https://igf-mu.org/adtc-pilot/ is accepted.

INSTALLATION (WordPress administrator)
1. Check that /adtc-pilot/ is published and Visibility is PASSWORD PROTECTED.
2. In wp-admin, go to Plugins > Add New Plugin > Upload Plugin.
3. Choose the ZIP file ADTC_Secure_Pilot_IGF_Mauritius_v0.1.zip.
4. Click Install Now, then Activate Plugin.
5. Open /adtc-pilot/ in an INCOGNITO browser. You must see ONLY the password form.
6. Enter the password in your ordinary browser. You should see the interactive
   assessment and 6 synthetic observations; toggle FR/EN and test JSON export.
7. Do NOT send any password or invitees' actual configurations to ChatGPT.

IMPORTANT SAFETY INFORMATION
- No raw prototype HTML/JS or JSON reports are separately uploaded into Media.
- The protected demo is embedded into the response only after WordPress checks
  the password. It is sandboxed and its network connections are disabled by CSP.
- If the WordPress page loses its password, the plugin FAILS CLOSED and displays
  an access not enabled message instead of the demo.
- No third-party accounts are connected, no domains are scanned, and no results
  are collected or stored by the tool. Hosting-level analytics/logs can remain.
- This is a self-report teaching prototype, NOT a certified security audit.
- The plugin changes only the body content of WordPress page slug `adtc-pilot`.
  It does NOT change the homepage, articles, or theme settings.

ROLLBACK
Plugins > Installed Plugins > ADTC Secure Pilot > Deactivate.
The pilot page remains available as a password-protected WordPress page.

SECURITY LIMITATIONS
A shared WordPress password is not individual user authentication or an audit
trail. For larger or sustained testing, move to individual volunteer accounts,
revoke access at project completion and consider staging/hosting access controls.
