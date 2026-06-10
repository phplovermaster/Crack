<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../config/data.php';
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($email) || empty($password)) {
        die("Por favor, preencha todos os campos.");
    }
    try {
        $stmt = $conn->prepare("INSERT INTO users (username, email, senha) VALUES (:username, :email, :senha)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedPassword);
        $stmt->execute();
        header("Location: ../views/login.php");
        exit();
    } catch (PDOException $e) {
        die("Erro na consulta: " . $e->getMessage());
    }
}