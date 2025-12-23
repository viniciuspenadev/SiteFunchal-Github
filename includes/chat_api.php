<?php
// includes/chat_api.php
header('Content-Type: application/json');

// 1. Load Dependencies
require_once __DIR__ . '/i18n.php';
$config = require_once __DIR__ . '/config.php';
$products = require_once __DIR__ . '/products_data.php';

// 2. Validate Request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$userMessage = $input['message'] ?? '';
$lang = $input['lang'] ?? 'pt';

if (empty($userMessage)) {
    http_response_code(400);
    echo json_encode(['error' => 'Empty message']);
    exit;
}

// 3. Build Context (System Prompt)
$productsList = "";
foreach ($products as $p) {
    // Basic product list construction
    $productsList .= "- {$p['id']}: (Category: {$p['category_slug']})\n";
}

// Determine Language Context
$langContext = ($lang === 'en') ? "You are speaking in English." : "Você está falando em Português.";

$systemPrompt = "
You are 'Chef Funchal', an expert culinary assistant for Funchal Pescados, a premium seafood distributor in São Paulo, Brazil.
$langContext

Your goal is to help customers with recipes, pairing suggestions, and preparation tips using ONLY the products we sell.
If a user asks about a product not in our list (like chicken, beef, or fish we don't carry), politely inform them that Funchal specializes in premium seafood and suggest a relevant alternative from our catalog if possible.

Our Product Catalog (Reference by ID):
$productsList

Guidelines:
- Be sophisticated, helpful, and concise.
- Suggest specific recipes for our products.
- For pairings, suggest wines or side dishes that complement the seafood.
- If the API Key is missing or invalid, do not hallunicate.
- **IMPORTANT**: Format your response nicely using Markdown. Use bullet points for lists, bold text for emphasis (e.g. **Ingredients**), and separate steps into paragraphs. Do not return a single block of text.
";

// 4. Call Gemini API
$apiKey = $config['gemini_api_key'] ?? '';

// CHECK FOR PLACEHOLDER OR EMPTY
if (empty($apiKey) || $apiKey === 'PLACEHOLDER') {
    // Mock Mode
    sleep(1);
    $mockResponse = ($lang === 'en')
        ? "I am currently in 'Demonstration Mode'. Since no valid Google Gemini API Key was configured, I cannot generate a real AI response. However, I can tell you that Funchal Pescados offers the best Salmon and Cod in Brazil! (Please configure the API Key in includes/config.php)"
        : "Estou atualmente em 'Modo de Demonstração'. Como nenhuma chave de API válida (Gemini) foi configurada, não posso gerar uma resposta real da IA. No entanto, posso afirmar que a Funchal Pescados oferece o melhor Salmão e Bacalhau do Brasil! (Por favor, configure a API Key em includes/config.php)";

    echo json_encode(['reply' => $mockResponse]);
    exit;
}

// Gemini API URL
$model = $config['gemini_model'] ?? 'gemini-1.5-flash';
$url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

// Gemini Payload Structure
$data = [
    'contents' => [
        [
            'parts' => [
                [
                    // Combine System Prompt and User Message, as Gemini Pro (v1) often treats single turn better
                    // or we can just prepend context.
                    'text' => $systemPrompt . "\n\nUser: " . $userMessage
                ]
            ]
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $result = json_decode($response, true);
    // Parse Gemini Response
    // path: candidates[0].content.parts[0].text
    $reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';

    if (empty($reply)) {
        // Sometimes safety settings block it, or structure varies
        $reply = "Desculpe, não consegui processar sua solicitação no momento. (API Error/Safety Block)";
    }

    echo json_encode(['reply' => $reply]);
} else {
    // Log error internally if needed
    http_response_code(500);
    $errBody = json_decode($response, true);
    $errMsg = $errBody['error']['message'] ?? 'Unknown Error';
    echo json_encode(['error' => 'API Error (' . $httpCode . '): ' . $errMsg, 'details' => $response]);
}
