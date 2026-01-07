<?php
session_start();
require_once "../config/database.php";
require_once "../controllers/blogController.php";

// Proses mengecek session
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Proses mengecek apakah ID post sudah dikirim
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Proses membuat koneksi & controller
$database = new Database();
$pdo = $database->getConnection();
$blogController = new BlogController($pdo);

// Proses mengambil data post untuk mengecek gambar
$post = $blogController->show($id);
if ($post) {
    // Hapus gambar jika ada
    if (!empty($post['gambar']) && file_exists("../uploads/" . $post['gambar'])) {
        unlink("../uploads/" . $post['gambar']);
    }
    // Hapus post dari database
    $blogController->destroy($id);
}

// Menuju ke halaman ke index
header("Location: index.php");
exit;
?>