<h2>Daftar Perizinan Siswa</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>ID Siswa</th>
        <th>Alasan</th>
        <th>Waktu Keluar</th>
        <th>Status</th>
    </tr>

    <?php foreach($data as $izin): ?>
    <tr>
        <td><?= $izin['id_izin']; ?></td>
        <td><?= $izin['id_siswa']; ?></td>
        <td><?= $izin['alasan']; ?></td>
        <td><?= $izin['waktu_keluar']; ?></td>
        <td><?= $izin['status']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
