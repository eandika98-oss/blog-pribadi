<?php
session_start();
require_once "../config/database.php";
require_once "../controllers/blogController.php";

// Proses mengecek session
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Proses mengecek ID post
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Proses koneksi & controller
$database = new Database();
$pdo = $database->getConnection();
$blogController = new BlogController($pdo);

// Proses mengambil data post
$post = $blogController->show($id);
if (!$post) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Edit Post</h1>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="judul" value="<?= htmlspecialchars($post['judul']) ?>" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required><?= htmlspecialchars($post['deskripsi']) ?></textarea><br><br>

        <label>Konten:</label><br>
        <textarea name="konten" required><?= htmlspecialchars($post['konten']) ?></textarea><br><br>

        <label>Gambar:</label><br>
        <?php if (!empty($post['gambar']) && file_exists("../uploads/".$post['gambar'])): ?>
            <img src="../uploads/<?= htmlspecialchars($post['gambar']) ?>" width="100"><br>
        <?php else: ?>
            Tidak ada gambar<br>
        <?php endif; ?>
        <input type="file" name="gambar"><br><br>

        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Post</a>
</div>
</body>
</html>