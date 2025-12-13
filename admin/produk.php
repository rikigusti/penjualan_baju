<?php
include 'header_admin.php';
include '../koneksi.php';

$q = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY id DESC");
?>

<h3 class="mb-3">Dashboard Produk</h3>

<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Kelola data produk kaos</span>
    <a href="tambah_produk.php" class="btn btn-success">
        + Tambah Produk
    </a>
</div>

<div class="table-responsive">
<table class="table table-bordered table-hover align-middle">
<thead class="table-dark text-center">
<tr>
    <th width="60">No</th>
    <th width="120">Gambar</th>
    <th>Nama Produk</th>
    <th width="120">Harga</th>
    <th width="80">Stok</th>
    <th width="150">Aksi</th>
</tr>
</thead>

<tbody>
<?php 
$no = 1;
while($p = mysqli_fetch_assoc($q)){ 
?>
<tr>
    <td class="text-center"><?= $no++ ?></td>

    <td class="text-center">
        <?php if($p['gambar']){ ?>
            <img src="../assets/img/produk/<?= $p['gambar'] ?>" 
                 width="80" height="80"
                 style="object-fit:cover;border-radius:8px">
        <?php } else { ?>
            <span class="text-muted">No Image</span>
        <?php } ?>
    </td>

    <td>
        <strong><?= $p['nama_produk'] ?></strong><br>
        <small class="text-muted">
            <?= substr($p['deskripsi'],0,50) ?>...
        </small>
    </td>

    <td>Rp <?= number_format($p['harga']) ?></td>

    <td class="<?= $p['stok'] < 5 ? 'text-danger fw-bold' : '' ?>">
        <?= $p['stok'] ?>
    </td>

    <td class="text-center">
        <a href="edit_produk.php?id=<?= $p['id'] ?>" 
           class="btn btn-warning btn-sm mb-1">
           Edit
        </a>
        <a href="hapus_produk.php?id=<?= $p['id'] ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus produk ini?')">
           Hapus
        </a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<?php include 'footer_admin.php'; ?>
