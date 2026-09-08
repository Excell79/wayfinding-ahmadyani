<?php
/**
 * define_lang.php
 * Konstanta bahasa — Kiosk Destinasi Wisata Ahmad Yani Semarang
 */
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 2;
if (isset($_GET['lang'])) $_SESSION['lang'] = (int)$_GET['lang'];
$lang = (int)$_SESSION['lang']; // 1=EN, 2=ID

if ($lang === 1) {
    define('dest_wis_smg',   'Tourist Destinations Semarang');
    define('daftar',         'Explore');
    define('_t_back',        'Back');
    define('destinations',   'destinations');
    define('results',        'results');
    define('no_result',      'No destinations found.');
    define('detail',         'See Detail');
    define('des',            'Description');
    define('location',       'Location');
    define('scantodownload', 'Scan QR to open location or get more info');
    define('src',            'Search');
    define('all_cat',        'All');
    define('filter_all',     'All');
    define('wisata_religi',  'Religious Tourism');
    define('wisata_budaya',  'Cultural Tourism');
    define('wisata_alam',    'Nature Tourism');
    define('ket_religi',     'Spiritual & Religious');
    define('ket_budaya',     'Arts, History & Culture');
    define('ket_alam',       'Nature & Outdoors');
} else {
    define('dest_wis_smg',   'Destinasi Wisata Semarang');
    define('daftar',         'Jelajahi');
    define('_t_back',        'Kembali');
    define('destinations',   'destinasi');
    define('results',        'hasil');
    define('no_result',      'Tidak ada destinasi ditemukan.');
    define('detail',         'Lihat Detail');
    define('des',            'Deskripsi');
    define('location',       'Lokasi');
    define('scantodownload', 'Scan QR untuk buka lokasi atau info lebih lanjut');
    define('src',            'Cari');
    define('all_cat',        'Semua');
    define('filter_all',     'Semua');
    define('wisata_religi',  'Wisata Religi');
    define('wisata_budaya',  'Wisata Budaya');
    define('wisata_alam',    'Wisata Alam');
    define('ket_religi',     'Spiritual & Keagamaan');
    define('ket_budaya',     'Seni, Sejarah & Budaya');
    define('ket_alam',       'Alam & Petualangan');
}
