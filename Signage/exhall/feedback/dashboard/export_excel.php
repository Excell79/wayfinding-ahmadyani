<?php
include_once __DIR__ . "/auth_check.php";
include_once __DIR__ . "/../sender/koneksi.php";

$tab = isset($_GET['tab']) ? $_GET['tab'] : 'saran';
$month = isset($_GET['month']) ? $_GET['month'] : 'all';
$year = isset($_GET['year']) ? $_GET['year'] : 'all';

$filename = "export_" . $tab . "_" . date("Y-m-d_H-i") . ".csv";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Output UTF-8 BOM for Microsoft Excel compatibility
echo "\xEF\xBB\xBF";

$output = fopen('php://output', 'w');

if ($tab === 'saran') {
    // Header for Saran / Person
    fputcsv($output, array('No', 'Tanggal & Waktu', 'Kode Cookie', 'Nama', 'Jenis Kelamin', 'Kontak', 'Email', 'Komentar & Saran'));

    $where_clauses = array();
    if ($month !== 'all' && is_numeric($month)) {
        $where_clauses[] = "MONTH(date_fb) = " . intval($month);
    }
    if ($year !== 'all' && is_numeric($year)) {
        $where_clauses[] = "YEAR(date_fb) = " . intval($year);
    }
    // Exclude hidden items (flag = 0) when exporting to Excel
    $where_clauses[] = "(flag = 1 OR flag IS NULL)";

    $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";
    $query = "SELECT * FROM person $where_sql ORDER BY date_fb DESC";
    $result = @mysql_query($query);

    $no = 1;
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            $gender = ($row['Gender'] == 1) ? 'Pria' : (($row['Gender'] == 2) ? 'Wanita' : 'Lainnya');
            fputcsv($output, array(
                $no++,
                $row['date_fb'],
                $row['cookie'],
                $row['Name'],
                $gender,
                "'" . $row['Contact'], // quote contact for Excel phone string
                $row['Email'],
                $row['Coment']
            ));
        }
    }
} else if ($tab === 'feedback') {
    // Header for Data Feedback (Unit Layanan Rating Summary / Average)
    fputcsv($output, array('No', 'Unit Layanan Bandara', 'Jumlah Penilaian', 'Rata-Rata Rating'));

    $where_clauses = array();
    if ($month !== 'all' && is_numeric($month)) {
        $where_clauses[] = "MONTH(r.date_time) = " . intval($month);
    }
    if ($year !== 'all' && is_numeric($year)) {
        $where_clauses[] = "YEAR(r.date_time) = " . intval($year);
    }

    $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";
    $query = "SELECT u.Id_unit, u.nama_unit, AVG(r.Id_vote) as avg_score, COUNT(r.Id_vote) as total_votes 
              FROM unit_n u 
              LEFT JOIN rate_n r ON u.Id_unit = r.Id_unit 
              $where_sql 
              GROUP BY u.Id_unit, u.nama_unit 
              ORDER BY avg_score DESC, total_votes DESC";
    $result = @mysql_query($query);

    $no = 1;
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            fputcsv($output, array(
                $no++,
                $row['nama_unit'],
                $row['total_votes'],
                number_format($row['avg_score'], 1)
            ));
        }
    }
} else {
    // Header for Data Log (Individual Rating Vote Transactions)
    fputcsv($output, array('No', 'Tanggal & Waktu', 'Kode Cookie', 'Unit Layanan Bandara', 'Nilai Rating'));

    $where_clauses = array();
    if ($month !== 'all' && is_numeric($month)) {
        $where_clauses[] = "MONTH(r.date_time) = " . intval($month);
    }
    if ($year !== 'all' && is_numeric($year)) {
        $where_clauses[] = "YEAR(r.date_time) = " . intval($year);
    }

    $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";
    $query = "SELECT r.*, u.nama_unit 
              FROM rate_n r 
              LEFT JOIN unit_n u ON r.Id_unit = u.Id_unit 
              $where_sql 
              ORDER BY r.date_time DESC";
    $result = @mysql_query($query);

    $no = 1;
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            $v_id = intval($row['Id_vote']);
            fputcsv($output, array(
                $no++,
                $row['date_time'],
                $row['cookie'],
                $row['nama_unit'],
                $v_id
            ));
        }
    }
}

fclose($output);
exit();
?>
