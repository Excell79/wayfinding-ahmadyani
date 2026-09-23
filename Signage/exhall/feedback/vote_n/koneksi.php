<?php
include_once __DIR__ . "/../parserversion/mysql.php";

$db_host = 'localhost';
$db_user = 'root';
$db_name = 'feedback';

// Try standard XAMPP password (empty ""), then custom passwords ("1212", "root")
$conn = @mysql_connect($db_host, $db_user, '');
if (!$conn) {
    $conn = @mysql_connect($db_host, $db_user, '1212');
}
if (!$conn) {
    $conn = @mysql_connect($db_host, $db_user, 'root');
}

if (!$conn) {
    die("<div style='font-family: system-ui, -apple-system, sans-serif; max-width: 600px; margin: 40px auto; padding: 24px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 16px; color: #991b1b;'>
        <h3 style='margin-top:0;'>⚠️ Koneksi Database Gagal</h3>
        <p>Tidak dapat terhubung ke MySQL Server pada <strong>localhost</strong>.</p>
        <p><strong>Penyebab & Solusi:</strong></p>
        <ol style='padding-left: 20px; line-height: 1.6;'>
            <li><strong>MySQL belum aktif:</strong> Buka <em>XAMPP Control Panel</em> dan klik tombol <strong>Start</strong> pada MySQL.</li>
            <li><strong>Password MySQL berbeda:</strong> Sesuaikan password MySQL di file <code>koneksi.php</code>. (Default XAMPP password kosong <code>\"\"</code>).</li>
        </ol>
    </div>");
}

$db_selected = @mysql_select_db($db_name, $conn);
if (!$db_selected) {
    // Attempt auto-creating database if it doesn't exist
    @mysql_query("CREATE DATABASE IF NOT EXISTS `$db_name`", $conn);
    $db_selected = @mysql_select_db($db_name, $conn);
    if (!$db_selected) {
        die("<div style='font-family: system-ui, -apple-system, sans-serif; max-width: 600px; margin: 40px auto; padding: 24px; background: #fffbe6; border: 1px solid #ffe58f; border-radius: 16px; color: #856404;'>
            <h3 style='margin-top:0;'>⚠️ Database '$db_name' Belum Ada</h3>
            <p>Database <strong>$db_name</strong> belum ditemukan di phpMyAdmin.</p>
            <p>Silakan buat database bernama <code>$db_name</code> di <a href='http://localhost/phpmyadmin' target='_blank'>phpMyAdmin</a> dan import tabel database.</p>
        </div>");
    }
}
?>
