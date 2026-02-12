# Módulo de Inteligência Artificial - Chef Funchal

Este módulo contém a funcionalidade completa do "Chef Funchal", um assistente culinário baseado em IA (Google Gemini) personalizado para a Funchal Pescados.

## Estrutura de Arquivos

- `chef_ia.php`: Interface do usuário e frontend do chat.
- `includes/`:
  - `chat_api.php`: Lógica backend que processa as mensagens e comunica com a API do Gemini.
  - `config.php`: Arquivo de configuração onde deve ser inserida a API Key.
  - `products_data.php`: Catálogo de produtos usado como contexto para a IA.
  - `i18n.php`: Sistema de internacionalização (PT/EN).
  - `seo.php`: Cabeçalhos HTML e importação de estilos (Tailwind CSS).
- `lang/`: Arquivos de tradução.
- `assets/`: Recursos estáticos (imagens).

## Configuração

1. **API Key**:
   - Abra o arquivo `includes/config.php`.
   - Insira sua chave da API do Google Gemini na variável `gemini_api_key`.

   ```php
   return [
       'gemini_api_key' => 'SUA_CHAVE_AQUI',
       'gemini_model' => 'gemini-1.5-flash', // Modelo utilizado
   ];
   ```

## Modelo de IA

- **Modelo**: Gemini 1.5 Flash (`gemini-1.5-flash`).
- **Endpoint**: `https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent`.

## Personalização (Prompt)

O comportamento da IA é definido no "System Prompt" localizado em `includes/chat_api.php`.

```php
$systemPrompt = "
You are 'Chef Funchal', an expert culinary assistant...
...
";
```

Para alterar a personalidade ou as regras de negócio, edite a variável `$systemPrompt` neste arquivo.

## Dependências Frontend

O frontend utiliza bibliotecas via CDN (não requer instalação local):
- **Tailwind CSS**: Estilização.
- **Marked.js**: Renderização de Markdown nas respostas da IA.
- **Lucide Icons**: Ícones.
- **HTML2PDF**: Geração de PDF das receitas.
