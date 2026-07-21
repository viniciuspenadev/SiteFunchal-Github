<?php
include 'includes/i18n.php';
$pageTitle = __('about_page_title');
$pageDesc = __('about_page_desc');
$currentPage = 'about';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
    <style>
        /* Timeline Styles */
        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, transparent, #bb9b6b 10%, #bb9b6b 90%, transparent);
            transform: translateX(-50%);
        }

        @media (max-width: 768px) {
            .timeline-line {
                left: 20px;
            }
        }

        .timeline-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #bb9b6b;
            border: 3px solid #0f172a;
            box-shadow: 0 0 0 3px #bb9b6b33, 0 0 20px #bb9b6b40;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        @media (max-width: 768px) {
            .timeline-dot {
                left: 20px;
            }
        }

        /* Scroll Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-60px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(60px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Counter animation */
        .stat-number {
            font-variant-numeric: tabular-nums;
        }

        /* Image decorative corner */
        .image-frame::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            width: 60px;
            height: 60px;
            border-top: 3px solid #bb9b6b;
            border-left: 3px solid #bb9b6b;
            border-radius: 4px 0 0 0;
            z-index: 10;
        }

        .image-frame::after {
            content: '';
            position: absolute;
            bottom: -8px;
            right: -8px;
            width: 60px;
            height: 60px;
            border-bottom: 3px solid #bb9b6b;
            border-right: 3px solid #bb9b6b;
            border-radius: 0 0 4px 0;
            z-index: 10;
        }
    </style>
</head>

