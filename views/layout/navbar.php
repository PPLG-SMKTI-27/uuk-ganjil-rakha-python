<?php
if (!isset($_SESSION['role'])) {
    return; 
}

$role = $_SESSION['role'];
?>

<nav>
<?php if ($role === 'wali'): ?>
    <a href="?url=siswa/list">Daftar Siswa</a>
    <a href="?url=izin/verifikasi">Verifikasi Izin</a>
<?php endif; ?>

<?php if ($role === 'siswa'): ?>
    <a href="?url=izin/buat">Buat Izin</a>
<?php endif; ?>

<a href="?url=logout">Logout</a>
</nav>

<?php
if (!isset($_SESSION['role'])) {
    return; // Jangan tampilkan navbar sebelum login
}

$role = $_SESSION['role'];
?>

<nav>
<?php if ($role === 'wali'): ?>
    <a href="?url=siswa/list">Daftar Siswa</a>
    <a href="?url=izin/verifikasi">Verifikasi Izin</a>
<?php endif; ?>

<?php if ($role === 'siswa'): ?>
    <a href="?url=izin/buat">Buat Izin</a>
<?php endif; ?>

<a href="?url=logout">Logout</a>
</nav>
