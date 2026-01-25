<?php
include "../config/koneksi.php";
$data = mysqli_query($conn, "
SELECT p.*, a.nama 
FROM peminjaman p 
JOIN anggota a ON p.id_anggota=a.id_anggota
");
?>

<h2>Data Peminjaman</h2>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
</tr>

<?php while($d=mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['tanggal_pinjam'] ?></td>
    <td><?= $d['tanggal_kembali'] ?></td>
    <td><?= $d['status'] ?></td>
</tr>
<?php } ?>
</table>
