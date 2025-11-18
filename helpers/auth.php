<?php
function requireRole($allowedRoles) {
    if (!isset($_SESSION['role'])) {
        header("Location: ?url=login");
        exit;
    }

    if (!is_array($allowedRoles)) {
        $allowedRoles = [$allowedRoles];
    }

    // ADMIN BOLEH SEMUA
    if ($_SESSION['role'] === 'admin') {
        return;
    }

    if (!in_array($_SESSION['role'], $allowedRoles)) {
        echo "Akses ditolak!";
        exit;
    }
}
