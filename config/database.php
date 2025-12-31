<?php
// database config
class Database {
    public $host = "localhost";
    public $db_name = "blog_pribadi";    // sesuaikan dengan nama database yang sudah dibuat
    public $username = "root";           // sesuaikan dengan user MySQL
    public $password = "rusdiana87";     // sesuaikan dengan password MySQL 
    public $conn;
     // Fungsi untuk koneksi database
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
              // Set error mode ke exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>