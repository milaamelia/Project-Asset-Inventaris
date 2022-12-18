<?php
include "config/koneksi.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pw   = $_POST['password'];
    $akses = $_POST['level'];

    $result = mysqli_query($conn, "select * from login 
		where username = '" . $user . "' and password = '" .
        $pw . "' and level = '" . $akses . "' ");

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['level'] = $akses;

        header("Location: index.php");
        die();
    } else {
        echo "<script>alert('Password Atau Username Anda Salah !');</script>";
    }
} else {
    echo "<script>alert('Username Anda belum terdaftar !');</script>";
}
echo "<script>location=('login.php');</script>";
