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
    <title>Crack Hub — Atualizar jogo</title>
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
        <div class="panel panel-form">
            <h1 class="panel-title">Atualizar jogo</h1>
            <p class="panel-description">Informe o ID e os novos dados do jogo.</p>

            <form method="POST" action="../controller/AltgameController.php" class="form" novalidate>
                <div class="field">
                    <label for="id">ID do jogo</label>
                    <input type="number" id="id" name="id" placeholder="Ex: 42" min="1" required>
                </div>

                <div class="field">
                    <label for="name">Nome do jogo</label>
                    <input type="text" id="name" name="name" placeholder="Ex: The Witcher 3" required>
                </div>

                <div class="field">
                    <label for="link">Link do jogo</label>
                    <input type="url" id="link" name="link" placeholder="https://..." required>
                </div>

                <div class="field">
                    <label for="category">Categoria</label>
                    <input type="text" id="category" name="category" placeholder="Ex: RPG, Ação, Estratégia" required>
                </div>

                <div class="field">
                    <label for="description">Descrição</label>
                    <input type="text" id="description" name="description" placeholder="Breve descrição do jogo" required>
                </div>

                <div class="field">
                    <label for="date">Data de lançamento</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <button type="submit" name="A">Salvar alterações</button>
            </form>
        </div>
    </main>
</body>
</html>
