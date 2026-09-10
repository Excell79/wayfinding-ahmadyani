<?php
$host = '127.0.0.1'; // IP default localhost Laragon
$db   = 'feedback';  // Nama database lu yang ada di HeidiSQL
$user = 'root';      // Username bawaan Laragon
$pass = '';          // Password bawaan Laragon emang kosong
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Biar kalau error langsung nongol pesan jelas
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Kalau mau ngetes, idupin kode echo di bawah ini (hapus tanda //)
    // echo "Koneksi ke HeidiSQL sukses, Bro!";
} catch (\PDOException $e) {
    die("Waduh, koneksi database gagal: " . $e->getMessage());
}
?>