<?php

class Izin {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ================= CREATE =================
    public function create($id_siswa, $alasan, $waktu_keluar) {
        $sql = "INSERT INTO perizinan 
                (id_siswa, alasan, waktu_keluar, status, tanggal_pengajuan) 
                VALUES (?, ?, ?, 'pending', NOW())";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_siswa, $alasan, $waktu_keluar]);
    }
public function readAll() {
    $query = "
        SELECT 
            p.id_izin,
            p.id_siswa,
            p.alasan,
            p.waktu_keluar,
            p.status,
            s.nama AS nama_siswa,
            s.kelas
        FROM perizinan p
        JOIN siswa s ON p.id_siswa = s.id
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    // ================= UPDATE STATUS =================
  public function updateStatus($id_izin, $status) {
    $query = "UPDATE perizinan SET status = :status WHERE id_izin = :id_izin";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id_izin', $id_izin);
    return $stmt->execute();
}

 public function readPending() {
    $query = "
        SELECT 
            p.id_izin AS id,
            p.alasan,
            p.status,
            p.waktu_keluar,
            p.tanggal_pengajuan,
            s.nama AS nama_siswa,
            s.kelas
        FROM perizinan p
        JOIN siswa s ON p.id_siswa = s.id
        WHERE p.status = 'pending'
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




}
