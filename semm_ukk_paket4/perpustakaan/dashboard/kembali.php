<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM detail_peminjaman 
WHERE id_peminjaman='$id'
");
$d = mysqli_fetch_assoc($data);

mysqli_query($conn,"UPDATE peminjaman 
SET status='dikembalikan',
tanggal_kembali=CURDATE()
WHERE id_peminjaman='$id'");

mysqli_query($conn,"UPDATE buku 
SET stok = stok + 1 
WHERE id_buku='$d[id_buku]'");

header("Location: transaksi.php");
