<?php
include 'header_admin.php';
include '../koneksi.php';

// Total produk
$qProduk = mysqli_query($koneksi,"SELECT COUNT(*) AS total FROM produk");
$totalProduk = mysqli_fetch_assoc($qProduk)['total'];

// Total stok
$qStok = mysqli_query($koneksi,"SELECT SUM(stok) AS total FROM produk");
$totalStok = mysqli_fetch_assoc($qStok)['total'];

// Total nilai stok
$qNilai = mysqli_query($koneksi,"SELECT SUM(harga * stok) AS total FROM produk");
$totalNilai = mysqli_fetch_assoc($qNilai)['total'];

// Produk stok menipis
$qMenipis = mysqli_query($koneksi,"SELECT * FROM produk WHERE stok < 5");
?>

<h3 class="mb-4">Dashboard Admin</h3>

<div class="row">
    <div class="col-md-3 col-6 mb-3">
        <div class="card shadow text-center p-3">
            <h6>Total Produk</h6>
            <h3><?= $totalProduk ?></h3>
        </div>
    </div>

    <div class="col-md-3 col-6 mb-3">
        <div class="card shadow text-center p-3">
            <h6>Total Stok</h6>
            <h3><?= $totalStok ?></h3>
        </div>
    </div>

    <div class="col-md-3 col-6 mb-3">
        <div class="card shadow text-center p-3">
            <h6>Nilai Stok</h6>
            <h4>Rp <?= number_format($totalNilai) ?></h4>
        </div>
    </div>

    <div class="col-md-3 col-6 mb-3">
        <div class="card shadow text-center p-3 border-danger">
            <h6>Stok Menipis</h6>
            <h3><?= mysqli_num_rows($qMenipis) ?></h3>
        </div>
    </div>
</div>

<hr>

<h5>Produk Stok Menipis</h5>

<?php if(mysqli_num_rows($qMenipis) > 0){ ?>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
    <th>Nama Produk</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php while($p = mysqli_fetch_assoc($qMenipis)){ ?>
<tr>
    <td><?= $p['nama_produk'] ?></td>
    <td class="text-danger fw-bold"><?= $p['stok'] ?></td>
    <td>
        <a href="edit_produk.php?id=<?= $p['id'] ?>" 
           class="btn btn-warning btn-sm">
           Update Stok
        </a>
    </td>
</tr>
<?php } ?>
</table>
</div>
<?php } else { ?>
<p class="text-muted">Semua stok aman 👍</p>
<?php } ?>

<div class="mt-3">
    <a href="produk.php" class="btn btn-primary">
        Kelola Semua Produk
    </a>
</div>

<?php include 'footer_admin.php'; ?>
