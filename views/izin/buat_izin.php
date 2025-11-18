<h2>Form Pengajuan Izin</h2>

<!-- Tombol Logout -->
<a href="?url=logout" 
   style="display:inline-block; margin-bottom:15px; padding:8px 15px; background:red; color:white; text-decoration:none; border-radius:5px;">
   Logout
</a>

<form action="?url=izin/buat" method="POST">

    <label>ID Siswa:</label><br>
    <input type="number" name="id_siswa" required>
    <br><br>

    <label>Alasan:</label><br>
    <input type="text" name="alasan" required>
    <br><br>

    <label>Waktu Keluar:</label><br>
    <input type="time" name="waktu_keluar" required>
    <br><br>

    <button type="submit">Ajukan Izin</button>
</form>
