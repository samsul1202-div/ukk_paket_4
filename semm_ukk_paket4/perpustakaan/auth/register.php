<?php
include "../config/koneksi.php";

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    mysqli_query($conn, "INSERT INTO users 
        VALUES (NULL,'$nama','$username','$password','$role')");

    header("Location: login.php");
}
?>
