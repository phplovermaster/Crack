# CrackHub

## Sobre o Projeto

CrackHub é uma plataforma web segura que direciona usuários para sites confiáveis de downloads de software crack. O projeto oferece uma interface intuitiva e segura para facilitar o acesso a recursos de software de forma centralizada.

## Características

- 🔐 **Segurança**: Verificação rigorosa de links e validação de permissões de usuários
- 👤 **Autenticação**: Sistema de login e registro com sessões seguras
- 📊 **Dashboard**: Painel personalizado para cada usuário com catálogo de jogos
- 🗄️ **Banco de Dados**: MySQL para armazenamento seguro de dados
- 🐳 **Docker**: Containerização para fácil deploy e consistência
- 🛡️ **Controle de Acesso**: Sistema de roles (Admin/Usuário) com validação de permissões
- 🎨 **UI/UX Otimizada**: Interface responsiva com CSS moderno e organizado
- ⚡ **Performance**: CSS otimizado com variáveis para manutenção facilitada

## Requisitos

- PHP 7.4+
- MySQL 5.7+
- Composer
- Docker (opcional)
- Node.js (para gerenciamento de assets, opcional)

## Stack Tecnológico

**Backend:**
- PHP 7.4+ (Servidor)
- MySQL 5.7+ (Banco de Dados)
- Composer (Gerenciador de Dependências)

**Frontend:**
- HTML5
- CSS3 (com variáveis CSS para manutenção)
- JavaScript Vanilla
- Design Responsivo

**Dependências Principais:**
- vlucas/phpdotenv - Gerenciamento de variáveis de ambiente
- symfony/polyfill - Compatibilidade entre versões PHP
- graham-campbell/result-type - Type hinting para resultados
- phpoption - Tratamento de valores opcionais

**DevOps:**
- Docker & Docker Compose
- Git & GitHub

## Instalação Local

### 1. Clone o repositório
```bash
git clone CrackHub
```

### 2. Instale as dependências PHP

Use o Composer para instalar todas as dependências do projeto:

```bash
composer install
```

Isso instalará todas as dependências listadas no composer.json, incluindo:
- vlucas/phpdotenv - Para gerenciar variáveis de ambiente
- symfony/polyfill - Para compatibilidade entre versões PHP
- phpoption - Para tratamento de valores opcionais

### 3. Configure o ambiente

Copie o arquivo .env e configure suas variáveis:

```bash
cp .env.example .env  # Se houver arquivo de exemplo
```

Edite o .env com suas configurações:

```
DB_CONNECTION=mysql
DB_DATABASE=exemple
DB_ROOT=root
DB_PASSWORD=sua_senha_aqui
DB_HOST=localhost
```

### 4. Crie o banco de dados

```bash
mysql -u root -p -e "CREATE DATABASE crackhub;"
mysql -u root -p crackhub < sql/database.sql
```

### 5. Inicie o servidor local

```bash
php -S localhost:8000
```

Acesse `http://localhost:8000` no seu navegador.

## Usar com Docker

Para facilitar o deploy e garantir consistência, use Docker:

```bash
docker-compose up --build
```

O projeto estará disponível em `http://localhost:8000`

## Fazendo Deploy Online

### Opção 1: Hosting Compartilhado

1. Faça upload dos arquivos via FTP/SFTP
2. Configure o banco de dados no painel do hosting
3. Importe o SQL: database.sql
4. Ajuste as variáveis no .env (credenciais do servidor remoto)

### Opção 2: VPS/Servidor Dedicado

```bash
# No servidor
git clone <seu-repositorio>
cd CrackHub
composer install
# Configure .env com as credenciais do servidor
mysql -u root -p crackhub < sql/database.sql
php -S 0.0.0.0:8000
```

### Opção 3: Docker em Produção

```bash
docker-compose -f docker-compose.yml up -d
```

Configure um nginx/Apache como reverse proxy.

### Opção 4: Plataformas Cloud

- **Heroku**: Use `Procfile` e composer.json
- **AWS**: EC2 + RDS para banco de dados
- **DigitalOcean**: App Platform ou Droplets
- **Railway/Render**: Deploy direto do GitHub

## Segurança e Controle de Acesso

### Sistema de Permissões

O CrackHub implementa um rigoroso controle de acesso para proteção do catálogo:

#### Níveis de Usuário

- **Usuário Comum**: Apenas visualização dos jogos disponibilizados no Dashboard
- **Administrador**: Acesso ao painel de administração para gerenciar catálogo

#### Admin Panel (Apenas para Administradores)

O painel de administração permite:

- ✅ Adicionar novos jogos ao catálogo
- ✅ Editar informações de jogos (nome, link, categoria, descrição, data de lançamento)
- ✅ Remover jogos do catálogo
- ✅ Validar links de segurança
- ✅ Gerenciar categorias de jogos

