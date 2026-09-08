<?php
/**
 * wisata.php — Halaman Detail Destinasi Wisata (Publik)
 * Enhanced: SEO, share button, print, related destinations
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/define_lang.php';

// ── Base URL otomatis ────────────────────────────────────
$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off') ? 'https' : 'http';
$host  = $_SERVER['HTTP_HOST'];
$dir   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$base  = "../../destinasi_n/";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$id) { header('Location: ' . $base . 'index.php'); exit; }

$wisata = $mysqli->query("SELECT * FROM wisata WHERE id=$id AND status=1")->fetch_assoc();
if (!$wisata) { header('Location: ' . $base . 'index.php'); exit; }

// Increment views
$colCheck = $mysqli->query("SHOW COLUMNS FROM wisata LIKE 'views'")->fetch_assoc();
if ($colCheck) $mysqli->query("UPDATE wisata SET views = views + 1 WHERE id=$id");

$TYPE_LABEL = [1 => wisata_religi, 2 => wisata_budaya, 3 => wisata_alam];
$TYPE_KET   = [1 => ket_religi,   2 => ket_budaya,    3 => ket_alam];
$TYPE_ICON  = [1 => '🕌', 2 => '🏛️', 3 => '🌿'];
$TYPE_COLOR = [1 => '#2D6A4F', 2 => '#1B4F72', 3 => '#7D3C1A'];
$TYPE_BG    = [1 => 'rgba(45,106,79,.12)', 2 => 'rgba(27,79,114,.12)', 3 => 'rgba(125,60,26,.12)'];

$t      = (int)$wisata['type'];
$color  = $TYPE_COLOR[$t] ?? '#C9922A';
$bg     = $TYPE_BG[$t]   ?? 'rgba(201,146,42,.12)';
$imgSrc = $wisata['image']  ? $base . IMG_BASE . e($wisata['image'])  : null;
$qrSrc  = $wisata['qrlink'] ? $base . QR_BASE  . e($wisata['qrlink']) : null;
$pageUrl = $base . 'wisata.php?id=' . $id;
$pageDesc = mb_substr(strip_tags($wisata['deskripsi']), 0, 160);

// Related destinations
$others = $mysqli->query(
    "SELECT id, nama, type, image FROM wisata WHERE status=1 AND id!=$id AND type=$t ORDER BY RAND() LIMIT 4"
)->fetch_all(MYSQLI_ASSOC);
// If less than 4, fill with other types
if (count($others) < 4) {
    $existIds = implode(',', array_column($others, 'id') ?: [0]);
    $more = $mysqli->query(
        "SELECT id, nama, type, image FROM wisata WHERE status=1 AND id NOT IN ($id,$existIds) ORDER BY RAND() LIMIT " . (4 - count($others))
    )->fetch_all(MYSQLI_ASSOC);
    $others = array_merge($others, $more);
}
?>
<!DOCTYPE html>
<html lang="<?= $lang===1?'en':'id' ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e($wisata['nama']) ?> — <?= dest_wis_smg ?></title>
<meta name="description" content="<?= e($pageDesc) ?>">
<meta property="og:title" content="<?= e($wisata['nama']) ?> — <?= dest_wis_smg ?>">
<meta property="og:description" content="<?= e($pageDesc) ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= e($pageUrl) ?>">
<?php if ($imgSrc): ?><meta property="og:image" content="<?= e($imgSrc) ?>"><?php endif; ?>
<meta name="theme-color" content="#1E120A">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --esp:#1E120A;--esp2:#2C1A0E;--gold:#C9922A;--gold2:#E8B84B;
  --sand:#F7F2EA;--stone:#E5DDD0;--cream:#FFFEF9;--parch:#F0EBE1;
  --text:#1E120A;--muted:#7A6952;--faint:#B0A090;--border:#E0D8CC;
}
html,body{font-family:'DM Sans',sans-serif;background:var(--parch);color:var(--text);min-height:100vh}

/* ── HEADER ── */
.hdr{
  background:rgba(28,16,8,.95);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(201,146,42,.2);padding:0 20px;height:64px;
  display:flex;align-items:center;justify-content:space-between;
  position:sticky;top:0;z-index:100;
}
.hdr-l{display:flex;align-items:center;gap:12px}
.back{
  display:inline-flex;align-items:center;gap:7px;color:rgba(255,255,255,.55);
  font-size:13px;font-weight:500;text-decoration:none;
  padding:7px 14px;border:1px solid rgba(255,255,255,.1);border-radius:100px;transition:all .2s;
}
.back:hover{color:#fff;border-color:rgba(255,255,255,.25);background:rgba(255,255,255,.06)}
.hdr-div{width:1px;height:20px;background:rgba(255,255,255,.1)}
.hdr-nm{font-size:12px;color:rgba(255,255,255,.45);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:220px}
.lang-sw{display:flex;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:100px;overflow:hidden}
.lb{padding:5px 14px;font-size:11px;font-weight:600;color:rgba(255,255,255,.4);text-decoration:none;transition:all .2s}
.lb.on{background:var(--gold);color:#fff}
.lb:hover:not(.on){color:rgba(255,255,255,.8)}

/* ── HERO IMAGE ── */
.hero-img-w{position:relative;height:clamp(240px,42vw,440px);background:var(--esp);overflow:hidden}
.hero-img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .6s ease}
.hero-img-w:hover .hero-img{transform:scale(1.03)}
.hero-no-img{width:100%;height:100%;display:flex;align-items:center;justify-content:center;
  font-size:80px;background:linear-gradient(135deg,var(--esp2),var(--esp))}
.hero-grad{position:absolute;bottom:0;left:0;right:0;height:60%;
  background:linear-gradient(to top,rgba(30,18,10,.75),transparent);pointer-events:none}
.hero-badge{
  position:absolute;top:20px;left:20px;display:inline-flex;align-items:center;
  gap:7px;padding:7px 18px;border-radius:100px;font-size:11px;font-weight:700;
  letter-spacing:.04em;backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);
}
/* ── PAGE LAYOUT ── */
.page{max-width:900px;margin:0 auto;padding:0 16px 60px}

