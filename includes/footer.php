<footer id="footer" class="bg-slate-950 text-white pt-16 pb-8 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <img src="https://funchalpescados.com.br/wp-content/uploads/2023/06/funchal-distribuidora-pescados-sp.png"
                        alt="Funchal Pescados" class="h-12 w-auto"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <span
                        class="hidden text-xl font-serif font-bold text-white tracking-widest border border-[#bb9b6b] px-2 py-1">FUNCHAL</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    <?php echo __('footer_desc'); ?>
                </p>
            </div>
            <!-- Navigation -->
            <div>
                <h4 class="text-lg font-bold font-serif mb-6"><?php echo __('footer_nav_title'); ?></h4>
                <ul class="space-y-3 text-slate-400 text-sm">
                    <li><a href="<?php echo url('index.php'); ?>"
                            class="hover:text-[#bb9b6b] transition-colors"><?php echo __('nav_home'); ?></a></li>
                    <li><a href="<?php echo url('produtos.php'); ?>"
                            class="hover:text-[#bb9b6b] transition-colors"><?php echo __('nav_products'); ?></a></li>
                    <li><a href="#" class="hover:text-[#bb9b6b] transition-colors"><?php echo __('nav_about'); ?></a>
                    </li>
                    <li><a href="#" class="hover:text-[#bb9b6b] transition-colors"><?php echo __('nav_contact'); ?></a>
                    </li>
                </ul>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="text-lg font-bold font-serif mb-6"><?php echo __('footer_contact_title'); ?></h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-[#bb9b6b] shrink-0"></i>
                        <span>Tatuapé, São Paulo - SP</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="mail" class="w-5 h-5 text-[#bb9b6b] shrink-0"></i>
                        <span>contato@funchalpescados.com.br</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="phone" class="w-5 h-5 text-[#bb9b6b] shrink-0"></i>
                        <span>(11) 2090-6100</span>
                    </li>
                </ul>
            </div>
            <!-- Newsletter -->
            <div>
                <h4 class="text-lg font-bold font-serif mb-6"><?php echo __('footer_news_title'); ?></h4>
                <form class="flex flex-col gap-2" onsubmit="event.preventDefault(); alert('Inscrito!');">
                    <input type="email" placeholder="<?php echo __('footer_news_placeholder'); ?>"
                        class="bg-slate-900 border border-slate-800 rounded px-4 py-2 text-sm text-white focus:border-[#bb9b6b] outline-none">
                    <button
                        class="bg-[#bb9b6b] text-white font-bold text-sm py-2 rounded hover:bg-[#a68859]"><?php echo __('footer_news_btn'); ?></button>
                </form>
            </div>
        </div>
        <div class="border-t border-slate-900 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 text-xs"><?php echo __('footer_rights'); ?></p>
            <div class="flex gap-4">
                <a href="#" class="text-slate-500 hover:text-[#bb9b6b] transition-colors"><i data-lucide="instagram"
                        class="w-5 h-5"></i></a>
                <a href="#" class="text-slate-500 hover:text-[#bb9b6b] transition-colors"><i data-lucide="facebook"
                        class="w-5 h-5"></i></a>
            </div>
        </div>
    </div>
</footer>
<script>
    lucide.createIcons();
</script>