# CrackHub

## Sobre o Projeto

CrackHub é uma aplicação web em PHP que oferece cadastro, login e painel de usuário para um catálogo de jogos. A solução foi construída pensando em containerização com Docker, controle de acesso por sessão e administração simples de conteúdo.

## Funcionalidades

- 👥 Autenticação de usuários (login, registro e logout)
- 🏠 Dashboard com listagem de jogos
- 🛠️ Painel de administração para adicionar, editar e remover jogos
- 🔐 Controle de acesso por perfis (`user` e `admin`)
- 🌐 Configuração Docker para PHP + Apache + MySQL + phpMyAdmin
- 🗄️ Banco de dados MySQL com dados iniciais de jogos

## Tecnologia usada

- PHP 8.2
- MySQL 8.0
- Apache
- Docker e Docker Compose
- Composer
- HTML5, CSS3 e JavaScript Vanilla
- `vlucas/phpdotenv`

## Requisitos

- Docker e Docker Compose
- PHP 8.2 (opcional para execução local sem Docker)
- Composer (opcional para evolução do projeto)

## Executando com Docker

A forma mais simples de rodar o projeto é usando Docker Compose.

```bash
docker compose up -d --build
```

A aplicação ficará disponível em:

- `http://localhost:8080` (PHP/Apache)
- `http://localhost:8081` (phpMyAdmin)

> Se você estiver usando Codespaces ou ambiente remoto, abra o link de porta encaminhada no VS Code.

## Configuração do banco de dados

O projeto usa variáveis de ambiente definidas em `.env`.

Valores padrão importantes:

```env
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=crackhub
DB_USERNAME=usuario_app
DB_PASSWORD=senha_app_123
```

O serviço MySQL é definido em `docker-compose.yml` com usuário e senha compatíveis.

## Usuário administrador padrão

Se quiser testar o painel admin, crie ou altere um usuário no banco para `class = 'admin'`.

Exemplo:

```sql
UPDATE users SET class = 'admin' WHERE username = 'admin';
```

## Estrutura do projeto

```
Crack/
├── Docker/
│   ├── Dockerfile
│   └── apache.conf
├── src/
│   ├── assets/
│   │   ├── images/
│   │   ├── scripts/
│   │   └── styles/
│   ├── config/
│   │   ├── admincheck.php
│   │   ├── authcheck.php
│   │   ├── data.php
│   │   └── logincheck.php
│   ├── controller/
│   │   ├── AdminpanelController.php
│   │   ├── AltgameController.php
│   │   ├── DashboardController.php
│   │   ├── DeletegameController.php
│   │   ├── RegisterController.php
│   │   ├── logincontroller.php
│   │   └── logoutcontroller.php
│   └── views/
│       ├── addgame.php
│       ├── adminpanel.php
│       ├── altergame.php
│       ├── dashboard.php
│       ├── deletegame.php
│       ├── login.php
│       ├── logout.php
│       ├── register.php
│       └── userpanel.php
├── docker-compose.yml
├── composer.json
├── composer.lock
├── .env
└── README.md
```

## Como usar

### Registrar um usuário
1. Acesse `register.php`
2. Preencha nome, e-mail e senha
3. Clique em criar conta

### Fazer login
1. Acesse `login.php`
2. Informe e-mail e senha
3. Você será redirecionado ao dashboard

### Painel de administrador
Apenas usuários com `class = 'admin'` conseguem acessar o admin panel.

### Acesso ao catálogo
No dashboard, os jogos são exibidos com nome, categoria, descrição e link.

## Observações

- O `DocumentRoot` do Apache está configurado para `src/`
- O projeto usa `PDO` para conexão com MySQL
- O arquivo `src/config/data.php` já define `charset=utf8mb4`
- `Docker/init.sql` popula o banco com jogos iniciais

## Atualizações recentes

- Adicionado `logincheck.php` para evitar acesso a cadastro quando o usuário já estiver logado
- Corrigido carregamento de usuário e nome no painel
- Corrigida configuração de `DB_HOST` para `mysql`
- Atualizada configuração UTF-8 no banco e no PDO
- Melhorias no Docker e build do Apache

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