<?php
include 'koneksi.php';
include 'header.php';

if(empty($_SESSION['keranjang'])){
    echo "<p>Keranjang kosong</p>";
    include 'footer.php';
    exit;
}

if(isset($_POST['bayar'])){
    $metode = $_POST['metode'];
    $total = 0;

    foreach($_SESSION['keranjang'] as $id){
        $p = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM produk WHERE id=$id"));
        $total += $p['harga'];
    }

    mysqli_query($koneksi,"INSERT INTO transaksi (total,metode_pembayaran) VALUES ($total,'$metode')");
    $tid = mysqli_insert_id($koneksi);

    foreach($_SESSION['keranjang'] as $id){
        $p = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM produk WHERE id=$id"));
        mysqli_query($koneksi,"INSERT INTO detail_transaksi (transaksi_id,produk_id,jumlah,harga) VALUES ($tid,$id,1,{$p['harga']})");
        mysqli_query($koneksi,"UPDATE produk SET stok=stok-1 WHERE id=$id");
    }

    unset($_SESSION['keranjang']);
    echo "<h4>Pembayaran berhasil ($metode)</h4>";
    include 'footer.php';
    exit;
}
?>

<form method="post">
<select name="metode" class="form-select mb-3" required>
  <option>Transfer Bank</option>
  <option>E-Wallet</option>
  <option>COD</option>
</select>
<button name="bayar" class="btn btn-primary">Bayar Sekarang</button>
</form>

<?php include 'footer.php'; ?>
