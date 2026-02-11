<?php
include 'includes/i18n.php';

// Load jobs data
if (file_exists('jobs.php')) {
    include 'jobs.php';
} else {
    $JOBS = [];
}

// Get Job ID
$jobId = isset($_GET['id']) ? $_GET['id'] : null;
$currentJob = null;

// Find Job
foreach ($JOBS as $job) {
    if ($job['id'] === $jobId) {
        $currentJob = $job;
        break;
    }
}

// Redirect if not found
if (!$currentJob) {
    header("Location: trabalhe-conosco.php");
    exit;
}

$pageTitle = $currentJob['title'] . ' - Funchal Pescados';
$pageDesc = $currentJob['summary'];
$currentPage = 'trabalhe-conosco';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
    <!-- Job Posting Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "JobPosting",
      "title": "<?php echo $currentJob['title']; ?>",
      "description": "<?php echo htmlspecialchars($currentJob['description']); ?>",
      "datePosted": "<?php echo $currentJob['posted_at']; ?>",
      "validThrough": "<?php echo date('Y-m-d', strtotime('+3 months', strtotime($currentJob['posted_at']))); ?>",
      "employmentType": "<?php echo ($currentJob['type'] === 'CLT') ? 'FULL_TIME' : 'CONTRACTOR'; ?>",
      "hiringOrganization": {
        "@type": "Organization",
        "name": "Funchal Pescados",
        "sameAs": "https://funchalpescados.com.br",
        "logo": "https://funchalpescados.com.br/wp-content/uploads/2023/06/funchal-distribuidora-pescados-sp.png"
      },
      "jobLocation": {
        "@type": "Place",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "São Paulo",
          "addressRegion": "SP",
          "addressCountry": "BR"
        }
      }
    }
    </script>
</head>

