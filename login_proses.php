<?php
include "config/koneksi.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pw   = $_POST['password'];

    $result = mysqli_query($conn, "select * from login 
		where username = '" . $user . "' and password = '" .
        $pw . "'");

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $user;

        header("Location: index.php");
        die();
    } else {
        echo "<i style='color:red;'>password salah</i>";
    }
} else {
    echo "<i style='color:red;'> Usernam belum terdaftar</i>";
}
header("location: login.php");
