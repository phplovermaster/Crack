<?php
require_once __DIR__ . "/../config/admincheck.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logocrackhub.png">
    <title>Crack Hub — Deletar jogo</title>
</head>
<body class="adminpanel">
    <header>
        <div class="logo">
            <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
            <a href="adminpanel.php">Crack Hub</a>
        </div>
        <nav class="header-nav" aria-label="Navegação admin">
            <a href="adminpanel.php">← Voltar ao painel</a>
        </nav>
    </header>

    <main>
        <div class="panel panel-form panel-danger">
            <h1 class="panel-title">Deletar jogo</h1>
            <p class="panel-description">Esta ação é permanente e não pode ser desfeita.</p>

            <form method="POST" action="../controller/DeletegameController.php" class="form" novalidate>
                <div class="field">
                    <label for="id">ID do jogo a deletar</label>
                    <input
                        type="number"
                        id="id"
                        name="id"
                        placeholder="Ex: 42"
                        min="1"
                        aria-describedby="id-hint"
                        required
                    >
                    <small id="id-hint">Confira o ID na dashboard antes de deletar.</small>
                </div>

                <button type="submit" name="DELETE" class="btn-danger">Deletar jogo</button>
            </form>
        </div>
    </main>
</body>
</html>
