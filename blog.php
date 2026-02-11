<?php
include 'includes/i18n.php';
include 'data/posts.php'; // Ensure data is loaded
$currentPage = 'blog';
$pageTitle = 'Blog & Insights - Funchal Pescados';
$pageDesc = 'Notícias, tendências de mercado e segredos gastronômicos para impulsionar seu negócio.';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
</head>

<body class="font-sans antialiased text-slate-900 bg-slate-50">

    <?php include 'includes/navbar.php'; ?>

    <!-- Header -->
    <header class="bg-slate-900 pt-32 pb-20 md:pt-40 md:pb-24 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-[#bb9b6b] rounded-full blur-[150px] opacity-20 translate-x-1/3 -translate-y-1/3">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <span class="text-[#bb9b6b] font-bold tracking-widest uppercase text-sm mb-4 block animate-fade-in"><?php echo __('blog_home_tag'); ?></span>
            <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-6"><?php echo __('blog_main_title_hardcoded_fallback', 'Conteúdo que Alimenta'); ?> <br><span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#bb9b6b] to-[#e4c48f]"><?php echo __('blog_main_title_span', 'Seu Negócio'); ?></span></h1>
            <p class="text-slate-300 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                <?php echo __('blog_home_desc'); ?>
            </p>
        </div>
    </header>

    <!-- Main Grid -->
    <section class="py-20">
        <div class="container mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($BLOG_POSTS as $p): ?>
                    <a href="<?php echo url('post.php?id=' . $p['slug']); ?>"
                        class="group block bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative h-64 overflow-hidden">
                            <img src="<?php echo asset_url($p['image']); ?>" alt="<?php echo $p['title']; ?>"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-[#bb9b6b] text-white text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wide">
                                    <?php echo $p['category']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div
                                class="flex items-center gap-2 text-xs text-slate-400 mb-4 font-medium uppercase tracking-wider">
                                <i data-lucide="calendar" class="w-3 h-3"></i>
                                <?php echo date('d M Y', strtotime($p['date'])); ?>
                                <span class="w-1 h-1 rounded-full bg-slate-300 mx-1"></span>
                                <i data-lucide="clock" class="w-3 h-3"></i>
                                <?php echo $p['read_time']; ?>
                            </div>
                            <h3
                                class="text-xl font-serif font-bold text-slate-900 group-hover:text-[#bb9b6b] transition-colors mb-3 leading-tight min-h-[3.5em]">
                                <?php echo $p['title']; ?>
                            </h3>
                            <p class="text-slate-500 line-clamp-3 text-sm leading-relaxed mb-6 h-[4.5em]">
                                <?php echo $p['excerpt']; ?>
                            </p>
                            <span
                                class="text-[#bb9b6b] text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">
                                <?php echo __('blog_read_full'); ?> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Load More (Visual only) -->
            <div class="mt-16 text-center">
                <button
                    class="inline-flex items-center gap-2 px-8 py-4 border-2 border-slate-200 hover:border-[#bb9b6b] text-slate-600 hover:text-[#bb9b6b] font-bold rounded-lg transition-colors">
                    <?php echo __('blog_load_more'); ?>
                </button>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>