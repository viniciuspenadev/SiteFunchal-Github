<?php
include 'includes/i18n.php';
// Load jobs data from root
if (file_exists('jobs.php')) {
    include 'jobs.php';
} else {
    $JOBS = [];
}

$pageTitle = 'Trabalhe Conosco - Funchal Pescados';
$pageDesc = 'Faça parte da equipe Funchal Pescados. Confira nossas vagas abertas e venha crescer conosco.';
$currentPage = 'trabalhe-conosco';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <?php include 'includes/seo.php'; ?>
</head>

<body class="font-sans antialiased text-slate-900 bg-slate-50">

    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative bg-slate-900 text-white py-24 md:py-32 overflow-hidden">
        <!-- Background Pattern/Image -->
        <div class="absolute inset-0 opacity-20"
            style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-[#bb9b6b] rounded-full blur-[100px] opacity-20 translate-x-1/2 -translate-y-1/2">
        </div>

        <div class="container mx-auto px-4 md:px-8 relative z-10 text-center">
            <span class="text-[#bb9b6b] font-bold tracking-wider text-sm uppercase mb-4 block">
                <?php echo __('careers_tag'); ?>
            </span>
            <h1 class="text-4xl md:text-6xl font-serif font-bold mb-6"><?php echo __('careers_title'); ?></h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                <?php echo __('careers_desc'); ?>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-4 md:px-8 py-16 md:py-24">

        <!-- Intro Text -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-slate-900 mb-4">
                <?php echo __('careers_vagas_title'); ?></h2>
            <div class="w-24 h-1 bg-[#bb9b6b] mx-auto mb-6 rounded-full"></div>
            <p class="text-slate-600 text-lg">
                <?php echo __('careers_vagas_desc'); ?>
            </p>
        </div>

        <!-- Jobs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <?php if (!empty($JOBS)): ?>
                <?php foreach ($JOBS as $job): ?>
                    <a href="<?php echo url('vaga.php?id=' . $job['id']); ?>" class="group">
                        <div
                            class="bg-white rounded-xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl hover:border-[#bb9b6b] transition-all duration-300 h-full flex flex-col hover:-translate-y-1">

                            <div class="flex items-start justify-between mb-6">
                                <div
                                    class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold uppercase tracking-wider rounded-full group-hover:bg-[#bb9b6b] group-hover:text-white transition-colors">
                                    <?php echo $job['department']; ?>
                                </div>
                                <span class="text-slate-400 text-xs font-medium flex items-center gap-1">
                                    <i data-lucide="clock" class="w-3 h-3"></i>
                                    <?php echo date('d/m/Y', strtotime($job['posted_at'])); ?>
                                </span>
                            </div>

                            <h3
                                class="text-xl font-serif font-bold text-slate-900 mb-3 group-hover:text-[#bb9b6b] transition-colors">
                                <?php echo $job['title']; ?>
                            </h3>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500 bg-slate-50 px-2 py-1 rounded-md">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i> <?php echo $job['location']; ?>
                                </span>
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500 bg-slate-50 px-2 py-1 rounded-md">
                                    <i data-lucide="briefcase" class="w-3 h-3"></i> <?php echo $job['type']; ?>
                                </span>
                            </div>

                            <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                                <?php echo $job['summary']; ?>
                            </p>

                            <div
                                class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between text-sm font-bold text-[#bb9b6b]">
                                <?php echo __('prod_view_details'); ?>
                                <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-slate-500 italic"><?php echo __('careers_no_vagas'); ?></p>
                </div>
            <?php endif; ?>

            <!-- General Application Card -->
            <div
                class="bg-slate-900 rounded-xl p-8 shadow-xl text-white flex flex-col justify-between overflow-hidden relative group border border-slate-800 hover:border-[#bb9b6b] transition-colors">
                <div
                    class="absolute top-0 right-0 w-40 h-40 bg-[#bb9b6b] rounded-full blur-[50px] translate-x-1/2 -translate-y-1/2 opacity-20">
                </div>

                <div>
                    <div
                        class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center mb-6 backdrop-blur-sm text-[#bb9b6b]">
                        <i data-lucide="mail-plus" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-serif font-bold mb-3"><?php echo __('careers_talent_bank'); ?></h3>
                    <p class="text-slate-300 text-sm mb-6 leading-relaxed">
                        <?php echo __('careers_talent_bank_desc'); ?>
                    </p>
                </div>

                <a href="mailto:rh@funchalpescados.com.br"
                    class="inline-flex items-center gap-2 text-sm font-bold text-[#bb9b6b] hover:text-white transition-colors">
                    <?php echo __('careers_send_cv'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

        <div class="mt-20 text-center">
            <p class="text-slate-500 text-sm">
                <?php echo __('careers_questions'); ?> <a href="mailto:rh@funchalpescados.com.br"
                    class="text-[#bb9b6b] font-bold hover:underline">rh@funchalpescados.com.br</a>
            </p>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>