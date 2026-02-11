<?php
// Start session to persist language choice if needed, but URL is primary source of truth
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Determine Language
$lang = 'pt'; // Default
if (isset($_GET['lang']) && in_array($_GET['lang'], ['pt', 'en'])) {
    $lang = $_GET['lang'];
} elseif (isset($_SESSION['lang'])) {
    // Optional: could redirect to /en/ or /pt/ here if strict sticky session is desired
    // For now, we prefer URL-based for SEO
}

// Persist in session for non-rewritten links fallback
$_SESSION['lang'] = $lang;

// 2. Load Dictionary
$dictionaryPath = __DIR__ . "/../lang/{$lang}.php";
$dictionary = [];

if (file_exists($dictionaryPath)) {
    $dictionary = include $dictionaryPath;
}

// CONFIGURATION: Set this to your project folder name (e.g., '/funchal') or '' for root domain.
// Auto-detection attempts to find the folder automatically.
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$base_url = ($scriptDir === '/' || $scriptDir === '\\') ? '' : $scriptDir;
// Ensure no trailing slash
$base_url = rtrim($base_url, '/\\');

// 3. Helper Function
if (!function_exists('__')) {
    function __($key, $default = null)
    {
        global $dictionary;
        if (isset($dictionary[$key])) {
            return $dictionary[$key];
        }
        return ($default !== null) ? $default : $key;
    }
}

// 4. Helper for Links
if (!function_exists('url')) {
    function url($path = '', $forcedLang = null)
    {
        global $lang, $base_url;
        $targetLang = ($forcedLang !== null) ? $forcedLang : $lang;

        // Clean path (remove leading slash and .php extension)
        // If it's a full system path from $_SERVER['PHP_SELF'], we need just the filename
        $path = basename($path);
        $path = preg_replace('/\.php$/', '', $path);

        // Preserve IDs for dynamic pages (vaga, post)
        // Check if we are currently on a dynamic page and preserve the ID in the link
        if (($path === 'vaga' || $path === 'post') && isset($_GET['id'])) {
            $path = $path . "/" . $_GET['id'];
        }

        // Handle path-based IDs in input (if provided as "vaga?id=xxx")
        if (preg_match('/^(vaga|post)\.php\?id=([^&]+)/', $path, $matches)) {
            $path = $matches[1] . "/" . $matches[2];
        } elseif (preg_match('/^(vaga|post)\?id=([^&]+)/', $path, $matches)) {
            $path = $matches[1] . "/" . $matches[2];
        }

        // Handle empty path (root)
        if (empty($path) || $path === 'index') {
            $path = '';
        }

        // If target lang is default (pt), return normal root path
        if ($targetLang === 'pt') {
            return $base_url . "/" . $path;
        }

        // If target lang is english, prefix with /en/
        return $base_url . "/en/" . $path;
    }
}

// 5. Helper for Current Lang
if (!function_exists('current_lang')) {
    function current_lang()
    {
        global $lang;
        return $lang;
    }
}

// 6. Helper for Assets (Images, scripts, etc)
if (!function_exists('asset_url')) {
    function asset_url($path = '')
    {
        global $base_url;
        // If it's already a full URL, return as is
        if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) {
            return $path;
        }
        // Always return path relative to root, ignoring /en/
        $path = ltrim($path, '/');
        return $base_url . "/" . $path;
    }
}

