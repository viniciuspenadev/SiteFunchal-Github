<?php
// Router for blog posts based on current language
global $lang;

$current_lang = (isset($lang) && $lang === 'en') ? 'en' : 'pt';
$file = dirname(__FILE__) . "/posts_" . $current_lang . ".php";

if (file_exists($file)) {
    include($file);
} else {
    // Fallback to PT if specific language file doesn't exist
    include(dirname(__FILE__) . "/posts_pt.php");
}
?>