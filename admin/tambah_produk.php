<?php
include 'header_admin.php';
include '../koneksi.php';

if(isset($_POST['simpan'])){
    $nama  = $_POST['nama_produk'];
    $desk  = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    // === UPLOAD GAMBAR ===
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // Bikin nama unik
    $nama_gambar = time().'_'.$gambar;
    $folder = "../assets/img/produk/".$nama_gambar;

    move_uploaded_file($tmp, $folder);

    mysqli_query($koneksi,"
        INSERT INTO produk (nama_produk, deskripsi, harga, stok, gambar)
        VALUES ('$nama','$desk','$harga','$stok','$nama_gambar')
    ");

    header("Location: produk.php");
}
?>

<h3>Tambah Produk</h3>

<form method="post" enctype="multipart/form-data">
<input name="nama_produk" class="form-control mb-2" placeholder="Nama Produk" required>

<textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

<input name="harga" type="number" class="form-control mb-2" placeholder="Harga" required>

<input name="stok" type="number" class="form-control mb-2" placeholder="Stok" required>

<input type="file" name="gambar" class="form-control mb-3" required>

<button name="simpan" class="btn btn-success">Simpan</button>
</form>

<?php include 'footer_admin.php'; ?>
