<?php
/**
 * index.php — Halaman Utama Kiosk Publik
 * Enhanced: SEO meta, animasi, pagination, share button
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/define_lang.php';

// ── Base URL otomatis ────────────────────────────────────
$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off') ? 'https' : 'http';
$host  = $_SERVER['HTTP_HOST'];
$dir   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$base  = "../../destinasi_n/";

// ── URL Back (satu folder di atas = exhall/) ─────────────
$parentDir = rtrim(dirname($dir), '/\\');
$backUrl   = $proto . '://' . $host . $parentDir . '/';

// ── Filter, Search & Pagination ───────────────────────────
$typeFilter = isset($_GET['type']) ? (int)$_GET['type'] : 0;
$search     = isset($_GET['q'])    ? trim($_GET['q'])   : '';
$page       = max(1, (int)($_GET['p'] ?? 1));
$perPage    = 12;
$offset     = ($page - 1) * $perPage;
$searchSafe = $mysqli->real_escape_string($search);

$where = 'status = 1';
if ($typeFilter > 0) $where .= " AND type = $typeFilter";
if ($searchSafe)     $where .= " AND (nama LIKE '%$searchSafe%' OR deskripsi LIKE '%$searchSafe%')";

$totalRows   = (int)$mysqli->query("SELECT COUNT(*) FROM wisata WHERE $where")->fetch_row()[0];
$totalPages  = (int)ceil($totalRows / $perPage);
$destinations = $mysqli->query(
    "SELECT id, nama, deskripsi, type, image FROM wisata WHERE $where ORDER BY id ASC LIMIT $perPage OFFSET $offset"
)->fetch_all(MYSQLI_ASSOC);

$countAll    = (int)$mysqli->query("SELECT COUNT(*) FROM wisata WHERE status=1")->fetch_row()[0];
$countReligi = (int)$mysqli->query("SELECT COUNT(*) FROM wisata WHERE status=1 AND type=1")->fetch_row()[0];
$countBudaya = (int)$mysqli->query("SELECT COUNT(*) FROM wisata WHERE status=1 AND type=2")->fetch_row()[0];
$countAlam   = (int)$mysqli->query("SELECT COUNT(*) FROM wisata WHERE status=1 AND type=3")->fetch_row()[0];
$total       = count($destinations);

$TYPE_LABEL    = [1 => wisata_religi, 2 => wisata_budaya, 3 => wisata_alam];
$TYPE_KET      = [1 => ket_religi,   2 => ket_budaya,    3 => ket_alam];
$TYPE_ICON_RAW = [1 => '🕌', 2 => '🏛️', 3 => '🌿'];
$TYPE_COLOR    = [1 => '#2D6A4F', 2 => '#1B4F72', 3 => '#7D3C1A'];
$TYPE_BG       = [1 => 'rgba(45,106,79,.12)', 2 => 'rgba(27,79,114,.12)', 3 => 'rgba(125,60,26,.12)'];

// ── Hero slideshow images ────────────────────────────────
$heroDir  = $base . 'admin/public/gambar/hero/';
$heroBase = $base . 'admin/public/gambar/hero/';

$heroImgs = [];
if (is_dir($heroDir)) {
    foreach (glob($heroDir . '*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE) as $f) {
        $heroImgs[] = $heroBase . basename($f);
    }
}

$pageTitle = dest_wis_smg . ' — Bandara Ahmad Yani';
$pageDesc  = $lang===1
  ? 'Explore tourist destinations in Semarang — religious sites, cultural heritage, and natural wonders at Ahmad Yani Airport kiosk.'
  : 'Jelajahi destinasi wisata terbaik Semarang — wisata religi, budaya bersejarah, dan keindahan alam. Kiosk Bandara Ahmad Yani.';
?>
<!DOCTYPE html>
<html lang="<?= $lang===1?'en':'id' ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDesc) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDesc) ?>">
<meta property="og:type" content="website">
<meta name="theme-color" content="#0D1B2A">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --navy:#0D1B2A;
  --navy2:#162232;
  --navy3:#1E2E40;
  --gold:#C9922A;
  --gold2:#E8B84B;
  --gold-lt:rgba(201,146,42,.15);
  --cream:#FFFEF9;
  --parch:#F5F0E8;
  --sand:#EDE7DA;
  --stone:#D8D0C4;
  --border:#E2D9CC;
  --text:#1A1A2E;
  --muted:#6B7280;
  --faint:#9CA3AF;
}
html,body{font-family:'DM Sans',sans-serif;background:var(--navy);color:var(--text);overflow-x:hidden;min-height:100vh}

/* ══ HEADER ══════════════════════════════════════════════ */
.hdr{
  position:fixed;top:0;left:0;right:0;z-index:200;
  height:68px;padding:0 28px;
  display:flex;align-items:center;justify-content:space-between;
  background:rgba(13,27,42,.8);
  backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
  border-bottom:1px solid rgba(201,146,42,.15);
  transition:background .3s;
}
.hdr.scrolled{background:rgba(13,27,42,.98)}
.hdr-l{display:flex;align-items:center}
.back{
  display:inline-flex;align-items:center;gap:6px;
  padding:7px 16px;border-radius:100px;
  font-size:12px;font-weight:700;letter-spacing:.04em;
  color:rgba(255,255,255,.55);border:1.5px solid rgba(255,255,255,.12);
  text-decoration:none;transition:all .2s;
}
.back:hover{color:#fff;border-color:rgba(255,255,255,.3);background:rgba(255,255,255,.07)}
.hdr-div{width:1px;height:20px;background:rgba(255,255,255,.1);margin:0 4px}
.hdr-logo{height:52px;width:auto;max-width:200px;display:block;object-fit:contain}
.lang-sw{display:flex;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);border-radius:100px;overflow:hidden}
.lb{padding:6px 16px;font-size:11px;font-weight:700;color:rgba(255,255,255,.35);text-decoration:none;transition:all .2s;letter-spacing:.06em}
.lb.on{background:var(--gold);color:#fff}
.lb:hover:not(.on){color:rgba(255,255,255,.75)}

/* ══ HERO ADJUSTED FOR KIOSK ═════════════════════════════ */
.hero{
  position:relative;
  height:55vh; /* DIUBAH DARI 100vh AGAR TIDAK FULL SCREEN */
  min-height:450px;
  max-height:650px; /* BATAS MAKSIMAL TINGGI DI LAYAR BESAR */
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  overflow:hidden;background:var(--navy);
}
.hero-slide{
  position:absolute;inset:0;
  background-size:cover;background-position:center;
  opacity:0;transition:opacity 1.5s ease;
  transform:scale(1.06);
}
.hero-slide.active{
  opacity:1;
  animation:kenburns 9s ease forwards;
}
@keyframes kenburns{from{transform:scale(1.06)}to{transform:scale(1.0)}}
.hero-overlay{
  position:absolute;inset:0;z-index:2;pointer-events:none;
  background:linear-gradient(to bottom,
    rgba(13,27,42,.38) 0%,
    rgba(13,27,42,.22) 35%,
    rgba(13,27,42,.52) 70%,
    rgba(13,27,42,.85) 100%
  );
}
.hero-line{position:absolute;top:0;left:0;right:0;height:3px;z-index:10;
  background:linear-gradient(to right,transparent,var(--gold),var(--gold2),var(--gold),transparent)}
.hero-inner{
  position:relative;z-index:5;text-align:center;max-width:660px;padding:0 24px;
  margin-top:40px; /* DIKURANGI AGAR KONTEN NAIK */
}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:10px;
  font-size:10px;letter-spacing:.28em;text-transform:uppercase;
  color:var(--gold2);font-weight:700;margin-bottom:20px;
  animation:fadeUp .7s .1s ease both;
}
.hero-eyebrow::before,.hero-eyebrow::after{content:'';width:30px;height:1px;background:var(--gold);opacity:.5}
.hero-h1{
  font-family:'Playfair Display',serif;
  font-size:clamp(34px,7vw,60px);
  font-weight:700;color:#fff;line-height:1.1;margin-bottom:18px;
  text-shadow:0 2px 28px rgba(0,0,0,.5);
  animation:fadeUp .7s .2s ease both;
}
.hero-h1 em{color:var(--gold2);font-style:italic}
.hero-p{
  font-size:15px;color:rgba(255,255,255,.5);max-width:460px;margin:0 auto 34px;
  line-height:1.8;font-weight:300;
  animation:fadeUp .7s .3s ease both;
}
.srch{max-width:520px;margin:0 auto;position:relative;animation:fadeUp .7s .4s ease both}
.srch input[type=text]{
  width:100%;height:56px;
  background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.15);border-radius:100px;
  color:#fff;font-family:'DM Sans',sans-serif;font-size:14px;
  padding:0 130px 0 52px;outline:none;transition:all .25s;backdrop-filter:blur(8px);
}
.srch input::placeholder{color:rgba(255,255,255,.25)}
.srch input:focus{border-color:var(--gold);background:rgba(255,255,255,.14);box-shadow:0 0 0 4px rgba(201,146,42,.15)}
.srch svg.ico{position:absolute;left:18px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,.3);width:18px;pointer-events:none}
.srch button{
  position:absolute;right:6px;top:50%;transform:translateY(-50%);
  height:44px;padding:0 26px;
  background:linear-gradient(135deg,var(--gold),var(--gold2));
  border:none;border-radius:100px;color:#fff;
  font-family:'DM Sans',sans-serif;font-size:13px;font-weight:700;
  cursor:pointer;transition:all .2s;letter-spacing:.04em;
  box-shadow:0 4px 20px rgba(201,146,42,.4);
}
.srch button:hover{transform:translateY(-50%) translateY(-1px);box-shadow:0 8px 28px rgba(201,146,42,.55)}
.hero-dots{
  position:absolute;bottom:32px;left:50%;transform:translateX(-50%);
  display:flex;gap:8px;z-index:10;
}
.hero-dot{
  width:8px;height:8px;border-radius:4px;
  background:rgba(255,255,255,.2);border:none;cursor:pointer;padding:0;
  transition:all .35s;
}
.hero-dot.active{background:var(--gold);width:26px}
.hero-scroll{
  position:absolute;bottom:32px;right:32px;z-index:10;
  display:flex;flex-direction:column;align-items:center;gap:6px;
  color:rgba(255,255,255,.25);font-size:9px;letter-spacing:.18em;text-transform:uppercase;
}
.hero-scroll-line{width:1px;height:38px;background:linear-gradient(to bottom,rgba(255,255,255,.3),transparent);animation:scrollPulse 2s infinite}
@keyframes scrollPulse{0%,100%{opacity:.25}50%{opacity:.7}}
.hero-counter{position:absolute;bottom:36px;left:32px;z-index:10;font-size:11px;color:rgba(255,255,255,.25);letter-spacing:.08em}
.hero-counter span{color:var(--gold);font-weight:700;font-size:14px}

