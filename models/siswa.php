<?php
class Siswa {
    private $conn;
    private $table = "siswa";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Membaca semua siswa
    public function readAll() {
        $query = "SELECT * FROM $this->table ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Membaca 1 siswa
    public function read($id) {
        $query = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan siswa
    public function create($nis, $nama, $kelas, $email, $telp) {
        $query = "INSERT INTO $this->table (nis, nama, kelas, email, telp) VALUES (:nis, :nama, :kelas, :email, :telp)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindparam(':email', $email);
        $stmt->bindParam(':telp', $telp);
        return $stmt->execute();
    }

    // Update siswa
    public function update($id, $nis, $nama, $kelas) {
        $query = "UPDATE $this->table SET nis=:nis, nama=:nama, kelas=:kelas, email=:email, telp=:telp WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telp', $telp);
        return $stmt->execute();
    }

    // Hapus siswa
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
