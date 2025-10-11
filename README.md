
Example Project: WAF (ModSecurity CRS) + PHP vulnerable app
---------------------------------------------------------

Structure:
- docker-compose.yml
- waf-nginx-modsec-crs/  (WAF image build context - template files included)
- web-server/            (PHP demo app using sqlite)

Quick start (no ModSecurity build):
1) If you want to skip building ModSecurity yourself, modify docker-compose.yml and replace the 'waf-nginx' service build block with a prebuilt image (if you find a maintained nginx+modsecurity image), e.g.:
   image: st4lk/nginx-modsecurity  # example only - search for maintained image

2) To run the demo without ModSecurity, you can still use this compose which builds a plain NGINX proxy (template). Run:
   docker compose up --build

3) Access the app at http://localhost/ (the WAF container proxies to the 'web' container).
   Click Login and try SQL injection like: ?username=admin' -- &password=whatever

How to enable real ModSecurity + CRS (high-level):
- Building ModSecurity v3 and the nginx connector requires compiling libmodsecurity from source and configuring nginx with the connector.
- The provided Dockerfile in waf-nginx-modsec-crs/Dockerfile is a template with commands to clone and build ModSecurity and CRS.
- Building may take 10-30 minutes depending on your machine and network.

Testing & Logs:
- Logs from the WAF container are mounted to waf-nginx-modsec-crs/logs/
- If ModSecurity is active and CRS loaded, blocked or detected events will appear in the ModSecurity audit log.

Safety note: the web app is intentionally vulnerable for testing only. Do NOT expose this to public networks.