/* ══ CATEGORY BAR ════════════════════════════════════════ */
.cats-wrap{
  background:var(--navy2);border-bottom:1px solid rgba(255,255,255,.06);
  padding:0 20px;position:sticky;top:68px;z-index:100;
}
.cats{display:flex;gap:4px;justify-content:center;padding:12px 0;overflow-x:auto;scrollbar-width:none}
.cats::-webkit-scrollbar{display:none}
.cat{
  display:inline-flex;align-items:center;gap:7px;padding:8px 20px;border-radius:100px;
  font-size:12px;font-weight:600;border:1.5px solid rgba(255,255,255,.08);
  color:rgba(255,255,255,.4);text-decoration:none;transition:all .2s;white-space:nowrap;
}
.cat:hover{border-color:rgba(201,146,42,.4);color:rgba(255,255,255,.85);background:rgba(201,146,42,.08)}
.cat.on{background:linear-gradient(135deg,var(--gold),var(--gold2));border-color:var(--gold);color:#fff;box-shadow:0 4px 16px rgba(201,146,42,.3)}
.cat-n{background:rgba(255,255,255,.15);border-radius:100px;padding:2px 8px;font-size:10px;font-weight:700}
.cat.on .cat-n{background:rgba(255,255,255,.25)}

/* ══ CONTENT ═════════════════════════════════════════════ */
.wrap{background:var(--parch);min-height:60vh;padding:36px 20px 60px}
.meta{font-size:12px;color:var(--muted);text-align:center;margin-bottom:24px}
.meta strong{color:var(--text);font-weight:700}
.meta a{color:var(--gold);text-decoration:none;font-size:11px;margin-left:6px;font-weight:600}

/* ══ GRID ════════════════════════════════════════════════ */
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:22px;max-width:1140px;margin:0 auto}

