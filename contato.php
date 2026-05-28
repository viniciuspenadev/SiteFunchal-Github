<?php
include 'includes/i18n.php';
$pageTitle = __('contact_page_title');
$pageDesc = __('contact_page_desc');
$currentPage = 'contact';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
    <style>
        /* Custom Map Styling for Dark Theme */
        .map-svg-container {
            filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.5));
        }

        .map-image {
            /* Applied hover style as default */
            /* Added drop-shadow here to avoid conflict with Tailwind filter class */
            filter: invert(1) sepia(1) saturate(0) brightness(0.6) contrast(1.2) drop-shadow(0 10px 15px rgba(0, 0, 0, 0.5));
            transition: all 0.5s ease;
        }

        .map-container:hover .map-image {
            /* Slight lift on hover */
            filter: invert(1) sepia(1) saturate(0) brightness(0.7) contrast(1.2);
            transform: scale(1.02);
        }

        .pin-marker {
            top: 68%;
            /* Approximate SP Latitude */
            left: 58%;
            /* Approximate SP Longitude on this specific projection */
        }
    </style>
</head>

<body class="font-sans antialiased text-white bg-slate-900">

    <?php include 'includes/navbar.php'; ?>

    <main class="min-h-screen relative overflow-hidden">

        <!-- 1. Clean Text Hero Section -->
        <section class="relative pt-32 pb-16 px-4 text-center bg-slate-900 z-20">
            <span
                class="inline-block py-1 px-3 rounded-full bg-[#bb9b6b]/10 text-[#bb9b6b] text-xs font-bold tracking-widest uppercase mb-6 border border-[#bb9b6b]/20 backdrop-blur-sm animate-fade-in-up">
                <?php echo __('contact_hero_subtitle'); ?>
            </span>
            <h1
                class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white mb-6 animate-fade-in-up delay-100">
                <?php echo __('contact_hero_title'); ?>
            </h1>
            <p class="text-lg text-slate-400 max-w-2xl mx-auto animate-fade-in-up delay-200">
                <?php echo __('contact_hero_text'); ?>
            </p>
        </section>

        <!-- 2. Combined Contact Info & Map Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20 relative z-20">
            <div class="flex flex-col lg:flex-row gap-8 items-stretch">

                <!-- LEFT COLUMN: Contact Cards (Stacked) -->
                <div class="w-full lg:w-1/3 flex flex-col gap-6">
                    <!-- Address -->
                    <div
                        class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700/50 hover:border-[#bb9b6b]/50 transition-all duration-300 group flex-1">
                        <i data-lucide="map-pin"
                            class="w-8 h-8 text-[#bb9b6b] mb-4 group-hover:scale-110 transition-transform"></i>
                        <h3 class="text-xl font-serif font-bold text-white mb-2">
                            <?php echo __('contact_visit_title'); ?>
                        </h3>
                        <p class="text-slate-400 text-sm mb-4">
                            R. Cândido Vale, 319<br>Tatuapé, São Paulo - SP<br>03068-010
                        </p>
                        <a href="https://maps.google.com/?q=R.+Cândido+Vale,+319" target="_blank"
                            class="text-[#bb9b6b] text-sm font-bold hover:underline"><?php echo __('contact_visit_link'); ?></a>
                    </div>

                    <!-- Phone/Email -->
                    <div
                        class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700/50 hover:border-[#bb9b6b]/50 transition-all duration-300 group flex-1">
                        <i data-lucide="phone"
                            class="w-8 h-8 text-[#bb9b6b] mb-4 group-hover:scale-110 transition-transform"></i>
                        <h3 class="text-xl font-serif font-bold text-white mb-2"><?php echo __('contact_call_title'); ?>
                        </h3>
                        <p class="text-slate-400 text-sm mb-4">
                            (11) 2090-6100<br>
                            contato@funchalpescados.com.br
                        </p>
                        <a href="https://wa.me/551120906100" target="_blank"
                            class="text-[#bb9b6b] text-sm font-bold hover:underline"><?php echo __('contact_call_link'); ?></a>
                    </div>

                    <!-- Hours -->
                    <div
                        class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700/50 hover:border-[#bb9b6b]/50 transition-all duration-300 group flex-1">
                        <i data-lucide="clock"
                            class="w-8 h-8 text-[#bb9b6b] mb-4 group-hover:scale-110 transition-transform"></i>
                        <h3 class="text-xl font-serif font-bold text-white mb-2">
                            <?php echo __('contact_hours_title'); ?>
                        </h3>
                        <p class="text-slate-400 text-sm">
                            <span class="block mb-1"><span
                                    class="text-slate-300 font-medium"><?php echo __('contact_weekdays'); ?></span>
                                08:00 -
                                18:00</span>
                            <span class="block"><span
                                    class="text-slate-300 font-medium"><?php echo __('contact_saturday'); ?></span>
                                08:00 -
                                12:00</span>
                        </p>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Map (Clean, No Container BG) -->
                <div
                    class="w-full lg:w-2/3 relative min-h-[500px] lg:h-auto rounded-3xl overflow-hidden group map-container">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <!-- Local SVG Map Source -->
                        <img src="<?php echo asset_url('maps/brazil.svg'); ?>" alt="Mapa do Brasil"
                            class="h-full w-auto object-contain map-image opacity-100 group-hover:opacity-100 transition-all duration-700">

                        <!-- Overlay Gradients (Subtle) -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/10 via-transparent to-slate-900/10 pointer-events-none">
                        </div>

                        <!-- The Ping Marker -->
                        <div
                            class="absolute top-[75%] left-[65%] transform -translate-x-1/2 -translate-y-1/2 z-10 flex flex-col items-center cursor-pointer group-marker">
                            <!-- Ripple Effect -->
                            <div class="relative flex items-center justify-center">
                                <div
                                    class="absolute w-24 h-24 bg-[#bb9b6b] rounded-full opacity-0 group-hover:opacity-20 animate-ping duration-1000">
                                </div>
                                <div class="absolute w-12 h-12 bg-[#bb9b6b]/30 rounded-full animate-pulse"></div>
                                <div
                                    class="absolute w-4 h-4 bg-[#bb9b6b] rounded-full shadow-[0_0_15px_#bb9b6b] border-2 border-slate-900">
                                </div>
                            </div>

                            <!-- Label -->
                            <div
                                class="mt-4 bg-slate-900/90 border border-[#bb9b6b]/30 px-4 py-2 rounded-xl text-xs font-bold text-white shadow-2xl backdrop-blur-md flex items-center gap-2 transform translate-y-2 opacity-100 transition-all duration-300">
                                <span
                                    class="text-[#bb9b6b] uppercase tracking-wider text-[10px]"><?php echo __('contact_map_label'); ?></span>
                                <span>São Paulo - SP</span>
                            </div>
                        </div>
                    </div>

                    <!-- Overlay Text Bottom Right -->
                    <div class="absolute bottom-6 right-8 text-right hidden sm:block">
                        <p class="text-[#bb9b6b] text-xs font-bold uppercase tracking-widest mb-1">
                            <?php echo __('contact_logistics_title'); ?>
                        </p>
                        <p class="text-slate-300 text-sm font-medium"><?php echo __('contact_logistics_text'); ?></p>
                    </div>
                </div>

            </div>
        </div>

        <!-- 4. Contact Form (Existing - Full Width Wrapper) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
            <div
                class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl flex flex-col md:flex-row">
                <!-- Decorative Side -->
                <div class="w-full md:w-2/5 bg-slate-700 relative overflow-hidden hidden md:block">
                    <img src="<?php echo asset_url('assets/img/raw-salmon-file-gray-board-black-surface.jpg'); ?>"
                        alt="Atendimento Premium" class="absolute inset-0 w-full h-full object-cover ">
                    <div class="absolute inset-0 "></div>
                    <div class="relative z-10 p-12 flex flex-col justify-between h-full text-white">
                        <div>
                            <h3 class="text-3xl font-serif font-bold mb-4"><?php echo __('contact_exclusive_title'); ?>
                            </h3>
                            <p class="text-slate-200"><?php echo __('contact_exclusive_text'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="w-full md:w-3/5 p-8 md:p-12 bg-slate-800">
                    <h2 class="text-2xl font-serif font-bold text-white mb-6"><?php echo __('contact_form_title'); ?>
                    </h2>
                    <form id="formContato" class="space-y-6">
                        <!-- Feedback -->
                        <div id="contatoFeedback" class="hidden rounded-lg p-4 text-sm font-medium"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-400 mb-2"><?php echo __('form_name'); ?></label>
                                <input type="text" name="nome" required
                                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none transition-colors">
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-400 mb-2"><?php echo __('form_company'); ?></label>
                                <input type="text" name="empresa"
                                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none transition-colors">
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-400 mb-2"><?php echo __('form_email'); ?></label>
                            <input type="email" name="email" required
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none transition-colors">
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-400 mb-2"><?php echo __('form_message'); ?></label>
                            <textarea rows="4" name="mensagem" required
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none transition-colors"></textarea>
                        </div>
                        <button type="submit" id="btnContato"
                            class="bg-[#bb9b6b] hover:bg-[#a68859] text-white font-bold py-4 px-8 rounded-lg shadow-lg w-full md:w-auto transition-all flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span id="btnContatoTexto"><?php echo __('form_send_btn'); ?></span>
                            <i data-lucide="send" class="w-4 h-4" id="btnContatoIcone"></i>
                            <svg id="btnContatoLoading" class="hidden animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </button>
                    </form>

                    <script>
                    document.getElementById('formContato').addEventListener('submit', async function(e) {
                        e.preventDefault();

                        const btn = document.getElementById('btnContato');
                        const btnTexto = document.getElementById('btnContatoTexto');
                        const btnIcone = document.getElementById('btnContatoIcone');
                        const btnLoading = document.getElementById('btnContatoLoading');
                        const feedback = document.getElementById('contatoFeedback');

                        // Loading
                        btn.disabled = true;
                        btnTexto.textContent = 'Enviando...';
                        btnIcone.classList.add('hidden');
                        btnLoading.classList.remove('hidden');
                        feedback.classList.add('hidden');

                        try {
                            const formData = new FormData(this);
                            const response = await fetch('enviar-contato.php', {
                                method: 'POST',
                                body: formData
                            });

                            const data = await response.json();

                            feedback.classList.remove('hidden', 'bg-green-500/20', 'text-green-300', 'bg-red-500/20', 'text-red-300');

                            if (data.success) {
                                feedback.classList.add('bg-green-500/20', 'text-green-300');
                                feedback.innerHTML = '✓ ' + data.message;
                                this.reset();
                            } else {
                                feedback.classList.add('bg-red-500/20', 'text-red-300');
                                feedback.innerHTML = '⚠ ' + data.message;
                            }
                        } catch (error) {
                            feedback.classList.remove('hidden');
                            feedback.classList.add('bg-red-500/20', 'text-red-300');
                            feedback.textContent = 'Erro de conexão. Tente novamente.';
                        }

                        // Reset button
                        btn.disabled = false;
                        btnTexto.textContent = '<?php echo __("form_send_btn"); ?>';
                        btnIcone.classList.remove('hidden');
                        btnLoading.classList.add('hidden');
                    });
                    </script>
                </div>
            </div>
        </section>

    </main>

    <?php include 'includes/footer.php'; ?>

</body>

</html>