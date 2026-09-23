<?php
include_once __DIR__ . "/auth_check.php";
include_once __DIR__ . "/../sender/koneksi.php";

$current_user = isset($_SESSION['admin_user']) ? $_SESSION['admin_user'] : 'Administrator';

// Filter parameters
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'saran';
if (!in_array($tab, array('saran', 'feedback', 'log'))) {
    $tab = 'saran';
}
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 25;
if (!in_array($limit, array(25, 50, 100, 250, 500))) {
    $limit = 25;
}
$month = isset($_GET['month']) ? $_GET['month'] : 'all';
$year = isset($_GET['year']) ? $_GET['year'] : 'all';
$status_filter = isset($_GET['status_filter']) ? $_GET['status_filter'] : 'all';
$page_num = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$offset = ($page_num - 1) * $limit;

// Action Handler for Single & Batch Hide / Unhide (Update Flag)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_type'])) {
    $action_type = $_POST['action_type'];
    
    if ($action_type === 'unhide_all') {
        @mysql_query("UPDATE person SET flag = 1 WHERE flag = 0");
        $redirect_url = "index.php?tab=" . urlencode($tab) . "&limit=" . $limit . "&month=" . urlencode($month) . "&year=" . urlencode($year) . "&p=" . $page_num;
        header("Location: " . $redirect_url);
        exit();
    } else if ($action_type === 'update_flag') {
        $target_flag = isset($_POST['target_flag']) ? intval($_POST['target_flag']) : 1;
        $cookies_input = isset($_POST['selected_cookies']) ? $_POST['selected_cookies'] : array();
        
        if (!is_array($cookies_input) && !empty($cookies_input)) {
            $cookies_input = array($cookies_input);
        }
        
        if (!empty($cookies_input)) {
            $escaped_cookies = array();
            foreach ($cookies_input as $c) {
                $escaped_cookies[] = "'" . mysql_real_escape_string($c) . "'";
            }
            $cookies_sql = implode(",", $escaped_cookies);
            @mysql_query("UPDATE person SET flag = $target_flag WHERE cookie IN ($cookies_sql)");
        }
        
        $redirect_url = "index.php?tab=" . urlencode($tab) . "&limit=" . $limit . "&month=" . urlencode($month) . "&year=" . urlencode($year) . "&p=" . $page_num;
        header("Location: " . $redirect_url);
        exit();
    }
}

// Month names list
$month_list = array(
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
);

// Rating vote map
$vote_map = array(
    1 => 'BURUK',
    2 => 'LUMAYAN',
    3 => 'BAIK',
    4 => 'SANGAT BAIK',
    5 => 'SEMPURNA'
);

// Calculate Summary Metrics
$res_total_rate = @mysql_query("SELECT COUNT(*) as total, AVG(Id_vote) as avg_score FROM rate_n");
$stat_rate = @mysql_fetch_assoc($res_total_rate);
$total_ratings = isset($stat_rate['total']) ? intval($stat_rate['total']) : 0;
$avg_rating_score = isset($stat_rate['avg_score']) ? number_format($stat_rate['avg_score'], 1) : '0.0';

$res_total_person = @mysql_query("SELECT COUNT(*) as total FROM person WHERE flag = 1 OR flag IS NULL");
$stat_person = @mysql_fetch_assoc($res_total_person);
$total_saran = isset($stat_person['total']) ? intval($stat_person['total']) : 0;

// Calculate Donut / Pie Chart Vote Distribution (1 - 5 Scale)
$vote_counts = array(5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0);
$res_vote_breakdown = @mysql_query("SELECT Id_vote, COUNT(*) as cnt FROM rate_n GROUP BY Id_vote");
if ($res_vote_breakdown) {
    while ($r_v = mysql_fetch_assoc($res_vote_breakdown)) {
        $v_id = intval($r_v['Id_vote']);
        if (isset($vote_counts[$v_id])) {
            $vote_counts[$v_id] = intval($r_v['cnt']);
        }
    }
}
$sum_votes = array_sum($vote_counts);

// Colors for Pie Chart Slices & Badges (1: Red, 2: Orange, 3: Yellow, 4: Light Green, 5: Blue)
$vote_colors = array(
    5 => '#0284c7', // Bintang 5 - Biru
    4 => '#9ebc2e', // Bintang 4 - Ijo muda
    3 => '#eab308', // Bintang 3 - Kuning
    2 => '#f97316', // Bintang 2 - Oranye
    1 => '#ec6a56'  // Bintang 1 - Merah
);

