<?php
require_once __DIR__ . '/../config/data.php';
session_start();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    header("Location: ../views/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logocrackhub.png">
    <title>Crack Hub — Entrar</title>
</head>
<body class="login">
    <div class="login-box" role="main">
        <div class="loginlogo">
            <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
        </div>

        <h1 class="auth-title">Bem-vindo de volta</h1>
        <p class="auth-subtitle">Entre com sua conta para continuar</p>

        <form method="POST" action="../controller/logincontroller.php" class="form" novalidate>
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
                    placeholder="••••••••"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit">Entrar</button>
        </form>

        <footer class="footer">
            <p>Não tem uma conta? <a href="register.php">Registre-se</a></p>
        </footer>
    </div>
</body>
</html>
