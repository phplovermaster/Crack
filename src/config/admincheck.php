<?php
require_once __DIR__ . '/../config/data.php';
session_start();

if (empty($_SESSION['class']) || $_SESSION['class'] !== 'admin'){
    header("Location: ../views/dashboard.php");
    exit();
}