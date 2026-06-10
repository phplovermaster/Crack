<?php
require_once __DIR__ . '/../config/logincheck.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logocrackhub.png">
    <title>Crack Hub — Criar conta</title>
</head>
<body class="register">
    <div class="register-box" role="main">
        <div class="register-logo">
            <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
        </div>

        <h1 class="auth-title">Criar conta</h1>
        <p class="auth-subtitle">Preencha os dados abaixo para se registrar</p>

        <form method="POST" action="../controller/RegisterController.php" class="form" novalidate>
            <div class="field">
                <label for="username">Nome de usuário</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Seu nome"
                    autocomplete="username"
                    required
                >
            </div>

            <div class="field">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="seu@email.com"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="field">
                <label for="password">Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Mínimo 8 caracteres"
                    autocomplete="new-password"
                    required
                >
            </div>

            <button type="submit">Criar conta</button>
        </form>

        <footer class="footer">
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </footer>
    </div>
</body>
</html>
