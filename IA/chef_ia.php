<?php
include 'includes/i18n.php';
$pageTitle = __('chef_page_title');
$pageDesc = __('chef_page_desc');
$currentPage = 'chef';
?>
<!DOCTYPE html>
<html lang="<?php echo current_lang(); ?>" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
    <!-- Markdown Parser for AI responses -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        .typing-dot {
            animation: typing 1.4s infinite ease-in-out both;
        }

        .typing-dot:nth-child(1) {
            animation-delay: -0.32s;
        }

        .typing-dot:nth-child(2) {
            animation-delay: -0.16s;
        }

        @keyframes typing {

            0%,
            80%,
            100% {
                transform: scale(0);
            }

            40% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="font-sans antialiased text-white bg-slate-900 h-screen flex flex-col overflow-hidden">

    <!-- Navbar removed for isolated module -->
    <header class="absolute top-0 left-0 w-full z-50 p-6">
        <div class="container mx-auto">
            <a href="#" class="text-white font-serif text-xl font-bold tracking-wider">
                FUNCHAL <span class="text-[#bb9b6b]">.</span>
            </a>
        </div>
    </header>

    <main class="flex-grow flex flex-col relative z-20 pt-24 overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-800/80 backdrop-blur border-b border-slate-700 p-4 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-[#bb9b6b]/10 text-[#bb9b6b] text-xs font-bold tracking-widest uppercase mb-1 border border-[#bb9b6b]/20">
                <?php echo __('chef_badge'); ?>
            </span>
            <h1 class="text-xl md:text-2xl font-serif font-bold text-white">
                <?php echo __('chef_title'); ?>
            </h1>
            <p class="text-slate-400 text-xs md:text-sm max-w-lg mx-auto mb-4">
                <?php echo __('chef_subtitle'); ?>
            </p>
            <div class="flex justify-center gap-2">
                <button type="button" id="clear-btn"
                    class="text-xs px-3 py-1.5 rounded-full border border-slate-600 text-slate-400 hover:text-white hover:bg-slate-700 transition-colors flex items-center gap-1">
                    <i data-lucide="trash-2" class="w-3 h-3"></i> Topo
                </button>
            </div>
        </div>

        <!-- Chat Area -->
        <div id="chat-container"
            class="flex-grow min-h-0 overflow-y-auto p-4 space-y-4 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-transparent">
            <!-- Initial Greeting -->
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-[#bb9b6b] flex items-center justify-center flex-shrink-0 shadow-lg">
                    <i data-lucide="chef-hat" class="w-5 h-5 text-white"></i>
                </div>
                <div class="bg-slate-800 rounded-2xl rounded-tl-none p-4 max-w-[85%] border border-slate-700 shadow-md">
                    <p class="text-slate-200 text-sm md:text-base">
                        <?php echo __('chef_greeting'); ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="bg-slate-800 border-t border-slate-700 p-4 pb-8 md:pb-4">
            <form id="chat-form" class="max-w-3xl mx-auto relative flex items-end gap-2">
                <div class="relative flex-grow">
                    <textarea id="user-input" rows="1" placeholder="<?php echo __('chef_placeholder'); ?>"
                        class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none transition-colors resize-none pr-12 scrollbar-hide"
                        oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"
                        style="max-height: 120px;"></textarea>

                    <button type="submit" id="send-btn"
                        class="absolute right-2 bottom-2 bg-[#bb9b6b] hover:bg-[#a68859] text-white p-2 rounded-lg transition-transform hover:scale-105 disabled:opacity-50 disabled:hover:scale-100">
                        <i data-lucide="send" class="w-5 h-5"></i>
                    </button>
                </div>
            </form>
            <p class="text-center text-slate-500 text-[10px] mt-2">
                Ai Chef pode cometer erros. Considere verificar informações importantes.
            </p>
        </div>
    </main>

    <!-- Template for User Message -->
    <template id="user-msg-template">
        <div class="flex items-start gap-3 justify-end animate-fade-in-up">
            <div class="bg-[#bb9b6b] text-white rounded-2xl rounded-tr-none p-3 max-w-[85%] shadow-md">
                <p class="text-sm md:text-base message-content"></p>
            </div>
        </div>
    </template>

    <!-- Template for AI Message -->
    <template id="ai-msg-template">
        <div class="flex items-start gap-3 animate-fade-in-up group ai-message-container">
            <div class="w-8 h-8 rounded-full bg-[#bb9b6b] flex items-center justify-center flex-shrink-0 shadow-lg">
                <i data-lucide="chef-hat" class="w-5 h-5 text-white"></i>
            </div>
            <div class="flex flex-col gap-2 max-w-[85%]">
                <div class="bg-slate-800 rounded-2xl rounded-tl-none p-4 border border-slate-700 shadow-md">
                    <div
                        class="text-slate-200 text-sm md:text-base prose prose-invert prose-p:my-1 prose-headings:my-2 prose-ul:my-1 max-w-none message-content">
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Template for System CTA -->
    <template id="system-cta-template">
        <div class="flex flex-col items-center gap-2 my-4 animate-fade-in-up system-cta-message">
            <div
                class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 text-center w-full max-w-[85%] shadow-sm">
                <p class="text-slate-400 text-xs mb-3">
                    Gostou desta sugestão? 👩‍🍳<br>
                    Salve agora em <strong>PDF oficial</strong> para não perder os ingredientes!
                </p>
                <button
                    class="cta-pdf-btn bg-[#bb9b6b] hover:bg-[#a68859] text-white font-medium py-2 px-6 rounded-full flex items-center justify-center gap-2 mx-auto transition-transform hover:scale-105 shadow-lg w-full md:w-auto text-sm">
                    <i data-lucide="file-down" class="w-5 h-5"></i>
                    Baixar Receita
                </button>
            </div>
        </div>
    </template>

    <!-- Loading Indicator -->
    <template id="loading-template">
        <div class="flex items-start gap-3 animate-pulse" id="loading-indicator">
            <div class="w-8 h-8 rounded-full bg-[#bb9b6b] flex items-center justify-center flex-shrink-0 opacity-50">
                <i data-lucide="chef-hat" class="w-5 h-5 text-white"></i>
            </div>
            <div class="bg-slate-800 rounded-2xl rounded-tl-none p-4 border border-slate-700">
                <div class="flex space-x-1">
                    <div class="w-2 h-2 bg-slate-400 rounded-full typing-dot"></div>
                    <div class="w-2 h-2 bg-slate-400 rounded-full typing-dot"></div>
                    <div class="w-2 h-2 bg-slate-400 rounded-full typing-dot"></div>
                </div>
            </div>
        </div>
    </template>

    <script>
        // Init Lucide Icons
        lucide.createIcons();

        const chatContainer = document.getElementById('chat-container');
        const chatForm = document.getElementById('chat-form');
        const userInput = document.getElementById('user-input');
        const sendBtn = document.getElementById('send-btn');
        const clearBtn = document.getElementById('clear-btn');
        const currentLang = '<?php echo current_lang(); ?>';
        const STORAGE_KEY = 'funchal_chef_history_' + currentLang;

        // --- Persistence Logic ---
        function saveHistory() {
            localStorage.setItem(STORAGE_KEY, chatContainer.innerHTML);
        }

        function loadHistory() {
            const saved = localStorage.getItem(STORAGE_KEY);
            if (saved) {
                chatContainer.innerHTML = saved;
                scrollToBottom();
                lucide.createIcons();
                // Re-bind CTA buttons
                document.querySelectorAll('.cta-pdf-btn').forEach(btn => {
                    btn.onclick = (e) => {
                        const ctaContainer = e.target.closest('.system-cta-message');
                        const recipeContainer = ctaContainer.previousElementSibling; // The AI message is above the CTA
                        if (recipeContainer) {
                            const content = recipeContainer.querySelector('.message-content');
                            if (content) generatePDF(content);
                        }
                    };
                });
            }
        }

        // Load on startup
        loadHistory();

        // Clear History
        clearBtn.addEventListener('click', () => {
            if (confirm('Limpar histórico da conversa?')) {
                localStorage.removeItem(STORAGE_KEY);
                location.reload();
            }
        });

        // (Removed global downloadBtn listener as it was removed from DOM)

        // --- PDF Logic ---
        window.generatePDF = function (sourceElement) {
            // If no source provided, use whole container
            const contentSource = sourceElement || chatContainer;

            // Clone to avoid messing with UI
            const clone = contentSource.cloneNode(true);

            // Create container
            const element = document.createElement('div');

            // We use a clean structure and Force CSS overrides
            element.innerHTML = `
                <div style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background: #fff; width: 100%;">
                    
                    <!-- Forced CSS for PDF generation -->
                    <style>
                        .pdf-reset, .pdf-reset * {
                            color: #000000 !important;
                            text-shadow: none !important;
                            background-color: transparent !important;
                            border-color: #000000 !important;
                        }
                        .pdf-reset strong { font-weight: bold !important; }
                        .pdf-reset ul { margin-left: 20px !important; list-style-type: disc !important; }
                        .pdf-reset li { margin-bottom: 5px !important; }
                        .pdf-reset h1, .pdf-reset h2, .pdf-reset h3 { margin-top: 15px !important; margin-bottom: 10px !important; }
                    </style>

                    <!-- Header (Dark Menu Style) -->
                    <div style="background-color: #0f172a; padding: 40px 20px; text-align: center; border-bottom: 4px solid #bb9b6b;">
                        <img src="assets/img/logo.png" 
                             style="height: 60px; margin-bottom: 15px; display: block; margin-left: auto; margin-right: auto;">
                        <h1 style="font-size: 24px; font-weight: bold; color: #ffffff; margin: 0; text-transform: uppercase; letter-spacing: 2px;">Chef Funchal</h1>
                        <p style="font-size: 12px; color: #bb9b6b; margin-top: 5px;">Recomendação Personalizada</p>
                    </div>

                    <!-- Content with Reset Class -->
                    <div class="pdf-reset" style="padding: 40px; font-size: 14px; line-height: 1.6; color: #000;">
                        ${clone.innerHTML}
                    </div>

                    <!-- Footer -->
                    <div style="padding: 20px 40px; margin-top: 20px; text-align: center; font-size: 10px; color: #999; border-top: 1px solid #eee;">
                        <p>Funchal Pescados - Distribuidora de Frutos do Mar Premium</p>
                        <p>www.funchalpescados.com.br</p>
                    </div>
                </div>
            `;

            // Clean up: Remove any inline download buttons from the PDF output
            const buttons = element.querySelectorAll('.inline-pdf-btn');
            buttons.forEach(btn => btn.remove());

            const opt = {
                margin: 10,
                filename: 'Receita-Funchal-' + Date.now() + '.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2, useCORS: true, logging: true }, // enabled CORS for logo
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save();
        };



        // --- Chat Logic ---

        function scrollToBottom() {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function appendUserMessage(text) {
            const template = document.getElementById('user-msg-template');
            const clone = template.content.cloneNode(true);
            clone.querySelector('.message-content').textContent = text;
            chatContainer.appendChild(clone);
            scrollToBottom();
            saveHistory();
        }

        function showLoading() {
            const template = document.getElementById('loading-template');
            const clone = template.content.cloneNode(true);
            chatContainer.appendChild(clone);
            scrollToBottom();
        }

        function removeLoading() {
            const loader = document.getElementById('loading-indicator');
            if (loader) loader.remove();
        }

        function appendAIMessage(markdownText) {
            removeLoading();
            const template = document.getElementById('ai-msg-template');
            const clone = template.content.cloneNode(true);

            // Render Markdown
            const contentDiv = clone.querySelector('.message-content');
            contentDiv.innerHTML = marked.parse(markdownText);

            chatContainer.appendChild(clone);

            // Append CTA System Message
            appendSystemCTA(contentDiv);

            scrollToBottom();
            saveHistory();
        }

        function appendSystemCTA(targetContentDiv) {
            const template = document.getElementById('system-cta-template');
            const clone = template.content.cloneNode(true);
            const btn = clone.querySelector('.cta-pdf-btn');

            btn.onclick = () => generatePDF(targetContentDiv);

            chatContainer.appendChild(clone);
        }

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = userInput.value.trim();
            if (!message) return;

            // UI Updates
            userInput.value = '';
            userInput.style.height = 'auto'; // Reset height
            appendUserMessage(message);
            showLoading();
            sendBtn.disabled = true;

            try {
                const response = await fetch('includes/chat_api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: message, lang: currentLang })
                });

                const data = await response.json();

                if (data.reply) {
                    appendAIMessage(data.reply);
                } else if (data.error) {
                    appendAIMessage('_Erro no sistema: ' + data.error + '_');
                }
            } catch (err) {
                appendAIMessage('_Erro de conexão. Tente novamente._');
                console.error(err);
            } finally {
                sendBtn.disabled = false;
            }
        });

        // Submit on Enter (without shift)
        userInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>

</html>