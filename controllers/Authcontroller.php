<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {

    private $model;

    public function __construct() {
        // Session sudah dari index.php

        $database = new Database();
        $db = $database->getConnection();
        $this->model = new User($db);
    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            // Ambil user berdasarkan username
            $user = $this->model->getByUsername($username);

if ($user && $password === $user['password']) {

                // Simpan session
                $_SESSION['user'] = $user;
                $_SESSION['role'] = $user['role'];
                $_SESSION['id_user'] = $user['id_user'];

                // Redirect sesuai role
                if ($user['role'] === 'siswa') {
                    header("Location: ?url=izin/buat");
                    exit;
                }
                elseif ($user['role'] === 'wali') {
                    header("Location: ?url=izin/verifikasi");
                    exit;
                }
                elseif ($user['role'] === 'admin') {
                    header("Location: ?url=dashboard");
                    exit;
                }
            } else {
                $error = "Username atau password salah!";
            }
        }

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: ?url=login");
        exit;
    }
}
