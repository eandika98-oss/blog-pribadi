<?php
session_start();
require_once "../config/database.php";
require_once "../controllers/blogController.php";

// Proses mengecek session
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Proses membuat koneksi database & controller
$database = new Database();
$pdo = $database->getConnection();
$blogController = new BlogController($pdo);

// Proses submit pada form
if (isset($_POST['submit'])) {
    // Data dari form
    $data = [
        'judul' => $_POST['judul'],
        'deskripsi' => $_POST['deskripsi'],
        'konten' => $_POST['konten'],
        'gambar' => ''
    ];

    // Proses Upload gambar 
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $fileName = time() . '_' . $_FILES['gambar']['name'];
        $targetDir = "../uploads/";
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            $data['gambar'] = $fileName;
        } else {
            $error = "Gagal upload gambar!";
        }
    }

    // Proses menyimpan data ke database via controller
    if (!isset($error)) {
        if ($blogController->store($data)) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Gagal menyimpan post!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post Baru</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Tambah Post Baru</h1>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="create.php" method="POST" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required></textarea><br><br>

        <label>Konten:</label><br>
        <textarea name="konten" required></textarea><br><br>

        <label>Gambar:</label><br>
        <input type="file" name="gambar"><br><br>

        <button type="submit" name="submit">Simpan Post</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Post</a>
</div>
</body>
<html>