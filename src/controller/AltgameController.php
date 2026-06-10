<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../config/data.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if(empty($id) || empty($name) || empty($link) || empty($category) || empty($description) || empty($date)) {
        die('Por-favor, preencha todos os campos.');
    }

    try {
        $stmt = $conn->prepare("UPDATE games SET name = :name, link = :link, category = :category, description = :description, release_date = :release_date WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':release_date', $date);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../views/dashboard.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao atualizar jogo: " . $e->getMessage());
    }
}