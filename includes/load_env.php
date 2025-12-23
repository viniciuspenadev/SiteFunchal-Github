<?php
/**
 * Simple .env file loader
 * Loads environment variables from .env file into PHP's getenv()
 */

function loadEnv($path)
{
    if (!file_exists($path)) {
        return false;
    }

    $content = file_get_contents($path);
    if ($content === false) {
        return false;
    }

    // Split by newlines (handle both Unix and Windows line endings)
    $lines = preg_split('/\r\n|\r|\n/', $content);

    foreach ($lines as $line) {
        $line = trim($line);

        // Skip empty lines and comments
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }

        // Parse KEY=VALUE
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            // Remove quotes if present
            $value = trim($value, '"\'');

            // Set environment variable (order matters on Windows!)
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
            putenv("$key=$value");
        }
    }

    return true;
}

// Load .env from project root
$envPath = __DIR__ . '/../.env';
loadEnv($envPath);
