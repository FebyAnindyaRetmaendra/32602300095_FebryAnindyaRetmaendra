<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<h2 class="mb-4 text-center bi bi-book-half ">Daftar Buku</h2>

<!-- Statistik Buku -->
<div class="row mb-4">
    <div class="col-md-4 mb-2">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body">
                <h6 class="card-title" style="font-size:14px; font-weight:500; opacity:0.9;">Total Buku</h6>
                <h4 class="card-text" style="font-size:24px; font-weight:600;"><?= $total_buku ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body">
                <h6 class="card-title" style="font-size:14px; font-weight:500; opacity:0.9;">Buku Tersedia</h6>
                <h4 class="card-text" style="font-size:24px; font-weight:600;"><?= $buku_tersedia ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card text-white bg-danger shadow-sm">
            <div class="card-body">
                <h6 class="card-title" style="font-size:14px; font-weight:500; opacity:0.9;">Tidak Tersedia</h6>
                <h4 class="card-text" style="font-size:24px; font-weight:600;"><?= $buku_tidak_tersedia ?></h4>
            </div>
        </div>
    </div>
</div>

<!-- Flash Success -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif ?>

<!-- Form Pencarian -->
<form method="get" action="/buku" class="row g-2 align-items-center mb-3">
    <div class="col-auto">
        <input type="text" name="q" value="<?= esc($keyword ?? '') ?>" class="form-control" placeholder="Cari judul atau kode..." style="min-width:220px;">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
    <div class="col-auto">
        <a href="/buku" class="btn btn-link text-decoration-none">Reset</a>
    </div>
</form>

<!-- Tombol Tambah -->
<div class="mb-3">
    <a href="/buku/create" class="btn btn-success">+ Tambah Buku</a>
</div>

<!-- Tabel Buku -->
<div class="table-responsive">
    <table class="table table-bordered table-striped bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $b): ?>
                <tr style="transition: background-color 0.2s ease-in-out;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                    <td><?= esc($b['kode_buku']) ?></td>
                    <td><?= esc($b['judul']) ?></td>
                    <td><?= esc($b['penulis']) ?></td>
                    <td><?= esc($b['tahun_terbit']) ?></td>
                    <td>
                        <span class="badge <?= $b['ketersediaan'] ? 'bg-success' : 'bg-danger' ?>">
                            <?= $b['ketersediaan'] ? 'Tersedia' : 'Tidak tersedia' ?>
                        </span>
                    </td>
                    <td>
                        <a href="/buku/edit/<?= $b['id'] ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                        <a href="/buku/delete/<?= $b['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>