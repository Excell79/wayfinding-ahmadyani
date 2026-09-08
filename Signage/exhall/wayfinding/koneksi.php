<?php

$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika pakai Laragon
$db   = "komersial_data"; // 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>