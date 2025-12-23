# 🐟 Funchal Pescados - Website

Website corporativo da Funchal Pescados, distribuidor de pescados premium em São Paulo.

## 🚀 Tecnologias

- PHP 8.2
- Apache
- Tailwind CSS
- Google Gemini AI (Chef IA)

## 📦 Instalação e Execução

### Opção 1: Docker (Recomendado)

1. **Clone o repositório**
   ```bash
   git clone <seu-repositorio-url>
   cd funchal
   ```

2. **Configure as variáveis de ambiente**
   ```bash
   cp .env.example .env
   ```
   
   Edite o arquivo `.env` e adicione sua chave API do Google Gemini:
   ```
   GEMINI_API_KEY=sua_chave_aqui
   ```

3. **Build e execute com Docker Compose**
   ```bash
   docker-compose up -d
   ```

4. **Acesse o site**
   ```
   http://localhost:8080
   ```

### Opção 2: XAMPP (Desenvolvimento Local)

1. **Clone o repositório** para `C:\xampp\htdocs\funchal`

2. **Configure as variáveis de ambiente**
   - Copie `.env.example` para `.env`
   - Adicione sua chave API do Google Gemini

3. **Configure o PHP para carregar variáveis de ambiente**
   - No Windows, adicione as variáveis de ambiente manualmente ou use um script

4. **Inicie o Apache no XAMPP** e acesse:
   ```
   http://localhost/funchal
   ```

## 🔐 Segurança

- **NUNCA** commite o arquivo `.env` no Git
- **SEMPRE** use variáveis de ambiente para dados sensíveis
- A chave API deve ser rotacionada regularmente

## 🌍 Multilíngue

O site suporta:
- 🇧🇷 Português (padrão)
- 🇬🇧 English

Acesse `/en/` para versão em inglês.

## 📝 Estrutura do Projeto

```
funchal/
├── assets/           # Imagens e recursos estáticos
├── includes/         # Arquivos PHP incluídos
│   ├── config.php    # Configurações (protegido)
│   ├── navbar.php    # Menu de navegação
│   ├── footer.php    # Rodapé
│   └── i18n.php      # Sistema de tradução
├── lang/             # Arquivos de tradução
│   ├── pt.php        # Português
│   └── en.php        # English
├── maps/             # Mapas SVG
├── index.php         # Página inicial
├── chef_ia.php       # Chef IA (Gemini)
├── produtos.php      # Catálogo de produtos
├── contato.php       # Página de contato
└── .htaccess         # Configurações Apache

```

## 🐳 Deploy com Docker

### Build da Imagem
```bash
docker build -t funchal-pescados .
```

### Executar Container
```bash
docker run -d -p 8080:80 \
  -e GEMINI_API_KEY=sua_chave \
  --name funchal-pescados \
  funchal-pescados
```

### Easypanel / Outros Serviços

1. Configure as variáveis de ambiente no painel:
   - `GEMINI_API_KEY`: Sua chave API do Google Gemini
   - `GEMINI_MODEL`: (opcional) gemini-flash-latest

2. Faça deploy apontando para o repositório GitHub

3. O serviço irá automaticamente fazer build usando o Dockerfile

## 📄 Licença

Propriedade da Funchal Pescados. Todos os direitos reservados.
