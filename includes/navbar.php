<?php
// Function to check if link is active
function isActive($pageName)
{
    global $currentPage;
    return $currentPage === $pageName ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white';
}

// Logic for Language Switcher (Handle Blog Posts)
$langTarget = $_SERVER['PHP_SELF'];
// Check if we are on a blog post and have a valid post ID
if (basename($_SERVER['PHP_SELF']) === 'post.php' && isset($post) && isset($post['id'])) {
    $langTarget = 'post.php?id=' . $post['id'];
}
?>
<nav id="navbar"
    class="fixed w-full z-50 transition-all duration-300 py-4 <?php echo isset($isTransparent) && $isTransparent ? 'bg-transparent' : 'bg-slate-900 shadow-lg'; ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-2">
                <a href="<?php echo url('index.php'); ?>" class="flex items-center">
                    <img src="<?php echo asset_url('assets/img/funchalpescados.webp'); ?>" alt="Funchal Pescados"
                        class="h-24 w-auto"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <span
                        class="hidden text-2xl font-serif font-bold text-white tracking-widest border-2 border-[#bb9b6b] px-2 py-1">FUNCHAL</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="<?php echo url('index.php'); ?>"
                    class="text-sm font-medium transition-colors <?php echo isActive('home'); ?>"><?php echo __('nav_home'); ?></a>
                <!-- <a href="<?php echo url('chef_ia.php'); ?>"
                    class="text-sm font-medium px-4 py-2 rounded bg-[#bb9b6b] text-white hover:bg-[#a68859] transition-colors">Chef
                    IA</a> -->
                <a href="#"
                    class="text-sm font-medium transition-colors <?php echo isActive('about'); ?>"><?php echo __('nav_about'); ?></a>
                <a href="<?php echo url('produtos.php'); ?>"
                    class="text-sm font-medium transition-colors <?php echo isActive('products'); ?>"><?php echo __('nav_products'); ?></a>
                <a href="<?php echo url('contato.php'); ?>"
                    class="text-sm font-medium transition-colors <?php echo isActive('contact'); ?>"><?php echo __('nav_contact'); ?></a>
                <a href="<?php echo url('trabalhe-conosco.php'); ?>"
                    class="text-sm font-medium transition-colors <?php echo isActive('trabalhe-conosco'); ?>"><?php echo __('nav_careers'); ?></a>
                <a href="<?php echo url('blog.php'); ?>"
                    class="text-sm font-medium transition-colors <?php echo isActive('blog'); ?>"><?php echo __('nav_blog'); ?></a>

                <!-- Language Switcher -->
                <div class="flex items-center gap-3 border-l border-slate-700 pl-6 ml-2">
                    <a href="<?php echo url($langTarget, 'pt'); ?>"
                        class="hover:opacity-80 transition-opacity <?php echo current_lang() === 'pt' ? 'opacity-100 scale-110' : 'opacity-50 grayscale hover:grayscale-0'; ?>"
                        title="Português">
                        <img src="https://flagcdn.com/w40/br.png" alt="PT-BR" class="w-6 h-auto rounded-sm shadow-sm">
                    </a>
                    <a href="<?php echo url($langTarget, 'en'); ?>"
                        class="hover:opacity-80 transition-opacity <?php echo current_lang() === 'en' ? 'opacity-100 scale-110' : 'opacity-50 grayscale hover:grayscale-0'; ?>"
                        title="English">
                        <img src="https://flagcdn.com/w40/gb.png" alt="EN" class="w-6 h-auto rounded-sm shadow-sm">
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-300 hover:text-white p-2">
                    <i data-lucide="menu" class="h-6 w-6"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div id="mobile-menu" class="hidden md:hidden bg-slate-800 absolute w-full border-t border-slate-700">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="<?php echo url('index.php'); ?>"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-700 <?php echo $currentPage === 'home' ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white'; ?>"><?php echo __('nav_home'); ?></a>
            <!-- <a href="<?php echo url('chef_ia.php'); ?>"
                class="block px-3 py-2 rounded-md text-base font-medium bg-[#bb9b6b] text-white">Chef IA</a> -->
            <a href="#"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-700 <?php echo $currentPage === 'about' ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white'; ?>"><?php echo __('nav_about'); ?></a>
            <a href="<?php echo url('produtos.php'); ?>"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-700 <?php echo $currentPage === 'products' ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white'; ?>"><?php echo __('nav_products'); ?></a>
            <a href="<?php echo url('contato.php'); ?>"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-700 <?php echo $currentPage === 'contact' ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white'; ?>"><?php echo __('nav_contact'); ?></a>
            <a href="<?php echo url('trabalhe-conosco.php'); ?>"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-700 <?php echo $currentPage === 'trabalhe-conosco' ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white'; ?>"><?php echo __('nav_careers'); ?></a>
            <a href="<?php echo url('blog.php'); ?>"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-700 <?php echo $currentPage === 'blog' ? 'text-[#bb9b6b]' : 'text-gray-300 hover:text-white'; ?>"><?php echo __('nav_blog'); ?></a>

            <!-- Mobile Language Switcher (Simple) -->
            <div class="flex items-center gap-4 px-3 py-4 border-t border-slate-700 mt-2">
                <a href="<?php echo url($langTarget, 'pt'); ?>"
                    class="flex items-center gap-2 text-gray-300 hover:text-white">
                    <img src="https://flagcdn.com/w40/br.png" alt="PT-BR" class="w-5 h-auto rounded-sm"> Português
                </a>
                <a href="<?php echo url($langTarget, 'en'); ?>"
                    class="flex items-center gap-2 text-gray-300 hover:text-white">
                    <img src="https://flagcdn.com/w40/gb.png" alt="EN" class="w-5 h-auto rounded-sm"> English
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-slate-900', 'shadow-lg');
            navbar.classList.remove('bg-transparent');
        } else {
            // Only make transparent if it was initially meant to be transparent (set via PHP logic if needed, or default behavior for home)
            // For safety in this include, we might rely on the class list.
            // But if we want specific page behavior (like home transparent at top), we need that logic.
            // Simplified: Always opaque on scroll, check page for top behavior.
            if (document.body.getAttribute('data-transparent-nav') === 'true') {
                navbar.classList.remove('bg-slate-900', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        }
    });

    // Mobile Menu
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
</script>