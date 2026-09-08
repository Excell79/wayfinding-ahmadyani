<?php
include('define_lang.php');

$databaseHost = 'localhost';
$databaseName = 'komersial_data';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all domestik posts in one query
$post_ids = ['p01', 'p02', 'p03', 'p04'];
$posts = [];
foreach ($post_ids as $pid) {
    $pid_safe = mysqli_real_escape_string($conn, $pid);
    $sql = "SELECT * FROM panduan_bandara WHERE status = '1' AND post_id = '$pid_safe'";
    $result = mysqli_query($conn, $sql);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="240; url=../">
    <title>Panduan Penerbangan — Ahmad Yani Airport</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --navy:     #0b1e3d;
            --blue:     #0a4080;
            --sky:      #1567b8;
            --accent:   #c8972a;
            --accent2:  #e8b84b;
            --light:    #f4f7fb;
            --white:    #ffffff;
            --text:     #0f1f35;
            --muted:    #5a6e85;
            --border:   #dce4f0;
            --radius:   10px;
            --shadow:   0 2px 20px rgba(10,30,70,.07);
            --shadow-h: 0 8px 36px rgba(10,30,70,.14);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--light);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--navy);
            padding: 0 32px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 0 rgba(255,255,255,.05), 0 4px 16px rgba(0,0,0,.3);
        }
        .navbar-back {
            color: rgba(255,255,255,.85);
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 9px;
            letter-spacing: .02em;
            transition: color .2s;
        }
        .navbar-back .back-icon {
            width: 28px;
            height: 28px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            transition: background .2s, border-color .2s;
        }
        .navbar-back:hover { color: var(--accent2); }
        .navbar-back:hover .back-icon {
            background: rgba(200,151,42,.15);
            border-color: rgba(200,151,42,.4);
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255,255,255,.45);
            font-size: 12px;
            font-weight: 400;
            letter-spacing: .04em;
        }
        .brand-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--accent);
            opacity: .7;
        }

        /* ── TAB BAR ── */
        .tab-bar {
            background: var(--blue);
            display: flex;
            position: relative;
        }
        .tab-bar a {
            flex: 1;
            text-align: center;
            padding: 13px 16px;
            color: rgba(255,255,255,.5);
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .1em;
            text-transform: uppercase;
            transition: all .22s;
            position: relative;
        }
        .tab-bar a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 2px;
            background: var(--accent);
            border-radius: 2px 2px 0 0;
            opacity: 0;
            transform: scaleX(.6);
            transition: opacity .22s, transform .22s;
        }
        .tab-bar a.active,
        .tab-bar a:hover { color: #fff; background: rgba(255,255,255,.07); }
        .tab-bar a.active::after,
        .tab-bar a:hover::after { opacity: 1; transform: scaleX(1); }

        /* ── HERO ── */
        .hero {
            background: var(--navy);
            padding: 52px 32px 44px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 90% at 50% 120%, rgba(21,103,184,.5) 0%, transparent 60%),
                radial-gradient(ellipse 50% 60% at 85% 15%, rgba(200,151,42,.07) 0%, transparent 55%);
        }
        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.022) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.022) 1px, transparent 1px);
            background-size: 44px 44px;
            -webkit-mask-image: radial-gradient(ellipse 100% 100% at 50% 0%, black 20%, transparent 90%);
            mask-image: radial-gradient(ellipse 100% 100% at 50% 0%, black 20%, transparent 90%);
        }
        .hero-content { position: relative; z-index: 1; }
        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }
        .hero-line { width: 28px; height: 1px; background: var(--accent); opacity: .6; }
        .hero-eyebrow span {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: var(--accent2);
            opacity: .85;
        }
        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            color: #fff;
            font-size: clamp(28px, 5.5vw, 48px);
            font-weight: 600;
            line-height: 1.15;
            margin-bottom: 12px;
            letter-spacing: .01em;
        }
        .hero-sub {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: rgba(255,255,255,.38);
            font-size: 12px;
            letter-spacing: .06em;
        }
        .hero-sub .sep {
            width: 3px; height: 3px;
            border-radius: 50%;
            background: var(--accent);
            opacity: .5;
        }

        /* ── CONTENT ── */
        .content {
            max-width: 760px;
            margin: 0 auto;
            padding: 40px 20px 64px;
        }
        .section-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }
        .sh-line {
            flex: 1; height: 1px;
            background: linear-gradient(90deg, var(--border), transparent);
        }
        .sh-line.rev { background: linear-gradient(270deg, var(--border), transparent); }
        .sh-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--muted);
        }
        .sh-label i { color: var(--accent); font-size: 7px; }

        /* ── ACCORDION ── */
        .accordion-wrap { display: flex; flex-direction: column; gap: 10px; }

        .acc-item {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: box-shadow .25s, border-color .25s;
            animation: fadeUp .4s ease both;
        }
        .acc-item:hover {
            box-shadow: var(--shadow-h);
            border-color: rgba(21,103,184,.18);
        }
        .acc-item.open {
            border-color: rgba(21,103,184,.22);
            box-shadow: var(--shadow-h);
        }

        .acc-trigger {
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 17px 20px;
            gap: 14px;
            text-align: left;
            transition: background .15s;
        }
        .acc-item.open .acc-trigger {
            background: linear-gradient(90deg, rgba(21,103,184,.04), transparent);
        }
        .acc-trigger-left { display: flex; align-items: center; gap: 14px; }

        .acc-num {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--blue), var(--sky));
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            letter-spacing: .02em;
            box-shadow: 0 2px 8px rgba(21,103,184,.28);
            transition: background .25s, box-shadow .25s;
        }
        .acc-item.open .acc-num {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            box-shadow: 0 2px 8px rgba(200,151,42,.28);
        }
        .acc-title {
            font-size: 14.5px;
            font-weight: 500;
            color: var(--text);
            line-height: 1.4;
        }
        .acc-icon {
            width: 26px; height: 26px;
            border-radius: 50%;
            background: var(--light);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform .3s ease, background .2s, border-color .2s, color .2s;
            color: var(--muted);
            font-size: 10px;
        }
        .acc-item.open .acc-icon {
            transform: rotate(180deg);
            background: var(--blue);
            color: #fff;
            border-color: var(--blue);
        }

        .acc-body { display: none; border-top: 1px solid var(--border); }
        .acc-body-inner {
            padding: 18px 20px 20px 68px;
            font-size: 13.5px;
            line-height: 1.85;
            color: var(--muted);
        }
        .acc-item.open .acc-body { display: block; }

        /* ── FOOTER ── */
        footer {
            background: var(--navy);
            color: rgba(255,255,255,.55);
            padding: 40px 32px;
            border-top: 1px solid rgba(255,255,255,.04);
        }
        .footer-inner {
            max-width: 760px;
            margin: 0 auto;
            display: flex;
            gap: 36px;
            flex-wrap: wrap;
            align-items: flex-start;
        }
        .footer-logo { opacity: .7; max-height: 44px; }
        .footer-divider {
            width: 1px;
            background: rgba(255,255,255,.07);
            align-self: stretch;
            min-height: 60px;
        }
        .footer-info { flex: 1; font-size: 12.5px; line-height: 1.9; }
        .footer-info strong {
            display: block;
            color: rgba(255,255,255,.8);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .footer-contact { display: flex; flex-direction: column; gap: 10px; }
        .footer-contact a {
            display: flex;
            align-items: center;
            gap: 11px;
            color: rgba(255,255,255,.55);
            text-decoration: none;
            font-size: 12.5px;
            transition: color .2s;
        }
        .footer-contact a:hover { color: var(--accent2); }
        .fc-icon {
            width: 32px; height: 32px;
            border-radius: 7px;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.08);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
            transition: background .2s, border-color .2s;
        }
        .footer-contact a:hover .fc-icon {
            background: rgba(200,151,42,.15);
            border-color: rgba(200,151,42,.25);
        }
        .fc-label { display: flex; flex-direction: column; }
        .fc-label small {
            font-size: 10px;
            color: rgba(255,255,255,.3);
            letter-spacing: .06em;
            text-transform: uppercase;
        }
        .fc-label strong { color: rgba(255,255,255,.85); font-weight: 600; font-size: 13px; }

        .footer-bottom {
            background: #060e1f;
            text-align: center;
            padding: 13px;
            font-size: 11px;
            color: rgba(255,255,255,.22);
            letter-spacing: .04em;
        }
        .footer-bottom em { color: var(--accent); font-style: normal; opacity: .6; }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
            font-size: 14px;
        }
        .empty-state i { font-size: 30px; opacity: .2; margin-bottom: 12px; display: block; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        <?php foreach ($posts as $i => $row): ?>
        .acc-item:nth-child(<?= $i+1 ?>) { animation-delay: <?= $i * 0.07 ?>s; }
        <?php endforeach; ?>

        @media (max-width: 640px) {
            .navbar { padding: 0 16px; }
            .navbar-brand { display: none; }
            .hero { padding: 38px 20px 34px; }
            .acc-body-inner { padding-left: 20px; }
            .footer-divider { display: none; }
            .footer-inner { gap: 24px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a class="navbar-back" href="../">
        <span class="back-icon"><i class="fa-solid fa-arrow-left"></i></span>
        <?php echo defined('back') ? back : 'Kembali'; ?>
    </a>
    <div class="navbar-brand">
        <span class="brand-dot"></span>
        Jenderal Ahmad Yani International Airport
        <span class="brand-dot"></span>
    </div>
</nav>

<!-- TAB BAR -->
<div class="tab-bar">
    <a href="index.php" class="active">
        <i class="fa-solid fa-plane-departure" style="margin-right:7px;font-size:10px"></i>
        <?php echo defined('domestik') ? domestik : 'PENERBANGAN DOMESTIK'; ?>
    </a>
    <a href="index2.php">
        <i class="fa-solid fa-earth-asia" style="margin-right:7px;font-size:10px"></i>
        <?php echo defined('inter') ? inter : 'PENERBANGAN INTERNASIONAL'; ?>
    </a>
</div>

<!-- HERO -->
<div class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="hero-content">
        <div class="hero-eyebrow">
            <div class="hero-line"></div>
            <span><?php echo defined('flight') ? flight : 'Panduan Penerbangan'; ?></span>
            <div class="hero-line"></div>
        </div>
        <h1><?php echo defined('domestik') ? domestik : 'Penerbangan Domestik'; ?></h1>
        <div class="hero-sub">
            <span>Ahmad Yani International Airport</span>
            <span class="sep"></span>
            <span>Semarang</span>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="content">
    <div class="section-header">
        <div class="sh-line"></div>
        <div class="sh-label">
            <i class="fa-solid fa-circle"></i>
            <?php echo defined('daftar') ? daftar : 'Daftar Panduan'; ?>
        </div>
        <div class="sh-line rev"></div>
    </div>

    <div class="accordion-wrap">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $i => $row): ?>
            <div class="acc-item">
                <button class="acc-trigger" onclick="toggleAcc(this)">
                    <div class="acc-trigger-left">
                        <span class="acc-num"><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></span>
                        <span class="acc-title"><?= htmlspecialchars($row['post_title']) ?></span>
                    </div>
                    <span class="acc-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </button>
                <div class="acc-body">
                    <div class="acc-body-inner">
                        <?= $row['post_desc'] ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="fa-regular fa-folder-open"></i>
                Tidak ada data panduan tersedia.
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <img class="footer-logo"
            src="assets/img/JenderalAhmadYani.png"
            alt="Ahmad Yani Airport">
        <div class="footer-divider"></div>
        <div class="footer-info">
            <strong>Jenderal Ahmad Yani International Airport</strong>
            Call Kantor Cabang Jenderal Ahmad Yani International Airport: +62 24 86000600<br>
            Call Center: 172<br>
            Email: CC172@INJOURNEYAIRPORTS.ID
        </div>
        <div class="footer-contact">
            <a href="tel:172">
                <span class="fc-icon"><i class="fa-solid fa-phone"></i></span>
                <div class="fc-label">
                    <small><?php echo defined('htl') ? htl : 'Contact Center'; ?></small>
                    <strong>172</strong>
                </div>
            </a>
            <a href="mailto:CC172@INJOURNEYAIRPORTS.ID">
                <span class="fc-icon"><i class="fa-solid fa-envelope"></i></span>
                <div class="fc-label">
                    <small><?php echo defined('inf') ? inf : 'Feedback'; ?></small>
                    <strong>CC172@INJOURNEYAIRPORTS.ID</strong>
                </div>
            </a>
        </div>
    </div>
</footer>
<div class="footer-bottom">
    &copy; <?= date('Y') ?> PT Angkasa Pura Indonesia &mdash; <em>Jenderal Ahmad Yani International Airport</em>
</div>

<script>
function toggleAcc(btn) {
    const item = btn.closest('.acc-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.acc-item.open').forEach(el => el.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
}
</script>

<!-- FLOATING BACK BUTTON -->
<a href="../" class="floating-back-btn">
    <span class="back-arrow">←</span>
    <span>Back</span>
</a>

<style>
.floating-back-btn{
    position: fixed;
    right: 24px;
    bottom: 28px;
    height: 58px;
    padding: 0 24px 0 14px;
    background: linear-gradient(135deg,#ef4444,#b91c1c);
    color: #ffffff;
    border-radius: 999px;
    display: flex;
    align-items: center;
    gap: 14px;
    text-decoration: none;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: .02em;
    z-index: 9999;
    border: 1px solid rgba(255,255,255,.14);
    box-shadow:
        0 14px 34px rgba(185,28,28,.38),
        0 4px 12px rgba(0,0,0,.18);
    transition:
        transform .25s ease,
        box-shadow .25s ease,
        background .25s ease;
    overflow: hidden;
}

.floating-back-btn::before{
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        120deg,
        rgba(255,255,255,.16),
        transparent 45%,
        transparent 55%,
        rgba(255,255,255,.08)
    );
    pointer-events: none;
}

.back-arrow{
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,.16);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
    line-height: 1;
    transition:
        transform .25s ease,
        background .25s ease;
}

.floating-back-btn:hover{
    transform: translateY(-4px);
    background: linear-gradient(135deg,#ff4d4d,#dc2626);
    box-shadow:
        0 18px 42px rgba(185,28,28,.46),
        0 6px 14px rgba(0,0,0,.22);
}

.floating-back-btn:hover .back-arrow{
    transform: translateX(-3px);
    background: rgba(255,255,255,.24);
}

.floating-back-btn:active{
    transform: scale(.97);
}

@media (max-width:640px){

    .floating-back-btn{
        right: 16px;
        bottom: 18px;
        height: 52px;
        padding: 0 20px 0 12px;
        font-size: 14px;
        gap: 10px;
    }

    .back-arrow{
        width: 32px;
        height: 32px;
        min-width: 32px;
        font-size: 18px;
    }

}
</style>

</body>
</html>