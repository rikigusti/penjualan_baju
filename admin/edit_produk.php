<?php
include 'header_admin.php';
include '../koneksi.php';

$id = $_GET['id'];
$p = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM produk WHERE id=$id"));

if(isset($_POST['update'])){
    $nama  = $_POST['nama_produk'];
    $desk  = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    if(!empty($_FILES['gambar']['name'])){
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];
        $nama_gambar = time().'_'.$gambar;

        move_uploaded_file($tmp, "../assets/img/produk/".$nama_gambar);

        mysqli_query($koneksi,"
            UPDATE produk SET
            nama_produk='$nama',
            deskripsi='$desk',
            harga='$harga',
            stok='$stok',
            gambar='$nama_gambar'
            WHERE id=$id
        ");
    } else {
        mysqli_query($koneksi,"
            UPDATE produk SET
            nama_produk='$nama',
            deskripsi='$desk',
            harga='$harga',
            stok='$stok'
            WHERE id=$id
        ");
    }

    header("Location: produk.php");
}
?>

<h3>Edit Produk</h3>

<form method="post" enctype="multipart/form-data">
<input name="nama_produk" class="form-control mb-2" value="<?= $p['nama_produk'] ?>" required>

<textarea name="deskripsi" class="form-control mb-2"><?= $p['deskripsi'] ?></textarea>

<input name="harga" type="number" class="form-control mb-2" value="<?= $p['harga'] ?>" required>

<input name="stok" type="number" class="form-control mb-2" value="<?= $p['stok'] ?>" required>

<p>Gambar Lama:</p>
<img src="../assets/img/produk/<?= $p['gambar'] ?>" width="100" class="mb-2">

<input type="file" name="gambar" class="form-control mb-3">

<button name="update" class="btn btn-warning">Update</button>
</form>

<?php include 'footer_admin.php'; ?>
