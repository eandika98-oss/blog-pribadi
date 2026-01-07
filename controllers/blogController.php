<?php
require_once __DIR__ . '/../models/blogModel.php';

// Class BlogController berfungsi sebagai CONTROLLER
// untuk menghubungkan model dengan tampilan
class BlogController {

    // Properti untuk menyimpan object model
    private $model;

    // Constructor menerima koneksi database (PDO)
    public function __construct($db) {
        $this->model = new BlogModel($db);
    }

    // Menampilkan seluruh post
    public function index() {
        return $this->model->getAll();
    }

    // Menampilkan satu post berdasarkan ID
    public function show($id) {
        return $this->model->getById($id);
    }

    // Menyimpan post baru
    public function store($data) {
        return $this->model->insert($data);
    }

    // Memperbarui post
    public function update($id, $data) {
        return $this->model->update($id, $data);
    }

    // Menghapus post
    public function destroy($id) {
        return $this->model->delete($id);
    }
}

