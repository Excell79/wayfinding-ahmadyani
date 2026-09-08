<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$lang = isset($_GET['lang']) ? (int)$_GET['lang'] : 2;
if (!in_array($lang, [1, 2])) $lang = 2;
$_SESSION['lang'] = $lang;

$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off') ? 'https' : 'http';
$host  = $_SERVER['HTTP_HOST'];
$dir   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$base  = $proto . '://' . $host . $dir . '/';

$back = $_SERVER['HTTP_REFERER'] ?? $base . 'index.php';
$back = preg_replace('/([?&])lang=\d+/', '$1', $back);
$back = preg_replace('/([?&])$/', '', $back);

header('Location: ' . $back);
exit;
