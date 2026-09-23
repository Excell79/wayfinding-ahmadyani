<?php
include_once __DIR__ . "/auth_check.php";
include_once __DIR__ . "/../sender/koneksi.php";

$tab = isset($_GET['tab']) ? $_GET['tab'] : 'saran';

$month_names = array(
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
);

$month_label = ($month !== 'all' && isset($month_names[intval($month)])) ? $month_names[intval($month)] : 'Semua Bulan';
$year_label = ($year !== 'all') ? $year : 'Semua Tahun';

$tab_titles = array(
    'saran'    => 'SARAN & APRESIASI',
    'feedback' => 'FEEDBACK RATA-RATA RATING UNIT',
    'log'      => 'LOG TRANSAKSI RATING VOTE'
);

$report_title_label = isset($tab_titles[$tab]) ? $tab_titles[$tab] : 'FEEDBACK';

$vote_map = array(
    1 => 'BURUK',
    2 => 'LUMAYAN',
    3 => 'BAIK',
    4 => 'SANGAT BAIK',
    5 => 'SEMPURNA'
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan <?php echo $report_title_label; ?> — Bandara Ahmad Yani</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 12mm 12mm;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 11.5px;
            color: #0f172a;
            background: #ffffff;
            padding: 20px 24px;
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }
        .header-logo {
            height: 32px;
            width: auto;
        }
        .report-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
            margin-bottom: 16px;
        }
        .report-title {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.2px;
        }
        .report-meta {
            font-size: 11px;
            color: #475569;
            margin-top: 2px;
        }
        .pdf-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10.5px;
        }
        .pdf-table th {
            background: #f1f5f9;
            color: #0f172a;
            font-weight: 800;
            padding: 8px 10px;
            border: 1px solid #cbd5e1;
            text-align: left;
        }
        .pdf-table td {
            padding: 8px 10px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }
        .pdf-table tbody tr:nth-child(even) {
            background: #f8fafc;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 50px;
            font-size: 9.5px;
            font-weight: 800;
            color: #ffffff;
            text-align: center;
        }
        .badge-1 { background: #ec6a56; } /* Bintang 1: Merah */
        .badge-2 { background: #f97316; } /* Bintang 2: Oranye */
        .badge-3 { background: #eab308; } /* Bintang 3: Kuning */
        .badge-4 { background: #9ebc2e; } /* Bintang 4: Ijo muda */
        .badge-5 { background: #0284c7; } /* Bintang 5: Biru */
        .brand-top-bar {
            display: flex;
            width: 100%;
            height: 4px;
            margin-bottom: 12px;
        }
        .brand-top-bar span { flex: 1; height: 100%; }
        .brand-top-bar span:nth-child(1) { background: #ec6a56; }
        .brand-top-bar span:nth-child(2) { background: #faaf40; }
        .brand-top-bar span:nth-child(3) { background: #4dc2c6; }
        .brand-top-bar span:nth-child(4) { background: #9ebc2e; }
        .no-print {
            background: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 12px;
            padding: 12px 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-print { background: #0f172a; color: #fff; }
        .btn-close { background: #e2e8f0; color: #475569; }

        @media print {
            body {
                padding: 0;
                margin: 0;
                width: 100%;
                max-width: 100%;
            }
            .no-print { display: none !important; }
            .pdf-table {
                page-break-inside: auto;
            }
            .pdf-table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            .pdf-table thead {
                display: table-header-group;
            }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <div style="font-weight: 700; color: #475569;">
            Pratinjau Laporan PDF
        </div>
        <div style="display: flex; gap: 10px;">
            <button onclick="window.print();" class="btn-action btn-print">
                Cetak / Simpan ke PDF
            </button>
            <button onclick="window.close();" class="btn-action btn-close">
                ✕ Tutup
            </button>
        </div>
    </div>

    <!-- 4-Color Solid Brand Top Bar -->
    <div class="brand-top-bar">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="report-header">
        <div>
            <h1 class="report-title">LAPORAN DATA <?php echo $report_title_label; ?></h1>
            <div class="report-meta">
                Bandara Internasional Ahmad Yani Semarang &bull; Filter: <strong><?php echo $month_label . " " . $year_label; ?></strong>
            </div>
        </div>

        <div style="text-align: right;">
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">
                Dicetak pada: <?php echo date("d-m-Y H:i"); ?>
            </div>
        </div>
    </div>

    <table class="pdf-table">
        <thead>
            <?php if ($tab === 'saran'): ?>
                <tr>
                    <th width="40" style="text-align: center;">No</th>
                    <th width="135">Tanggal & Waktu</th>
                    <th width="130">Nama</th>
                    <th width="95" style="text-align: center;">Jenis Kelamin</th>
                    <th width="110">Kontak</th>
                    <th width="140">Email</th>
                    <th>Komentar & Saran</th>
                </tr>
            <?php elseif ($tab === 'feedback'): ?>
                <tr>
                    <th width="50" style="text-align: center;">No</th>
                    <th>Unit Layanan Bandara</th>
                    <th width="200" style="text-align: center;">Jumlah Penilaian</th>
                    <th width="200" style="text-align: center;">Rata-Rata Rating</th>
                </tr>
            <?php else: ?>
                <tr>
                    <th width="50" style="text-align: center;">No</th>
                    <th width="140">Tanggal & Waktu</th>
                    <th width="120">Kode Cookie</th>
                    <th>Unit Layanan Bandara</th>
                    <th width="160" style="text-align: center;">Nilai Rating</th>
                </tr>
            <?php endif; ?>
        </thead>
        <tbody>
            <?php
            if ($tab === 'saran') {
                $where_clauses = array();
                if ($month !== 'all' && is_numeric($month)) $where_clauses[] = "MONTH(date_fb) = " . intval($month);
                if ($year !== 'all' && is_numeric($year)) $where_clauses[] = "YEAR(date_fb) = " . intval($year);
                // Exclude hidden items (flag = 0) when printing PDF report
                $where_clauses[] = "(flag = 1 OR flag IS NULL)";
                
                $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";
                
                $query = "SELECT * FROM person $where_sql ORDER BY date_fb DESC";
                $result = @mysql_query($query);
                $no = 1;
                if ($result && mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $gender = ($row['Gender'] == 1) ? 'Pria' : (($row['Gender'] == 2) ? 'Wanita' : 'Lainnya');
                        $date_fmt = date("d-m-Y H:i", strtotime($row['date_fb']));
                        echo "<tr>
                            <td align='center'>{$no}</td>
                            <td><strong>{$date_fmt}</strong></td>
                            <td><strong>" . htmlspecialchars($row['Name']) . "</strong></td>
                            <td align='center'>{$gender}</td>
                            <td>" . htmlspecialchars($row['Contact']) . "</td>
                            <td>" . htmlspecialchars($row['Email']) . "</td>
                            <td>" . htmlspecialchars($row['Coment']) . "</td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7' align='center' style='padding: 24px; color: #64748b;'>Tidak ada data saran & apresiasi ditemukan.</td></tr>";
                }
            } else if ($tab === 'feedback') {
                $where_clauses = array();
                if ($month !== 'all' && is_numeric($month)) $where_clauses[] = "MONTH(r.date_time) = " . intval($month);
                if ($year !== 'all' && is_numeric($year)) $where_clauses[] = "YEAR(r.date_time) = " . intval($year);
                $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";
                
                $query = "SELECT u.Id_unit, u.nama_unit, AVG(r.Id_vote) as avg_score, COUNT(r.Id_vote) as total_votes 
                          FROM unit_n u 
                          LEFT JOIN rate_n r ON u.Id_unit = r.Id_unit 
                          $where_sql 
                          GROUP BY u.Id_unit, u.nama_unit 
                          ORDER BY avg_score DESC, total_votes DESC";
                $result = @mysql_query($query);
                $no = 1;
                if ($result && mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $unit_name = htmlspecialchars($row['nama_unit']);
                        $avg_val = floatval($row['avg_score']);
                        $formatted_avg = number_format($avg_val, 1);
                        $total_v = number_format(intval($row['total_votes']));

                        $score_for_color = floatval($formatted_avg);

                        if ($score_for_color >= 5.0) $badge_b = 'badge-5';      // Bintang 5: Biru
                        else if ($score_for_color >= 4.0) $badge_b = 'badge-4'; // Bintang 4: Ijo muda
                        else if ($score_for_color >= 3.0) $badge_b = 'badge-3'; // Bintang 3: Kuning
                        else if ($score_for_color >= 2.0) $badge_b = 'badge-2'; // Bintang 2: Oranye
                        else $badge_b = 'badge-1';                             // Bintang 1: Merah
                        
                        echo "<tr>
                            <td align='center'>{$no}</td>
                            <td><strong>{$unit_name}</strong></td>
                            <td align='center'><strong>{$total_v}</strong> Evaluasi</td>
                            <td align='center'><span class='badge {$badge_b}'>{$formatted_avg} / 5.0</span></td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='4' align='center' style='padding: 24px; color: #64748b;'>Tidak ada data feedback ditemukan.</td></tr>";
                }
            } else {
                $where_clauses = array();
                if ($month !== 'all' && is_numeric($month)) $where_clauses[] = "MONTH(r.date_time) = " . intval($month);
                if ($year !== 'all' && is_numeric($year)) $where_clauses[] = "YEAR(r.date_time) = " . intval($year);
                $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";
                
                $query = "SELECT r.*, u.nama_unit 
                          FROM rate_n r 
                          LEFT JOIN unit_n u ON r.Id_unit = u.Id_unit 
                          $where_sql 
                          ORDER BY r.date_time DESC";
                $result = @mysql_query($query);
                $no = 1;
                if ($result && mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $date_fmt = date("d-m-Y H:i", strtotime($row['date_time']));
                        $cookie_code = htmlspecialchars($row['cookie']);
                        $unit_name = htmlspecialchars($row['nama_unit']);
                        $vote_val = intval($row['Id_vote']);
                        $vote_text = isset($vote_map[$vote_val]) ? $vote_map[$vote_val] : $vote_val;
                        $badge_b = 'badge-' . $vote_val;

                        echo "<tr>
                            <td align='center'>{$no}</td>
                            <td><strong>{$date_fmt}</strong></td>
                            <td><code>{$cookie_code}</code></td>
                            <td><strong>{$unit_name}</strong></td>
                            <td align='center'><span class='badge {$badge_b}'>{$vote_val}</span></td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5' align='center' style='padding: 24px; color: #64748b;'>Tidak ada data log rating ditemukan.</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 300);
        };
    </script>
</body>
</html>
