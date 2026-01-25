<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user = $_SESSION['user'];
$role = $user['role'];
?>



<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">📚 Sistem Perpustakaan</span>
        <span class="text-white">
            <?= $user['nama'] ?> | <?= $user['role'] ?>
            <a href="../auth/logout.php" class="btn btn-danger btn-sm ms-2">Logout</a>
        </span>
    </div>
</nav>

<ul class="nav flex-column">
    <li class="nav-item">
        <a href="index.php" class="nav-link">🏠 Dashboard</a>
    </li>

    <?php if ($role == 'admin') { ?>
        <li class="nav-item">
            <a href="buku.php" class="nav-link">📚 Kelola Buku</a>
        </li>
        <li class="nav-item">
            <a href="anggota.php" class="nav-link">👤 Kelola Anggota</a>
        </li>
    <?php } ?>

    <li class="nav-item">
        <a href="transaksi.php" class="nav-link">📄 Peminjaman</a>
    </li>
</ul>


    <div class="col-md-10 p-4">
