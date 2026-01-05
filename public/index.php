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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Daftar Post Blog</h1>

    <a href="create.php" class="top-btn">Tambah Post</a>

    <table class="table-blog">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['id']) ?></td>
                        <td>
                            <?php if (!empty($post['gambar'])): ?>
                                <img src="../uploads/<?= htmlspecialchars($post['gambar']) ?>" width="80">
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($post['judul']) ?></td>
                        <td><?= htmlspecialchars($post['deskripsi']) ?></td>
                        <td><?= htmlspecialchars($post['created_at']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $post['id'] ?>" class="action-edit">Edit</a>
                            <a href="delete.php?id=<?= $post['id'] ?>" 
                               class="action-delete"
                               onclick="return confirm('Yakin ingin hapus post ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="no-data">Belum ada post</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <a href="../auth/logout.php" class="btn-logout" style="padding:8px 15px; background-color:#f44336; color:#fff; text-decoration:none; border-radius:5px;">Logout</a>
    </div>
 </div>
</body>
</html>