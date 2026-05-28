<?php
/**
 * Processar formulário de contato
 * Envia e-mail para contato@funchalpescados.com.br
 */

header('Content-Type: application/json; charset=utf-8');

// Apenas POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit;
}

// Sanitizar dados
$nome     = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$empresa  = trim(filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$email    = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
$mensagem = trim(filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

// Validações
$erros = [];
if (empty($nome))     $erros[] = 'Nome é obrigatório.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = 'E-mail inválido.';
if (empty($mensagem))  $erros[] = 'Mensagem é obrigatória.';

if (!empty($erros)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $erros)]);
    exit;
}

// Destinatário
$para = 'contato@funchalpescados.com.br';
$assunto = "Contato pelo Site - {$nome}";

// Headers
$headers  = "From: site@funchalpescados.com.br\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Corpo do e-mail em HTML
$corpoHtml = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .header { background: #1e293b; color: #bb9b6b; padding: 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; }
        .content { padding: 20px; background: #f8fafc; }
        .field { margin-bottom: 15px; }
        .field strong { color: #1e293b; display: block; margin-bottom: 3px; }
        .message { background: #fff; padding: 15px; border-left: 4px solid #bb9b6b; border-radius: 4px; }
        .footer { background: #1e293b; color: #94a3b8; padding: 15px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class='header'>
        <h1>✉️ Nova Mensagem de Contato</h1>
    </div>
    <div class='content'>
        <div class='field'><strong>Nome:</strong> {$nome}</div>
        <div class='field'><strong>Empresa:</strong> " . ($empresa ? $empresa : 'Não informada') . "</div>
        <div class='field'><strong>E-mail:</strong> {$email}</div>
        <div class='field'>
            <strong>Mensagem:</strong>
            <div class='message'>" . nl2br(htmlspecialchars($mensagem)) . "</div>
        </div>
    </div>
    <div class='footer'>
        Enviado pelo site funchalpescados.com.br em " . date('d/m/Y H:i') . "
    </div>
</body>
</html>";

// Enviar
$enviado = @mail($para, $assunto, $corpoHtml, $headers);

if ($enviado) {
    echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso! Em breve retornaremos seu contato.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erro ao enviar mensagem. Tente novamente ou envie diretamente para contato@funchalpescados.com.br.']);
}
?>
