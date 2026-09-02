# MEU Website — PHP build

A bilingual (English / Arabic) redesign prototype for Middle East University,
served through a small PHP front controller with clean URLs.

## Structure

```
index.php            front controller / router
.htaccess            pretty-URL rewrites + static caching
app/
  layout.php          HTML shell (head, nav include, body)
  nav.php             shared header — jhu-top bar, tab rail, slide-in panel
  pages.php           generated manifest: title / body class / flags per page
view/
  en/<slug>.html      page body fragment (English)
  en/<slug>.css       that page's styles
  ar/<slug>.html      Arabic mirror
  ar/<slug>.css
assets/              css, js, images, fonts (served as-is)
```

## URLs

| URL | Page |
|-----|------|
| `/` | English home |
| `/about/accreditation` | English page |
| `/ar/` | Arabic home |
| `/ar/about/accreditation` | Arabic page |

The language toggle in the header links each page to its counterpart in the other language.

## Running it

**Requires PHP 8.0+** (mod_rewrite for Apache, or the equivalent try-files rule for nginx).
It does **not** run on GitHub Pages.

Local preview:

```bash
php -S localhost:8000 index.php
```

Apache: drop the folder in the web root — `.htaccess` handles routing.

nginx:

```nginx
location / { try_files $uri $uri/ /index.php?$query_string; }
location ~ ^/(view|app)/ { return 403; }
```

## Notes

- The hero background video (`assets/meu-1-…​.mp4`, ~100 MB) is git-ignored; the hero
  falls back to a poster image. Host the video on a CDN and update the `<video><source>`
  in `view/en/index.html` and `view/ar/index.html` to use it.
- Arabic content is ~85 % translated (all navigation, chrome, section names and
  templates); some long-form page prose still needs an editorial pass against the
  official Arabic copy on meu.edu.jo.
- Pre-existing dead links from the original site (`academic-calendar`, a few `_*.js`
  helper files) were carried over and still 404.
