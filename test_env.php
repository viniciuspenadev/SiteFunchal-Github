<?php
// Test script to verify .env loading
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== Testing .env Configuration ===\n\n";

// Load the environment
require_once __DIR__ . '/includes/load_env.php';

echo "1. Environment file path: " . __DIR__ . "/.env\n";
echo "2. File exists: " . (file_exists(__DIR__ . '/.env') ? 'YES' : 'NO') . "\n\n";

echo "3. Reading GEMINI_API_KEY from getenv():\n";
$apiKey = getenv('GEMINI_API_KEY');
if ($apiKey) {
    echo "   ✓ Found: " . substr($apiKey, 0, 10) . "..." . substr($apiKey, -5) . "\n";
    echo "   Length: " . strlen($apiKey) . " characters\n";
} else {
    echo "   ✗ NOT FOUND or EMPTY\n";
}

echo "\n4. Reading from config.php:\n";
$config = require __DIR__ . '/includes/config.php';
if (!empty($config['gemini_api_key'])) {
    echo "   ✓ API Key loaded: " . substr($config['gemini_api_key'], 0, 10) . "..." . substr($config['gemini_api_key'], -5) . "\n";
} else {
    echo "   ✗ API Key is EMPTY in config\n";
}

echo "\n5. Checking $_ENV variable:\n";
echo "   GEMINI_API_KEY in \$_ENV: " . (isset($_ENV['GEMINI_API_KEY']) ? 'YES' : 'NO') . "\n";

echo "\n=== Test Complete ===\n";
