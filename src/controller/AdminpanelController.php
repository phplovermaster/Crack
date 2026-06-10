<?php
require_once __DIR__ . '/../config/data.php';
if($_SERVER['REQUEST_METHOD']  === 'POST') {
    $name = $_POST['name'];
    $link = $_POST['link'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if(empty($name) || empty($link) || empty($category) || empty($description) || empty($date)) {
        die('Por-favor, preencha todos os campos.');
    }

    try {
        $stmt = $conn->prepare("INSERT INTO games (name, link, category, description, release_date) VALUES (:name, :link, :category, :description, :release_date)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':release_date', $date);
        $stmt->execute();
        header("Location: ../views/dashboard.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao inserir jogo: " . $e->getMessage());
    }
}