/* ══ CARD ════════════════════════════════════════════════ */
.dc{
  background:var(--cream);border-radius:20px;border:1px solid var(--border);overflow:hidden;
  transition:all .3s cubic-bezier(.25,.8,.25,1);text-decoration:none;display:flex;flex-direction:column;
  box-shadow:0 2px 12px rgba(26,26,46,.06);animation:cardIn .5s ease both;
}
.dc:hover{transform:translateY(-7px);box-shadow:0 24px 64px rgba(26,26,46,.14);border-color:rgba(201,146,42,.35)}
.dc-img-w{position:relative;height:200px;overflow:hidden;background:var(--sand)}
.dc-img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .6s ease}
.dc:hover .dc-img{transform:scale(1.08)}
.dc-noimg{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:60px;background:linear-gradient(135deg,var(--sand),var(--parch))}
.dc-badge{position:absolute;top:14px;left:14px;padding:5px 12px;border-radius:100px;font-size:10px;font-weight:700;letter-spacing:.05em;backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid currentColor}
.dc-ov{position:absolute;bottom:0;left:0;right:0;height:80px;background:linear-gradient(to top,rgba(26,26,46,.4),transparent);pointer-events:none}
.dc-body{padding:20px 22px 10px;flex:1;display:flex;flex-direction:column;gap:8px}
.dc-name{font-family:'Playfair Display',serif;font-size:17px;font-weight:600;color:var(--text);line-height:1.25}
.dc-desc{font-size:12.5px;color:var(--muted);line-height:1.7;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.dc-foot{padding:12px 22px 16px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--parch);margin-top:auto}
.dc-ket{font-size:11px;color:var(--faint)}
.dc-det{display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:700;color:var(--gold);letter-spacing:.02em}
.dc-det svg{transition:transform .2s}
.dc:hover .dc-det svg{transform:translateX(4px)}

