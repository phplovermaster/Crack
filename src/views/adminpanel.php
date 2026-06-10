<?php
require_once __DIR__ . '/../config/admincheck.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logocrackhub.png">
    <title>Crack Hub — Admin</title>
</head>
<body class="adminpanel">
    <main>
        <div class="panel" role="navigation" aria-label="Menu admin">
            <div class="loginlogo">
                <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
            </div>

            <p class="panel-label">Painel de administração</p>

            <nav>
                <a href="addgame.php">Adicionar jogo</a>
                <a href="altergame.php">Atualizar jogo</a>
                <a href="deletegame.php" class="link-danger">Deletar jogo</a>
                <a href="userpanel.php">Painel do usuário</a>
                <a href="dashboard.php">Ver dashboard</a>
            </nav>
        </div>
    </main>
</body>
</html>
