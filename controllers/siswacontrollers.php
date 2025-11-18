<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Siswa.php';

class SiswaController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Siswa($db);
    }

    // List semua siswa
    public function listSiswa() {
        $data = $this->model->readAll();
        require_once __DIR__ . '/../views/siswa/list_siswa.php';
    }

    // Form tambah siswa
    public function addSiswa() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nis   = $_POST['nis'];
            $nama  = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $email = $_POST['email'];
            $telp  = $_POST['telp'];
            $this->model->create($nis, $nama, $kelas, $email, $telp);
            header("Location: ?url=siswa/list");
            exit;
        }
        require_once __DIR__ . '/../views/siswa/add_siswa.php';
    }

    // Form edit siswa
    public function editSiswa($id) {
        $siswa = $this->model->read($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nis   = $_POST['nis'];
            $nama  = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $email = $_POST['email'];
            $telp  = $_POST['telp'];
            $this->model->update($id, $nis, $nama, $kelas, $email, $telp);
            header("Location: ?url=siswa/list");
            exit;
        }

        require_once __DIR__ . '/../views/siswa/edit_siswa.php';
    }

    // Hapus siswa
    public function deleteSiswa($id) {
        $this->model->delete($id);
        header("Location: ?url=siswa/list");
        exit;
    }
}

