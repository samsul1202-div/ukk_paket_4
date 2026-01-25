<h3>Data Peminjaman</h3>

<?php if ($role == 'user') { ?>
    <a href="pinjam.php" class="btn btn-primary mb-2">📘 Pinjam Buku</a>
<?php } ?>

<table class="table table-bordered">
<tr>
    <th>Nama</th>
    <th>Tanggal Pinjam</th>
    <th>Status</th>
    <?php if ($role == 'admin') echo "<th>Aksi</th>"; ?>
</tr>

<?php while($d = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['tanggal_pinjam'] ?></td>
    <td><?= $d['status'] ?></td>

    <?php if ($role == 'admin') { ?>
        <td>
            <?php if ($d['status'] == 'dipinjam') { ?>
                <a href="kembali.php?id=<?= $d['id_peminjaman'] ?>" 
                   class="btn btn-success btn-sm">
                   Kembalikan
                </a>
            <?php } ?>
        </td>
    <?php } ?>
</tr>
<?php } ?>
</table>