// Fetch Available Years from DB
$years_arr = array(date('Y'));
$res_years = @mysql_query("SELECT DISTINCT YEAR(date_time) as yr FROM rate_n UNION SELECT DISTINCT YEAR(date_fb) FROM person ORDER BY yr DESC");
if ($res_years) {
    while ($r_yr = mysql_fetch_assoc($res_years)) {
        if (!empty($r_yr['yr']) && !in_array($r_yr['yr'], $years_arr)) {
            $years_arr[] = $r_yr['yr'];
        }
    }
}
rsort($years_arr);

// Fetch Data for Active Tab
$where_clauses = array();
$total_records = 0;
$table_data = array();

if ($tab === 'saran') {
    if ($month !== 'all' && is_numeric($month)) $where_clauses[] = "MONTH(date_fb) = " . intval($month);
    if ($year !== 'all' && is_numeric($year)) $where_clauses[] = "YEAR(date_fb) = " . intval($year);
    // Main list strictly shows active items only (hidden items are removed from list)
    $where_clauses[] = "(flag = 1 OR flag IS NULL)";
    
    $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";

    $res_count = @mysql_query("SELECT COUNT(*) as count FROM person $where_sql");
    $row_count = @mysql_fetch_assoc($res_count);
    $total_records = isset($row_count['count']) ? intval($row_count['count']) : 0;

    $res_data = @mysql_query("SELECT * FROM person $where_sql ORDER BY date_fb DESC LIMIT $offset, $limit");
    if ($res_data) {
        while ($r = mysql_fetch_assoc($res_data)) {
            $table_data[] = $r;
        }
    }
} else if ($tab === 'feedback') {
    // Data Feedback Tab (Unit Layanan Rating Summary / Average)
    if ($month !== 'all' && is_numeric($month)) $where_clauses[] = "MONTH(r.date_time) = " . intval($month);
    if ($year !== 'all' && is_numeric($year)) $where_clauses[] = "YEAR(r.date_time) = " . intval($year);
    $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";

    $query_feedback = "SELECT u.Id_unit, u.nama_unit, AVG(r.Id_vote) as avg_score, COUNT(r.Id_vote) as total_votes 
                       FROM unit_n u 
                       LEFT JOIN rate_n r ON u.Id_unit = r.Id_unit 
                       $where_sql 
                       GROUP BY u.Id_unit, u.nama_unit 
                       ORDER BY avg_score DESC, total_votes DESC";

    $res_data = @mysql_query($query_feedback);
    $all_units_data = array();
    if ($res_data) {
        while ($r = mysql_fetch_assoc($res_data)) {
            $all_units_data[] = $r;
        }
    }
    $total_records = count($all_units_data);
    $table_data = array_slice($all_units_data, $offset, $limit);
} else {
    // Data Log Tab (Raw Individual Rating Vote Transactions)
    $tab = 'log';
    if ($month !== 'all' && is_numeric($month)) $where_clauses[] = "MONTH(r.date_time) = " . intval($month);
    if ($year !== 'all' && is_numeric($year)) $where_clauses[] = "YEAR(r.date_time) = " . intval($year);
    $where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";

    $res_count = @mysql_query("SELECT COUNT(*) as count FROM rate_n r $where_sql");
    $row_count = @mysql_fetch_assoc($res_count);
    $total_records = isset($row_count['count']) ? intval($row_count['count']) : 0;

    $query_log = "SELECT r.*, u.nama_unit 
                  FROM rate_n r 
                  LEFT JOIN unit_n u ON r.Id_unit = u.Id_unit 
                  $where_sql 
                  ORDER BY r.date_time DESC 
                  LIMIT $offset, $limit";

    $res_data = @mysql_query($query_log);
    if ($res_data) {
        while ($r = mysql_fetch_assoc($res_data)) {
            $table_data[] = $r;
        }
    }
}

// Fetch Hidden Person Items for Unhide Modal & Badge
$res_hidden_person = @mysql_query("SELECT * FROM person WHERE flag = 0 ORDER BY date_fb DESC");
$hidden_person_items = array();
if ($res_hidden_person) {
    while ($r_h = mysql_fetch_assoc($res_hidden_person)) {
        $hidden_person_items[] = $r_h;
    }
}
$total_hidden_person_count = count($hidden_person_items);

