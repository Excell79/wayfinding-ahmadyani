<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Saran & Apresiasi — Feedback Bandara Ahmad Yani</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Formulir Saran dan Apresiasi Bandara Ahmad Yani Semarang">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

  <!-- Modern Pure Vanilla CSS -->
  <link rel="stylesheet" href="../vote_n/css/feedback_modern.css">
  <link rel="stylesheet" type="text/css" href="jquery.ml-keyboard.css">

  <script src="jquery-1.11.0.min.js"></script>
  <script src="jquery.ml-keyboard.js"></script>

  <script>
    var buttonAudio = new Audio('../vote/button.mp3');
    $(document).ready(function() {
      // Initialize virtual touch keyboard
      $('input[type="text"], textarea').mlKeyboard({
        layout: 'en_US',
        trigger: 'focus'
      });

      // Smooth scroll focused input into middle view
      $('input[type="text"], textarea').on('focus', function() {
        var el = this;
        setTimeout(function() {
          el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 200);
      });
    });

    // Realtime Clock script matching main page
    function updateClock() {
      var now = new Date();
      var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      
      var dayName = days[now.getDay()];
      var dayNum = now.getDate();
      var monthName = months[now.getMonth()];
      var year = now.getFullYear();

      var hours = String(now.getHours()).padStart(2, '0');
      var minutes = String(now.getMinutes()).padStart(2, '0');
      var seconds = String(now.getSeconds()).padStart(2, '0');

      var formatted = dayName + ', ' + dayNum + ' ' + monthName + ' ' + year + ' | ' + hours + ':' + minutes + ':' + seconds;
      var el = document.getElementById('date_time');
      if (el) el.innerText = formatted;
    }

    setInterval(updateClock, 1000);
    window.onload = updateClock;
  </script>

  <style>
    body {
      padding-bottom: 300px !important;
    }
  </style>

  <?php
  $page = "../index.html";
  $sec = "180";
  ?>
  <meta http-equiv="refresh" content="<?php echo $sec; ?>;URL='<?php echo $page; ?>'">
</head>

<body>

  <!-- Header Navigation with Live Clock -->
  <header class="header-nav">
    <a href="../index.html" class="btn-back" onclick="try{buttonAudio.play();}catch(e){}">
      <span>←</span> Kembali
    </a>

    <!-- Live Realtime Clock Badge -->
    <div class="clock-badge">
      <span id="date_time">Loading...</span>
    </div>
  </header>

  <!-- Main Form Viewport -->
  <main class="viewport-container">
    <div class="step-card" style="padding: 48px 44px; max-width: 1100px; width: 100%; text-align: left; align-items: stretch;">

      <h2 style="font-size: 28px; font-weight: 800; color: var(--text-primary); margin-bottom: 32px; text-align: center;">
        Saran dan Apresiasi
      </h2>

      <?php
      $length = 10;
      $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
      $cookie = isset($_GET['cookies']) ? $_GET['cookies'] : $randomString;
      ?>

      <!-- Main POST Form -->
      <form id="saranForm" method="post" action="insert2.php">
        <input name="cookies" type="hidden" value="<?php echo $cookie; ?>">

        <!-- 2-Column Grid Layout -->
        <div class="form-grid-2">
          
          <!-- LEFT COLUMN: Contact Details -->
          <div class="form-column">
            <!-- Nama (Mandatory *) -->
            <div class="form-group">
              <label class="form-label" for="name">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                Nama Lengkap <span style="color: #ef4444; font-weight: 800;">*</span>
              </label>
              <input name="name" type="text" id="name" class="form-control" placeholder="Masukkan Nama Lengkap Anda *" required />
            </div>

            <!-- No Telp (Optional) -->
            <div class="form-group">
              <label class="form-label" for="contact">
                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                No. Telepon / WA <span style="font-size: 12px; color: #64748b; font-weight: 500;">(Opsional)</span>
              </label>
              <input name="contact" type="text" id="contact" class="form-control" placeholder="Contoh: 08123456789" />
            </div>

            <!-- Email (Optional, Email Format Only) -->
            <div class="form-group">
              <label class="form-label" for="email">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                Alamat Email <span style="font-size: 12px; color: #64748b; font-weight: 500;">(Opsional)</span>
              </label>
              <input name="email" type="email" id="email" class="form-control" placeholder="Contoh: nama@domain.com" />
            </div>

            <!-- Jenis Kelamin (Optional) -->
            <div class="form-group">
              <label class="form-label" for="gender">
                <svg viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/></svg>
                Jenis Kelamin <span style="font-size: 12px; color: #64748b; font-weight: 500;">(Opsional)</span>
              </label>
              <select name="gender" id="gender" class="form-select">
                <option value="0">Pilih Jenis Kelamin</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>
          </div>

          <!-- RIGHT COLUMN: Message & Category -->
          <div class="form-column">
            <!-- Tipe Feedback (Optional) -->
            <div class="form-group">
              <label class="form-label" for="subject">
                <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/></svg>
                Tipe Feedback <span style="font-size: 12px; color: #64748b; font-weight: 500;">(Opsional)</span>
              </label>
              <select name="subject" id="subject" class="form-select">
                <option value="0">Pilih Tipe Feedback</option>
                <option value="1">Saran</option>
                <option value="2">Apresiasi</option>
                <option value="3">Lainnya</option>
              </select>
            </div>

            <!-- Isi Komentar (Mandatory *) -->
            <div class="form-group full-height">
              <label class="form-label" for="coment">
                <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2z"/></svg>
                Isi Komentar / Masukan <span style="color: #ef4444; font-weight: 800;">*</span>
              </label>
              <textarea name="coment" id="coment" class="form-control" placeholder="Tuliskan isi saran, apresiasi, atau masukan Anda secara rinci di sini *" required></textarea>
            </div>
          </div>

        </div>

        <!-- Bottom Large Action Buttons (Kosongkan & Kirim) -->
        <div class="form-actions-footer">
          <button type="reset" class="btn-action-lg btn-reset" onclick="try{buttonAudio.play();}catch(e){}">
            <svg viewBox="0 0 24 24"><path d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z"/></svg>
            Kosongkan
          </button>

          <button type="submit" name="submit" value="SUBMIT" class="btn-action-lg btn-submit" onclick="try{buttonAudio.play();}catch(e){}">
            <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
            Kirim
          </button>
        </div>

      </form>
    </div>
  </main>

</body>
</html>
