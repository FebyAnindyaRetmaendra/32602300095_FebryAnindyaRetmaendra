<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form action="/crud/simpan" method="post">
        <label>Nim:</label><br>
        <input type="text" name="nim"><br>

        <label>Nama:</label><br>
        <input type="text" name="nama"><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi"><br>

        <label>Universitas:</label><br>
        <input type="text" name="universitas"><br>

        <label>Nomor Handphone:</label><br>
        <input type="text" name="no_hp"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
