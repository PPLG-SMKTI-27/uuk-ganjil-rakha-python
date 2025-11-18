<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/izin.php';

class IzinController {
    private $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Izin($this->db);
    }

    // =================== BUAT IZIN (SISWA) ===================
    public function buatIzin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->model->create($_POST['id_siswa'], $_POST['alasan'], $_POST['waktu_keluar']);

            header("Location: ?url=izin/buat&success=1");
            exit;
        } else {
            require __DIR__ . '/../views/izin/buat_izin.php';
        }
    }

    // =================== LIST IZIN (ADMIN / WALI) ===================
    public function listIzin() {
        $data = $this->model->readAll();
        require __DIR__ . '/../views/izin/list_izin.php';
    }

    // =================== VERIFIKASI IZIN ===================
  public function verifikasi() {
    require_once __DIR__ . '/../helpers/auth.php';
    requireRole(['wali', 'admin']); // wali & admin boleh

    // Jika ada aksi (approve / reject)
    if (isset($_GET['id']) && isset($_GET['action'])) {

        $id = $_GET['id'];
        $action = $_GET['action'];

        if ($action === 'approve') {
            $this->model->updateStatus($id, 'disetujui'); // gunakan 'disetujui' sesuai enum
        } 
        elseif ($action === 'reject') {
            $this->model->updateStatus($id, 'ditolak');
        }

        header("Location: ?url=izin/verifikasi");
        exit;
    }

    // Ambil izin pending — simpan ke variabel yang view pakai ($izin)
    $izin = $this->model->readPending();

    // Tampilkan view
    require __DIR__ . '/../views/wali/verifikasi.php';
}

    // ================== HALAMAN VERIFIKASI KHUSUS ==================
    public function verif() {
        require_once __DIR__ . '/../helpers/auth.php';
        requireRole(['wali', 'admin']);

        $data = $this->model->readPending();

        require __DIR__ . '/../views/wali/verifikasi.php';
    }
}

