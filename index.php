<?php
session_start();
include "config/koneksi.php";
if (empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!');location=('login.php');</script>";
}
$petugas = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="refresh" content="0;url=pages/index.php">
    <title>Inventori Barang</title>
    <script language="javascript">
        window.location.href = "pages/index.php"
    </script>
</head>

<body>
    Go to <a href="pages/index.php">/pages/index.php</a>
</body>

</html>