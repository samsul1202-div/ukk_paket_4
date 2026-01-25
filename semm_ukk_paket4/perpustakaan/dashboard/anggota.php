<?php
include "../config/koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM anggota");
if ($_SESSION['user']['role'] != 'admin') {
    echo "<script>alert('Akses ditolak!');location='index.php';</script>";
    exit;
}
?>


<h2>Data Anggota</h2>

<a href="index.php">← Kembali</a>
<table border="1">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No Telp</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><?= $row['no_telp'] ?></td>
</tr>
<?php } ?>
</table>
    