<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO Meta Tags -->
<?php
// Global protocol and host detection
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$current_url = "$protocol://$host" . $_SERVER['REQUEST_URI'];

// Base URL for canonicals (remove query strings for clean SEO)
$clean_url = strtok($current_url, '?');
include 'includes/schema.php';
?>

<!-- Primary Meta Tags -->
<title><?php echo isset($pageTitle) ? $pageTitle : 'Funchal Pescados | Pescados e Frutos do Mar Premium'; ?></title>
<meta name="title"
    content="<?php echo isset($pageTitle) ? $pageTitle : 'Funchal Pescados | Pescados e Frutos do Mar Premium'; ?>">
<meta name="description"
    content="<?php echo isset($pageDesc) ? $pageDesc : 'A Funchal Pescados é referência em distribuição de pescados e frutos do mar premium em São Paulo. Qualidade, frescor e logística de elite para o seu negócio.'; ?>">
<meta name="keywords"
    content="distribuidora de pescados, frutos do mar premium, salmão atacado sp, fornecedor de frutos do mar, peixaria de alta gastronomia, funchal pescados">
<meta name="author" content="Funchal Pescados">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo $clean_url; ?>">
<meta property="og:title"
    content="<?php echo isset($pageTitle) ? $pageTitle : 'Funchal Pescados | Pescados e Frutos do Mar Premium'; ?>">
<meta property="og:description"
    content="<?php echo isset($pageDesc) ? $pageDesc : 'Distribulção de elite de pescados e frutos do mar premium em São Paulo.'; ?>">
<meta property="og:image" content="<?php echo asset_url('assets/img/og-share.jpg'); ?>">
<meta property="og:site_name" content="Funchal Pescados">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo $clean_url; ?>">
<meta property="twitter:title"
    content="<?php echo isset($pageTitle) ? $pageTitle : 'Funchal Pescados | Pescados e Frutos do Mar Premium'; ?>">
<meta property="twitter:description"
    content="<?php echo isset($pageDesc) ? $pageDesc : 'Distribulção de elite de pescados e frutos do mar premium em São Paulo.'; ?>">
<meta property="twitter:image" content="<?php echo asset_url('assets/img/og-share.jpg'); ?>">

<meta name="robots" content="index, follow">
<link rel="canonical" href="<?php echo $clean_url; ?>" />

<!-- Language Alternates for Google (SEO Bilingue) -->
<link rel="alternate" hreflang="pt-br" href="<?php echo url($_SERVER['PHP_SELF'], 'pt'); ?>" />
<link rel="alternate" hreflang="en" href="<?php echo url($_SERVER['PHP_SELF'], 'en'); ?>" />
<link rel="alternate" hreflang="x-default" href="<?php echo url($_SERVER['PHP_SELF'], 'pt'); ?>" />

<!-- Fonts Performance -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
    rel="stylesheet">

<!-- Tailwind CSS (Local Standalone) -->
<script src="<?php echo asset_url('assets/js/tailwind-standalone.js'); ?>"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    gold: '#bb9b6b',
                },
                fontFamily: {
                    serif: ['Playfair Display', 'serif'],
                    sans: ['Montserrat', 'sans-serif'],
                },
                animation: {
                    'fade-in-up': 'fadeInUp 1s ease-out forwards',
                },
                keyframes: {
                    fadeInUp: {
                        '0%': { opacity: '0', transform: 'translateY(20px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' },
                    },
                }
            }
        }
    }
</script>

<!-- Lucide Icons (Local) -->
<script src="<?php echo asset_url('assets/js/lucide.min.js'); ?>"></script>

<style>
    /* Critical performance adjustments */
    body {
        font-display: swap;
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #0f172a;
    }

    ::-webkit-scrollbar-thumb {
        background: #334155;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #475569;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>