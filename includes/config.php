<?php
// Secure Configuration File
// This file should be protected by .htaccess

// Load environment variables from .env if it exists (for local development)
require_once __DIR__ . '/load_env.php';

return [
    // Google Gemini API Key
    // In production: Set GEMINI_API_KEY environment variable
    // For local development: Create .env file from .env.example
    'gemini_api_key' => getenv('GEMINI_API_KEY') ?: '',

    // Model configuration
    'gemini_model' => getenv('GEMINI_MODEL') ?: 'gemini-flash-latest',
];
