<?php
$host = "0.0.0.0";
$user = "root";
$password = "";
$database = "db_asset_inventaris";

$conn = mysqli_connect($host, $user, $password) or die("Cannot connect database");
mysqli_select_db($conn, $database);
