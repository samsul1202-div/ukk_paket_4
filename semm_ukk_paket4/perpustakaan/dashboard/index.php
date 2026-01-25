<?php include "header.php"; ?>

<h3>Dashboard</h3>
<p>Selamat datang, <b><?= $user['nama'] ?></b></p>
<p>Role: <b><?= $user['role'] ?></b></p>

<?php if ($role == 'admin') { ?>
    <a href="buku.php" class="btn btn-primary">Kelola Buku</a>
    <a href="anggota.php" class="btn btn-success">Kelola Anggota</a>
<?php } ?>

<a href="transaksi.php" class="btn btn-warning">Peminjaman</a>

