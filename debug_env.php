<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
echo "=== DEBUG .env Loading ===\n\n";

$envPath = __DIR__ . '/.env';
echo "1. .env path: $envPath\n";
echo "2. File exists: " . (file_exists($envPath) ? 'YES' : 'NO') . "\n\n";

if (file_exists($envPath)) {
    echo "3. Raw file content:\n";
    $content = file_get_contents($envPath);
    echo "---START---\n";
    echo htmlspecialchars($content);
    echo "\n---END---\n";
    echo "Length: " . strlen($content) . " bytes\n\n";

    echo "4. Hex dump of first 100 bytes:\n";
    echo bin2hex(substr($content, 0, 100)) . "\n\n";

    echo "5. Parsing lines:\n";
    $lines = preg_split('/\r\n|\r|\n/', $content);
    echo "Total lines: " . count($lines) . "\n";
    foreach ($lines as $i => $line) {
        $trimmed = trim($line);
        echo "   Line $i: [" . htmlspecialchars($line) . "] (length: " . strlen($line) . ", trimmed: " . strlen($trimmed) . ")\n";

        if (!empty($trimmed) && strpos($trimmed, '=') !== false) {
            list($key, $value) = explode('=', $trimmed, 2);
            $key = trim($key);
            $value = trim($value);
            echo "      -> Found KEY='$key', VALUE='$value'\n";

            // Try to set it
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
            putenv("$key=$value");

            // Verify
            echo "      -> getenv('$key') = '" . getenv($key) . "'\n";
            echo "      -> \$_ENV['$key'] = '" . ($_ENV[$key] ?? 'NOT SET') . "'\n";
        }
    }
}

echo "\n6. Final check:\n";
echo "   GEMINI_API_KEY via getenv(): '" . getenv('GEMINI_API_KEY') . "'\n";
echo "   GEMINI_API_KEY in \$_ENV: " . (isset($_ENV['GEMINI_API_KEY']) ? $_ENV['GEMINI_API_KEY'] : 'NOT SET') . "\n";

echo "\n=== END DEBUG ===\n";
echo "</pre>";
