<!-- Security Modal Structure -->
<div id="security-modal"
    class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6 transition-all duration-300">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm" id="security-modal-backdrop"></div>

    <!-- Modal Content -->
    <div
        class="relative bg-white dark:bg-slate-900 w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden transform transition-all border border-slate-200 dark:border-slate-800">
        <!-- Header -->
        <div
            class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50 dark:bg-slate-800/50">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-amber-100 dark:bg-amber-900/30 rounded-lg text-amber-600">
                    <i data-lucide="shield-alert" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-serif font-bold text-slate-900 dark:text-white">
                    <?php echo __('sec_modal_title'); ?>
                </h3>
            </div>
            <button id="close-security-modal"
                class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-8 space-y-8 overflow-y-auto max-h-[70vh]">
            <!-- Official Channel -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[#bb9b6b] font-bold">
                    1</div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">
                        <?php echo __('sec_modal_official_canal'); ?>
                    </h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        <?php echo __('sec_modal_official_canal_desc'); ?>
                    </p>
                </div>
            </div>

            <!-- Check Data -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[#bb9b6b] font-bold">
                    2</div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">
                        <?php echo __('sec_modal_check_data'); ?>
                    </h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        <?php echo __('sec_modal_check_data_desc'); ?>
                    </p>
                </div>
            </div>

            <!-- WhatsApp Alerta -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[#bb9b6b] font-bold">
                    3</div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">
                        <?php echo __('sec_modal_whatsapp'); ?>
                    </h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        <?php echo __('sec_modal_whatsapp_desc'); ?>
                    </p>
                </div>
            </div>

            <!-- Doubts -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[#bb9b6b] font-bold">
                    4</div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">
                        <?php echo __('sec_modal_questions'); ?>
                    </h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        <?php echo __('sec_modal_questions_desc'); ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="p-6 border-t border-slate-100 dark:border-slate-800 flex justify-end">
            <button id="confirm-security-modal"
                class="bg-[#bb9b6b] hover:bg-[#a68859] text-white px-8 py-3 rounded-lg font-bold transition-all shadow-lg active:scale-95">
                <?php echo __('sec_modal_close'); ?>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('security-modal');
        const backdrop = document.getElementById('security-modal-backdrop');
        const closeBtns = [
            document.getElementById('close-security-modal'),
            document.getElementById('confirm-security-modal'),
            backdrop
        ];

        const bannerBtns = document.querySelectorAll('.trigger-security-modal');

        const openModal = () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            // Reflow
            void modal.offsetWidth;
            modal.style.opacity = '1';
        };

        const closeModal = () => {
            modal.style.opacity = '0';
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }, 300);
        };

        bannerBtns.forEach(btn => btn.addEventListener('click', openModal));
        closeBtns.forEach(btn => btn ? btn.addEventListener('click', closeModal) : null);
    });
</script>