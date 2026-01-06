<?php
// Class BlogModel sebagai MODEL untuk mengelola data posts di database
class BlogModel {

    // Menyimpan koneksi database
    private $conn;

    // Constructor menerima koneksi database PDO
    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil semua post
    public function getAll() {
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil post berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah post baru
    public function insert($data) {
        $query = "INSERT INTO posts (judul, deskripsi, konten, gambar)
                  VALUES (:judul, :deskripsi, :konten, :gambar)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':judul' => $data['judul'],
            ':deskripsi' => $data['deskripsi'],
            ':konten' => $data['konten'],
            ':gambar' => $data['gambar']
        ]);
    }

    // Edit post
    public function update($id, $data) {
        $query = "UPDATE posts
                  SET judul = :judul,
                      deskripsi = :deskripsi,
                      konten = :konten,
                      gambar = :gambar
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':judul' => $data['judul'],
            ':deskripsi' => $data['deskripsi'],
            ':konten' => $data['konten'],
            ':gambar' => $data['gambar'],
            ':id' => $id
        ]);
    }

    // Hapus post
    public function delete($id) {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
