<?php
session_start();

session_destroy();
echo "<script>alert('You Have Logout'); window.location.href='login.php';</script>";
?>