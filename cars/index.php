<?php
// Tenta carregar funções auxiliares, se disponíveis no sistema
if (file_exists('../includes/i18n.php')) {
    require_once '../includes/i18n.php';
}

$pageTitle = 'Funchal Pescados | Acesso Exclusivo';
$pageDesc = 'Sua distribuidora de pescados e frutos do mar premium em São Paulo.';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDesc; ?>">
    <link rel="icon" type="image/png" href="../favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS (Local Standalone) -->
    <script src="../assets/js/tailwind-standalone.js"></script>
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
                        'bounce-slight': 'bounceSlight 2s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        bounceSlight: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons -->
    <script src="../assets/js/lucide.min.js"></script>

    <style>
        body {
            font-display: swap;
        }

        .glass-panel {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(187, 155, 107, 0.2);
            position: relative;
            z-index: 10;
        }

        .btn-hover-effect {
            transition: all 0.3s ease;
        }

        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(187, 155, 107, 0.3);
            border-color: rgba(187, 155, 107, 0.8);
        }
    </style>
</head>

<body
    class="font-sans antialiased bg-slate-900 text-white min-h-screen relative flex flex-col items-center p-4 sm:justify-center overflow-x-hidden">

    <!-- Background Image -->
    <div class="fixed inset-0 z-0">
        <img src="../assets/img/1355.png" alt="Background" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/90 to-slate-900/50"></div>
    </div>

    <!-- Main Content Container -->
    <main class="relative z-10 w-full max-w-md mx-auto flex flex-col items-center animate-fade-in-up mt-8 sm:mt-0">

        <!-- Profile / Logo Section -->
        <div class="mb-10 flex flex-col items-center text-center">
            <div class="w-48 mb-6 flex items-center justify-center animate-bounce-slight z-20 relative">
                <!-- Using the same logo path from navbar.php -->
                <img src="../assets/img/funchalpescados.webp" alt="Funchal Pescados"
                    class="w-full h-auto object-contain"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <i data-lucide="anchor" class="hidden w-16 h-16 text-gold"></i>
            </div>

            <h1 class="text-3xl font-serif font-bold text-white mb-2 tracking-wide">Funchal Pescados</h1>
            <p class="text-gold uppercase tracking-widest text-xs font-bold mb-4 drop-shadow-md">Qualidade desde a origem
            </p>
            <p
                class="text-slate-300 text-sm max-w-[280px] font-medium leading-relaxed bg-slate-900/50 p-2 rounded-lg backdrop-blur-sm border border-slate-700/50">
                Fornecemos os pescados mais frescos e frutos do mar selecionados para os restaurantes mais exigentes de
                São Paulo.
            </p>
        </div>

        <!-- Links Section -->
        <div class="w-full flex flex-col gap-5 relative z-20">

            <!-- WhatsApp -->
            <a href="https://wa.me/5511940370256?text=Ol%C3%A1!%20Vim%20pelo%20QR%20Code%20dos%20carros%20e%20gostaria%20de%20fazer%20um%20pedido."
                target="_blank"
                class="glass-panel btn-hover-effect flex items-center p-4 rounded-2xl group cursor-pointer">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none">
                </div>
                <div
                    class="w-14 h-14 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center mr-4 shrink-0 transition-transform group-hover:scale-110 shadow-lg shadow-green-900/20">
                    <i data-lucide="message-circle" class="w-7 h-7"></i>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-lg text-white mb-0.5">Pedir via WhatsApp</h3>
                    <p class="text-xs text-slate-400">Atendimento Expresso e Direto</p>
                </div>
                <div class="w-8 flex justify-end">
                    <i data-lucide="chevron-right"
                        class="w-5 h-5 text-gold group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            <!-- Catálogo -->
            <a href="../produtos.php"
                class="glass-panel btn-hover-effect flex items-center p-4 rounded-2xl group cursor-pointer">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-gold/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none">
                </div>
                <div
                    class="w-14 h-14 rounded-full bg-gold/20 text-gold flex items-center justify-center mr-4 shrink-0 transition-transform group-hover:scale-110 shadow-lg shadow-yellow-900/20">
                    <i data-lucide="shopping-bag" class="w-7 h-7"></i>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-lg text-white mb-0.5">Catálogo Exclusivo</h3>
                    <p class="text-xs text-slate-400">Peixes e Frutos do Mar Premium</p>
                </div>
                <div class="w-8 flex justify-end">
                    <i data-lucide="chevron-right"
                        class="w-5 h-5 text-gold group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            <!-- E-mail de Contato -->
            <a href="mailto:contato@funchalpescados.com.br"
                class="glass-panel btn-hover-effect flex items-center p-4 rounded-2xl group cursor-pointer">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none">
                </div>
                <div
                    class="w-14 h-14 rounded-full bg-red-500/20 text-red-500 flex items-center justify-center mr-4 shrink-0 transition-transform group-hover:scale-110 shadow-lg shadow-red-900/20">
                    <i data-lucide="mail" class="w-7 h-7"></i>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-lg text-white mb-0.5">E-mail Corporativo</h3>
                    <p class="text-xs text-slate-400">Fale com nossa equipe</p>
                </div>
                <div class="w-8 flex justify-end">
                    <i data-lucide="chevron-right"
                        class="w-5 h-5 text-gold group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            <!-- Visite nosso Site -->
            <a href="../index.php"
                class="glass-panel btn-hover-effect flex items-center p-4 rounded-2xl group cursor-pointer">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-slate-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none">
                </div>
                <div
                    class="w-14 h-14 rounded-full bg-slate-600/30 text-slate-200 flex items-center justify-center mr-4 shrink-0 transition-transform group-hover:scale-110 shadow-lg shadow-slate-900/50">
                    <i data-lucide="globe" class="w-7 h-7"></i>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-lg text-white mb-0.5">Navegue no Nosso Site</h3>
                    <p class="text-xs text-slate-400">Conheça toda a nossa história</p>
                </div>
                <div class="w-8 flex justify-end">
                    <i data-lucide="chevron-right"
                        class="w-5 h-5 text-gold group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            <!-- Trabalhe Conosco -->
            <a href="../trabalhe-conosco.php"
                class="glass-panel btn-hover-effect flex items-center p-4 rounded-2xl group cursor-pointer">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none">
                </div>
                <div
                    class="w-14 h-14 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center mr-4 shrink-0 transition-transform group-hover:scale-110 shadow-lg shadow-blue-900/20">
                    <i data-lucide="briefcase" class="w-7 h-7"></i>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-lg text-white mb-0.5">Vem Com a Gente!</h3>
                    <p class="text-xs text-slate-400">Vagas Inéditas na Funchal</p>
                </div>
                <div class="w-8 flex justify-end">
                    <i data-lucide="chevron-right"
                        class="w-5 h-5 text-gold group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

        </div>

    </main>

    <!-- Footer -->
    <footer class="relative z-10 w-full text-center mt-14 pb-8 animate-fade-in-up" style="animation-delay: 0.4s">
        <div class="flex justify-center gap-6 mb-5">
            <a href="https://www.instagram.com/funchalpescados/" target="_blank"
                class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-gold hover:border-gold transition-all hover:-translate-y-1"><i
                    data-lucide="instagram" class="w-5 h-5"></i></a>
        </div>
        <p class="text-xs text-slate-500 font-medium tracking-wide">
            &copy; <?php echo date('Y'); ?> Funchal Pescados.<br>Todos os direitos reservados.
        </p>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>

</html>