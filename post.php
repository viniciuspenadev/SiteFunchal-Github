<?php
include 'includes/i18n.php';
if (file_exists('data/posts.php')) {
    include 'data/posts.php';
} else {
    $BLOG_POSTS = [];
}

$postId = isset($_GET['id']) ? $_GET['id'] : null;
$post = null;

if ($postId) {
    foreach ($BLOG_POSTS as $p) {
        if ($p['id'] === $postId || $p['slug'] === $postId) {
            $post = $p;
            break;
        }
    }
}

// Fallback or 404 behavior (redirect to blog index)
if (!$post) {
    header("Location: blog.php");
    exit;
}

// SEO Overrides
$pageTitle = $post['title'] . ' - Blog Funchal Pescados';
$pageDesc = $post['excerpt'];
$pageImage = asset_url($post['image']); // For OG tags
$currentPage = 'blog';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
    <!-- Schema.org Article -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "headline": "<?php echo addslashes($post['title']); ?>",
      "image": [
        "<?php echo asset_url($post['image']); ?>"
       ],
      "datePublished": "<?php echo $post['date']; ?>",
      "dateModified": "<?php echo $post['date']; ?>",
      "author": [{
          "@type": "Organization",
          "name": "Funchal Pescados",
          "url": "https://funchalpescados.com.br"
        }],
      "description": "<?php echo addslashes($post['excerpt']); ?>"
    }
    </script>
</head>

