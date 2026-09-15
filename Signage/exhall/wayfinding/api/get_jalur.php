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

// ============================================================
// Cari file logo yang BENERAN ada, berdasarkan nama_jalur
// (gak percaya kolom logo_jalur di database yang sering basi/typo)
// ============================================================
function findLogoFile($lantai, $nama, $baseDir) {
    $searchDirs = [
    "$baseDir/gambar/Lantai$lantai/logotenant",
    "$baseDir/gambar/Lantai$lantai/logoicon",
    "$baseDir/gambar/tenant internasional",
];

    $target = strtolower(preg_replace('/[^a-z0-9]/i', '', $nama));
    $candidates = [];

    foreach ($searchDirs as $dir) {
        if (!is_dir($dir)) continue;
        foreach (scandir($dir) as $file) {
            if ($file === '.' || $file === '..') continue;
            $nameNoExt = pathinfo($file, PATHINFO_FILENAME);
            $normalized = strtolower(preg_replace('/[^a-z0-9]/i', '', $nameNoExt));

            if ($normalized === $target) {
                return str_replace($baseDir . '/', '', "$dir/$file");
            }
            $candidates[$normalized] = "$dir/$file";
        }
    }

    // fallback: toleransi typo kecil (misal "Rotio" vs "otio")
    $best = null;
    $bestScore = 0;
    foreach ($candidates as $norm => $path) {
        similar_text($target, $norm, $percent);
        if ($percent > $bestScore && $percent > 70) {
            $bestScore = $percent;
            $best = $path;
        }
    }

    return $best ? str_replace($baseDir . '/', '', $best) : null;
}

$query  = "SELECT * FROM tabel_jalur WHERE $where ORDER BY nomor_jalur ASC";
$result = mysqli_query($conn, $query);

$baseDir = realpath(__DIR__ . '/..'); // folder wayfinding

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $namaLower = strtolower(trim($row['nama_jalur']));
    if ($namaLower !== 'idle' && $namaLower !== '') {
        $found = findLogoFile($row['lantai_jalur'], $row['nama_jalur'], $baseDir);
        if ($found) {
            $row['logo_jalur'] = $found; // override data basi dari database
        }
    }
    $data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>