<body class="font-sans antialiased text-white bg-slate-900">

    <?php include 'includes/navbar.php'; ?>

    <main class="min-h-screen relative overflow-hidden">

        <!-- ============================== -->
        <!-- 1. HERO SECTION                -->
        <!-- ============================== -->
        <section class="relative pt-32 pb-20 px-4 text-center bg-slate-900 z-20">
            <!-- Decorative background elements -->
            <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
                <div class="absolute top-20 right-10 opacity-[0.03]">
                    <i data-lucide="anchor" class="w-[400px] h-[400px]"></i>
                </div>
                <div class="absolute bottom-10 left-10 opacity-[0.03]">
                    <i data-lucide="waves" class="w-[300px] h-[300px]"></i>
                </div>
            </div>

            <div class="relative z-10">
                <span
                    class="inline-block py-1.5 px-4 rounded-full bg-[#bb9b6b]/10 text-[#bb9b6b] text-xs font-bold tracking-widest uppercase mb-6 border border-[#bb9b6b]/20 backdrop-blur-sm animate-fade-in-up">
                    <?php echo __('about_hero_tag'); ?>
                </span>
                <h1
                    class="text-5xl md:text-6xl lg:text-7xl font-serif font-bold text-white mb-6 animate-fade-in-up">
                    <?php echo __('about_hero_title'); ?>
                </h1>
                <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto animate-fade-in-up leading-relaxed">
                    <?php echo __('about_hero_subtitle'); ?>
                </p>
                <div class="w-24 h-1 bg-[#bb9b6b] mx-auto mt-8 rounded-full animate-fade-in-up"></div>
            </div>
        </section>

        <!-- ============================== -->
        <!-- 2. STORY SECTION               -->
        <!-- ============================== -->
        <section class="py-24 bg-slate-900 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-16">

                    <!-- Image Side -->
                    <div class="w-full lg:w-1/2 reveal-left">
                        <div class="relative image-frame">
                            <img src="<?php echo asset_url('assets/img/raw-salmon-file-gray-board-black-surface-convertido-de-jpg.webp'); ?>"
                                alt="Funchal Pescados - Qualidade Premium"
                                class="w-full h-[400px] lg:h-[500px] object-cover rounded-2xl shadow-2xl">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent rounded-2xl">
                            </div>

                            <!-- Floating Badge -->
                            <div
                                class="absolute -bottom-6 -right-4 md:right-6 bg-slate-800 border border-[#bb9b6b]/30 px-6 py-4 rounded-xl shadow-2xl backdrop-blur-sm">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 bg-[#bb9b6b]/20 rounded-full flex items-center justify-center border border-[#bb9b6b]/30">
                                        <i data-lucide="award" class="w-6 h-6 text-[#bb9b6b]"></i>
                                    </div>
                                    <div>
                                        <p class="text-[#bb9b6b] font-bold text-lg">SISP</p>
                                        <p class="text-slate-400 text-xs">Registro Industrial</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Side -->
                    <div class="w-full lg:w-1/2 reveal-right">
                        <span
                            class="text-[#bb9b6b] font-bold tracking-widest uppercase text-sm mb-4 block">
                            <?php echo __('about_story_tag'); ?>
                        </span>
                        <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-8 leading-tight">
                            <?php echo __('about_story_title'); ?>
                        </h2>
                        <div class="space-y-6">
                            <p class="text-slate-300 text-base md:text-lg leading-relaxed">
                                <?php echo __('about_story_p1'); ?>
                            </p>
                            <p class="text-slate-400 text-base leading-relaxed">
                                <?php echo __('about_story_p2'); ?>
                            </p>
                            <p class="text-slate-400 text-base leading-relaxed">
                                <?php echo __('about_story_p3'); ?>
                            </p>
                        </div>

                        <!-- Mini stats inline -->
                        <div class="flex flex-wrap gap-8 mt-10 pt-8 border-t border-slate-800">
                            <div>
                                <p class="text-3xl font-serif font-bold text-[#bb9b6b]">30+</p>
                                <p class="text-slate-500 text-sm mt-1">Anos</p>
                            </div>
                            <div>
                                <p class="text-3xl font-serif font-bold text-[#bb9b6b]">500+</p>
                                <p class="text-slate-500 text-sm mt-1">Clientes</p>
                            </div>
                            <div>
                                <p class="text-3xl font-serif font-bold text-[#bb9b6b]">24h</p>
                                <p class="text-slate-500 text-sm mt-1">Entrega</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ============================== -->
        <!-- 3. VALUES SECTION              -->
        <!-- ============================== -->
        <section class="py-24 bg-white relative overflow-hidden">
            <!-- Decorative -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-transparent via-[#bb9b6b] to-transparent opacity-30"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="text-center mb-16 reveal">
                    <span class="text-[#bb9b6b] tracking-widest uppercase text-sm font-bold">
                        <?php echo __('about_values_tag'); ?>
                    </span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-slate-900 mt-3">
                        <?php echo __('about_values_title'); ?>
                    </h2>
                    <div class="w-24 h-1 bg-[#bb9b6b] mx-auto mt-6 rounded-full"></div>
                </div>

                <!-- Values Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Value 1 -->
                    <div class="reveal bg-white p-10 rounded-2xl shadow-xl border-b-4 border-[#bb9b6b] hover:-translate-y-2 transition-transform duration-300 group">
                        <div
                            class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-6 text-[#bb9b6b] group-hover:bg-[#bb9b6b] group-hover:text-white transition-colors duration-300">
                            <i data-lucide="award" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-2xl font-bold font-serif mb-4 text-slate-900">
                            <?php echo __('about_value_1_title'); ?>
                        </h3>
                        <p class="text-slate-600 leading-relaxed">
                            <?php echo __('about_value_1_desc'); ?>
                        </p>
                    </div>

                    <!-- Value 2 (Dark) -->
                    <div class="reveal bg-slate-900 p-10 rounded-2xl shadow-xl border-b-4 border-[#bb9b6b] hover:-translate-y-2 transition-transform duration-300 group text-white" style="transition-delay: 0.1s;">
                        <div
                            class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mb-6 text-[#bb9b6b] group-hover:bg-[#bb9b6b] group-hover:text-white transition-colors duration-300">
                            <i data-lucide="anchor" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-2xl font-bold font-serif mb-4">
                            <?php echo __('about_value_2_title'); ?>
                        </h3>
                        <p class="text-slate-400 leading-relaxed">
                            <?php echo __('about_value_2_desc'); ?>
                        </p>
                    </div>

                    <!-- Value 3 -->
                    <div class="reveal bg-white p-10 rounded-2xl shadow-xl border-b-4 border-[#bb9b6b] hover:-translate-y-2 transition-transform duration-300 group" style="transition-delay: 0.2s;">
                        <div
                            class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-6 text-[#bb9b6b] group-hover:bg-[#bb9b6b] group-hover:text-white transition-colors duration-300">
                            <i data-lucide="handshake" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-2xl font-bold font-serif mb-4 text-slate-900">
                            <?php echo __('about_value_3_title'); ?>
                        </h3>
                        <p class="text-slate-600 leading-relaxed">
                            <?php echo __('about_value_3_desc'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================== -->
        <!-- 4. TIMELINE SECTION            -->
        <!-- ============================== -->
        <section class="py-24 bg-slate-900 relative overflow-hidden">
            <!-- Decorative -->
            <div class="absolute top-20 left-10 opacity-[0.03]">
                <i data-lucide="compass" class="w-[300px] h-[300px]"></i>
            </div>

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <!-- Header -->
                <div class="text-center mb-20 reveal">
                    <span class="text-[#bb9b6b] tracking-widest uppercase text-sm font-bold">
                        <?php echo __('about_timeline_tag'); ?>
                    </span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mt-3">
                        <?php echo __('about_timeline_title'); ?>
                    </h2>
                    <div class="w-24 h-1 bg-[#bb9b6b] mx-auto mt-6 rounded-full"></div>
                </div>

                <!-- Timeline -->
                <div class="relative">
                    <div class="timeline-line"></div>

                    <?php
                    $milestones = [
                        ['year' => __('about_timeline_1_year'), 'title' => __('about_timeline_1_title'), 'desc' => __('about_timeline_1_desc'), 'icon' => 'flag'],
                        ['year' => __('about_timeline_2_year'), 'title' => __('about_timeline_2_title'), 'desc' => __('about_timeline_2_desc'), 'icon' => 'truck'],
                        ['year' => __('about_timeline_3_year'), 'title' => __('about_timeline_3_title'), 'desc' => __('about_timeline_3_desc'), 'icon' => 'shield-check'],
                        ['year' => __('about_timeline_4_year'), 'title' => __('about_timeline_4_title'), 'desc' => __('about_timeline_4_desc'), 'icon' => 'trophy'],
                    ];

                    foreach ($milestones as $i => $m):
                        $isLeft = $i % 2 === 0;
                        $alignClass = $isLeft ? 'md:pr-[55%] md:text-right' : 'md:pl-[55%] md:text-left';
                        $revealClass = $isLeft ? 'reveal-left' : 'reveal-right';
                        $mobileAlign = 'pl-14 md:pl-0';
                    ?>
                        <div class="relative mb-16 last:mb-0 <?php echo $alignClass; ?> <?php echo $mobileAlign; ?> <?php echo $revealClass; ?>">
                            <!-- Dot -->
                            <div class="timeline-dot" style="top: 8px;"></div>

                            <!-- Content -->
                            <div class="bg-slate-800/60 backdrop-blur-sm p-8 rounded-2xl border border-slate-700/50 hover:border-[#bb9b6b]/40 transition-all duration-300 group">
                                <div class="flex items-center gap-3 mb-4 <?php echo $isLeft ? 'md:justify-end' : ''; ?>">
                                    <div class="w-10 h-10 bg-[#bb9b6b]/20 rounded-xl flex items-center justify-center border border-[#bb9b6b]/30 group-hover:bg-[#bb9b6b]/30 transition-colors <?php echo $isLeft ? 'md:order-2' : ''; ?>">
                                        <i data-lucide="<?php echo $m['icon']; ?>" class="w-5 h-5 text-[#bb9b6b]"></i>
                                    </div>
                                    <span class="text-[#bb9b6b] font-bold text-2xl font-serif"><?php echo $m['year']; ?></span>
                                </div>
                                <h3 class="text-xl font-bold font-serif text-white mb-3">
                                    <?php echo $m['title']; ?>
                                </h3>
                                <p class="text-slate-400 leading-relaxed text-sm md:text-base">
                                    <?php echo $m['desc']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ============================== -->
        <!-- 5. STATS / NUMBERS SECTION     -->
        <!-- ============================== -->
        <section class="py-20 bg-slate-800 relative overflow-hidden">
            <!-- Decorative pattern -->
            <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23bb9b6b\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Header -->
                <div class="text-center mb-16 reveal">
                    <span class="text-[#bb9b6b] tracking-widest uppercase text-sm font-bold">
                        <?php echo __('about_stats_tag'); ?>
                    </span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mt-3">
                        <?php echo __('about_stats_title'); ?>
                    </h2>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                    <?php
                    $stats = [
                        ['icon' => 'calendar', 'number' => __('about_stat_1_number'), 'suffix' => __('about_stat_1_suffix'), 'label' => __('about_stat_1_label')],
                        ['icon' => 'users', 'number' => __('about_stat_2_number'), 'suffix' => __('about_stat_2_suffix'), 'label' => __('about_stat_2_label')],
                        ['icon' => 'package', 'number' => __('about_stat_3_number'), 'suffix' => __('about_stat_3_suffix'), 'label' => __('about_stat_3_label')],
                        ['icon' => 'thermometer-snowflake', 'number' => __('about_stat_4_number'), 'suffix' => __('about_stat_4_suffix'), 'label' => __('about_stat_4_label')],
                    ];

                    foreach ($stats as $i => $s):
                    ?>
                        <div class="reveal text-center p-6 md:p-8 rounded-2xl bg-slate-900/50 border border-slate-700/50 hover:border-[#bb9b6b]/30 transition-all duration-300 group" style="transition-delay: <?php echo $i * 0.1; ?>s;">
                            <div class="w-14 h-14 bg-[#bb9b6b]/10 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-[#bb9b6b]/20 group-hover:scale-110 transition-transform duration-300">
                                <i data-lucide="<?php echo $s['icon']; ?>" class="w-7 h-7 text-[#bb9b6b]"></i>
                            </div>
                            <div class="flex items-baseline justify-center gap-0.5 mb-2">
                                <span class="stat-number text-4xl md:text-5xl font-serif font-bold text-white" data-target="<?php echo $s['number']; ?>">0</span>
                                <span class="text-3xl md:text-4xl font-serif font-bold text-[#bb9b6b]"><?php echo $s['suffix']; ?></span>
                            </div>
                            <p class="text-slate-400 text-sm font-medium"><?php echo $s['label']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ============================== -->
        <!-- 6. CTA SECTION                 -->
        <!-- ============================== -->
        <section class="py-20 bg-[#bb9b6b] relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <!-- Decorative -->
            <div class="absolute top-0 right-0 opacity-10">
                <i data-lucide="fish" class="w-64 h-64"></i>
            </div>

            <div class="max-w-4xl mx-auto px-4 text-center relative z-10 reveal">
                <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mb-6">
                    <?php echo __('about_cta_title'); ?>
                </h2>
                <p class="text-white/90 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
                    <?php echo __('about_cta_desc'); ?>
                </p>
                <a href="<?php echo url('produtos.php'); ?>"
                    class="inline-flex items-center gap-3 bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 px-10 rounded-sm transition-all transform hover:scale-105 shadow-2xl text-lg">
                    <i data-lucide="layout-grid" class="w-5 h-5"></i>
                    <?php echo __('about_cta_btn'); ?>
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        </section>

    </main>

    <?php include 'includes/footer.php'; ?>

    <script>
        // ===== Scroll Reveal Animation =====
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => {
            revealObserver.observe(el);
        });

        // ===== Counter Animation =====
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target);
                    const duration = 2000;
                    const start = performance.now();

                    function easeOutQuart(t) {
                        return 1 - Math.pow(1 - t, 4);
                    }

                    function animate(currentTime) {
                        const elapsed = currentTime - start;
                        const progress = Math.min(elapsed / duration, 1);
                        const easedProgress = easeOutQuart(progress);
                        const current = Math.floor(easedProgress * target);

                        el.textContent = current;

                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            el.textContent = target;
                        }
                    }

                    requestAnimationFrame(animate);
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stat-number').forEach(el => {
            counterObserver.observe(el);
        });
    </script>

</body>

</html>