<body class="font-sans antialiased text-slate-900 bg-white">

    <?php include 'includes/navbar.php'; ?>

    <!-- Immersive Hero -->
    <!-- Immersive Hero 2026 -->
    <div class="relative h-screen min-h-[600px] w-full overflow-hidden">
        <!-- Parallax Background -->
        <div class="absolute inset-0 bg-slate-900">
            <img src="<?php echo asset_url($post['image']); ?>" alt="<?php echo $post['title']; ?>"
                class="w-full h-full object-cover opacity-80 animate-slow-zoom">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
        </div>

        <!-- Navbar Overlay Fix -->
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-black/60 to-transparent z-40"></div>

        <!-- Floating Content with Glassmorphism -->
        <div class="absolute bottom-0 left-0 w-full p-8 pb-24 md:p-24 flex items-end z-20">
            <div class="container mx-auto">
                <div class="max-w-5xl animate-fade-in-up">
                    <div class="flex flex-wrap items-center gap-4 mb-8">
                        <span
                            class="px-4 py-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-white text-xs font-bold uppercase tracking-wider shadow-lg">
                            <?php echo $post['category']; ?>
                        </span>
                        <div class="flex items-center gap-4 text-white/80 text-sm font-medium tracking-wide">
                            <span class="flex items-center gap-2"><i data-lucide="clock"
                                    class="w-4 h-4 text-[#bb9b6b]"></i> <?php echo $post['read_time']; ?> <?php echo __('post_reading_time', 'de leitura'); ?></span>
                            <span class="hidden md:inline w-1 h-1 bg-white/40 rounded-full"></span>
                            <span class="flex items-center gap-2"><i data-lucide="calendar"
                                    class="w-4 h-4 text-[#bb9b6b]"></i>
                                <?php echo date('d/m/Y', strtotime($post['date'])); ?></span>
                        </div>
                    </div>

                    <h1
                        class="text-4xl md:text-6xl lg:text-7xl font-serif font-bold text-white leading-tight mb-8 drop-shadow-lg">
                        <?php echo $post['title']; ?>
                    </h1>

                    <p class="text-xl md:text-2xl text-slate-200 max-w-2xl font-light leading-relaxed drop-shadow-md">
                        <?php echo $post['excerpt']; ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce z-20 text-white/50">
            <i data-lucide="chevrons-down" class="w-8 h-8"></i>
        </div>
    </div>

    <!-- Reading Progress Bar -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-[#bb9b6b] z-[100] transition-all duration-100 w-0"></div>

    <!-- Content -->
    <article class="max-w-3xl mx-auto px-6 py-16 md:py-24">
        <!-- Author Info -->
        <div class="flex items-center justify-between border-b border-slate-100 pb-8 mb-12">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center text-xl font-serif font-bold text-[#bb9b6b]">
                    F
                </div>
                <div>
                    <p class="font-bold text-slate-900"><?php echo __('post_by', 'Por'); ?>
                        <?php echo $post['author']; ?>
                    </p>
                    <p class="text-sm text-slate-500"><?php echo __('post_author_role', 'Especialista em Pescados'); ?></p>
                </div>
            </div>

            <div class="flex gap-2">
                <button
                    class="w-10 h-10 rounded-full bg-slate-50 hover:bg-[#bb9b6b] hover:text-white flex items-center justify-center transition-colors text-slate-400">
                    <i data-lucide="share-2" class="w-5 h-5"></i>
                </button>
                <button
                    class="w-10 h-10 rounded-full bg-slate-50 hover:bg-[#bb9b6b] hover:text-white flex items-center justify-center transition-colors text-slate-400">
                    <i data-lucide="bookmark" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div
            class="prose prose-lg prose-slate prose-headings:font-serif prose-headings:font-bold prose-headings:text-slate-900 prose-p:text-slate-600 prose-p:leading-loose prose-a:text-[#bb9b6b] hover:prose-a:text-[#a68859] prose-blockquote:border-l-[#bb9b6b] prose-strong:text-slate-800">
            <?php echo $post['content']; ?>
        </div>

        <!-- Tags / Footer -->
        <div class="mt-16 pt-8 border-t border-slate-100">
            <h3 class="font-serif font-bold text-slate-900 mb-4"><?php echo __('post_related_tags', 'Tags Relacionadas'); ?></h3>
            <div class="flex flex-wrap gap-2">
                <span
                    class="px-4 py-2 bg-slate-50 text-slate-600 text-sm hover:bg-slate-100 cursor-pointer rounded-full transition-colors">#Pescados</span>
                <span
                    class="px-4 py-2 bg-slate-50 text-slate-600 text-sm hover:bg-slate-100 cursor-pointer rounded-full transition-colors">#Gastronomia</span>
                <span
                    class="px-4 py-2 bg-slate-50 text-slate-600 text-sm hover:bg-slate-100 cursor-pointer rounded-full transition-colors">#Qualidade</span>
                <span
                    class="px-4 py-2 bg-slate-50 text-slate-600 text-sm hover:bg-slate-100 cursor-pointer rounded-full transition-colors">#Logística</span>
            </div>
        </div>
    </article>

    <!-- Detailed Newsletter -->
    <section class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <i data-lucide="mail-open" class="w-12 h-12 text-[#bb9b6b] mx-auto mb-6"></i>
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4"><?php echo __('post_news_title', 'Receba Insights Exclusivos'); ?></h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">
                <?php echo __('post_news_desc', 'Inscreva-se em nossa newsletter para receber tendências de mercado, receitas exclusivas e novidades da Funchal Pescados diretamente no seu e-mail.'); ?>
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto"
                onsubmit="event.preventDefault(); alert('Obrigado por se inscrever!');">
                <input type="email" placeholder="Seu melhor e-mail"
                    class="flex-1 px-6 py-4 rounded-lg bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-[#bb9b6b] focus:outline-none transition-all">
                <button type="submit"
                    class="px-8 py-4 bg-[#bb9b6b] hover:bg-[#a68859] text-white font-bold rounded-lg shadow-lg hover:shadow-[#bb9b6b]/20 transition-all">
                    <?php echo __('footer_news_btn'); ?>
                </button>
            </form>
        </div>
    </section>

    <!-- Related Posts -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-serif font-bold text-slate-900 mb-12 text-center"><?php echo __('post_continue_reading', 'Continue Lendo'); ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $count = 0;
                foreach ($BLOG_POSTS as $p):
                    if ($p['id'] === $postId)
                        continue; // Skip current
                    if ($count >= 3)
                        break;
                    $count++;
                    ?>
                    <a href="post.php?id=<?php echo $p['slug']; ?>"
                        class="group block bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative h-64 overflow-hidden">
                            <img src="<?php echo asset_url($p['image']); ?>" alt="<?php echo $p['title']; ?>"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-white/90 backdrop-blur-sm text-slate-900 text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wide">
                                    <?php echo $p['category']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div
                                class="flex items-center gap-2 text-xs text-slate-400 mb-4 font-medium uppercase tracking-wider">
                                <i data-lucide="calendar" class="w-3 h-3"></i>
                                <?php echo date('d M Y', strtotime($p['date'])); ?>
                            </div>
                            <h3
                                class="text-xl font-serif font-bold text-slate-900 group-hover:text-[#bb9b6b] transition-colors mb-3 leading-tight">
                                <?php echo $p['title']; ?>
                            </h3>
                            <p class="text-slate-500 line-clamp-3 text-sm leading-relaxed mb-6">
                                <?php echo $p['excerpt']; ?>
                            </p>
                            <span
                                class="text-[#bb9b6b] text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">
                                Ler Artigo <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <style>
        /* Modern Design Utilities */
        @keyframes slow-zoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .animate-slow-zoom {
            animation: slow-zoom 20s linear infinite alternate;
        }

        /* Drop Cap 2026 Style */
        .prose p:first-of-type::first-letter {
            float: left;
            font-size: 4.5rem;
            line-height: 0.8;
            font-family: serif;
            font-weight: bold;
            color: #bb9b6b;
            margin-right: 1rem;
            margin-top: 0.5rem;
        }
    </style>

    <script>
        // Reading Progress Bar
        window.addEventListener('scroll', () => {
            const totalScroll = document.documentElement.scrollTop;
            const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = `${totalScroll / windowHeight}`;
            const progressBar = document.getElementById('progress-bar');

            if (progressBar) {
                progressBar.style.width = `${scrolled * 100}%`;
            }
        });
    </script>
</body>

</html>