<?php
include "koneksi.php";

$id_lantai = 1; 

// Logika Pintar: Defaultnya kita anggap tidak ada video yang diputar
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
    <title>LANTAI 1</title>
    <style>
      .grid {
        display: flex;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
        margin-top: 45px;
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
        max-width: 65px;
        max-height: 50px;
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
        height: 1920px;
        padding: 0px;
        margin-top: -8px;
        margin-left: auto;
        margin-right: auto;
      "
    >
      <a href="../">
        <img
          src="gambar/Lantai1/back.png"
          style="width: 100px; position: relative; z-index: 10;"
        />
      </a>

      <?php if ($is_playing): ?>
        <video autoplay loop muted playsinline style="width: 100%; margin-top: -110px; display: block;">
          <source src="../../wayfinding/<?= htmlspecialchars($video_aktif) ?>" type="video/mp4" />
        </video>
      <?php else: ?>
        <img 
          src="gambar/Lantai1/home map.png" 
          style="width: 100%; margin-top: -110px; display: block;" 
          alt="Map Lantai 1" 
        />
      <?php endif; ?>

      <div
        style="
          display: flex;
          position: relative;
          justify-content: center;
          margin-top: -110px;
        "
      >
        <a href="Lantai1.php" style="text-decoration: none">
          <button
            style="
              display: flex;
              align-items: center;
              padding: 10px 5px;
              border-radius: 12px;
              font-size: 22px;
              font-weight: bold;
              text-transform: uppercase;
              cursor: pointer;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
              justify-content: center;
              gap: 10px;
              width: 245px;
              height: 60px;
              background-color: #4b828c;
              color: white;
              border: 2px solid #e8e8e8;
            "
          >
            <p style="margin: 0;">LANTAI 1</p>
          </button>
        </a>

        <a href="Lantai2.php" style="text-decoration: none">
          <button
            style="
              display: flex;
              align-items: center;
              padding: 10px 5px;
              border-radius: 12px;
              font-size: 22px;
              font-weight: bold;
              text-transform: uppercase;
              cursor: pointer;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
              justify-content: center;
              gap: 10px;
              width: 245px;
              height: 60px;
              margin-left: 15px;
              background-color: #e8e8e8;
              color: #4b828c;
              border: 3px solid #4b828c;
            "
          >
            <p style="margin: 0;">LANTAI 2</p>
          </button>
        </a>
        
        <a href="Lantai3.php" style="text-decoration: none">
          <button
            style="
              display: flex;
              align-items: center;
              padding: 10px 5px;
              border-radius: 12px;
              font-size: 19px; 
              font-weight: bold;
              text-transform: uppercase;
              cursor: pointer;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
              justify-content: center;
              gap: 10px;
              width: 245px;
              height: 60px;
              margin-left: 15px;
              background-color: #e8e8e8;
              color: #4b828c;
              border: 3px solid #4b828c;
            "
          >
            <p style="margin: 0;">INTERNASIONAL</p>
          </button>
        </a>
        
        <a href="Kedatangan.php" style="text-decoration: none">
          <button
            style="
              display: flex;
              align-items: center;
              padding: 10px 5px;
              border-radius: 12px;
              font-size: 22px;
              font-weight: bold;
              text-transform: uppercase;
              cursor: pointer;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
              justify-content: center;
              gap: 10px;
              width: 245px;
              height: 60px;
              margin-left: 15px;
              background-color: #e8e8e8;
              color: #4b828c;
              border: 3px solid #4b828c;
            "
          >
            <p style="margin: 0;">KEDATANGAN</p>
          </button>
        </a>
      </div>

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
              width: 598px;
              height: 260px;
              grid-template-columns: repeat(5, 1fr);
              background-color: white;
              border-radius: 30px;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
            "
          >
            <div class="grid" id="dynamic-tenant">
              <p style="font-family:sans-serif; color:#999; margin-left:20px;">Memuat data...</p>
            </div>

            <div
              style="
                background-color: #a4b1ba;
                width: 598px;
                height: 60px;
                display: flex;
                align-items: center;
                border-radius: 15px;
                font-size: 25.54px;
                font-weight: bold;
                color: white;
                text-transform: uppercase;
                border: none;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                position: absolute;
                border-radius: 50px;
              "
            >
              <img
                src="gambar/Lantai1/logoicon/tenant.png"
                style="width: 39.59px; margin-left: 10px"
              />
              <p style="margin-left: 10px">TENANT</p>
            </div>
          </div>
        </div>
        <div>
          <a href="#" style="text-decoration: none; color: black">
            <div
              style="
                display: grid;
                width: 360px;
                height: 260px;
                grid-template-columns: repeat(5, 1fr);
                background-color: white;
                border-radius: 30px;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
              "
            >
              <div class="grid" id="dynamic-pickup">
                <p style="font-family:sans-serif; color:#999; margin-left:20px;">Memuat data...</p>
              </div>

              <div
                style="
                  display: flex;
                  background-color: #919191;
                  width: 360px;
                  height: 60px;
                  align-items: center;
                  border-radius: 15px;
                  font-size: 25.54px;
                  font-weight: bold;
                  color: white;
                  text-transform: uppercase;
                  border: none;
                  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
                  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                  position: absolute;
                  border-radius: 50px;
                "
              >
                <img
                  src="gambar/Lantai1/logoicon/pickup.png"
                  style="width: 39.59px; margin-left: 10px"
                />
                <p style="margin-left: 10px">PICKUP ZONE</p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div
        id="dynamic-fasilitas"
        style="
          display: flex;
          justify-content: center;
          margin-top: 45px;
          margin-bottom: 45px;
          gap: 57px;
        "
      >
      </div>

    </div>

    <script>
      async function loadDataJalur() {
        try {
          const noCache = new Date().getTime();
          const res = await fetch(`api/get_jalur.php?lantai=1&t=${noCache}`);
          const data = await res.json();
          
          const tenants = data.filter(d => d.type.toLowerCase().trim() === 'tenant');
          const pickups = data.filter(d => d.type.toLowerCase().trim() === 'pickupzone' || d.type.toLowerCase().trim() === 'pickup zone');
          const fasilitas = data.filter(d => d.type.toLowerCase().trim() === 'fasilitas');

          function resolvePath(rawPath) {
            if (!rawPath || rawPath === 'null' || rawPath.trim() === '') return '';
            let p = rawPath.trim();
            while (p.startsWith('../')) p = p.substring(3);
            if (p.startsWith('gambar/') || p.startsWith('upload/') || p.startsWith('video/')) return p;
            if (p.startsWith('Lantai') || p.startsWith('pickupzone')) return 'gambar/' + p;
            return 'upload/' + p;
          }

          const tenantContainer = document.getElementById('dynamic-tenant');
          if (tenantContainer) {
              let tenantHTML = '';
              const cols = 5; 
              const itemsPerCol = 4; 
              
              for(let i=0; i<cols; i++){
                tenantHTML += '<div>';
                for(let j=0; j<itemsPerCol; j++){
                  const idx = i * itemsPerCol + j;
                  if(idx < tenants.length) {
                    const t = tenants[idx];
                    let isIdle = t.nama_jalur.toLowerCase().trim() === 'idle';
                    let linkHref = `Lantai1.php?play=${t.id_jalur}`;
                    
                    if (isIdle) {
                        tenantHTML += `
                          <a href="${linkHref}" class="ahref">
                            <div class="tenant" style="color: #777;">
                              ${t.nomor_jalur}. idle
                            </div>
                          </a>`;
                    } else {
                        let logoPath = resolvePath(t.logo_jalur);
                        tenantHTML += `
                          <a href="${linkHref}" class="ahref">
                            <div class="tenant">
                              ${t.nomor_jalur}.
                              ${logoPath ? `<img src="../../wayfinding/${logoPath}" alt="${t.nama_jalur}" />` : `<span style="margin-left: 10px; font-size: 14px;">${t.nama_jalur}</span>`}
                            </div>
                          </a>`;
                    }
                  }
                }
                tenantHTML += '</div>';
              }
              tenantContainer.innerHTML = tenantHTML;
          }

          const pickupContainer = document.getElementById('dynamic-pickup');
          if (pickupContainer) {
              let pickupHTML = '';
              const pCols = 2; 
              const pItemsPerCol = 3; 
              
              for(let i=0; i<pCols; i++){
                pickupHTML += '<div>';
                for(let j=0; j<pItemsPerCol; j++){
                  const idx = i * pItemsPerCol + j;
                  if(idx < pickups.length) {
                    const p = pickups[idx];
                    let isIdle = p.nama_jalur.toLowerCase().trim() === 'idle';
                    let linkHref = `Lantai1.php?play=${p.id_jalur}`;

                    let customClassStyle = "";
                    let customImgStyle = "";
                    let isSpecialDiv = false;

                    if (i === 1) { 
                        if (j === 0) { 
                            customClassStyle = "margin-left: -45px";
                            customImgStyle = "max-width: 180px; max-height: 50px; margin-top: 5px; width: 150px;";
                        } else { 
                            customClassStyle = "margin-top: 20px; margin-left: -45px";
                            customImgStyle = "max-width: 90px; max-height: 50px; margin-left: 10px; margin-top: 5px;";
                        }
                    } else { 
                        if (j === 2) { 
                            isSpecialDiv = true;
                            customClassStyle = "display: flex; align-items: center; font-size: 18px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: bold; margin-top: 10px;";
                            customImgStyle = "max-width: 120px; max-height: 50px; margin-left: 10px; margin-top: 5px;";
                        }
                    }

                    if (isIdle) {
                        pickupHTML += `
                          <a href="${linkHref}" class="ahref">
                            <div ${isSpecialDiv ? `style="${customClassStyle}"` : `class="tenant" style="${customClassStyle}"`}>
                              ${p.nomor_jalur}. idle
                            </div>
                          </a>`;
                    } else {
                        let logoPath = resolvePath(p.logo_jalur);
                        let imgTag = logoPath ? `<img src="../../wayfinding/${logoPath}" ${customImgStyle ? `style="${customImgStyle}"` : ''} />` : `<span style="margin-left: 10px; font-size: 14px;">${p.nama_jalur}</span>`;
                        
                        pickupHTML += `
                          <a href="${linkHref}" class="ahref">
                            <div ${isSpecialDiv ? `style="${customClassStyle}"` : `class="tenant" style="${customClassStyle}"`}>
                              ${p.nomor_jalur}.
                              ${imgTag}
                            </div>
                          </a>`;
                    }
                  }
                }
                pickupHTML += '</div>';
              }
              pickupContainer.innerHTML = pickupHTML;
          }

          const fasContainer = document.getElementById('dynamic-fasilitas');
          if (fasContainer && fasilitas.length > 0) {
              const fallbackColors = ['#a7c7de', '#d6b2a2', '#ff8b8b', '#7f90bb', '#a090d5', '#f5aaaa', '#faba81', '#efc1dd', '#afb0ab', '#abbab5', '#e4b2b5', '#a5a3a0', '#c7c7c7', '#455a68', '#f18686'];
              let cIdx = 0; 
              const half = Math.ceil(fasilitas.length / 2);
              
              let leftColHTML = '<div style="min-width: 450px;"><div>';
              let rightColHTML = '<div style="min-width: 475px;"><div style="margin-left: 25px">';

              fasilitas.forEach((f, idx) => {
                  let logoPath = resolvePath(f.logo_jalur);
                  let linkHref = `Lantai1.php?play=${f.id_jalur}`;
                  
                  let bgColor = fallbackColors[cIdx % fallbackColors.length];
                  let nLower = f.nama_jalur.toLowerCase();
                  if(nLower.includes('toilet')) bgColor = '#d6b2a2'; else if(nLower.includes('atm')) bgColor = '#ff8b8b'; else if(nLower.includes('mosque') || nLower.includes('masjid')) bgColor = '#abbab5'; else if(nLower.includes('quarantine') || nLower.includes('karantina')) bgColor = '#afb0ab'; else if(nLower.includes('arrival') || nLower.includes('kedatangan')) bgColor = '#455a68'; else if(nLower.includes('drop')) bgColor = '#c7c7c7'; else if(nLower.includes('check')) bgColor = '#a5a3a0'; else if(nLower.includes('cs') || nLower.includes('customer service')) bgColor = '#a7c7de'; else if(nLower.includes('lantai 2')) bgColor = '#7f90bb'; else if(nLower.includes('lantai 3')) bgColor = '#a090d5'; else if(nLower.includes('pemda')) bgColor = '#f5aaaa'; else if(nLower.includes('cip') || nLower.includes('lounge')) bgColor = '#faba81'; else if(nLower.includes('internasional') || nLower.includes('international')) bgColor = '#efc1dd'; else if(nLower.includes('display')) bgColor = '#e4b2b5'; else if(nLower.includes('smoking')) bgColor = '#f18686'; else cIdx++;

                  let btnMarginStyle = (idx !== 0 && idx !== half) ? 'margin-top: 15px;' : '';
                  
                  let imgWidth = "50px"; 
                  if (nLower.includes('cs') || nLower.includes('toilet') || nLower.includes('atm') || nLower.includes('lantai') || nLower.includes('pemda') || nLower.includes('cip') || nLower.includes('internasional') || nLower.includes('arrival') || nLower.includes('smoking')) {
                      imgWidth = "39.59px";
                  }

                  let btnHTML = `
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
                        width: 450px;
                        height: 55px;
                        background-color: ${bgColor};
                        ${btnMarginStyle}
                      "
                    >
                      ${logoPath ? `<img src="../../wayfinding/${logoPath}" style="width: ${imgWidth}; margin-left: 10px" />` : `<span style="margin-left: 10px; font-size:25px;">📌</span>`}
                      <p style="margin: 0;">${f.nama_jalur}</p>
                    </button>
                  </a>`;
                  
                  if (idx < half) leftColHTML += btnHTML; else rightColHTML += btnHTML;
              });

              leftColHTML += '</div></div>'; 
              rightColHTML += '</div></div>';
              fasContainer.innerHTML = leftColHTML + rightColHTML;
          }

        } catch(e) { console.error('Error fetching data:', e); }
      }
      document.addEventListener('DOMContentLoaded', loadDataJalur);
    </script>
  </body>
</html>