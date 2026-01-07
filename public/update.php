<?php
session_start();
require_once "../config/database.php";
require_once "../controllers/blogController.php";

// Proses mengecek session
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Proses koneksi & controller
$database = new Database();
$pdo = $database->getConnection();
$blogController = new BlogController($pdo);

//  Proses mengambil data post lama
$post = $blogController->show($id);
if (!$post) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $data = [
        'judul' => $_POST['judul'],
        'deskripsi' => $_POST['deskripsi'],
        'konten' => $_POST['konten'],
        'gambar' => $post['gambar'] 
    ];

    // Proses upload gambar baru 
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $fileName = time() . '_' . basename($_FILES['gambar']['name']);
        $targetDir = "../uploads/";
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            if (!empty($post['gambar']) && file_exists($targetDir . $post['gambar'])) {
                unlink($targetDir . $post['gambar']);
            }
            $data['gambar'] = $fileName;
        } else {
            $error = "Gagal upload gambar!";
        }
    }

    // Proses update data
    if (!isset($error)) {
        if ($blogController->update($id, $data)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal memperbarui post!";
        }
    } else {
        echo $error;
    }
}
?>