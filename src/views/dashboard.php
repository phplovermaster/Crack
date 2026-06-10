<?php
require_once __DIR__ . '/../controller/DashboardController.php';
require_once __DIR__ . '/../config/authcheck.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logocrackhub.png">
    <title>Crack Hub — Dashboard</title>
</head>
<body class="page">
    <header>
        <div class="logo">
            <img src="../assets/images/logocrackhub.png" alt="Logo Crack Hub">
            <a href="userpanel.php">Crack Hub</a>
        </div>

        <form method="GET" class="search" role="search" aria-label="Buscar jogos">
            <label for="search" class="sr-only">Pesquisar jogo</label>
            <input
                type="search"
                id="search"
                name="search"
                placeholder="Pesquisar jogo..."
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                autocomplete="off"
            >
            <button type="submit">Buscar</button>
        </form>
    </header>

    <main>
        <?php if (!empty($result)): ?>
            <p class="result-count" aria-live="polite">
                <?= count($result) ?> jogo<?= count($result) !== 1 ? 's' : '' ?> encontrado<?= count($result) !== 1 ? 's' : '' ?>
            </p>
            <div class="grid" role="list">
                <?php foreach ($result as $game): ?>
                    <article class="card" role="listitem">
                        <?php if ($_SESSION['class'] === 'admin'): ?>
                            <span class="badge">ID <?= htmlspecialchars($game['id']) ?></span>
                        <?php endif; ?>

                        <h2><?= htmlspecialchars($game['name']) ?></h2>

                        <dl class="card-meta">
                            <div>
                                <dt>Categoria</dt>
                                <dd><?= htmlspecialchars($game['category']) ?></dd>
                            </div>
                            <div>
                                <dt>Descrição</dt>
                                <dd><?= !empty($game['description'])
                                    ? htmlspecialchars($game['description'])
                                    : 'Sem descrição disponível.' ?></dd>
                            </div>
                            <div>
                                <dt>Lançamento</dt>
                                <dd><?= !empty($game['release_date'])
                                    ? (new DateTime($game['release_date']))->format('d/m/Y')
                                    : 'Data não disponível.' ?></dd>
                            </div>
                        </dl>

                        <a
                            href="<?= htmlspecialchars($game['link']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Acessar <?= htmlspecialchars($game['name']) ?>"
                        >Acessar jogo</a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state" role="status">
                <p>Nenhum jogo encontrado.</p>
                <?php if (!empty($_GET['search'])): ?>
                    <a href="dashboard.php">Limpar busca</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
