<?php
include "../config/koneksi.php";

if (isset($_POST['pinjam'])) {
    $anggota = $_POST['anggota'];
    $buku = $_POST['buku'];
    $tgl = date('Y-m-d');

    mysqli_query($conn, "INSERT INTO peminjaman 
    VALUES (NULL,'$anggota','$tgl',NULL,'dipinjam')");

    $id_pinjam = mysqli_insert_id($conn);

    mysqli_query($conn, "INSERT INTO detail_peminjaman 
    VALUES (NULL,'$id_pinjam','$buku',1)");

    mysqli_query($conn, "UPDATE buku 
        SET stok = stok - 1 
        WHERE id_buku='$buku'");

    header("Location: transaksi.php");
}
?>

<h2>Pinjam Buku</h2>

<form method="POST">
    Anggota:
    <select name="anggota">
        <?php
        $a = mysqli_query($conn,"SELECT * FROM anggota");
        while($d=mysqli_fetch_assoc($a)){
            echo "<option value='$d[id_anggota]'>$d[nama]</option>";
        }
        ?>
    </select><br>

    Buku:
    <select name="buku">
        <?php
        $b = mysqli_query($conn,"SELECT * FROM buku WHERE stok > 0");
        while($d=mysqli_fetch_assoc($b)){
            echo "<option value='$d[id_buku]'>$d[judul]</option>";
        }
        ?>
    </select><br>

    <button name="pinjam">Pinjam</button>
</form>
