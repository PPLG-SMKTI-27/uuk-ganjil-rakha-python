<h2>Edit Siswa</h2>
<form method="POST" action="">
    <label>NIS:</label>
    <input type="text" name="nis" value="<?= $siswa['nis'] ?>" required><br><br>

    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $siswa['nama'] ?>" required><br><br>

    <label>Kelas:</label>
    <input type="text" name="kelas" value="<?= $siswa['kelas'] ?>" required><br><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?= $siswa['email'] ?>" required><br><br>

    <label>Telp:</label>
    <input type="text" name="telp" value="<?= $siswa['telp'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>

