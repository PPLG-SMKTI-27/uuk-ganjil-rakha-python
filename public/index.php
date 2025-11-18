<?php
session_start();

$url = $_GET['url'] ?? 'login';

// Redirect jika belum login
if (!isset($_SESSION['role']) && $url !== 'login') {
    header("Location: ?url=login");
    exit;
}

switch ($url) {

    // ================= LOGIN ===================
    case 'login':
        require_once __DIR__ . '/../controllers/Authcontroller.php';
        $auth = new AuthController();
        $auth->login();
        break;

    case 'logout':
        session_destroy();
        header("Location: ?url=login");
        exit;



    // ================= DASHBOARD ADMIN ===================
    case 'dashboard':
        // Admin selalu boleh
        if ($_SESSION['role'] !== 'admin') {
            echo "Akses ditolak!";
            exit;
        }
        require_once __DIR__ . '/../views/admin/dashboard.php';
        break;



    // ================= DASHBOARD SISWA ===================
    case 'siswa/dashboard':
        // Admin boleh, siswa boleh
        if ($_SESSION['role'] !== 'siswa' && $_SESSION['role'] !== 'admin') {
            echo "Akses ditolak!";
            exit;
        }
        require_once __DIR__ . '/../views/siswa/dashboard.php';
        break;



    // ================= IZIN (BUAT IZIN) ===================
    case 'izin/buat':
        // Admin boleh, siswa boleh
        if ($_SESSION['role'] !== 'siswa' && $_SESSION['role'] !== 'admin') {
            echo "Akses ditolak!";
            exit;
        }
        require_once __DIR__ . '/../controllers/izincontrollers.php';
        $izin = new IzinController();
        $izin->buatIzin();
        break;



    // ================= VERIFIKASI IZIN ===================
    case 'izin/verifikasi':
        // Admin boleh, wali boleh
        if ($_SESSION['role'] !== 'wali' && $_SESSION['role'] !== 'admin') {
            echo "Akses ditolak!";
            exit;
        }
        require_once __DIR__ . '/../controllers/izincontrollers.php';
        $izin = new IzinController();
        $izin->verifikasi();
        break;



    // ================= LIST SISWA (WALI & ADMIN) ===================
    case 'siswa/list':
        // Admin boleh, wali boleh
        if ($_SESSION['role'] !== 'wali' && $_SESSION['role'] !== 'admin') {
            echo "Akses ditolak!";
            exit;
        }
        require_once __DIR__ . '/../controllers/siswacontrollers.php';
        $ctrl = new SiswaController();
        $ctrl->listSiswa();
        break;



    // ================= DEFAULT (ERROR) ===================
    default:
        echo "Halaman tidak ditemukan!";
}
