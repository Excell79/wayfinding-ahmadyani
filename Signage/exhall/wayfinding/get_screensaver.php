<?php
// Mundur sekali aja karena sekarang udah sejajar keluar folder api
require '../feedback/koneksi.php'; 

$stmt = $pdo->query("SELECT nama_file FROM screensavers ORDER BY id DESC");
$videos = $stmt->fetchAll(PDO::FETCH_COLUMN);

header('Content-Type: application/json');
echo json_encode($videos);
?>