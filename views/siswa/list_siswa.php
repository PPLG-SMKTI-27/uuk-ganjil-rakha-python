<h2>Daftar Siswa</h2>
<a href="?url=siswa/add">Tambah Siswa</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    <?php foreach($data as $s) : ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['nis'] ?></td>
        <td><?= $s['nama'] ?></td>
        <td><?= $s['kelas'] ?></td>
        <td>
            <a href="?url=siswa/edit&id=<?= $s['id'] ?>">Edit</a> |
            <a href="?url=siswa/delete&id=<?= $s['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>