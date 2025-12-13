<?php
include '../koneksi.php';

$id = $_GET['id'];
$p = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT gambar FROM produk WHERE id=$id"));

if($p['gambar']){
    unlink("../assets/img/produk/".$p['gambar']);
}

mysqli_query($koneksi,"DELETE FROM produk WHERE id=$id");

header("Location: produk.php");
