<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['user']['role'] != 'admin') {
    echo "<script>alert('Akses ditolak!');location='index.php';</script>";
    exit;
}


$data = mysqli_query($conn, "SELECT buku.*, kategori.nama_kategori 
FROM buku JOIN kategori ON buku.id_kategori=kategori.id_kategori");
?>

<h2>Data Buku</h2>
<a href="buku_tambah.php">+ Tambah Buku</a>
<br><br>

<table border="1">
<tr>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Kategori</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php while($b = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $b['judul'] ?></td>
    <td><?= $b['penulis'] ?></td>
    <td><?= $b['nama_kategori'] ?></td>
    <td><?= $b['stok'] ?></td>
    <td>
        <a href="buku_edit.php?id=<?= $b['id_buku'] ?>">Edit</a> |
        <a href="buku_hapus.php?id=<?= $b['id_buku'] ?>" 
           onclick="return confirm('Hapus buku?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>
