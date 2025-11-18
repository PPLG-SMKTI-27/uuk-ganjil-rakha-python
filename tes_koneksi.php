<?php
require_once "config/database.php";  

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    echo "Koneksi BERHASIL!";
} else {
    echo "Koneksi GAGAL!";
}
