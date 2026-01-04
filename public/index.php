<?php
require "../config/database.php";
$data = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<h2>Blog Pribadi</h2>
<a href="tambah.php">Tambah Postingan</a>

<?php foreach ($data as $row): ?>
    <hr>
    <h3><?= $row['judul']; ?></h3>
    <p><?= $row['isi']; ?></p>
    <small>Penulis: <?= $row['penulis']; ?></small><br>
    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
    <a href="../process/hapus.php?id=<?= $row['id']; ?>">Hapus</a>
<?php endforeach; ?>
