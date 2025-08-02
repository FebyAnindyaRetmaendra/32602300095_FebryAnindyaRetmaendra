<h2>Edit Data Mahasiswa</h2>
<form action="/crud/update/<?= $mhs['id']; ?>" method="post">
    <label>Nim:</label><br>
    <input type="text" name="nim" value="<?= $mhs['nim']; ?>"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $mhs['nama']; ?>"><br>

    <label>Prodi:</label><br>
    <input type="text" name="prodi" value="<?= $mhs['prodi']; ?>"><br>

    <label>Universitas:</label><br>
    <input type="text" name="universitas" value="<?= $mhs['universitas']; ?>"><br>

    <label>Nomor Handphone:</label><br>
    <input type="text" name="no_hp" value="<?= $mhs['no_hp']; ?>"><br><br>

    <button type="submit">Update</button>
</form>
