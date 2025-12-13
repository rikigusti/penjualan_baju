<?php
include 'header_admin.php';
include '../koneksi.php';

$q=mysqli_query($koneksi,"SELECT * FROM transaksi");
while($t=mysqli_fetch_assoc($q)){
echo "ID {$t['id']} | Rp ".number_format($t['total'])." | {$t['metode_pembayaran']} 
<a href='invoice.php?id={$t['id']}'>Invoice</a><br>";
}
include 'footer_admin.php';
