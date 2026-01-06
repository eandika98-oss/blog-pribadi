<?php
require_once _DIR_ . '/../models/blogModel.php';

// Class BlogController berfungsi sebagai CONTROLLER
// untuk menghubungkan model dengan tampilan
class BlogController {

    // Properti untuk menyimpan object model
    private $model;

    // Constructor menerima koneksi database (PDO)
    public function __construct($db) {
        $this->model = new BlogModel($db);
    }