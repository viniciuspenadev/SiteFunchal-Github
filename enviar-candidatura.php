<?php
/**
 * Processar candidatura da página de vagas
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
$telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$email    = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
$linkedin = trim(filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_URL) ?? '');
$carta    = trim(filter_input(INPUT_POST, 'carta', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$vaga     = trim(filter_input(INPUT_POST, 'vaga', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'Não informada');

// Validações
$erros = [];
if (empty($nome))     $erros[] = 'Nome é obrigatório.';
if (empty($telefone))  $erros[] = 'Telefone é obrigatório.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = 'E-mail inválido.';

// Validar arquivo
$temArquivo = false;
$nomeArquivo = '';
$caminhoTemp = '';

if (isset($_FILES['curriculo']) && $_FILES['curriculo']['error'] === UPLOAD_ERR_OK) {
    $extensoesPermitidas = ['pdf', 'doc', 'docx'];
    $nomeArquivo = $_FILES['curriculo']['name'];
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    $tamanho = $_FILES['curriculo']['size'];

    if (!in_array($extensao, $extensoesPermitidas)) {
        $erros[] = 'Formato de arquivo inválido. Use PDF, DOC ou DOCX.';
    }
    if ($tamanho > 5 * 1024 * 1024) {
        $erros[] = 'Arquivo excede o limite de 5MB.';
    }

    if (empty($erros)) {
        $caminhoTemp = $_FILES['curriculo']['tmp_name'];
        $temArquivo = true;
    }
} else {
    $erros[] = 'Currículo é obrigatório.';
}

if (!empty($erros)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $erros)]);
    exit;
}

// Destinatário
$para = 'contato@funchalpescados.com.br';
$assunto = "Nova Candidatura - {$vaga} - {$nome}";

// Boundary para multipart
$boundary = md5(time());

// Headers
$headers  = "From: site@funchalpescados.com.br\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

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
        .footer { background: #1e293b; color: #94a3b8; padding: 15px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class='header'>
        <h1>📋 Nova Candidatura - Funchal Pescados</h1>
    </div>
    <div class='content'>
        <div class='field'><strong>Vaga:</strong> {$vaga}</div>
        <div class='field'><strong>Nome:</strong> {$nome}</div>
        <div class='field'><strong>Telefone:</strong> {$telefone}</div>
        <div class='field'><strong>E-mail:</strong> {$email}</div>
        <div class='field'><strong>LinkedIn:</strong> " . ($linkedin ? $linkedin : 'Não informado') . "</div>
        <div class='field'><strong>Carta de Apresentação:</strong><br>" . ($carta ? nl2br(htmlspecialchars($carta)) : 'Não informada') . "</div>
    </div>
    <div class='footer'>
        Enviado pelo site funchalpescados.com.br em " . date('d/m/Y H:i') . "
    </div>
</body>
</html>";

// Montar corpo multipart
$corpo = "";

// Parte HTML
$corpo .= "--{$boundary}\r\n";
$corpo .= "Content-Type: text/html; charset=UTF-8\r\n";
$corpo .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$corpo .= $corpoHtml . "\r\n\r\n";

// Anexo (currículo)
if ($temArquivo) {
    $conteudoArquivo = file_get_contents($caminhoTemp);
    $arquivoBase64 = chunk_split(base64_encode($conteudoArquivo));
    $mimeType = mime_content_type($caminhoTemp) ?: 'application/octet-stream';

    $corpo .= "--{$boundary}\r\n";
    $corpo .= "Content-Type: {$mimeType}; name=\"{$nomeArquivo}\"\r\n";
    $corpo .= "Content-Transfer-Encoding: base64\r\n";
    $corpo .= "Content-Disposition: attachment; filename=\"{$nomeArquivo}\"\r\n\r\n";
    $corpo .= $arquivoBase64 . "\r\n";
}

$corpo .= "--{$boundary}--";

// Enviar
$enviado = @mail($para, $assunto, $corpo, $headers);

if ($enviado) {
    echo json_encode(['success' => true, 'message' => 'Candidatura enviada com sucesso! Em breve entraremos em contato.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erro ao enviar e-mail. Tente novamente ou envie diretamente para contato@funchalpescados.com.br.']);
}
?>
