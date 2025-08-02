<h2>Daftar Mahasiswa</h2>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>NIM</th><th>Nama</th><th>Prodi</th><th>Universitas</th><th>No HP</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mahasiswa as $m): ?>
        <tr>
            <td><?= $m['nim']; ?></td>
            <td><?= $m['nama']; ?></td>
            <td><?= $m['prodi']; ?></td>
            <td><?= $m['universitas']; ?></td>
            <td><?= $m['no_hp']; ?></td>
            <td><a href="/crud/edit/<?= $m['id']; ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
