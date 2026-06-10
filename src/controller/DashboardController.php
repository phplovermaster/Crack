<?php

require_once __DIR__ . '/../config/data.php';

$search = trim($_GET['search'] ?? '');

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT * FROM games WHERE name LIKE :search");
    $stmt->bindValue(':search', "%$search%");
    $stmt->execute();
} else {
    $stmt = $conn->prepare("SELECT * FROM games");
    $stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);