<?php
include "../config/koneksi.php";
if ($_SESSION['user']['role'] != 'admin') {
    echo "<script>alert('Akses ditolak!');location='index.php';</script>";
    exit;
}

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO buku VALUES (
        NULL,
        '$_POST[judul]',
        '$_POST[penulis]',
        '$_POST[penerbit]',
        '$_POST[tahun]',
        '$_POST[kategori]',
        '$_POST[stok]'
    )");

    header("Location: buku.php");
}
?>

<h2>Tambah Buku</h2>

<form method="POST">
    Judul <input type="text" name="judul"><br>
    Penulis <input type="text" name="penulis"><br>
    Penerbit <input type="text" name="penerbit"><br>
    Tahun <input type="number" name="tahun"><br>

    Kategori
    <select name="kategori">
        <?php
        $kat = mysqli_query($conn,"SELECT * FROM kategori");
        while($k=mysqli_fetch_assoc($kat)){
            echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
        }
        ?>
    </select><br>

    Stok <input type="number" name="stok"><br>
    <button name="simpan">Simpan</button>
</form>
