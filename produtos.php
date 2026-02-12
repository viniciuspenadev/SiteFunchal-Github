<?php
include 'includes/i18n.php'; // Ensure i18n is loaded
$pageTitle = "Catálogo de Pescados | Funchal Pescados"; // Could be translated too but acceptable for now
$pageDesc = "Confira nosso catálogo completo de salmão, camarão, bacalhau e peixes frescos.";
$currentPage = 'products';
$products = include 'includes/products_data.php'; // Load Data
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
    <!-- Products Catalog Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "itemListElement": [
        <?php
        $count = 1;
        foreach ($products as $prod):
            $name = __('prod_' . $prod['id'] . '_name');
            ?>
                        {
                          "@type": "ListItem",
                          "position": <?php echo $count++; ?>,
                          "url": "<?php echo url('produtos'); ?>",
                          "name": "<?php echo $name; ?>",
                          "image": "<?php echo $prod['image']; ?>"
                        }<?php echo ($count <= count($products)) ? ',' : ''; ?>
        <?php endforeach; ?>
      ]
    }
    </script>
</head>

<body class="font-sans antialiased text-white bg-slate-900">

    <?php include 'includes/navbar.php'; ?>

    <!-- Main Content -->
    <main class="pt-20 min-h-screen relative">
        <!-- Decorative Overlay -->
        <div
            class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-slate-800 to-slate-900 pointer-events-none opacity-50">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-12">

            <!-- Products Header -->
            <div class="text-center mb-12 animate-fade-in-up">
                <span class="text-[#bb9b6b] font-bold tracking-widest uppercase text-sm mb-4 block animate-fade-in">
                    <?php echo __('nav_catalog'); ?>
                </span>
                <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-6">
                    <?php echo __('prod_catalog_title'); ?>
                </h1>
                <p class="text-slate-300 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                    <?php echo __('prod_catalog_desc'); ?>
                </p>
            </div>

            <!-- Filters & Search (Sticky) -->
            <div
                class="sticky top-24 z-30 flex flex-col md:flex-row justify-between items-center gap-6 mb-10 bg-slate-800/90 p-4 rounded-xl border border-slate-700 backdrop-blur-md shadow-2xl transition-all duration-300">

                <!-- Category Tabs -->
                <div class="w-full md:w-auto overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                    <div class="flex space-x-2" id="category-filters">
                        <button
                            class="filter-btn whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-[#bb9b6b] text-white shadow-lg active-filter hover:scale-105"
                            data-category="all">
                            <?php echo __('cat_all'); ?>
                        </button>
                        <button
                            class="filter-btn whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-slate-700 text-slate-300 hover:bg-slate-600 hover:text-white border border-slate-600"
                            data-category="<?php echo __('cat_fresh_fish'); ?>">
                            <?php echo __('cat_fresh_fish'); ?>
                        </button>
                        <button
                            class="filter-btn whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-slate-700 text-slate-300 hover:bg-slate-600 hover:text-white border border-slate-600"
                            data-category="<?php echo __('cat_crustaceans'); ?>">
                            <?php echo __('cat_crustaceans'); ?>
                        </button>
                        <button
                            class="filter-btn whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-slate-700 text-slate-300 hover:bg-slate-600 hover:text-white border border-slate-600"
                            data-category="<?php echo __('cat_mollusks'); ?>">
                            <?php echo __('cat_mollusks'); ?>
                        </button>
                        <button
                            class="filter-btn whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-slate-700 text-slate-300 hover:bg-slate-600 hover:text-white border border-slate-600"
                            data-category="<?php echo __('cat_salted_fish'); ?>">
                            <?php echo __('cat_salted_fish'); ?>
                        </button>
                        <button
                            class="filter-btn whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-slate-700 text-slate-300 hover:bg-slate-600 hover:text-white border border-slate-600"
                            data-category="<?php echo __('cat_specials'); ?>">
                            <?php echo __('cat_specials'); ?>
                        </button>
                    </div>
                </div>

                <!-- Search Input -->
                <div class="relative w-full md:w-80">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-lucide="search" class="h-5 w-5 text-slate-400"></i>
                    </div>
                    <input type="text" id="search-input"
                        placeholder="<?php echo __('prod_search_placeholder', 'Buscar produtos...'); ?>"
                        class="block w-full pl-10 pr-3 py-2 border border-slate-600 rounded-lg leading-5 bg-slate-700/50 text-slate-200 placeholder-slate-400 focus:outline-none focus:bg-slate-700 focus:border-[#bb9b6b] focus:ring-1 focus:ring-[#bb9b6b] sm:text-sm transition-all shadow-inner">
                </div>
            </div>

            <!-- Product Grid -->
            <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <?php foreach ($products as $prod):
                    $catKey = $prod['category_slug'];
                    $catName = __('cat_' . $catKey);
                    $nameKey = 'prod_' . $prod['id'] . '_name';
                    $descKey = 'prod_' . $prod['id'] . '_desc';
                    $originKey = 'prod_' . $prod['id'] . '_origin';
                    $tempKey = 'prod_' . $prod['id'] . '_temp';
                    $pairingKey = 'prod_' . $prod['id'] . '_pairing';

                    $name = __($nameKey);
                    $desc = __($descKey);
                    ?>
                    <!-- Product: <?php echo $name; ?> -->
                    <div class="product-card group flex flex-col bg-slate-800 rounded-xl overflow-hidden border border-slate-700/50 hover:border-[#bb9b6b]/50 transition-all duration-300 hover:shadow-[0_0_20px_rgba(0,0,0,0.3)] hover:-translate-y-1"
                        data-category="<?php echo $catName; ?>" data-name="<?php echo strtolower($name); ?>"
                        data-origin="<?php echo __($originKey); ?>" data-temp="<?php echo __($tempKey); ?>"
                        data-pairing="<?php echo __($pairingKey); ?>" data-desc="<?php echo $desc; ?>">

                        <div class="relative h-56 overflow-hidden">
                            <img src="<?php echo asset_url($prod['image']); ?>" alt="<?php echo $name; ?>" loading="lazy"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                            <!-- Badges -->
                            <?php if (isset($prod['badge']) && $prod['badge']): ?>
                                <div class="absolute top-3 right-3 flex flex-col gap-2">
                                    <span
                                        class="<?php echo $prod['badge_color'] ?? 'bg-[#bb9b6b]'; ?> text-white text-[10px] font-bold px-2 py-1 rounded shadow-lg uppercase tracking-wider">
                                        <?php echo __('badge_' . $prod['badge']); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button
                                    class="btn-quote bg-[#bb9b6b] text-white px-6 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 shadow-lg flex items-center gap-2 hover:bg-[#a68859]">
                                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                                    <?php echo __('prod_quote'); ?>
                                </button>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span
                                    class="bg-slate-900/80 backdrop-blur text-xs font-bold px-2 py-1 rounded text-[#bb9b6b] border border-[#bb9b6b]/20">
                                    <?php echo $catName; ?>
                                </span>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3
                                class="text-lg font-bold font-serif mb-2 text-white group-hover:text-[#bb9b6b] transition-colors line-clamp-1">
                                <?php echo $name; ?>
                            </h3>
                            <p class="text-slate-400 text-sm mb-4 line-clamp-3 flex-grow">
                                <?php echo $desc; ?>
                            </p>
                            <div class="pt-4 border-t border-slate-700/50 flex items-center justify-between">
                                <span class="text-xs text-slate-500 font-medium uppercase tracking-wide">
                                    <?php echo __('prod_available'); ?>
                                </span>
                                <button
                                    class="btn-details text-[#bb9b6b] hover:text-[#d4b98c] text-sm font-medium flex items-center gap-1 transition-colors">
                                    <?php echo __('prod_details'); ?> <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State (Hidden by default) -->
            <div id="empty-state"
                class="hidden text-center py-20 bg-slate-800/30 rounded-2xl border border-slate-800 border-dashed">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-800 mb-4">
                    <i data-lucide="filter" class="w-8 h-8 text-slate-500"></i>
                </div>
                <h3 class="text-xl font-medium text-white mb-2">Nenhum produto encontrado</h3>
                <p class="text-slate-400 max-w-md mx-auto">
                    Tente termos diferentes ou limpe os filtros para ver nossos produtos.
                </p>
                <button id="clear-filters-btn"
                    class="mt-6 px-6 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors text-sm font-medium">
                    Limpar Filtros
                </button>
            </div>

            <!-- Catalog Footer -->
            <div class="mt-16 text-center">
                <p class="text-slate-400 mb-6">
                    Não encontrou o que procura? Trabalhamos com encomendas especiais.
                </p>
                <a href="#/contato"
                    class="inline-flex items-center justify-center px-8 py-3 border border-[#bb9b6b] text-base font-medium rounded-sm text-[#bb9b6b] hover:bg-[#bb9b6b] hover:text-white transition-all duration-300">
                    Falar com um Consultor
                </a>
            </div>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <!-- Product Details Modal -->
    <div id="product-modal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity opacity-0" id="modal-backdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <!-- Modal Panel -->
                <div class="relative transform overflow-hidden rounded-2xl bg-slate-900 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-slate-700 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 flex flex-col"
                    id="modal-panel">

                    <!-- Close Button -->
                    <button type="button" id="close-modal-btn"
                        class="absolute top-4 right-4 z-20 bg-black/50 hover:bg-black/70 text-white rounded-full p-2 transition-colors">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>

                    <!-- Modal Image (No Text Overlay) -->
                    <div class="relative h-64 sm:h-72 w-full flex-shrink-0">
                        <img id="modal-img" src="" alt="" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60">
                        </div>
                    </div>

                    <!-- Modal Content -->
                    <div class="p-6 sm:p-8 flex-grow flex flex-col">

                        <!-- Header -->
                        <div class="mb-6">
                            <span id="modal-category"
                                class="bg-[#bb9b6b] text-white text-xs font-bold px-2 py-1 rounded mb-3 inline-block uppercase tracking-wide"></span>
                            <h3 id="modal-title"
                                class="text-2xl sm:text-3xl font-serif font-bold text-white leading-tight"></h3>
                        </div>

                        <!-- Description -->
                        <div class="mb-8">
                            <p id="modal-desc" class="text-slate-300 text-base sm:text-lg leading-relaxed"></p>
                        </div>

                        <!-- Extra Details Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                            <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700">
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-[#bb9b6b]"></i>
                                    <span
                                        class="text-xs font-bold text-slate-500 uppercase tracking-wider">Origem</span>
                                </div>
                                <p id="modal-origin" class="font-medium text-white pl-6 text-sm sm:text-base">Chile</p>
                            </div>
                            <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700">
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="thermometer-snowflake" class="w-4 h-4 text-[#bb9b6b]"></i>
                                    <span
                                        class="text-xs font-bold text-slate-500 uppercase tracking-wider">Conservação</span>
                                </div>
                                <p id="modal-temp" class="font-medium text-white pl-6 text-sm sm:text-base">Resfriado
                                </p>
                            </div>
                            <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700 sm:col-span-2">
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="chef-hat" class="w-4 h-4 text-[#bb9b6b]"></i>
                                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Sugestão do
                                        Chef</span>
                                </div>
                                <p id="modal-pairing" class="font-medium text-white pl-6 text-sm sm:text-base">Ideal
                                    para grelhados.</p>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-auto flex flex-col sm:flex-row gap-4 pt-6 border-t border-slate-800">
                            <a id="modal-whatsapp-btn" href="#" target="_blank"
                                class="flex-1 bg-[#bb9b6b] hover:bg-[#a68859] text-white font-bold py-3 px-6 rounded-lg transition-all transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-2 text-center">
                                <i data-lucide="message-circle" class="w-5 h-5"></i>
                                Solicitar Cotação
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // --- Filtering Logic ---
        const filterBtns = document.querySelectorAll('.filter-btn');
        const searchInput = document.getElementById('search-input');
        const cards = document.querySelectorAll('.product-card');
        const emptyState = document.getElementById('empty-state');
        const clearBtn = document.getElementById('clear-filters-btn');

        let activeCategory = 'all';
        let searchQuery = '';

        function filterProducts() {
            let visibleCount = 0;

            cards.forEach(card => {
                const category = card.dataset.category;
                const name = card.dataset.name;
                const desc = card.dataset.desc;

                const matchCategory = activeCategory === 'all' || category === activeCategory;
                const matchSearch = name.includes(searchQuery) || desc.includes(searchQuery);

                if (matchCategory && matchSearch) {
                    card.style.display = 'flex'; // Restore flex display
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active classes
                filterBtns.forEach(b => {
                    b.classList.remove('bg-[#bb9b6b]', 'text-white', 'shadow-lg');
                    b.classList.add('bg-slate-800', 'text-slate-300');
                });
                // Add active class to clicked
                btn.classList.remove('bg-slate-800', 'text-slate-300');
                btn.classList.add('bg-[#bb9b6b]', 'text-white', 'shadow-lg');

                activeCategory = btn.dataset.category;
                filterProducts();
            });
        });

        searchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value.toLowerCase();
            filterProducts();
        });

        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            searchQuery = '';
            // Reset category to "Todos" (first button)
            filterBtns[0].click();
        });

        // --- Modal & Interaction Logic ---
        const modal = document.getElementById('product-modal');
        const modalPanel = document.getElementById('modal-panel');
        const modalBackdrop = document.getElementById('modal-backdrop');
        const closeBtn = document.getElementById('close-modal-btn');

        // Elements to populate
        const modalImg = document.getElementById('modal-img');
        const modalCategory = document.getElementById('modal-category');
        const modalTitle = document.getElementById('modal-title');
        const modalDesc = document.getElementById('modal-desc');
        const modalOrigin = document.getElementById('modal-origin');
        const modalTemp = document.getElementById('modal-temp');
        const modalPairing = document.getElementById('modal-pairing');
        const modalWhatsappBtn = document.getElementById('modal-whatsapp-btn');

        function openModal(data) {
            // Populate Data
            modalImg.src = data.img;
            modalCategory.textContent = data.category;
            modalTitle.textContent = data.title;
            modalDesc.textContent = data.fullDesc || data.desc;
            modalOrigin.textContent = data.origin || 'Consulte';
            modalTemp.textContent = data.temp || 'Resfriado/Congelado';
            modalPairing.textContent = data.pairing || 'Ideal para diversos pratos';

            // WhatsApp Link in Modal
            const message = `Olá, vim pelo site e gostaria de uma cotação para o produto: *${data.title}*.`;
            const whatsappUrl = `https://wa.me/551120906100?text=${encodeURIComponent(message)}`;
            modalWhatsappBtn.href = whatsappUrl;

            // Show Modal with Animation
            modal.classList.remove('hidden');
            void modal.offsetWidth; // Trigger reflow

            modalBackdrop.classList.remove('opacity-0');
            modalPanel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            modalPanel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }

        function closeModal() {
            modalBackdrop.classList.add('opacity-0');
            modalPanel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
            modalPanel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        // Initialize Product Cards
        document.querySelectorAll('.product-card').forEach(card => {
            const data = {
                title: card.dataset.name, // Use dataset for reliable title
                category: card.dataset.category,
                desc: card.dataset.desc,
                img: card.querySelector('img').src,
                origin: card.dataset.origin,
                temp: card.dataset.temp,
                pairing: card.dataset.pairing
            };

            // Fix title case for display if needed (or just grab innerText if formatted well)
            // But dataset.name is usually lowercase from HTML generation? 
            // Actually, let's grab the H3 text for the display title.
            const titleEl = card.querySelector('h3');
            if (titleEl) data.title = titleEl.textContent.trim();

            // Selectors - Enhanced robustness with classes
            const quoteBtn = card.querySelector('.btn-quote');
            const detailsBtn = card.querySelector('.btn-details');

            if (detailsBtn) {
                detailsBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    e.preventDefault(); // Prevent jump
                    // Refresh data
                    data.origin = card.dataset.origin;
                    data.temp = card.dataset.temp;
                    data.pairing = card.dataset.pairing;
                    openModal(data);
                });
            }

            if (quoteBtn) {
                quoteBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    e.preventDefault();
                    // Changed behavior: Open Modal instead of direct WhatsApp
                    data.origin = card.dataset.origin;
                    data.temp = card.dataset.temp;
                    data.pairing = card.dataset.pairing;
                    openModal(data);
                });
            }
        });

    </script>
</body>

</html>