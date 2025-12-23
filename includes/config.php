<?php
// Secure Configuration File
// This file should be protected by .htaccess

return [
    // Google Gemini API Key
    // In production: Set GEMINI_API_KEY environment variable
    // For local development: Create .env file from .env.example
    'gemini_api_key' => getenv('GEMINI_API_KEY') ?: '',

    // Model configuration
    'gemini_model' => getenv('GEMINI_MODEL') ?: 'gemini-flash-latest',
];