<body class="font-sans antialiased text-slate-900 bg-slate-50">

    <?php include 'includes/navbar.php'; ?>

    <!-- Header Section -->
    <section class="relative bg-slate-900 text-white pt-32 pb-16 md:pt-40 md:pb-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-20"
            style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <div class="container mx-auto px-4 md:px-8 relative z-10">
            <a href="<?php echo url('trabalhe-conosco.php'); ?>"
                class="inline-flex items-center gap-2 text-[#bb9b6b] hover:text-white mb-6 transition-colors text-sm font-bold uppercase tracking-wider">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> <?php echo __('job_back'); ?>
            </a>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span
                        class="inline-block px-3 py-1 bg-[#bb9b6b]/20 text-[#bb9b6b] border border-[#bb9b6b]/30 text-xs font-bold uppercase tracking-wider rounded-full mb-4">
                        <?php echo $currentJob['department']; ?>
                    </span>
                    <h1 class="text-3xl md:text-5xl font-serif font-bold mb-4">
                        <?php echo $currentJob['title']; ?>
                    </h1>
                    <div class="flex flex-wrap gap-4 text-slate-400 text-sm">
                        <span class="flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#bb9b6b]"></i>
                            <?php echo $currentJob['location']; ?>
                        </span>
                        <span class="flex items-center gap-2">
                            <i data-lucide="briefcase" class="w-4 h-4 text-[#bb9b6b]"></i>
                            <?php echo $currentJob['type']; ?>
                        </span>
                        <span class="flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4 text-[#bb9b6b]"></i>
                            <?php echo __('job_published'); ?>
                            <?php echo date('d/m/Y', strtotime($currentJob['posted_at'])); ?>
                        </span>
                    </div>
                </div>

                <a href="#candidatar"
                    class="bg-[#bb9b6b] hover:bg-[#a68859] text-white px-8 py-4 rounded-sm font-bold transition-all shadow-lg flex items-center gap-2 whitespace-nowrap">
                    <?php echo __('job_apply_now'); ?>
                    <i data-lucide="arrow-down" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 md:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Main Content -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl p-8 md:p-12 shadow-sm border border-slate-100 mb-8">
                    <h2 class="text-2xl font-serif font-bold text-slate-900 mb-6"><?php echo __('job_about'); ?></h2>
                    <p class="text-slate-600 leading-relaxed mb-8 text-lg">
                        <?php echo $currentJob['description']; ?>
                    </p>

                    <h3 class="text-xl font-serif font-bold text-slate-900 mb-4 mt-8"><?php echo __('job_reqs'); ?></h3>
                    <ul class="space-y-3 mb-8">
                        <?php foreach ($currentJob['requirements'] as $req): ?>
                            <li class="flex items-start gap-3 text-slate-600">
                                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#bb9b6b] mt-0.5 flex-shrink-0"></i>
                                <span>
                                    <?php echo $req; ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <h3 class="text-xl font-serif font-bold text-slate-900 mb-4 mt-8"><?php echo __('job_benefits'); ?>
                    </h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($currentJob['benefits'] as $benefit): ?>
                            <li
                                class="flex items-center gap-3 p-4 bg-slate-50 rounded-lg border border-slate-100 text-slate-700">
                                <i data-lucide="gift" class="w-5 h-5 text-[#bb9b6b]"></i>
                                <span class="font-medium">
                                    <?php echo $benefit; ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Application Form -->
                <div id="candidatar"
                    class="bg-slate-800 rounded-xl p-8 md:p-12 text-white relative overflow-hidden shadow-2xl">
                    <!-- Background Pattern -->
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-[#bb9b6b] rounded-full blur-[100px] opacity-10 translate-x-1/3 -translate-y-1/3">
                    </div>

                    <div class="relative z-10">
                        <div class="mb-8">
                            <h2 class="text-2xl md:text-3xl font-serif font-bold mb-4 text-white">
                                <?php echo __('job_form_title'); ?></h2>
                            <p class="text-slate-300">
                                <?php echo __('job_form_desc'); ?>
                            </p>
                        </div>

                        <form
                            onsubmit="event.preventDefault(); alert('Obrigado! Sua candidatura foi enviada com sucesso. Em breve entraremos em contato.');"
                            class="space-y-6">

                            <!-- Personal Info -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-2">Nome Completo *</label>
                                    <input type="text" required
                                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none focus:ring-1 focus:ring-[#bb9b6b] transition-colors placeholder-slate-600"
                                        placeholder="Seu nome">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-2">Telefone / WhatsApp
                                        *</label>
                                    <input type="tel" required
                                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none focus:ring-1 focus:ring-[#bb9b6b] transition-colors placeholder-slate-600"
                                        placeholder="(11) 99999-9999">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-2">E-mail *</label>
                                    <input type="email" required
                                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none focus:ring-1 focus:ring-[#bb9b6b] transition-colors placeholder-slate-600"
                                        placeholder="seu@email.com">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-2">LinkedIn
                                        (Opcional)</label>
                                    <input type="url"
                                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none focus:ring-1 focus:ring-[#bb9b6b] transition-colors placeholder-slate-600"
                                        placeholder="https://linkedin.com/in/voce">
                                </div>
                            </div>

                            <!-- Upload -->
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Currículo (PDF ou DOCX)
                                    *</label>
                                <div class="relative">
                                    <input type="file" required accept=".pdf,.doc,.docx"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                                    <div
                                        class="w-full bg-slate-900 border border-dashed border-slate-600 rounded-lg px-4 py-8 text-center hover:border-[#bb9b6b] transition-colors group">
                                        <i data-lucide="upload-cloud"
                                            class="w-8 h-8 text-slate-500 mx-auto mb-2 group-hover:text-[#bb9b6b] transition-colors"></i>
                                        <p class="text-sm text-slate-400 group-hover:text-slate-300">
                                            <span class="text-[#bb9b6b] font-bold">Clique para upload</span> ou arraste
                                            seu arquivo
                                        </p>
                                        <p class="text-xs text-slate-600 mt-1">Máximo 5MB</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Carta de Apresentação
                                    (Opcional)</label>
                                <textarea rows="4"
                                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-[#bb9b6b] focus:outline-none focus:ring-1 focus:ring-[#bb9b6b] transition-colors placeholder-slate-600"
                                    placeholder="Conte brevemente por que você é ideal para esta vaga..."></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#bb9b6b] hover:bg-[#a68859] text-white font-bold py-4 px-8 rounded-lg shadow-lg flex items-center justify-center gap-2 transition-all transform hover:-translate-y-1">
                                <?php echo __('job_form_send'); ?>
                                <i data-lucide="send" class="w-5 h-5"></i>
                            </button>

                            <p class="text-center text-xs text-slate-500 mt-4">
                                <i data-lucide="lock" class="w-3 h-3 inline mr-1"></i> Seus dados estão seguros e serão
                                utilizados apenas para este processo seletivo.
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-8 sticky top-32">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6 pb-4 border-b border-slate-100">
                        <?php echo __('job_summary_title'); ?>
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <span
                                class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1"><?php echo __('job_summary_workload'); ?></span>
                            <span class="text-slate-800 font-medium flex items-center gap-2">
                                <i data-lucide="calendar-clock" class="w-4 h-4 text-[#bb9b6b]"></i>
                                <?php echo $currentJob['workload']; ?>
                            </span>
                        </div>

                        <div>
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Modelo de
                                Trabalho</span>
                            <span class="text-slate-800 font-medium flex items-center gap-2">
                                <i data-lucide="building-2" class="w-4 h-4 text-[#bb9b6b]"></i>
                                Presencial
                            </span>
                        </div>

                        <div>
                            <span
                                class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Localização</span>
                            <span class="text-slate-800 font-medium flex items-center gap-2">
                                <i data-lucide="map" class="w-4 h-4 text-[#bb9b6b]"></i>
                                <?php echo $currentJob['location']; ?>
                            </span>
                        </div>

                        <div class="pt-6 border-t border-slate-100">
                            <span
                                class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Compartilhar
                                Vaga</span>
                            <div class="flex gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-slate-100 hover:bg-[#bb9b6b] hover:text-white flex items-center justify-center transition-colors text-slate-600">
                                    <i data-lucide="linkedin" class="w-4 h-4"></i>
                                </button>
                                <button
                                    class="w-10 h-10 rounded-full bg-slate-100 hover:bg-[#25D366] hover:text-white flex items-center justify-center transition-colors text-slate-600">
                                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                                </button>
                                <button
                                    class="w-10 h-10 rounded-full bg-slate-100 hover:bg-black hover:text-white flex items-center justify-center transition-colors text-slate-600">
                                    <i data-lucide="link" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>