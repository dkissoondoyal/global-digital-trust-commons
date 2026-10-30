# Publishing this repository on GitHub

## Before making the repository public

- Check every file and commit for confidential information, credentials, internal partner contacts, and non-public assessments.
- Confirm the project owner approves publication and the GPL-2.0-or-later licensing of this source.
- Review the WordPress plugin's source for release suitability and determine whether a separate security assessment is needed. **We have not completed an independent audit.**
- Check the proposed project name for conflicting uses and the intended GitHub account/repository naming.

## Create repository and push (Git CLI)

1. Sign in to your own GitHub account.
2. Create an empty **Public** repository named `global-digital-trust-commons`. Do not initialise it with a README or license because these already exist locally.
3. Download and extract the source ZIP (do not upload the ZIP itself as a single file expecting GitHub to unpack it).
4. From the extracted folder, run:

```bash
git init -b main
git add .
git commit -m "Initial GDTC public prototype v0.1.0"
git remote add origin https://github.com/YOUR_USERNAME/global-digital-trust-commons.git
git push -u origin main
```

Replace `YOUR_USERNAME` with your own GitHub username or organisation. GitHub will require your authenticated Git credential workflow; do not paste tokens into ChatGPT or commit them to the repository.

## Optional public demonstration (synthetic data only)

On GitHub, open **Settings → Pages → Build and deployment → Deploy from a branch → main /docs → Save**. GitHub Pages serves `docs/index.html`. Confirm your actual Pages URL in GitHub. Because this is a public offline demo, **anyone can view the fictional example without a password**; it is intentionally separate from the protected WordPress pilot. Do not add private content to `/docs`.

## After publication

- Turn on GitHub's private vulnerability reporting, if available.
- Add repository topics: `open-source`, `civil-society`, `cybersecurity`, `digital-trust`, `privacy`, `ngo`, `mauritius`.
- Add the actual public repository/demo link to the Mozilla Fellowship Letter of Intent only after it is verified to work.
- Include a screenshot, release tag (`v0.1.0`) and accurate description of prototype limits if useful.

**Important:** This ZIP creates a source package, not an already-live GitHub repository. No repository is created until the owner publishes it through GitHub.
