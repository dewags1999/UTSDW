<?php 
require_once __DIR__ . '/../config/Database.php';

class User extends Database {
    private $table = "users";

    // CREATE: Tambah pengguna
    public function create($nama, $email, $password) {
        $query = "INSERT INTO $this->table (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nama, $email, $password);
        return $stmt->execute();
    }

    // READ ALL: Ambil semua pengguna
    public function readAll() {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        return $this->conn->query($query);
    }

    // READ BY ID: Ambil pengguna berdasarkan ID
    public function readById($id) {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE: Perbarui data pengguna
    public function update($id, $nama, $email) {
        $query = "UPDATE $this->table SET nama = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $nama, $email, $id);
        return $stmt->execute();
    }

    // DELETE: Hapus pengguna
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>