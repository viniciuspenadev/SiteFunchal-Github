<?php
include 'includes/i18n.php'; // I18n Loader
$pageTitle = __('meta_title_home');
$pageDesc = __('meta_desc_home');
$currentPage = 'home';
$isTransparent = true; // For transparent navbar on hero
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
</head>

<body class="font-sans antialiased text-slate-900 bg-slate-50" data-transparent-nav="true">

    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="<?php echo asset_url('assets/img/1355.png'); ?>"
                alt="Funchal Pescados - Distribuidora de Pescados e Frutos do Mar Premium em São Paulo"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/60 to-transparent"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white mt-16">
            <div class="max-w-2xl animate-fade-in-up">
                <span class="text-[#bb9b6b] font-bold tracking-wider text-sm uppercase mb-4 block">
                    <?php echo __('hero_since'); ?>
                </span>
                <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 leading-tight">
                    <?php echo __('hero_title_prefix'); ?> <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#bb9b6b] to-[#d4b98c]">
                        <?php echo __('hero_title_suffix_static'); ?>
                        <div
                            class="inline-flex relative h-[1.6em] w-[14ch] md:w-[12ch] overflow-hidden align-middle leading-normal">
                            <span id="rotating-text"
                                class="absolute left-0 transition-all duration-500 ease-in-out whitespace-nowrap text-transparent bg-clip-text bg-gradient-to-r from-[#bb9b6b] to-[#d4b98c]"><?php echo __('anim_business'); ?></span>
                        </div>
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 mb-10 leading-relaxed font-light">
                    <?php echo __('hero_desc'); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo url('produtos.php'); ?>"
                        class="bg-[#bb9b6b] hover:bg-[#a68859] text-white px-8 py-4 rounded-sm font-bold transition-all transform hover:scale-105 shadow-lg flex items-center justify-center gap-2">
                        <?php echo __('hero_cta_catalog'); ?>
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="#contato"
                        class="border border-white hover:bg-white hover:text-slate-900 text-white px-8 py-4 rounded-sm font-bold transition-all flex items-center justify-center">
                        <?php echo __('hero_cta_contact'); ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce text-white/50">
            <i data-lucide="chevron-down" class="w-8 h-8"></i>
        </div>
    </section>

    <!-- Quick Access Cards -->
    <section class="relative z-20 -mt-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white p-8 rounded-xl shadow-xl border-b-4 border-[#bb9b6b] hover:-translate-y-2 transition-transform duration-300">
                <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-[#bb9b6b]">
                    <i data-lucide="truck" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-serif mb-2 text-slate-900"><?php echo __('feat_logistics_title'); ?>
                </h3>
                <p class="text-slate-600 text-sm"><?php echo __('feat_logistics_desc'); ?></p>
            </div>
            <!-- Card 2 -->
            <div
                class="bg-slate-900 p-8 rounded-xl shadow-xl border-b-4 border-[#bb9b6b] hover:-translate-y-2 transition-transform duration-300 text-white">
                <div class="w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center mb-4 text-[#bb9b6b]">
                    <i data-lucide="award" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-serif mb-2"><?php echo __('feat_quality_title'); ?></h3>
                <p class="text-slate-400 text-sm"><?php echo __('feat_quality_desc'); ?></p>
            </div>
            <!-- Card 3 -->
            <div
                class="bg-white p-8 rounded-xl shadow-xl border-b-4 border-[#bb9b6b] hover:-translate-y-2 transition-transform duration-300">
                <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-[#bb9b6b]">
                    <i data-lucide="chef-hat" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-serif mb-2 text-slate-900"><?php echo __('feat_consulting_title'); ?>
                </h3>
                <p class="text-slate-600 text-sm"><?php echo __('feat_consulting_desc'); ?></p>
            </div>
        </div>
    </section>

    <!-- Trusted Partners Strip -->


    <!-- Featured Products: Premium Bento Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span
                    class="text-[#bb9b6b] tracking-widest uppercase text-sm font-bold"><?php echo __('prod_exclusive_label'); ?></span>
                <h2 class="text-4xl font-serif font-bold text-slate-900 mt-2"><?php echo __('prod_season_highlight'); ?>
                </h2>
                <div class="w-24 h-1 bg-[#bb9b6b] mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Bento Grid -->
            <!-- Layout: Mobile 1 col, Tablet 2 cols, Desktop 4 cols. Height 600px on desktop. -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 lg:grid-rows-2 gap-4 lg:h-[600px]">

                <?php
                // Helper for overlay content
                function renderOverlay($title, $subtitle)
                {
                    return '
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-90 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-[#bb9b6b] text-xs font-bold uppercase tracking-wider mb-2 block">' . $subtitle . '</span>
                        <h3 class="text-white text-2xl md:text-3xl font-serif font-bold mb-4">' . $title . '</h3>
                        <span class="inline-flex items-center text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 -translate-x-4 group-hover:translate-x-0 transform">
                            ' . __('prod_view_details') . ' <i data-lucide="arrow-right" class="w-4 h-4 ml-2 text-[#bb9b6b]"></i>
                        </span>
                    </div>';
                }
                ?>

                <!-- Main Feature (Salmon) - Spans 2 cols, 2 rows -->
                <a href="<?php echo url('produtos.php'); ?>"
                    class="relative group overflow-hidden rounded-2xl cursor-pointer col-span-1 md:col-span-2 lg:col-span-2 lg:row-span-2 min-h-[300px]">
                    <img src="https://images.unsplash.com/photo-1599084993091-1cb5c0721cc6?q=80&w=2070&auto=format&fit=crop"
                        alt="Funchal Pescados - Salmão Chileno Premium para Alta Gastronomia"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <?php echo renderOverlay(__('prod_salmon_title'), __('prod_salmon_sub')); ?>
                </a>

                <!-- Secondary Feature 1 (Scallops) - Spans 2 cols, 1 row -->
                <a href="<?php echo url('produtos.php'); ?>"
                    class="relative group overflow-hidden rounded-2xl cursor-pointer col-span-1 md:col-span-2 lg:col-span-2 lg:row-span-1 min-h-[250px]">
                    <img src="https://img.freepik.com/premium-photo/raw-scallops-steel-tray-with-herbs-wooden-background-top-view_89816-43015.jpg?w=1060"
                        alt="Vieiras Canadenses Premium - Funchal Pescados"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <?php echo renderOverlay(__('prod_scallops_name'), __('prod_scallops_sub')); ?>
                </a>

                <!-- Secondary Feature 2 (Octopus) - Spans 1 col, 1 row -->
                <a href="<?php echo url('produtos.php'); ?>"
                    class="relative group overflow-hidden rounded-2xl cursor-pointer col-span-1 lg:col-span-1 lg:row-span-1 min-h-[250px]">
                    <img src="https://images.unsplash.com/photo-1485827329522-c625acce0067?q=80&w=1170&auto=format&fit=crop"
                        alt="Polvo Espanhol Premium - Importação Direta Funchal"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <?php echo renderOverlay(__('prod_octopus_title'), __('prod_octopus_sub')); ?>
                </a>

                <!-- CTA Card - Spans 1 col, 1 row -->
                <a href="<?php echo url('produtos.php'); ?>"
                    class="relative group overflow-hidden rounded-2xl cursor-pointer col-span-1 lg:col-span-1 lg:row-span-1 bg-slate-900 flex flex-col items-center justify-center text-center p-6 border border-slate-800 hover:border-[#bb9b6b] transition-colors duration-300">
                    <div
                        class="bg-[#bb9b6b]/10 p-4 rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="layout-grid" class="w-8 h-8 text-[#bb9b6b]"></i>
                    </div>
                    <h3 class="text-white text-xl font-serif font-bold mb-2"><?php echo __('prod_catalog_title'); ?>
                    </h3>
                    <p class="text-slate-400 text-sm mb-6"><?php echo __('prod_catalog_desc'); ?></p>
                    <span
                        class="text-[#bb9b6b] font-medium text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                        <?php echo __('prod_explore'); ?> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </span>
                </a>

            </div>
        </div>
    </section>

    <!-- Quality & Stats Section -->
    <section class="py-20 bg-slate-900 text-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 p-20 opacity-5">
            <i data-lucide="anchor" class="w-96 h-96"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Stat 1 -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-full bg-[#bb9b6b]/20 flex items-center justify-center mb-6 border border-[#bb9b6b]/30">
                        <i data-lucide="thermometer-snowflake" class="w-8 h-8 text-[#bb9b6b]"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold mb-2"><?php echo __('stats_cold_chain_title'); ?></h3>
                    <p class="text-slate-400 max-w-xs"><?php echo __('stats_cold_chain_desc'); ?></p>
                </div>
                <!-- Stat 2 -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-full bg-[#bb9b6b]/20 flex items-center justify-center mb-6 border border-[#bb9b6b]/30">
                        <i data-lucide="clock" class="w-8 h-8 text-[#bb9b6b]"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold mb-2"><?php echo __('stats_delivery_title'); ?></h3>
                    <p class="text-slate-400 max-w-xs"><?php echo __('stats_delivery_desc'); ?></p>
                </div>
                <!-- Stat 3 -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-full bg-[#bb9b6b]/20 flex items-center justify-center mb-6 border border-[#bb9b6b]/30">
                        <i data-lucide="shield-check" class="w-8 h-8 text-[#bb9b6b]"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold mb-2"><?php echo __('stats_quality_title'); ?></h3>
                    <p class="text-slate-400 max-w-xs"><?php echo __('stats_quality_desc'); ?></p>
                </div>
            </div>
        </div>
    </section>




    <!-- Blog Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="text-[#bb9b6b] font-bold tracking-widest uppercase text-sm mb-4 block"><?php echo __('blog_home_tag'); ?></span>
                <h2 class="text-3xl md:text-5xl font-serif font-bold text-slate-900 mb-6">
                    <?php echo __('blog_home_title'); ?>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <?php
                // Load latest 3 posts
                if (file_exists('data/posts.php')) {
                    include 'data/posts.php';
                    $latest_posts = array_slice($BLOG_POSTS, 0, 3);

                    foreach ($latest_posts as $post):
                        ?>
                        <a href="<?php echo url('post?id=' . $post['slug']); ?>"
                            class="group block bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-slate-100">
                            <div class="relative h-60 overflow-hidden">
                                <img src="<?php echo asset_url($post['image']); ?>" alt="<?php echo $post['title']; ?>"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-60">
                                </div>
                                <div class="absolute bottom-4 left-4">
                                    <span
                                        class="bg-[#bb9b6b] text-white text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wide">
                                        <?php echo $post['category']; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="p-8">
                                <div
                                    class="flex items-center gap-2 text-xs text-slate-400 mb-4 font-medium uppercase tracking-wider">
                                    <i data-lucide="calendar" class="w-3 h-3 text-[#bb9b6b]"></i>
                                    <?php echo date('d M Y', strtotime($post['date'])); ?>
                                </div>
                                <h3
                                    class="text-xl font-serif font-bold text-slate-900 group-hover:text-[#bb9b6b] transition-colors mb-3 leading-tight min-h-[3.5em]">
                                    <?php echo $post['title']; ?>
                                </h3>
                                <p class="text-slate-500 line-clamp-2 text-sm leading-relaxed mb-6">
                                    <?php echo $post['excerpt']; ?>
                                </p>
                                <span
                                    class="text-[#bb9b6b] text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">
                                    <?php echo __('blog_read_more'); ?> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </span>
                            </div>
                        </a>
                        <?php
                    endforeach;
                }
                ?>
            </div>

            <div class="text-center">
                <a href="<?php echo url('blog.php'); ?>"
                    class="inline-flex items-center gap-2 text-slate-900 font-bold border-b-2 border-[#bb9b6b] pb-1 hover:text-[#bb9b6b] transition-colors uppercase tracking-wider text-sm">
                    Ver Todos os Artigos <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- WhatsApp Lead Capture -->
    <section class="py-20 bg-[#bb9b6b] relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mb-6"><?php echo __('wa_title'); ?>
            </h2>
            <p class="text-white/90 text-lg mb-10 max-w-2xl mx-auto">
                <?php echo __('wa_desc'); ?>
            </p>

            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto"
                onsubmit="event.preventDefault(); alert('Obrigado! Em breve entraremos em contato.');">
                <input type="text" placeholder="<?php echo __('wa_placeholder'); ?>"
                    class="flex-grow px-6 py-4 rounded-lg text-slate-900 focus:outline-none focus:ring-4 focus:ring-white/30">
                <button
                    class="bg-slate-900 text-white font-bold py-4 px-8 rounded-lg hover:bg-slate-800 transition-colors shadow-xl flex items-center justify-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <?php echo __('wa_btn'); ?>
                </button>
            </form>

            <p class="mt-6 text-white/70 text-sm">
                <i data-lucide="lock" class="w-3 h-3 inline mr-1"></i> <?php echo __('wa_security'); ?>
            </p>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Use PHP to generate the JS array
            const words = [
                "<?php echo __('anim_business'); ?>",
                "<?php echo __('anim_restaurant'); ?>",
                "<?php echo __('anim_event'); ?>",
                "<?php echo __('anim_table'); ?>"
            ];
            const textElement = document.getElementById('rotating-text');
            const container = textElement.parentElement;
            let wordIndex = 0;

            // Set initial width
            const updateWidth = () => {
                // Create a temporary span to measure width
                const temp = document.createElement('span');
                temp.style.visibility = 'hidden';
                temp.style.position = 'absolute';
                temp.style.font = window.getComputedStyle(textElement).font;
                temp.style.letterSpacing = window.getComputedStyle(textElement).letterSpacing;
                temp.style.textTransform = window.getComputedStyle(textElement).textTransform;
                temp.textContent = words[wordIndex];
                document.body.appendChild(temp);
                container.style.width = (temp.offsetWidth + 10) + 'px'; // +10 for safety
                document.body.removeChild(temp);
            };

            // Initial Width calculation
            updateWidth();

            function rotate() {
                // Phase 1: Slide Out (Up) and Fade Out
                textElement.style.transform = 'translateY(-100%)';
                textElement.style.opacity = '0';

                setTimeout(() => {
                    // Update word and width
                    wordIndex = (wordIndex + 1) % words.length;
                    textElement.textContent = words[wordIndex];
                    updateWidth();

                    // Prepare for entry (move to bottom instantly while invisible)
                    textElement.style.transition = 'none';
                    textElement.style.transform = 'translateY(100%)';

                    // Force reflow
                    void textElement.offsetWidth;

                    // Phase 2: Slide In (Up to center) and Fade In
                    textElement.style.transition = 'all 0.5s ease-in-out';
                    textElement.style.transform = 'translateY(0)';
                    textElement.style.opacity = '1';

                }, 500); // Wait for exit animation to finish
            }

            setInterval(rotate, 3000); // Rotation interval
        });
    </script>

</body>

</html>