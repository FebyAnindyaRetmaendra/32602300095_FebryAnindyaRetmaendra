<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background: #f9f9f9;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 25px;
            border-radius: 6px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        p {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-list {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <h2>Tambah Buku</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="error-list">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="/buku/store" method="post">
        <p>
            <label for="kode_buku">Kode Buku:</label>
            <input type="text" name="kode_buku" id="kode_buku" value="<?= old('kode_buku') ?>" required>
        </p>
        <p>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="<?= old('judul') ?>" required>
        </p>
        <p>
            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" id="penulis" value="<?= old('penulis') ?>" required>
        </p>
        <p>
            <label for="penerbit">Penerbit:</label>
            <input type="text" name="penerbit" id="penerbit" value="<?= old('penerbit') ?>" required>
        </p>
        <p>
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?= old('tahun_terbit') ?>" required>
        </p>
        <p>
            <label for="ketersediaan">Ketersediaan:</label>
            <select name="ketersediaan" id="ketersediaan">
                <option value="1" <?= old('ketersediaan') == '1' ? 'selected' : '' ?>>Tersedia</option>
                <option value="0" <?= old('ketersediaan') == '0' ? 'selected' : '' ?>>Tidak Tersedia</option>
            </select>
        </p>
        <button type="submit">Simpan</button>
    </form>

</body>

</html>