/* ══ EMPTY ═══════════════════════════════════════════════ */
.empty{text-align:center;padding:80px 24px;max-width:380px;margin:0 auto}
.empty-ico{font-size:64px;margin-bottom:20px;opacity:.5}
.empty h3{font-family:'Playfair Display',serif;font-size:22px;color:var(--text);margin-bottom:10px}
.empty p{font-size:13px;color:var(--muted);line-height:1.7}

/* ══ PAGINATION ══════════════════════════════════════════ */
.pagination-wrap{display:flex;justify-content:center;gap:8px;margin-top:40px;flex-wrap:wrap}
.pg-btn{min-width:40px;height:40px;display:inline-flex;align-items:center;justify-content:center;border-radius:10px;border:1.5px solid var(--border);color:var(--muted);text-decoration:none;font-size:13px;font-weight:600;transition:all .18s;padding:0 12px;background:var(--cream)}
.pg-btn:hover{border-color:var(--gold);color:var(--gold);background:rgba(201,146,42,.05)}
.pg-btn.on{background:linear-gradient(135deg,var(--gold),var(--gold2));border-color:var(--gold);color:#fff;box-shadow:0 4px 14px rgba(201,146,42,.3)}

/* ══ MARQUEE ═════════════════════════════════════════════ */
.mq-wrap{background:var(--navy2);border-top:1px solid rgba(201,146,42,.12);overflow:hidden;padding:8px 0}
.mq-inner{display:flex;animation:marquee 30s linear infinite;white-space:nowrap}
.mq-txt{font-size:11px;color:rgba(255,255,255,.12);letter-spacing:.2em;padding:0 36px}
.mq-txt span{color:var(--gold);opacity:.35}
@keyframes marquee{from{transform:translateX(0)}to{transform:translateX(-50%)}}

/* ══ FOOTER ══════════════════════════════════════════════ */
footer{background:var(--navy);border-top:1px solid rgba(255,255,255,.05);padding:20px;text-align:center}
footer p{font-size:11px;color:rgba(255,255,255,.15);letter-spacing:.06em}
footer span{color:var(--gold);font-weight:600}

/* ══ ANIMATIONS ══════════════════════════════════════════ */
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes cardIn{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
<?php for ($i=0;$i<12;$i++) echo ".dc:nth-child($i){animation-delay:".($i*.07)."s}\n"; ?>

@media(max-width:600px){
  .grid{grid-template-columns:1fr}
  .hero-h1{font-size:30px}
  .hero-scroll,.hero-counter{display:none}
  .hdr{padding:0 16px}
  .hdr-logo{height:40px}
}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:var(--parch)}
::-webkit-scrollbar-thumb{background:var(--stone);border-radius:6px}
::-webkit-scrollbar-thumb:hover{background:var(--gold)}
</style>
</head>
<body>

<header class="hdr" id="hdr">
  <div class="hdr-l">
    <a class="back" href="<?= $backUrl ?>">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"/>
      </svg>
      <?= _t_back ?>
    </a>
    <div class="hdr-div"></div>
    <img src="<?= $base ?>admin/public/gambar/logo-bandara.png" alt="Jenderal Ahmad Yani International Airport" class="hdr-logo">
  </div>
  <div class="lang-sw">
    <a href="switch_lang.php?lang=2" class="lb <?= $lang===2?'on':'' ?>">ID</a>
    <a href="switch_lang.php?lang=1" class="lb <?= $lang===1?'on':'' ?>">EN</a>
  </div>
</header>

<section class="hero" id="hero">
  <div class="hero-line"></div>

  <?php if (!empty($heroImgs)): ?>
    <?php foreach ($heroImgs as $i => $img): ?>
      <div class="hero-slide <?= $i===0?'active':'' ?>"
           style="background-image:url('<?= e($img) ?>')"></div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="hero-slide active" style="background:linear-gradient(135deg,#0D1B2A 0%,#162232 50%,#0f2234 100%)"></div>
  <?php endif; ?>

  <div class="hero-overlay"></div>

  <div class="hero-inner">
    <div class="hero-eyebrow"><?= dest_wis_smg ?></div>
    <h1 class="hero-h1">
      <?= $lang===1 ? 'Discover <em>Semarang</em>' : 'Jelajahi <em>Semarang</em>' ?>
    </h1>
    <p class="hero-p">
      <?= $lang===1
        ? 'Explore the best tourist destinations in Semarang — religious sites, cultural heritage, and natural wonders.'
        : 'Temukan destinasi wisata terbaik di Semarang — wisata religi, budaya bersejarah, hingga keindahan alam.' ?>
    </p>

    <form class="srch" method="GET" action="index.php">
      <?php if ($typeFilter): ?>
        <input type="hidden" name="type" value="<?= $typeFilter ?>">
      <?php endif; ?>
      <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
      <input type="text" name="q" value="<?= e($search) ?>" placeholder="<?= src ?>...">
      <button type="submit"><?= src ?></button>
    </form>
  </div>

  <?php if (count($heroImgs) > 1): ?>
  <div class="hero-dots" id="hero-dots">
    <?php foreach ($heroImgs as $i => $_): ?>
      <button class="hero-dot <?= $i===0?'active':'' ?>" data-idx="<?= $i ?>"></button>
    <?php endforeach; ?>
  </div>
  <div class="hero-counter">
    <span id="cur-slide">1</span> / <?= count($heroImgs) ?>
  </div>
  <?php endif; ?>

  <div class="hero-scroll">
    <div class="hero-scroll-line"></div>
    SCROLL
  </div>
</section>

<div class="cats-wrap">
  <div class="cats">
    <?php
      $qs = $search ? '?q='.urlencode($search) : '';
      $cats = [
        0 => ['ico'=>'🗺️', 'label'=>all_cat,      'cnt'=>$countAll,    'url'=>'index.php'.$qs],
        1 => ['ico'=>'🕌', 'label'=>wisata_religi, 'cnt'=>$countReligi, 'url'=>'index.php?type=1'.($search?'&q='.urlencode($search):'')],
        2 => ['ico'=>'🏛️', 'label'=>wisata_budaya, 'cnt'=>$countBudaya, 'url'=>'index.php?type=2'.($search?'&q='.urlencode($search):'')],
        3 => ['ico'=>'🌿', 'label'=>wisata_alam,   'cnt'=>$countAlam,   'url'=>'index.php?type=3'.($search?'&q='.urlencode($search):'')],
      ];
      foreach ($cats as $k => $c):
    ?>
    <a href="<?= $c['url'] ?>" class="cat <?= $typeFilter===$k?'on':'' ?>">
      <?= $c['ico'] ?> <?= $c['label'] ?>
      <span class="cat-n"><?= $c['cnt'] ?></span>
    </a>
    <?php endforeach; ?>
  </div>
</div>

<div class="wrap">
  <?php if ($search || $typeFilter): ?>
    <p class="meta">
      <strong><?= $totalRows ?></strong> <?= results ?>
      <?php if ($typeFilter): ?> &middot; <?= $TYPE_LABEL[$typeFilter] ?><?php endif; ?>
      <?php if ($search): ?> &middot; "<?= e($search) ?>"<?php endif; ?>
      <a href="index.php">✕ Reset</a>
    </p>
  <?php elseif ($page > 1): ?>
    <p class="meta">Halaman <?= $page ?> dari <?= $totalPages ?></p>
  <?php endif; ?>

  <?php if (empty($destinations)): ?>
    <div class="empty">
      <div class="empty-ico">🗺️</div>
      <h3><?= no_result ?></h3>
      <p><?= $lang===1 ? 'Try a different keyword or category.' : 'Coba kata kunci atau kategori lain.' ?></p>
    </div>
  <?php else: ?>
    <div class="grid">
      <?php foreach ($destinations as $d):
        $t      = (int)$d['type'];
        $color  = $TYPE_COLOR[$t] ?? '#C9922A';
        $bg     = $TYPE_BG[$t]   ?? 'rgba(201,146,42,.12)';
        $imgUrl = $d['image'] ? ($base . IMG_BASE . e($d['image'])) : null;
      ?>
      <a class="dc" href="wisata.php?id=<?= (int)$d['id'] ?>">
        <div class="dc-img-w">
          <?php if ($imgUrl): ?>
            <img class="dc-img" src="<?= $imgUrl ?>" alt="<?= e($d['nama']) ?>" loading="lazy"
                 onerror="this.parentNode.innerHTML='<div class=\'dc-noimg\'><?= $TYPE_ICON_RAW[$t] ?></div><div class=\'dc-ov\'></div>'">
          <?php else: ?>
            <div class="dc-noimg"><?= $TYPE_ICON_RAW[$t] ?></div>
          <?php endif; ?>
          <div class="dc-ov"></div>
          <span class="dc-badge" style="background:<?= $bg ?>;color:<?= $color ?>">
            <?= $TYPE_ICON_RAW[$t] ?> <?= $TYPE_LABEL[$t] ?>
          </span>
        </div>
        <div class="dc-body">
          <div class="dc-name"><?= e($d['nama']) ?></div>
          <div class="dc-desc"><?= e(mb_substr(strip_tags($d['deskripsi']), 0, 120)) ?></div>
        </div>
        <div class="dc-foot">
          <span class="dc-ket"><?= $TYPE_KET[$t] ?></span>
          <span class="dc-det">
            <?= detail ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <polyline points="9 18 15 12 9 6"/>
            </svg>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <?php if ($totalPages > 1): ?>
    <div class="pagination-wrap">
      <?php if ($page > 1): ?>
        <a class="pg-btn" href="?<?= http_build_query(array_filter(['q'=>$search,'type'=>$typeFilter?:null])) ?>&p=<?= $page-1 ?>">‹</a>
      <?php endif; ?>
      <?php for ($p = max(1,$page-2); $p <= min($totalPages,$page+2); $p++): ?>
        <a class="pg-btn <?= $p===$page?'on':'' ?>"
           href="?<?= http_build_query(array_filter(['q'=>$search,'type'=>$typeFilter?:null])) ?>&p=<?= $p ?>"><?= $p ?></a>
      <?php endfor; ?>
      <?php if ($page < $totalPages): ?>
        <a class="pg-btn" href="?<?= http_build_query(array_filter(['q'=>$search,'type'=>$typeFilter?:null])) ?>&p=<?= $page+1 ?>">›</a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  <?php endif; ?>
</div>

<div class="mq-wrap">
  <div class="mq-inner">
    <?php for ($i=0;$i<4;$i++): ?>
    <span class="mq-txt">EXPLORE <span>✦</span> DISCOVER <span>✦</span> EXPERIENCE <span>✦</span> BANDARA AHMAD YANI SEMARANG <span>✦</span> <?= dest_wis_smg ?> <span>✦</span></span>
    <?php endfor; ?>
  </div>
</div>

<footer>
  <p>© <?= date('Y') ?> &nbsp;<span>Kiosk Destinasi Wisata</span>&nbsp; — Bandara Ahmad Yani Semarang</p>
</footer>

<script>
// Header scroll effect
window.addEventListener('scroll', () => {
  document.getElementById('hdr').classList.toggle('scrolled', window.scrollY > 60);
});

// Hero Slideshow dengan Ken Burns
(function(){
  const slides  = document.querySelectorAll('.hero-slide');
  const dots    = document.querySelectorAll('.hero-dot');
  const counter = document.getElementById('cur-slide');
  if (slides.length < 2) return;
  let cur = 0;

  function goTo(n) {
    slides[cur].classList.remove('active');
    if (dots[cur]) dots[cur].classList.remove('active');
    cur = (n + slides.length) % slides.length;
    // Reset Ken Burns animation
    slides[cur].style.animation = 'none';
    slides[cur].offsetHeight;
    slides[cur].style.animation = '';
    slides[cur].classList.add('active');
    if (dots[cur]) dots[cur].classList.add('active');
    if (counter) counter.textContent = cur + 1;
  }

  let timer = setInterval(() => goTo(cur + 1), 6000);

  dots.forEach(d => d.addEventListener('click', function(){
    clearInterval(timer);
    goTo(+this.dataset.idx);
    timer = setInterval(() => goTo(cur + 1), 6000);
  }));

  // Swipe support mobile
  let startX = 0;
  const hero = document.getElementById('hero');
  hero.addEventListener('touchstart', e => startX = e.touches[0].clientX, {passive:true});
  hero.addEventListener('touchend', e => {
    const diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) {
      clearInterval(timer);
      goTo(diff > 0 ? cur + 1 : cur - 1);
      timer = setInterval(() => goTo(cur + 1), 6000);
    }
  }, {passive:true});
})();
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