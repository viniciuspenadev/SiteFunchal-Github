<?php
header("Content-Type: application/xml; charset=utf-8");

// Detect Base URL
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$basePath = ($scriptDir === '/' || $scriptDir === '\\') ? '' : $scriptDir;
$basePath = rtrim($basePath, '/\\');
$baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $basePath . "/";

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <?php
    $pages = [
        ['path' => '', 'priority' => '1.0', 'freq' => 'daily'],
        ['path' => 'produtos', 'priority' => '0.9', 'freq' => 'weekly'],
        ['path' => 'blog', 'priority' => '0.8', 'freq' => 'daily'],
        ['path' => 'trabalhe-conosco', 'priority' => '0.7', 'freq' => 'weekly'],
        ['path' => 'contato', 'priority' => '0.6', 'freq' => 'monthly'],
    ];

    foreach ($pages as $p) {
        $pt_url = $baseUrl . $p['path'];
        $en_url = $baseUrl . 'en/' . $p['path'];

        // PT Version
        echo "  <url>\n";
        echo "    <loc>{$pt_url}</loc>\n";
        echo "    <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"{$en_url}\"/>\n";
        echo "    <xhtml:link rel=\"alternate\" hreflang=\"pt-br\" href=\"{$pt_url}\"/>\n";
        echo "    <changefreq>{$p['freq']}</changefreq>\n";
        echo "    <priority>{$p['priority']}</priority>\n";
        echo "  </url>\n";

        // EN Version
        echo "  <url>\n";
        echo "    <loc>{$en_url}</loc>\n";
        echo "    <xhtml:link rel=\"alternate\" hreflang=\"pt-br\" href=\"{$pt_url}\"/>\n";
        echo "    <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"{$en_url}\"/>\n";
        echo "    <changefreq>{$p['freq']}</changefreq>\n";
        echo "    <priority>" . ($p['priority'] - 0.1) . "</priority>\n";
        echo "  </url>\n";
    }

    // Dynamic Jobs (Vagas)
    if (file_exists('jobs.php')) {
        include 'jobs.php';
        foreach ($JOBS as $job) {
            $pt_url = $baseUrl . "vaga/" . $job['id'];
            $en_url = $baseUrl . "en/vaga/" . $job['id'];
            $date = date('Y-m-d', strtotime($job['posted_at']));

            echo "  <url>\n";
            echo "    <loc>{$pt_url}</loc>\n";
            echo "    <lastmod>{$date}</lastmod>\n";
            echo "    <priority>0.7</priority>\n";
            echo "  </url>\n";

            echo "  <url>\n";
            echo "    <loc>{$en_url}</loc>\n";
            echo "    <lastmod>{$date}</lastmod>\n";
            echo "    <priority>0.6</priority>\n";
            echo "  </url>\n";
        }
    }

    // Dynamic Blog Posts
    if (file_exists('data/posts_pt.php')) {
        include 'data/posts_pt.php'; // Force PT to get slugs
        foreach ($BLOG_POSTS as $post) {
            $pt_url = $baseUrl . "post/" . $post['slug'];
            $en_url = $baseUrl . "en/post/" . $post['slug'];
            $date = date('Y-m-d', strtotime($post['date']));

            echo "  <url>\n";
            echo "    <loc>{$pt_url}</loc>\n";
            echo "    <lastmod>{$date}</lastmod>\n";
            echo "    <priority>0.7</priority>\n";
            echo "  </url>\n";

            echo "  <url>\n";
            echo "    <loc>{$en_url}</loc>\n";
            echo "    <lastmod>{$date}</lastmod>\n";
            echo "    <priority>0.6</priority>\n";
            echo "  </url>\n";
        }
    }
    ?>
</urlset>