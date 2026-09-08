<?php
// ============================================================
// api/get_jalur.php
// API untuk mengambil data jalur dari database komersial_data
// ============================================================

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "../koneksi.php";

$lantai = $_GET['lantai'] ?? '';
$nomor  = $_GET['nomor']  ?? '';
$type   = $_GET['type']   ?? '';
$nama   = $_GET['nama']   ?? '';

$where = "1=1";

if ($lantai !== '') {
    $lantai = mysqli_real_escape_string($conn, $lantai);
    $where .= " AND lantai_jalur='$lantai'";
}

if ($nomor !== '') {
    $nomor = mysqli_real_escape_string($conn, $nomor);
    $where .= " AND nomor_jalur='$nomor'";
}

if ($type !== '') {
    $type = mysqli_real_escape_string($conn, $type);
    $where .= " AND type='$type'";
}

if ($nama !== '') {
    $nama = mysqli_real_escape_string($conn, $nama);
    $where .= " AND nama_jalur LIKE '%$nama%'";
}

$query  = "SELECT * FROM tabel_jalur WHERE $where ORDER BY nomor_jalur ASC";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>