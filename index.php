<?php
include 'koneksi.php';
include 'header.php';
$data = mysqli_query($koneksi,"SELECT * FROM produk");
?>

<div class="row">
<?php while($p=mysqli_fetch_assoc($data)){ ?>
<div class="col-md-4 col-sm-6 mb-4">
  <div class="card p-3 h-100">
    <img src="assets/img/produk/<?= $p['gambar'] ?>" class="img-fluid mb-2">
    <h5 class="card-title"><?= $p['nama_produk'] ?></h5>
    <p><?= $p['deskripsi'] ?></p>
    <p class="harga">Rp <?= number_format($p['harga']) ?></p>

    <?php if($p['stok']>0){ ?>
      <a href="keranjang.php?id=<?= $p['id'] ?>" class="btn btn-primary">Tambah ke Keranjang</a>
    <?php }else{ ?>
      <button class="btn btn-secondary" disabled>Stok Habis</button>
    <?php } ?>
  </div>
</div>
<?php } ?>
</div>

<?php include 'footer.php'; ?>
