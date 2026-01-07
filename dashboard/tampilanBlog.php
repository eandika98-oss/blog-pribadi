<?php
require_once "../config/database.php";

$database = new Database();
$pdo = $database->getConnection();

// Ambil data post
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Blog Saya</h1>

    <?php if (!empty($posts)): ?>
        <div class="grid">
            <?php foreach ($posts as $post): ?>
                <div class="card">

                    <?php if (!empty($post['gambar']) && file_exists("../uploads/".$post['gambar'])): ?>
                        <img src="../uploads/<?= htmlspecialchars($post['gambar']) ?>">
                    <?php endif; ?>

                    <div class="content">
                        <h3><?= htmlspecialchars($post['judul']) ?></h3>
                        <p><?= htmlspecialchars($post['deskripsi']) ?></p>
                        <p><?= htmlspecialchars($post['konten']) ?></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align:center;">Belum ada post.</p>
    <?php endif; ?>
</div>

<div class="back-container">
    <a href="/public/index.php" class="btn-back">Kembali</a>
</div>

</body>
</html>
