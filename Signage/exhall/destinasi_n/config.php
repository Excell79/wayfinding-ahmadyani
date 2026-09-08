<?php
/**
 * config.php — Root kiosk (destinasi_n/)
 * Dipakai oleh index.php & wisata.php publik
 */

// ── Koneksi Database ─────────────────────────────────────
$databaseHost     = 'localhost';
$databaseName     = 'komersial_data';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$mysqli) die('<div style="font-family:sans-serif;padding:40px;color:#c0392b">
    <h2>⚠️ Koneksi Database Gagal</h2>
    <p>' . mysqli_connect_error() . '</p>
    <p style="font-size:13px;color:#666">Pastikan MySQL sudah berjalan dan konfigurasi benar.</p>
</div>');
mysqli_set_charset($mysqli, 'utf8mb4');

// ── Path Gambar ──────────────────────────────────────────
define('IMG_BASE', 'admin/public/gambar/wisata/');
define('QR_BASE',  'admin/public/gambar/wisata/qr/');
define('NO_IMG',   'admin/public/gambar/wisata/no-thumb.jpg');

// ── Helper escape ─────────────────────────────────────────
function e($s): string {
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}
