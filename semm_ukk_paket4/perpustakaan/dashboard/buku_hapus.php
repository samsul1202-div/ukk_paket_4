<?php
include "../config/koneksi.php";
$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM buku WHERE id_buku='$id'");
header("Location: buku.php");
if ($_SESSION['user']['role'] != 'admin') {
    echo "<script>alert('Akses ditolak!');location='index.php';</script>";
    exit;
}