/* ── DETAIL CARD ── */
.dcard{
  background:var(--cream);border-radius:20px;border:1px solid var(--border);
  overflow:hidden;margin-top:-44px;position:relative;z-index:2;
  box-shadow:0 12px 56px rgba(30,18,10,.16);animation:cardUp .5s ease both;
}
@keyframes cardUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.dcard-head{padding:28px 28px 20px;border-bottom:1px solid var(--border)}
.dtype{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;margin-bottom:10px}
.dname{font-family:'Playfair Display',serif;font-size:clamp(24px,4vw,34px);
  font-weight:700;color:var(--esp);line-height:1.2;margin-bottom:6px}
.dsub{font-size:13px;color:var(--muted)}
.dcard-body{padding:28px}

/* Section label */
.slbl{
  font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;
  color:var(--gold);margin-bottom:14px;display:flex;align-items:center;gap:10px;
}
.slbl::after{content:'';flex:1;height:1px;background:var(--border)}

.ddesc{
  font-size:15px;color:var(--muted);line-height:1.85;margin-bottom:32px;
  white-space:pre-line;
}
.ddesc p{margin-bottom:0.8em}

/* QR */
.qr-box{
  background:var(--sand);border-radius:16px;padding:28px;text-align:center;
  border:1px solid var(--border);margin-top:28px;
}
.qr-p{font-size:13px;color:var(--muted);margin-bottom:18px;line-height:1.6;max-width:280px;margin-left:auto;margin-right:auto}
.qr-img{max-width:180px;height:auto;border-radius:12px;border:1px solid var(--border);
  padding:10px;background:#fff;display:inline-block;box-shadow:0 4px 16px rgba(30,18,10,.08)}
.qr-hint{font-size:11px;color:var(--faint);margin-top:14px;display:flex;align-items:center;justify-content:center;gap:6px}

/* ── OTHER DESTINATIONS ── */
.others{margin-top:36px}
.others-h{
  font-family:'Playfair Display',serif;font-size:20px;font-weight:600;
  color:var(--esp);margin-bottom:18px;
}
.og{display:grid;grid-template-columns:repeat(auto-fill,minmax(185px,1fr));gap:14px}
.oc{
  background:var(--cream);border-radius:14px;border:1px solid var(--border);overflow:hidden;
  text-decoration:none;transition:all .25s;display:flex;flex-direction:column;
}
.oc:hover{border-color:rgba(201,146,42,.4);transform:translateY(-4px);box-shadow:0 10px 28px rgba(30,18,10,.12)}
.oc-img-w{height:110px;overflow:hidden;background:var(--stone)}
.oc-img{width:100%;height:100%;object-fit:cover;transition:transform .35s;display:block}
.oc:hover .oc-img{transform:scale(1.07)}
.oc-noimg{width:100%;height:100%;display:flex;align-items:center;justify-content:center;
  font-size:36px;background:linear-gradient(135deg,var(--stone),var(--parch))}
.oc-body{padding:12px 14px}
.oc-name{font-weight:600;font-size:13px;color:var(--esp);line-height:1.3;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.oc-type{font-size:10px;color:var(--faint);margin-top:4px}

/* ── FOOTER ── */
footer{background:var(--esp2);border-top:1px solid rgba(255,255,255,.06);padding:16px 20px;text-align:center;margin-top:40px}
footer p{font-size:11px;color:rgba(255,255,255,.2);letter-spacing:.06em}
footer span{color:var(--gold);font-weight:600}

/* ── PRINT ── */
@media print{
  .hdr,.hero-share,.btn-share,.print-btn,.others,.lang-sw,footer{display:none!important}
  .hero-img-w{height:200px}
  .dcard{margin-top:0;box-shadow:none;border:1px solid #ddd}
  body{background:#fff}
}

@media(max-width:480px){
  .dcard-head{padding:20px 18px 16px}
  .dcard-body{padding:20px 18px}
  .hdr-nm,.hdr-div{display:none}
  .og{grid-template-columns:1fr 1fr}
  .hero-share .btn-share span{display:none}
}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:var(--parch)}
::-webkit-scrollbar-thumb{background:var(--stone);border-radius:6px}
::-webkit-scrollbar-thumb:hover{background:var(--gold)}
</style>
</head>
<body>

<!-- HEADER -->
<header class="hdr">
  <div class="hdr-l">
    <a class="back" href="index.php">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"/>
      </svg>
      <?= _t_back ?>
    </a>
    <div class="hdr-div"></div>
    <span class="hdr-nm"><?= e($wisata['nama']) ?></span>
  </div>
  <div class="lang-sw">
    <a href="<?= $base ?>switch_lang.php?lang=2" class="lb <?= $lang===2?'on':'' ?>">ID</a>
    <a href="<?= $base ?>switch_lang.php?lang=1" class="lb <?= $lang===1?'on':'' ?>">EN</a>
  </div>
</header>

<!-- HERO IMAGE -->
<div class="hero-img-w">
  <?php if ($imgSrc): ?>
    <img class="hero-img" src="<?= $imgSrc ?>" alt="<?= e($wisata['nama']) ?>"
         onerror="this.style.display='none';document.getElementById('hni').style.display='flex'">
    <div id="hni" class="hero-no-img" style="display:none;position:absolute;inset:0"><?= $TYPE_ICON[$t] ?></div>
  <?php else: ?>
    <div class="hero-no-img"><?= $TYPE_ICON[$t] ?></div>
  <?php endif; ?>
  <div class="hero-grad"></div>
  <span class="hero-badge" style="background:<?= $bg ?>;color:<?= $color ?>;border:1px solid <?= $color ?>40">
    <?= $TYPE_ICON[$t] ?> <?= $TYPE_LABEL[$t] ?>
  </span>
</div>
</div>

<!-- CONTENT -->
<div class="page">
  <div class="dcard">
    <div class="dcard-head">
      <div class="dtype" style="color:<?= $color ?>"><?= $TYPE_ICON[$t] ?> <?= $TYPE_KET[$t] ?></div>
      <h1 class="dname"><?= e($wisata['nama']) ?></h1>
      <p class="dsub"><?= dest_wis_smg ?> &middot; Semarang, Jawa Tengah</p>
    </div>

    <div class="dcard-body">
      <!-- Deskripsi -->
      <div class="slbl"><?= des ?></div>
      <div class="ddesc"><?= e($wisata['deskripsi']) ?></div>

      <!-- QR Code -->
      <?php if ($qrSrc): ?>
        <div class="qr-box">
          <div class="slbl" style="justify-content:center;margin-bottom:14px">QR Code</div>
          <p class="qr-p"><?= scantodownload ?></p>
          <img class="qr-img" src="<?= $qrSrc ?>" alt="QR <?= e($wisata['nama']) ?>">
          <div class="qr-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12">
              <path d="M3 9V5a2 2 0 0 1 2-2h4M3 15v4a2 2 0 0 0 2 2h4M21 9V5a2 2 0 0 0-2-2h-4M21 15v4a2 2 0 0 1-2 2h-4"/>
            </svg>
            <?= $lang===1 ? 'Scan with your phone camera → Google Maps' : 'Scan dengan kamera HP → Google Maps' ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- Other Destinations -->
  <?php if (!empty($others)): ?>
  <div class="others">
    <div class="others-h"><?= $lang===1 ? 'Other Destinations' : 'Destinasi Lainnya' ?></div>
    <div class="og">
      <?php foreach ($others as $o):
        $ot   = (int)$o['type'];
        $oImg = $o['image'] ? $base.IMG_BASE.e($o['image']) : null;
      ?>
      <a class="oc" href="wisata.php?id=<?= (int)$o['id'] ?>">
        <div class="oc-img-w">
          <?php if ($oImg): ?>
            <img class="oc-img" src="<?= $oImg ?>" alt="<?= e($o['nama']) ?>" loading="lazy"
                 onerror="this.parentNode.innerHTML='<div class=\'oc-noimg\'><?= $TYPE_ICON[$ot] ?></div>'">
          <?php else: ?>
            <div class="oc-noimg"><?= $TYPE_ICON[$ot] ?></div>
          <?php endif; ?>
        </div>
        <div class="oc-body">
          <div class="oc-name"><?= e($o['nama']) ?></div>
          <div class="oc-type"><?= $TYPE_ICON[$ot] ?> <?= $TYPE_LABEL[$ot] ?></div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
</div>

<footer>
  <p>© <?= date('Y') ?> &nbsp;<span>Kiosk Destinasi Wisata</span>&nbsp; — Bandara Ahmad Yani Semarang</p>
</footer>

<script>
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
