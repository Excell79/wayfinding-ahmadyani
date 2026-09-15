<?php
include "koneksi.php";

$id_lantai = 3;

// Logika Pintar: Defaultnya kita anggap tidak ada video yang diputar (tampil gambar)
$is_playing = false;
$video_aktif = ""; 

if (isset($_GET['play'])) {
    $id_play = (int)$_GET['play'];
    $query_vid = mysqli_query($conn, "SELECT video_jalur FROM tabel_jalur WHERE id_jalur = $id_play");
    if ($row_vid = mysqli_fetch_assoc($query_vid)) {
        if (!empty($row_vid['video_jalur']) && $row_vid['video_jalur'] !== 'null') {
            $db_vid = str_replace('../', '', $row_vid['video_jalur']); 
            if (strpos($db_vid, 'video/') === 0 || strpos($db_vid, 'upload/') === 0) {
                $video_aktif = $db_vid;
            } elseif (strpos($db_vid, 'Lantai') === 0) {
                $video_aktif = "video/" . $db_vid;
            } else {
                $video_aktif = "upload/" . $db_vid;
            }
            $is_playing = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INTERNASIONAL</title>
    <style>
      .grid {
        display: flex;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
        margin-top: 40px;
      }
      .ahref {
        text-decoration: none;
        color: black;
      }
      .tenant {
        display: flex;
        align-items: center;
        font-size: 18px;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        margin-top: 10px;
      }
      .tenant img {
        max-width: 140px;
        height: 60px;
        width: auto;
        object-fit: contain;
        margin-left: 10px;
      }
    </style>
  </head>
  <body>
    <div
      style="
        background-color: #e8e8e8;
        max-width: 1080px;
        width: 100%;
        box-sizing: border-box;
        min-height: 1920px;
        padding: 0px;
        margin-top: -8px;
        margin-left: auto;
        margin-right: auto;
      "
    >
      <a href="Lantai2.php">
        <img
          src="gambar/Lantai3/back.png"
          style="width: 100px; position: relative; z-index: 10;"
        />
      </a>

      <?php if ($is_playing): ?>
        <video autoplay loop muted playsinline style="width: 100%; margin-top: -110px; display: block;">
          <source src="../../wayfinding/<?= htmlspecialchars($video_aktif) ?>" type="video/mp4" />
        </video>
      <?php else: ?>
        <img 
          src="gambar/Lantai3/inter.png" 
          style="width: 100%; margin-top: -110px; display: block;" 
          alt="Map Lantai 3" 
        />
      <?php endif; ?>

      <div style="height: 60px; margin-top: -110px; pointer-events: none;"></div>

      <img
        src="gambar/Lantai1/LEGEND.png"
        style="
          margin-left: auto;
          margin-right: auto;
          display: block;
          margin-top: 20px; 
        "
      />

      <div
        style="
          display: flex;
          justify-content: center;
          margin-top: 45px;
          gap: 30px;
        "
      >
        <div>
          <div
            style="
              display: grid;
              width: 965px;
              min-height: 260px;
              grid-template-columns: repeat(6, 1fr);
              background-color: white;
              border-radius: 30px;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
              position: relative;
              padding: 55px 20px 20px 20px; /* Padding top disesuaikan agar tulisan tidak ketutupan label abu-abu */
              box-sizing: border-box;
            "
          >
            <div id="dynamic-tenant" style="display: contents;">
              <p style="font-family:sans-serif; color:#999; grid-column: span 6; text-align: center;">Memuat data...</p>
            </div>

            <div
              style="
                background-color: #a4b1ba;
                width: 965px;
                height: 60px;
                display: flex;
                align-items: center;
                padding-left: 20px;
                gap: 12px;
                border-radius: 50px;
                font-size: 25.54px;
                font-weight: bold;
                color: white;
                text-transform: uppercase;
                border: none;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                position: absolute;
                top: -25px;
                left: 0;
                z-index: 2;
                box-sizing: border-box;
              "
            >
              <img
                src="gambar/Lantai1/logoicon/tenant.png"
                style="width: 39.59px; flex-shrink: 0;"
              />
              <p style="margin: 0; line-height: 1;">TENANT</p>
            </div>
          </div>
        </div>
      </div>

      <div style="display: flex; justify-content: center; margin-top: 45px;">
        <div id="dynamic-fasilitas">
           <p style="font-family:sans-serif; color:#999;">Memuat data...</p>
        </div>
      </div>

    </div>

    <script>
      async function loadDataJalur() {
        try {
          const noCache = new Date().getTime();
          const res = await fetch(`api/get_jalur.php?lantai=3&t=${noCache}`);
          const data = await res.json();
          
          const tenants = data.filter(d => d.type.toLowerCase().trim() === 'tenant');
          const fasilitas = data.filter(d => d.type.toLowerCase().trim() === 'fasilitas');

          function resolvePath(rawPath) {
            if (!rawPath || rawPath === 'null' || rawPath.trim() === '') return '';
            let p = rawPath.trim();
            while (p.startsWith('../')) p = p.substring(3);
            if (p.startsWith('gambar/') || p.startsWith('upload/') || p.startsWith('video/')) return p;
            if (p.startsWith('Lantai') || p.startsWith('pickupzone')) return 'gambar/' + p;
            return 'upload/' + p;
          }

          // --- RENDER TENANT (1 kolom ≤6, 2 kolom >6, urut ke bawah) ---
          const tenantContainer = document.getElementById('dynamic-tenant');
          if (tenantContainer) {
            const count = tenants.length;
            const useTwoCols = count > 6;
            const rows = useTwoCols ? Math.ceil(count / 2) : count;

            function buildItemHTML(t) {
              if (!t) return '<div></div>';
              let isIdle = t.nama_jalur.toLowerCase().trim() === 'idle';
              let linkHref = `Lantai3.php?play=${t.id_jalur}`;
              let numSpan = `<span style="display:inline-block;width:36px;flex-shrink:0;">${t.nomor_jalur}.</span>`;

              let logoPath = resolvePath(t.logo_jalur);
              let imgTag = (logoPath && logoPath !== 'null')
                ? `<img src="../../wayfinding/${logoPath}" alt="${t.nama_jalur}" />`
                : `<span style="font-size:16px;font-weight:bold;">${t.nama_jalur}</span>`;

              return `
                <a href="${linkHref}" class="ahref" style="text-decoration:none;">
                  <div class="tenant" style="margin:0;min-height:70px;font-size:20px;">
                    ${numSpan}
                    ${isIdle ? '<span style="color:#bbb;">idle</span>' : imgTag}
                  </div>
                </a>`;
            }

            let tenantHTML = '';
            if (useTwoCols) {
              const leftCol  = tenants.slice(0, rows);
              const rightCol = tenants.slice(rows);
              tenantHTML = '<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px 40px;">';
              for (let r = 0; r < rows; r++) {
                tenantHTML += buildItemHTML(leftCol[r]);
                tenantHTML += buildItemHTML(rightCol[r]);
              }
              tenantHTML += '</div>';
            } else {
              tenantHTML = '<div style="display:flex;flex-direction:column;gap:10px;">';
              tenants.forEach(t => { tenantHTML += buildItemHTML(t); });
              tenantHTML += '</div>';
            }

            tenantContainer.innerHTML = tenantHTML || '<p style="text-align:center;color:#aaa;font-family:sans-serif;">Belum ada data tenant</p>';
          }
          
          // --- RENDER FASILITAS (TETAP 1 KOLOM BESAR) ---
          const fasContainer = document.getElementById('dynamic-fasilitas');
          if (fasContainer && fasilitas.length > 0) {
              const fallbackColors = ['#a7c7de', '#d6b2a2', '#ff8b8b', '#7f90bb', '#a090d5', '#f5aaaa', '#faba81', '#efc1dd', '#afb0ab', '#abbab5', '#e4b2b5', '#a5a3a0', '#c7c7c7', '#455a68', '#f18686'];
              let cIdx = 0; 
              
              let html = '<div style="display:flex; flex-direction:column; gap:20px;">';

              fasilitas.forEach((f, idx) => {
                  let logoPath = resolvePath(f.logo_jalur);

                  let linkHref = `Lantai3.php?play=${f.id_jalur}`;
                  
                  let bgColor = fallbackColors[cIdx % fallbackColors.length];
                  let nLower = f.nama_jalur.toLowerCase();
                  
                  if(nLower.includes('toilet')) bgColor = '#d6b2a2'; else if(nLower.includes('atm')) bgColor = '#ff8b8b'; else if(nLower.includes('mosque') || nLower.includes('masjid')) bgColor = '#abbab5'; else if(nLower.includes('quarantine') || nLower.includes('karantina')) bgColor = '#afb0ab'; else if(nLower.includes('arrival') || nLower.includes('kedatangan')) bgColor = '#455a68'; else if(nLower.includes('drop')) bgColor = '#c7c7c7'; else if(nLower.includes('check')) bgColor = '#a5a3a0'; else if(nLower.includes('cs') || nLower.includes('customer service')) bgColor = '#a7c7de'; else if(nLower.includes('lantai 2')) bgColor = '#7f90bb'; else if(nLower.includes('lantai 3')) bgColor = '#a090d5'; else if(nLower.includes('pemda')) bgColor = '#f5aaaa'; else if(nLower.includes('cip') || nLower.includes('lounge')) bgColor = '#faba81'; else if(nLower.includes('internasional') || nLower.includes('international')) bgColor = '#efc1dd'; else if(nLower.includes('display')) bgColor = '#e4b2b5'; else if(nLower.includes('smoking')) bgColor = '#f18686'; else if(nLower.includes('immigration') || nLower.includes('imigrasi')) bgColor = '#3f7daa'; else if(nLower.includes('playground') || nLower.includes('kids')) bgColor = '#c2725b'; else if(nLower.includes('flight') || nLower.includes('gate')) bgColor = '#39857b'; else if(nLower.includes('internet')) bgColor = '#eab193'; else if(nLower.includes('reading') || nLower.includes('baca')) bgColor = '#dd5451'; else if(nLower.includes('garden')) bgColor = '#90d19c'; else cIdx++;

                  let imgWidth = "45px";

                  html += `
                  <a href="${linkHref}" style="text-decoration: none">
                    <button
                      style="
                        display: flex;
                        align-items: center;
                        padding: 10px 5px;
                        border-radius: 50px;
                        font-size: 25.54px;
                        font-weight: bold;
                        color: white;
                        text-transform: uppercase;
                        border: none;
                        cursor: pointer;
                        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
                        justify-content: left;
                        gap: 10px;
                        width: 800px;
                        height: 80px;
                        background-color: ${bgColor};
                      "
                    >
                      ${(logoPath && logoPath !== 'null') ? `<img src="../../wayfinding/${logoPath}" style="width: ${imgWidth}; margin-left: 10px" />` : `<span style="margin-left: 10px; font-size:30px;">📌</span>`}
                      <p style="margin: 0;">${f.nama_jalur}</p>
                    </button>
                  </a>`;
              });

              html += '</div>'; 
              fasContainer.innerHTML = html;
          }

        } catch(e) { console.error('Error fetching data:', e); }
      }
      document.addEventListener('DOMContentLoaded', loadDataJalur);
    </script>
  </body>
</html>