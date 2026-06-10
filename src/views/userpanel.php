<?php
require_once __DIR__ . '/../config/authcheck.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logocrackhub.png">
    <title>Crack Hub — Painel</title>
</head>
<body class="index">
    <main>
        <div class="panel" role="navigation" aria-label="Menu principal">
            <div class="loginlogo">
                <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
            </div>

            <p class="panel-greeting">Olá, <strong><?= htmlspecialchars($_SESSION['username'] ?? 'usuário') ?></strong></p>

            <nav>
                <?php if ($_SESSION['class'] === 'admin'): ?>
                    <a href="adminpanel.php">Painel admin</a>
                <?php endif; ?>
                <a href="dashboard.php">Ver jogos</a>
                <a href="logout.php" class="link-danger">Sair da conta</a>
            </nav>
        </div>
    </main>
</body>
</html>
