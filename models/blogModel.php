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
}