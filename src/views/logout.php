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
    <title>Crack Hub — Sair</title>
</head>
<body class="index">
    <main>
        <div class="panel panel-form">
            <div class="loginlogo">
                <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
            </div>

            <h1 class="panel-title">Sair da conta</h1>
            <p class="panel-description">Tem certeza que deseja encerrar sua sessão?</p>

            <div class="panel-actions">
                <form method="POST" action="../controller/logoutcontroller.php">
                    <button type="submit" class="btn-danger">Sim, sair</button>
                </form>
                <a href="userpanel.php" class="btn-secondary">Cancelar</a>
            </div>
        </div>
    </main>
</body>
</html>
