<?php
?>

<h2>Kelola Data Siswa (Admin)</h2>

<!-- Tombol tambah siswa -->
<a href="?url=siswa/add">Tambah Siswa</a>
<br><br>

<!-- Tabel daftar siswa -->
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($data)): ?>
        <?php foreach($data as $siswa): ?>
        <tr>
            <td><?= $siswa['id']; ?></td>
            <td><?= $siswa['nama']; ?></td>
            <td><?= $siswa['kelas']; ?></td>
            <td>
                <a href="?url=siswa/edit&id=<?= $siswa['id']; ?>">Edit</a> |
                <a href="?url=siswa/delete&id=<?= $siswa['id']; ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" align="center">Belum ada data siswa</td>
        </tr>
    <?php endif; ?>
</table>
