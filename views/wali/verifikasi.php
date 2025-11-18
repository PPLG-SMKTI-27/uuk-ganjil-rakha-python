<!-- views/wali/verifikasi.php -->
<h2>Verifikasi Izin Siswa</h2>

<?php
// pastikan $izin ada dan berupa array
if (empty($izin) || !is_array($izin) || count($izin) === 0): ?>
    <p>Tidak ada izin yang menunggu verifikasi.</p>
<?php else: ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID Izin</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($izin as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']); ?></td>
                    <td><?= htmlspecialchars($row['nama_siswa'] ?? $row['nama'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($row['kelas'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($row['alasan']); ?></td>
                    <td><?= htmlspecialchars($row['status']); ?></td>
                    <td>
                        <?php if ($row['status'] === 'pending'): ?>
                            <a href="?url=izin/verifikasi&id=<?= $row['id'] ?>&action=approve">Setuju</a> |
                            <a href="?url=izin/verifikasi&id=<?= $row['id'] ?>&action=reject">Tolak</a>
                        <?php else: ?>
                            Sudah <?= htmlspecialchars($row['status']); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
