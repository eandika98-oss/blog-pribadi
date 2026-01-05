<?php
session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: ../auth/login.php");

    exit;
}

require "../config/database.php";

$database = new Database();
$pdo = $database->getConnection();

// Ambil data posts
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>