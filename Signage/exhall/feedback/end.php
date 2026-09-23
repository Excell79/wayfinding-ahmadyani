<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Terima Kasih — Feedback Bandara Ahmad Yani</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Modern Pure Vanilla CSS -->
  <link rel="stylesheet" href="vote_n/css/feedback_modern.css">

  <script>
    var buttonAudio = new Audio('vote_n/button.mp3');
  </script>

  <?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  $page = "../index.html";
  $sec = "10";
  $Name = isset($_GET['nama']) ? htmlspecialchars($_GET['nama'], ENT_QUOTES, 'UTF-8') : '';
  ?>
  <meta http-equiv="refresh" content="<?php echo $sec; ?>;URL='<?php echo $page; ?>'">
</head>
<body>

  <!-- Header Navigation matching vote_n -->
  <header class="header-nav">
    <button class="btn-nav-action btn-secondary" onclick="try{buttonAudio.play();}catch(e){} window.location.href='../index.html';">
      <span>←</span> Kembali
    </button>

    <div style="font-weight: 700; font-size: 16px; color: var(--text-primary);">
      Feedback Bandara Ahmad Yani
    </div>

    <div style="width: 100px;"></div>
  </header>

  <!-- Main Viewport Container matching vote_n -->
  <main class="viewport-container">
    <div class="step-card">
      <div class="thankyou-icon">✓</div>

      <h2 class="thankyou-heading">
        <?php echo !empty($Name) ? "Terima Kasih, $Name!" : "Terima Kasih!"; ?>
      </h2>

      <p class="thankyou-desc">
        Saran dan apresiasi yang Anda berikan sangat berharga untuk peningkatan kualitas pelayanan Bandara Internasional Ahmad Yani Semarang.
      </p>

      <button class="btn-nav-action" onclick="try{buttonAudio.play();}catch(e){} window.location.href='../index.html';" style="padding: 16px 40px; font-size: 17px;">
        <span>←</span> Kembali ke Utama
      </button>

      <p style="font-size: 13px; color: #94a3b8; margin-top: 24px;">
        Halaman akan otomatis kembali ke menu utama dalam <?php echo $sec; ?> detik...
      </p>
    </div>
  </main>

</body>
</html>
