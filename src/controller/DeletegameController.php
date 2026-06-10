<?php

require_once __DIR__ . '/../config/data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if(empty($id)) {
        die('ID do jogo é obrigatório.');
    }

    try {
        $stmt = $conn->prepare("DELETE FROM games WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../views/dashboard.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao deletar jogo: " . $e->getMessage());
    }
}
