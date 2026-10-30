# WordPress pilot deployment (experimental)

**Do not upload secrets or partner assessments to the plugin or public GitHub.**

1. In a current, maintained WordPress installation, create a **published** page with slug `adtc-pilot`.
2. Set the page to **Password protected** in the WordPress page editor. Use an unshared, suitably strong password; distribute access only by an authorised private channel. Use a non-sensitive evaluation group because all participants use the same password.
3. Put the directory `wordpress/adtc-secure-pilot` inside `wp-content/plugins/` or package that directory as a WordPress plugin ZIP using the helper script, then activate the plugin.
4. In an incognito browser, verify unauthorised visitors see a password form and the HTML of the embedded demo is **not present** in the response. Enter the password and verify the six-observation synthetic case and language switching.
5. Verify CDN/reverse-proxy caching does not serve the password-authenticated content to unauthorised browsers. Do not assume WordPress's page-level password mechanism protects media uploads or additional plugin assets.
6. Ensure the website has recent restorable full backups, including files and database, and security updates.

**Limited support:** Plugin v0.1.0 is intended for the page slug `adtc-pilot`. It registers no settings UI, user roles, REST endpoints, file uploads, or external integrations. It has not been independently penetration-tested. Before real or larger-scale evaluation, replace shared-secret access with reviewed individual authentication and obtain privacy/legal review as appropriate.

Deployment on IGF Mauritius has been user-tested in English and French. This does not establish security or accessibility compliance.
