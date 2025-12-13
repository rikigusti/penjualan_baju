<?php
include 'header_admin.php';
include '../koneksi.php';
$id=$_GET['id'];

$t=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id=$id"));
echo "<h4>Invoice #$id</h4>";

$d=mysqli_query($koneksi,"SELECT * FROM detail_transaksi WHERE transaksi_id=$id");
while($r=mysqli_fetch_assoc($d)){
$p=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT nama_produk FROM produk WHERE id={$r['produk_id']}"));
echo "{$p['nama_produk']} x {$r['jumlah']} = Rp ".number_format($r['harga'])."<br>";
}
echo "<b>Total: Rp ".number_format($t['total'])."</b>";
