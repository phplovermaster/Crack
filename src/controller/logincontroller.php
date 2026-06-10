<?php
require_once __DIR__ . '/../config/data.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if(empty($email) || empty($password)) {
        die("Por favor, preencha todos os campos.");
    }
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['senha'])) {
            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['class'] = $result['class'];
            $update = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = :id");
            $update->bindParam(':id', $result['id']);
            $update->execute();
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            header("Location: ../views/login.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        die("Erro na consulta: " . $e->getMessage());
    }
}