**URL**: `/views/adminpanel.php`

**Acesso Restrito**: Apenas usuários com `$_SESSION['class'] === 'admin'` podem acessar.

#### Fluxo de Submissão

1. Apenas **Administradores** podem acessar o Admin Panel
2. Preenchem formulário com informações do jogo
3. Sistema valida todos os campos obrigatórios
4. Dados são armazenados no banco com validação SQL
5. Jogo fica disponível no Dashboard para todos os usuários

### Medidas de Segurança Implementadas

- 🔒 **Verificação de Permissões**: Validação em todos os endpoints de modificação
- 🛡️ **Validação de Links**: Verificação se links são URLs válidas antes de publicação
- 📝 **Auditoria**: Registro através de sessões seguras
- 🔐 **Autenticação**: Sessões seguras com proteção de variáveis de sessão
- ✔️ **Sanitização**: Validação de inputs para prevenir injeção SQL e XSS
- 🔑 **Controle de Sessão**: Verificação de `$_SESSION['class']` em endpoints críticos

### Configurar Usuário como Administrador

No banco de dados, altere o role do usuário:

```sql
UPDATE users SET class = 'admin' WHERE id = user_id;
```

**Nota**: O campo é `class` (conforme implementado em authcheck.php)

## Estrutura do Projeto

```
CrackHub/
├── src/
│   ├── assets/
│   │   ├── images/        # Logos e imagens estáticas
│   │   ├── scripts/       # JavaScript
│   │   └── styles/        # CSS otimizado com variáveis
│   ├── config/
│   │   ├── authcheck.php     # Validação de autenticação de usuários
│   │   ├── admincheck.php    # Validação de permissão admin
│   │   ├── data.php          # Conexão e funções com banco
│   │   └── logincheck.php    # Validação de sessão de login
│   ├── controller/
│   │   ├── RegisterController.php      # Lógica de registro
│   │   ├── logincontroller.php         # Lógica de login
│   │   ├── logoutcontroller.php        # Lógica de logout
│   │   ├── DashboardController.php     # Lógica do dashboard
│   │   └── AdminpanelController.php    # Lógica do painel admin
│   └── views/
│       ├── index.php           # Página inicial com menu
│       ├── login.php           # Página de login
│       ├── register.php        # Página de registro
│       ├── dashboard.php       # Dashboard com catálogo
│       ├── adminpanel.php      # Painel de administração
│       └── logout.php          # Página de logout
├── vendor/                # Dependências Composer
├── sql/
│   └── database.sql       # Schema do banco de dados
├── docker/
│   └── Dockerfile         # Configuração Docker
├── docker-compose.yml     # Orquestração de containers
├── composer.json          # Dependências do projeto
└── README.md              # Este arquivo
```

## Funcionalidades Principais

### Para Usuários Comuns
- **Login/Registro**: Autenticação segura com validação de entrada
- **Dashboard**: Visualização de jogos disponíveis com busca e filtros
- **Catálogo**: Listagem de jogos com links seguros e informações detalhadas
- **Logout**: Encerramento seguro de sessão

### Para Administradores
- **Acesso ao Admin Panel**: Interface protegida por validação de permissões
- **Adicionar Jogos**: Formulário para inserir novos jogos com validação HTML5
- **Gerenciar Catálogo**: Edição e remoção de jogos existentes
- **Validação de Dados**: Todos os campos são validados antes de armazenar
- **Dashboard Admin**: Visualizar todos os jogos do catálogo

### Recursos de Segurança
- Verificação de sessão em todas as páginas protegidas
- Validação de permissão de admin para admin panel
- Sanitização de inputs do formulário
- Proteção contra acesso não autorizado com redirecionamento

## Últimas Atualizações

### v1.1.0 - CSS Refatorizado e Admin Panel
- ✨ **CSS Otimizado**: Implementação de variáveis CSS para cores e transições
- 🛡️ **Admin Panel**: Painel de administração com formulário para adicionar jogos
- 📋 **Validação de Permissões**: Sistema de verificação de permissão admin
- 🎨 **UI Melhorada**: Interface mais consistente e fácil de manter
- 🐛 **Correções HTML**: Atributos de validação atualizados (HTML5 standards)

### Melhorias Implementadas
- Consolidação de estilos duplicados (redução ~30% do CSS)
- Transições CSS mais fluidas (0.3s vs 1s)
- Box-sizing global para cálculos de layout corretos
- Sistema de roles com validação em endpoints críticos

## Contribuindo

Para contribuir com novos jogos ou sugestões, siga o processo de submissão e aguarde aprovação dos moderadores.

## Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo LICENSE para detalhes.

## Suporte

Para suporte ou reportar problemas, abra uma issue no repositório.
```