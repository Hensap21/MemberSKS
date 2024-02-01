<?php
$host   = 'localhost';
$db_name = 'db_sks';
$db_user = 'root';
$db_pass = '';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}
?>
