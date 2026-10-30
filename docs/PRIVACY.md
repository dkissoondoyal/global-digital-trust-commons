# Privacy principles

This experimental v0.1 does not collect account credentials, connect to external APIs, transmit questionnaire answers or store a server-side assessment history. Enter fictional data only.

The public standalone page contains all application logic inline and does not make network requests through its own code. The private WordPress deployment is embedded in an iframe with restrictive network policy. The surrounding WordPress host may have separate logging, analytics and cookies; these are outside the scope of the demonstration. A GitHub Pages deployment likewise inherits GitHub's hosting infrastructure and associated logs, even though the demonstration code does not send assessment answers.

No partner contact data, volunteer consent details, or security-relevant assessments belong in the public repository. Public releases should use synthetic or appropriately consented, de-identified evidence only.
