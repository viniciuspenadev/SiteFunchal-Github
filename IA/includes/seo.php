<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO Meta Tags -->
<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$script = basename($_SERVER['PHP_SELF']);
?>
<link rel="alternate" hreflang="pt-br" href="<?php echo "$protocol://$host/funchal/$script"; ?>" />
<link rel="alternate" hreflang="en" href="<?php echo "$protocol://$host/funchal/en/$script"; ?>" />

<title><?php echo isset($pageTitle) ? $pageTitle : 'Funchal Pescados'; ?></title>
<meta name="description"
    content="<?php echo isset($pageDesc) ? $pageDesc : 'Distribuidora de Pescados e Frutos do Mar Premium em São Paulo.'; ?>">
<meta name="keywords"
    content="comprar salmão, peixaria delivery, frutos do mar atacado, camarão preço, lagosta, funchal pescados">
<meta name="robots" content="index, follow">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
    rel="stylesheet">

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=typography"></script>
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

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<style>
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