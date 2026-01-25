<?php
session_start();
include "../config/koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users 
        WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $data;

        // Redirect sesuai role
        header("Location: ../dashboard/index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
