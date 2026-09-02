<?php
/**
 * Front controller / router for the MEU site.
 * Clean URLs:  /  ·  /about/accreditation  ·  /ar/  ·  /ar/about/accreditation
 */
declare(strict_types=1);

$ROOT = __DIR__;

// built-in dev server: let it serve real static files itself
if (PHP_SAPI === 'cli-server') {
    $f = $ROOT . '/' . ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    if (is_file($f) && realpath($f) !== __FILE__) return false;
}

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$path = rawurldecode(trim($path, '/'));

// language
$lang = 'en';
if ($path === 'ar' || strncmp($path, 'ar/', 3) === 0) {
    $lang = 'ar';
    $path = ltrim(substr($path, 2), '/');
}

$slug = ($path === '') ? 'index' : $path;

// tidy trailing "index" and disallow traversal
$slug = preg_replace('~/index$~', '', $slug);
if ($slug === '') $slug = 'index';

if (!preg_match('~^[A-Za-z0-9_][A-Za-z0-9_/.-]*$~', $slug) || strpos($slug, '..') !== false) {
    render_404($lang);
}

$bodyFile = "$ROOT/view/$lang/$slug.html";
$cssFile  = "$ROOT/view/$lang/$slug.css";

if (!is_file($bodyFile)) {
    // fall back to the English page if an Arabic mirror is missing
    if ($lang === 'ar' && is_file("$ROOT/view/en/$slug.html")) {
        $lang = 'en';
        $bodyFile = "$ROOT/view/en/$slug.html";
        $cssFile  = "$ROOT/view/en/$slug.css";
    } else {
        render_404($lang);
    }
}

$manifest = require "$ROOT/app/pages.php";
$meta = $manifest[$lang][$slug] ?? $manifest['en'][$slug] ?? [
    'title' => 'Middle East University', 'bodyClass' => '', 'css' => is_file($cssFile), 'spacer' => true,
];

$title     = $meta['title'];
$bodyClass = $meta['bodyClass'] ?? '';
$spacer    = $meta['spacer']    ?? true;
if (empty($meta['css'])) $cssFile = '';

require "$ROOT/app/layout.php";
exit;

function render_404(string $lang): void
{
    http_response_code(404);
    $t  = $lang === 'ar' ? 'الصفحة غير موجودة' : 'Page not found';
    $h  = $lang === 'ar' ? 'العودة إلى الرئيسية' : 'Back to home';
    $to = $lang === 'ar' ? '/ar/' : '/';
    echo "<!DOCTYPE html><html lang=\"$lang\"" . ($lang === 'ar' ? ' dir="rtl"' : '') . "><head>"
       . "<meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">"
       . "<title>404 — $t</title><style>body{font:16px/1.6 system-ui,sans-serif;color:#2A2122;"
       . "background:#FBF8F6;display:grid;place-items:center;min-height:100vh;margin:0;text-align:center}"
       . "h1{font-size:3rem;color:#8A1C1D;margin:0}a{color:#8A1C1D;font-weight:600}</style></head><body><div>"
       . "<h1>404</h1><p>$t</p><p><a href=\"$to\">$h</a></p></div></body></html>";
    exit;
}