$total_pages = ceil($total_records / $limit);
$start_item = ($total_records > 0) ? ($offset + 1) : 0;
$end_item = min($offset + $limit, $total_records);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard — Feedback Bandara Ahmad Yani</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Dashboard System -->
    <link rel="stylesheet" href="css/dashboard_modern.css">
</head>
<body>

    <!-- 4-Color Solid Brand Top Bar -->
    <div class="brand-top-bar">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Header Navbar -->
    <header class="dash-header">
        <a href="index.php" class="header-brand">
            <img src="../../wayfinding/gambar/Home/JenderalAhmadYani.png" alt="Logo Bandara Ahmad Yani" class="header-logo-img">
        </a>

        <div class="header-user-info">
            <div class="user-badge">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <span><?php echo htmlspecialchars($current_user); ?></span>
            </div>
            <a href="logout.php" class="btn-logout">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                <span>Logout</span>
            </a>
        </div>
    </header>

    <!-- Main Content Viewport -->
    <main class="dash-container">

        <!-- Stat Metric Cards -->
        <section class="stats-grid">
            <div class="stat-card card-blue">
                <div>
                    <div class="stat-label">Total Rating Feedback</div>
                    <div class="stat-value"><?php echo number_format($total_ratings); ?></div>
                </div>
                <div class="stat-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
            </div>

            <div class="stat-card card-green">
                <div>
                    <div class="stat-label">Total Saran & Apresiasi</div>
                    <div class="stat-value"><?php echo number_format($total_saran); ?></div>
                </div>
                <div class="stat-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/></svg>
                </div>
            </div>

            <div class="stat-card card-yellow">
                <div>
                    <div class="stat-label">Rata-Rata Rating</div>
                    <div class="stat-value"><?php echo $avg_rating_score; ?> <span style="font-size: 18px; color: #64748b;">/ 5.0</span></div>
                </div>
                <div class="stat-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>
                </div>
            </div>
        </section>

        <!-- Donut / Pie Performance Chart Card ("Potongan Pizza") -->
        <section class="performance-chart-card">
            <div class="chart-card-header">
                <div class="chart-card-title">
                    <span>Analisis Kinerja</span>
                </div>
                <div style="font-size: 13px; font-weight: 700; color: var(--text-secondary);">
                    Total Evaluasi: <strong><?php echo number_format($sum_votes); ?></strong> Penilaian
                </div>
            </div>

            <div class="chart-content-grid">
                <!-- Pure SVG Donut/Pie Chart -->
                <div class="pie-chart-wrapper">
                    <?php
                    $radius = 65;
                    $circumference = 2 * M_PI * $radius; // ~408.4
                    $accumulated_dash = 0;
                    ?>
                    <svg width="200" height="200" viewBox="0 0 160 160" style="transform: rotate(-90deg);">
                        <!-- Outer Base Ring -->
                        <circle cx="80" cy="80" r="<?php echo $radius; ?>" fill="none" stroke="#e2e8f0" stroke-width="24" />
                        
                        <?php if ($sum_votes > 0): ?>
                            <?php foreach ($vote_counts as $val => $count): ?>
                                <?php
                                $percent = $count / $sum_votes;
                                $dash_length = $percent * $circumference;
                                $dash_offset = -$accumulated_dash;
                                $color = $vote_colors[$val];
                                $accumulated_dash += $dash_length;
                                ?>
                                <?php if ($dash_length > 0): ?>
                                    <circle cx="80" cy="80" r="<?php echo $radius; ?>" 
                                            fill="none" 
                                            stroke="<?php echo $color; ?>" 
                                            stroke-width="24" 
                                            stroke-dasharray="<?php echo sprintf("%.2f %.2f", $dash_length, $circumference - $dash_length); ?>" 
                                            stroke-dashoffset="<?php echo sprintf("%.2f", $dash_offset); ?>" />
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </svg>

                    <!-- Center Badge inside Donut -->
                    <div class="pie-center-badge">
                        <div class="pie-center-score"><?php echo $avg_rating_score; ?></div>
                        <div class="pie-center-label">Rata-Rata</div>
                    </div>
                </div>

                <!-- Interactive Legend Breakdown Grid -->
                <div class="chart-legend-grid">
                    <?php foreach ($vote_counts as $val => $count): ?>
                        <?php
                        $pct = ($sum_votes > 0) ? number_format(($count / $sum_votes) * 100, 1) : '0.0';
                        $label_text = isset($vote_map[$val]) ? $vote_map[$val] : $val;
                        $color = $vote_colors[$val];
                        ?>
                        <div class="legend-item-card">
                            <div class="legend-color-dot" style="background: <?php echo $color; ?>;"></div>
                            <div class="legend-card-body">
                                <div class="legend-rating-val"><?php echo $val; ?></div>
                                <div class="legend-rating-desc">
                                    <span class="legend-label-text"><?php echo htmlspecialchars($label_text); ?></span>
                                    <span class="legend-count-text"><?php echo number_format($count); ?></span>
                                </div>
                                <div class="legend-pct-text"><?php echo $pct; ?>% dari total</div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Main Panel Card -->
        <section class="panel-card">
            
            <!-- Tab View Switcher -->
            <nav class="tab-nav">
                <button type="button" class="tab-btn <?php echo ($tab === 'saran') ? 'active' : ''; ?>" onclick="switchTab('saran')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/></svg>
                    <span>Data Saran & Apresiasi</span>
                </button>

                <button type="button" class="tab-btn <?php echo ($tab === 'feedback') ? 'active' : ''; ?>" onclick="switchTab('feedback')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                    <span>Data Feedback</span>
                </button>

                <button type="button" class="tab-btn <?php echo ($tab === 'log') ? 'active' : ''; ?>" onclick="switchTab('log')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>
                    <span>Data Log</span>
                </button>
            </nav>

            <!-- Toolbar Controls (Filters, Limit, Search & Export Buttons) -->
            <div class="toolbar-grid">
                
                <div class="filter-group">
                    <label class="control-label">Tampilkan:</label>
                    <select id="limitSelect" class="select-control" onchange="applyFilters()">
                        <option value="25" <?php echo ($limit == 25) ? 'selected' : ''; ?>>25 data</option>
                        <option value="50" <?php echo ($limit == 50) ? 'selected' : ''; ?>>50 data</option>
                        <option value="100" <?php echo ($limit == 100) ? 'selected' : ''; ?>>100 data</option>
                        <option value="250" <?php echo ($limit == 250) ? 'selected' : ''; ?>>250 data</option>
                        <option value="500" <?php echo ($limit == 500) ? 'selected' : ''; ?>>500 data</option>
                    </select>

                    <label class="control-label" style="margin-left: 6px;">Bulan:</label>
                    <select id="monthSelect" class="select-control" onchange="applyFilters()">
                        <option value="all">Semua Bulan</option>
                        <?php foreach ($month_list as $m_num => $m_name): ?>
                            <option value="<?php echo $m_num; ?>" <?php echo ($month == $m_num) ? 'selected' : ''; ?>>
                                <?php echo $m_name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label class="control-label" style="margin-left: 6px;">Tahun:</label>
                    <select id="yearSelect" class="select-control" onchange="applyFilters()">
                        <option value="all">Semua Tahun</option>
                        <?php foreach ($years_arr as $yr): ?>
                            <option value="<?php echo $yr; ?>" <?php echo ($year == $yr) ? 'selected' : ''; ?>>
                                <?php echo $yr; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($tab === 'saran'): ?>
                        <button type="button" class="btn-toolbar-unhide" onclick="openUnhideModal()" title="Lihat & Tampilkan Kembali Data yang Disembunyikan" style="margin-left: 6px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                            <span>Unhide Data</span>
                            <?php if ($total_hidden_person_count > 0): ?>
                                <span class="unhide-count-badge"><?php echo $total_hidden_person_count; ?></span>
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>
                </div>

                <div class="filter-group">
                    <input type="text" id="searchInput" class="input-control" placeholder="Cari data..." onkeyup="filterTableLocal()" style="min-width: 200px;">

                    <div class="export-group">
                        <a href="export_excel.php?tab=<?php echo $tab; ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" class="btn-export btn-export-excel" title="Download Excel Sheet">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                            <span>Excel</span>
                        </a>

                        <a href="export_pdf.php?tab=<?php echo $tab; ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" target="_blank" class="btn-export btn-export-pdf" title="Cetak / Save PDF">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-4 11H9v-5h6v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H7v4h10V3z"/></svg>
                            <span>PDF</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Data Table Viewport -->
            <div class="table-wrapper">
                <form id="batchActionForm" method="post" action="index.php?tab=<?php echo urlencode($tab); ?>&limit=<?php echo $limit; ?>&month=<?php echo urlencode($month); ?>&year=<?php echo urlencode($year); ?>&p=<?php echo $page_num; ?>">
                    <input type="hidden" name="action_type" value="update_flag">
                    <input type="hidden" id="batchTargetFlag" name="target_flag" value="0">

                    <table id="dataTable" class="data-table">
                        <thead>
                            <?php if ($tab === 'saran'): ?>
                                <tr>
                                    <th width="40" style="text-align: center;">
                                        <input type="checkbox" id="selectAllCheckbox" onclick="toggleSelectAll(this)" title="Pilih Semua">
                                    </th>
                                    <th width="45">No</th>
                                    <th width="150">Tanggal & Waktu</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kontak</th>
                                    <th>Email</th>
                                    <th>Komentar & Masukan</th>
                                    <th width="140" style="text-align: center;">Aksi</th>
                                </tr>
                            <?php elseif ($tab === 'feedback'): ?>
                                <tr>
                                    <th width="60">No</th>
                                    <th>Unit Layanan Bandara</th>
                                    <th width="220" style="text-align: center;">Jumlah Penilaian</th>
                                    <th width="240" style="text-align: center;">Rata-Rata Rating</th>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <th width="60">No</th>
                                    <th width="160">Tanggal & Waktu</th>
                                    <th width="140">Kode Cookie</th>
                                    <th>Unit Layanan Bandara</th>
                                    <th width="220" style="text-align: center;">Nilai Rating</th>
                                </tr>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                            <?php if (!empty($table_data)): ?>
                                <?php $curr_no = $start_item; ?>
                                <?php foreach ($table_data as $row): ?>
                                    <?php if ($tab === 'saran'): ?>
                                        <?php 
                                        $gender = ($row['Gender'] == 1) ? 'Pria' : (($row['Gender'] == 2) ? 'Wanita' : 'Lainnya'); 
                                        ?>
                                        <tr>
                                            <td align="center">
                                                <input type="checkbox" name="selected_cookies[]" class="row-checkbox" value="<?php echo htmlspecialchars($row['cookie']); ?>" onclick="updateBatchToolbar()">
                                            </td>
                                            <td><?php echo $curr_no++; ?></td>
                                            <td><strong><?php echo date("d-m-Y H:i", strtotime($row['date_fb'])); ?></strong></td>
                                            <td><strong><?php echo htmlspecialchars($row['Name']); ?></strong></td>
                                            <td><?php echo $gender; ?></td>
                                            <td><?php echo htmlspecialchars($row['Contact']); ?></td>
                                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['Coment']); ?></td>
                                            <td align="center">
                                                <button type="button" class="btn-action-toggle btn-action-hide" onclick="singleToggleFlag('<?php echo htmlspecialchars($row['cookie']); ?>', 0)" title="Sembunyikan review ini">
                                                    Sembunyikan
                                                </button>
                                            </td>
                                        </tr>
                                    <?php elseif ($tab === 'feedback'): ?>
                                        <?php
                                        $unit_name = htmlspecialchars($row['nama_unit']);
                                        $avg_val = floatval($row['avg_score']);
                                        $formatted_avg = number_format($avg_val, 1);
                                        $total_v = intval($row['total_votes']);

                                        $score_for_color = floatval($formatted_avg);

                                        if ($score_for_color >= 5.0) {
                                            $badge_cls = 'badge-rating rate-5'; // Bintang 5: Biru
                                        } else if ($score_for_color >= 4.0) {
                                            $badge_cls = 'badge-rating rate-4'; // Bintang 4: Ijo muda
                                        } else if ($score_for_color >= 3.0) {
                                            $badge_cls = 'badge-rating rate-3'; // Bintang 3: Kuning
                                        } else if ($score_for_color >= 2.0) {
                                            $badge_cls = 'badge-rating rate-2'; // Bintang 2: Oranye
                                        } else {
                                            $badge_cls = 'badge-rating rate-1'; // Bintang 1: Merah
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $curr_no++; ?></td>
                                            <td><strong><?php echo $unit_name; ?></strong></td>
                                            <td align="center">
                                                <span style="font-weight: 700; color: #475569; font-size: 14px;"><?php echo number_format($total_v); ?> Evaluasi</span>
                                            </td>
                                            <td align="center">
                                                <span class="<?php echo $badge_cls; ?>" style="font-size: 15px; padding: 6px 16px;">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                                    <span><?php echo $formatted_avg; ?> <small style="font-size: 11px; opacity: 0.85;">/ 5.0</small></span>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php
                                        $vote_val = intval($row['Id_vote']);
                                        $vote_text = isset($vote_map[$vote_val]) ? $vote_map[$vote_val] : $vote_val;
                                        $badge_cls = 'badge-rating rate-' . $vote_val;
                                        ?>
                                        <tr>
                                            <td><?php echo $curr_no++; ?></td>
                                            <td><strong><?php echo date("d-m-Y H:i", strtotime($row['date_time'])); ?></strong></td>
                                            <td><code style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 12px; color: #475569;"><?php echo htmlspecialchars($row['cookie']); ?></code></td>
                                            <td><strong><?php echo htmlspecialchars($row['nama_unit']); ?></strong></td>
                                            <td align="center">
                                                <span class="<?php echo $badge_cls; ?>" style="font-size: 14px; padding: 5px 16px;">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                                    <span><?php echo $vote_val; ?></span>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="<?php echo ($tab === 'saran') ? '9' : (($tab === 'log') ? '5' : '4'); ?>" align="center" style="padding: 36px; color: #64748b; font-weight: 700;">
                                        Tidak ada data yang ditemukan.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
            </div>

            <!-- Table Footer Pagination -->
            <div class="table-footer">
                <div class="footer-info">
                    Menampilkan <strong><?php echo number_format($start_item); ?> - <?php echo number_format($end_item); ?></strong> dari <strong><?php echo number_format($total_records); ?></strong> data
                </div>

                <div class="pagination-group">
                    <?php
                    $prev_p = max(1, $page_num - 1);
                    $next_p = min($total_pages, $page_num + 1);
                    ?>

                    <a href="index.php?tab=<?php echo $tab; ?>&limit=<?php echo $limit; ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>&p=<?php echo $prev_p; ?>" class="btn-page <?php echo ($page_num <= 1) ? 'disabled' : ''; ?>">
                        ← Sebelumnya
                    </a>

                    <span style="font-weight: 800; font-size: 14px; padding: 0 8px;">
                        <?php echo $page_num; ?> dari <?php echo max(1, $total_pages); ?>
                    </span>

                    <a href="index.php?tab=<?php echo $tab; ?>&limit=<?php echo $limit; ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>&p=<?php echo $next_p; ?>" class="btn-page <?php echo ($page_num >= $total_pages) ? 'disabled' : ''; ?>">
                        Selanjutnya →
                    </a>
                </div>
            </div>

        </section>

    </main>

    <!-- Modal Popup for Unhide Hidden Data -->
    <div id="unhideModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeUnhideModal();">
        <div class="modal-card">
            <div class="modal-header">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="width: 40px; height: 40px; border-radius: 12px; background: #dcfce7; color: #166534; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                    </div>
                    <div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-primary); margin: 0;">Data Saran Disembunyikan</h3>
                    </div>
                </div>
                <button type="button" class="btn-modal-close" onclick="closeUnhideModal()">✕</button>
            </div>
            
            <div class="modal-body">
                <?php if (!empty($hidden_person_items)): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th width="40" style="text-align: center;">No</th>
                                <th width="140">Tanggal</th>
                                <th width="140">Nama</th>
                                <th width="120">Kontak</th>
                                <th>Komentar & Masukan</th>
                                <th width="110" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $h_no = 1; ?>
                            <?php foreach ($hidden_person_items as $h_row): ?>
                                <tr>
                                    <td align="center"><?php echo $h_no++; ?></td>
                                    <td><strong><?php echo date("d-m-Y H:i", strtotime($h_row['date_fb'])); ?></strong></td>
                                    <td><strong><?php echo htmlspecialchars($h_row['Name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($h_row['Contact']); ?></td>
                                    <td><?php echo htmlspecialchars($h_row['Coment']); ?></td>
                                    <td align="center">
                                        <button type="button" class="btn-action-toggle btn-action-unhide" onclick="singleToggleFlag('<?php echo htmlspecialchars($h_row['cookie']); ?>', 1)" title="Tampilkan kembali (Unhide) review ini ke list utama">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                            <span>Unhide</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div style="text-align: center; padding: 48px 20px; color: var(--text-secondary); font-weight: 700;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #94a3b8; margin-bottom: 12px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <div>Tidak ada data saran yang sedang disembunyikan.</div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="modal-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <?php if (!empty($hidden_person_items)): ?>
                    <button type="button" class="btn-modal-unhide-all" onclick="unhideAllData()" title="Tampilkan kembali seluruh data yang disembunyikan">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                        <span>Tampilkan Semua (Unhide All)</span>
                    </button>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>
                <button type="button" class="btn-modal-cancel" onclick="closeUnhideModal()">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Floating Batch Action Bar -->
    <div id="batchActionBar" class="batch-action-bar" style="display: none;">
        <span class="batch-info-text"><span id="selectedCount">0</span> data dipilih</span>
        <button type="button" class="btn-batch btn-batch-hide" onclick="submitBatchFlag(0)">
            Sembunyikan Terpilih
        </button>
    </div>

    <!-- JS Filter, Switcher & Batch Checkbox Script -->
    <script>
        function openUnhideModal() {
            var modal = document.getElementById('unhideModal');
            if (modal) modal.style.display = 'flex';
        }

        function closeUnhideModal() {
            var modal = document.getElementById('unhideModal');
            if (modal) modal.style.display = 'none';
        }

        function unhideAllData() {
            if (confirm('Apakah Anda yakin ingin menampilkan kembali seluruh data yang disembunyikan?')) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = 'index.php?tab=saran&limit=<?php echo $limit; ?>&month=<?php echo urlencode($month); ?>&year=<?php echo urlencode($year); ?>&p=1';

                var inputType = document.createElement('input');
                inputType.type = 'hidden';
                inputType.name = 'action_type';
                inputType.value = 'unhide_all';
                form.appendChild(inputType);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function switchTab(targetTab) {
            var limit = document.getElementById('limitSelect').value;
            var month = document.getElementById('monthSelect').value;
            var year = document.getElementById('yearSelect').value;
            window.location.href = 'index.php?tab=' + targetTab + '&limit=' + limit + '&month=' + month + '&year=' + year + '&p=1';
        }

        function applyFilters() {
            var tab = '<?php echo $tab; ?>';
            var limit = document.getElementById('limitSelect').value;
            var month = document.getElementById('monthSelect').value;
            var year = document.getElementById('yearSelect').value;
            window.location.href = 'index.php?tab=' + tab + '&limit=' + limit + '&month=' + month + '&year=' + year + '&p=1';
        }

        function filterTableLocal() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toLowerCase();
            var table = document.getElementById('dataTable');
            var tr = table.getElementsByTagName('tr');

            for (var i = 1; i < tr.length; i++) {
                var visible = false;
                var td = tr[i].getElementsByTagName('td');
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        if (td[j].textContent.toLowerCase().indexOf(filter) > -1) {
                            visible = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = visible ? '' : 'none';
            }
        }

        // Batch Action Checkbox Helpers
        function toggleSelectAll(master) {
            var checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(function(cb) {
                cb.checked = master.checked;
            });
            updateBatchToolbar();
        }

        function updateBatchToolbar() {
            var checkboxes = document.querySelectorAll('.row-checkbox:checked');
            var count = checkboxes.length;
            var bar = document.getElementById('batchActionBar');
            var countSpan = document.getElementById('selectedCount');
            
            if (bar && countSpan) {
                countSpan.innerText = count;
                if (count > 0) {
                    bar.style.display = 'flex';
                } else {
                    bar.style.display = 'none';
                }
            }
        }

        function submitBatchFlag(targetFlag) {
            var form = document.getElementById('batchActionForm');
            var flagInput = document.getElementById('batchTargetFlag');
            if (form && flagInput) {
                flagInput.value = targetFlag;
                form.submit();
            }
        }

        function singleToggleFlag(cookieValue, targetFlag) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'index.php?tab=saran&limit=<?php echo $limit; ?>&month=<?php echo urlencode($month); ?>&year=<?php echo urlencode($year); ?>&p=1';

            var inputType = document.createElement('input');
            inputType.type = 'hidden';
            inputType.name = 'action_type';
            inputType.value = 'update_flag';
            form.appendChild(inputType);

            var inputFlag = document.createElement('input');
            inputFlag.type = 'hidden';
            inputFlag.name = 'target_flag';
            inputFlag.value = targetFlag;
            form.appendChild(inputFlag);

            var inputCookie = document.createElement('input');
            inputCookie.type = 'hidden';
            inputCookie.name = 'selected_cookies[]';
            inputCookie.value = cookieValue;
            form.appendChild(inputCookie);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
