<?php
include 'koneksi.php';
include 'header.php';

if(isset($_GET['id'])){
    $_SESSION['keranjang'][] = $_GET['id'];
}

$total = 0;
if(!empty($_SESSION['keranjang'])){
    foreach($_SESSION['keranjang'] as $id){
        $q = mysqli_query($koneksi,"SELECT * FROM produk WHERE id=$id");
        $p = mysqli_fetch_assoc($q);
        echo "<p>{$p['nama_produk']} - Rp ".number_format($p['harga'])."</p>";
        $total += $p['harga'];
    }
}
?>

<h4>Total: Rp <?= number_format($total) ?></h4>
<a href="checkout.php" class="btn btn-primary">Checkout</a>

<?php include 'footer.php'; ?>
