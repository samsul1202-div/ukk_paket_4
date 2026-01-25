<?php
include "header.php";
include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT buku.*, kategori.nama_kategori 
FROM buku JOIN kategori ON buku.id_kategori=kategori.id_kategori");
?>

<h3>Data Buku</h3>
<a href="buku_tambah.php" class="btn btn-primary mb-2">+ Tambah Buku</a>

<table class="table table-bordered table-striped">
    <tr class="table-dark">
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

<?php $no=1; while($b=mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $b['judul'] ?></td>
    <td><?= $b['penulis'] ?></td>
    <td><?= $b['nama_kategori'] ?></td>
    <td><?= $b['stok'] ?></td>
    <td>
        <a href="buku_edit.php?id=<?= $b['id_buku'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="buku_hapus.php?id=<?= $b['id_buku'] ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus buku?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<?php include "footer.php"; ?>
