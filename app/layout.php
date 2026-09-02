<?php
/**
 * Page shell. Expects:
 *   $lang       'en' | 'ar'
 *   $slug       e.g. 'about/accreditation'  ('index' for home)
 *   $title      page <title>
 *   $bodyClass  class attribute for <body>
 *   $cssFile    absolute path to the page's extracted CSS ('' if none)
 *   $bodyFile   absolute path to the page's body-content fragment
 */
$FONTS = 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=El+Messiri:wght@500;600;700&family=Tajawal:wght@400;500;700&display=swap';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>"<?= $lang === 'ar' ? ' dir="rtl"' : '' ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?= htmlspecialchars($title, ENT_QUOTES) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="<?= $FONTS ?>" rel="stylesheet">
<?php if ($cssFile && is_file($cssFile)): ?>
<style><?php readfile($cssFile); ?></style>
<?php endif; ?>
<?php if ($lang === 'ar'): ?>
<link rel="stylesheet" href="/assets/rtl.css">
<?php endif; ?>
<link rel="stylesheet" href="/assets/jhu-nav.css">
<script src="/assets/jhu-nav.js" defer></script>
</head>
<body<?= $bodyClass !== '' ? ' class="'.htmlspecialchars($bodyClass, ENT_QUOTES).'"' : '' ?>>
<?php include __DIR__ . '/nav.php'; ?>
<?php if (!empty($spacer)): ?><div class="jhu-spacer"></div><?php endif; ?>
<?php readfile($bodyFile); ?>
</body>
</html>
