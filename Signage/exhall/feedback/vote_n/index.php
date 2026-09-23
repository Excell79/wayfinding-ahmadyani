<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Feedback Bandara Ahmad Yani — Interactive Kiosk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kiosk Feedback System">
    
    <!-- Modern Pure Vanilla CSS -->
    <link rel="stylesheet" href="css/feedback_modern.css">
    
    <!-- Audio Triggers -->
    <script>
        var buttonAudio = new Audio('button.mp3');
        var audio1 = new Audio('1.mp3');
        var audio2 = new Audio('2.mp3');
        var audio3 = new Audio('3.mp3');
        var audio4 = new Audio('4.mp3');
        var audio5 = new Audio('5.mp3')

        function playSound(val) {
            try {
                if (val === 1) audio1.play();
                else if (val === 2) audio2.play();
                else if (val === 3) audio3.play();
                else if (val === 4) audio4.play();
                else if (val === 5) audio5.play();
            } catch(e) {}
        }
    </script>

    <?php
    $page = "../index.html";
    $sec = "180";
    ?>
    <meta http-equiv="refresh" content="<?php echo $sec; ?>;URL='<?php echo $page; ?>'">
</head>
<body>

    <!-- Header Navigation matching index.html -->
    <header class="header-nav">
        <a href="../index.html" class="btn-back" onclick="try{buttonAudio.play();}catch(e){}">
            <span>←</span> Kembali
        </a>

        <div class="clock-badge">
            <span id="date_time">Loading...</span>
        </div>
    </header>

    <?php
    $length = 10;
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $cookie = $randomString;
    ?>

    <!-- Main POST Form for Backend (proses.php & insert.php) -->
    <form id="feedbackForm" method="post" action="proses.php">
        <input name="cookies" type="hidden" value="<?php echo $cookie; ?>">

        <!-- Hidden input pairs for all 13 units -->
        <input name="Airport_Transport_1" type="hidden" value="1">
        <input type="hidden" id="val_Airport_Transport" name="Airport_Transport" value="3">

        <input name="Parking_Facility_2" type="hidden" value="2">
        <input type="hidden" id="val_Parking_Facility" name="Parking_Facility" value="3">

        <input name="Trolley_Ready_4" type="hidden" value="4">
        <input type="hidden" id="val_Trolley_Ready" name="Trolley_Ready" value="3">

        <input name="Waiting_Time_5" type="hidden" value="5">
        <input type="hidden" id="val_Waiting_Time" name="Waiting_Time" value="3">

        <input name="Staff_Efficiency_6" type="hidden" value="6">
        <input type="hidden" id="val_Staff_Efficiency" name="Staff_Efficiency" value="3">

        <input name="Staff_Attitude_7" type="hidden" value="7">
        <input type="hidden" id="val_Staff_Attitude" name="Staff_Attitude" value="3">

        <input name="Safety_Check_8" type="hidden" value="8">
        <input type="hidden" id="val_Safety_Check" name="Safety_Check" value="3">

        <input name="Safety_Time_9" type="hidden" value="9">
        <input type="hidden" id="val_Safety_Time" name="Safety_Time" value="3">

        <input name="Safety_Feel_10" type="hidden" value="10">
        <input type="hidden" id="val_Safety_Feel" name="Safety_Feel" value="3">

        <input name="Easy_Way_11" type="hidden" value="11">
        <input type="hidden" id="val_Easy_Way" name="Easy_Way" value="3">

        <input name="Flight_Info_12" type="hidden" value="12">
        <input type="hidden" id="val_Flight_Info" name="Flight_Info" value="3">

        <input name="Distance_13" type="hidden" value="13">
        <input type="hidden" id="val_Distance" name="Distance" value="3">

        <input name="Restaurant_Facility_14" type="hidden" value="14">
        <input type="hidden" id="val_Restaurant_Facility" name="Restaurant_Facility" value="3">

        <input name="Kebersihan_Terminal_16" type="hidden" value="16">
        <input type="hidden" id="val_Kebersihan_Terminal" name="Kebersihan_Terminal" value="3">

        <input type="hidden" name="SUBMIT" value="SUBMIT">
    </form>

    <!-- Viewport Container for 3-Step Flow -->
    <main class="viewport-container">

        <!-- STEP 1: Interactive Question & Rating Slider -->
        <div id="viewStep1" class="step-card">
            <div id="unitIcon" class="unit-icon-wrapper">
                <!-- SVG Icon injected by JS -->
            </div>

            <h2 id="unitTitle" class="question-text">
                Transportasi Darat Dari & Ke Bandara
            </h2>

            <!-- Interactive Horizontal Slider -->
            <div class="slider-container" id="sliderContainer">
                <div class="slider-track-line">
                    <div id="sliderFill" class="slider-track-fill" style="width: 50%;"></div>
                </div>

                <div class="emoji-nodes-grid">
                    <!-- 1: Buruk -->
                    <div class="emoji-node-item" data-value="1" onclick="selectRating(1)">
                        <div class="emoji-circle">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M16 16C15 14.5 13.5 14 12 14C10.5 14 9 14.5 8 16" stroke-linecap="round"/><circle cx="9" cy="9" r="1.5" fill="currentColor"/><circle cx="15" cy="9" r="1.5" fill="currentColor"/></svg>
                        </div>
                        <span class="emoji-label">Buruk</span>
                    </div>

                    <!-- 2: Lumayan -->
                    <div class="emoji-node-item" data-value="2" onclick="selectRating(2)">
                        <div class="emoji-circle">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M15.5 15.5C14.5 14.8 13.3 14.5 12 14.5C10.7 14.5 9.5 14.8 8.5 15.5" stroke-linecap="round"/><circle cx="9" cy="9.5" r="1.5" fill="currentColor"/><circle cx="15" cy="9.5" r="1.5" fill="currentColor"/></svg>
                        </div>
                        <span class="emoji-label">Lumayan</span>
                    </div>

                    <!-- 3: Baik -->
                    <div class="emoji-node-item" data-value="3" onclick="selectRating(3)">
                        <div class="emoji-circle">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="8" y1="15" x2="16" y2="15" stroke-linecap="round"/><circle cx="9" cy="9.5" r="1.5" fill="currentColor"/><circle cx="15" cy="9.5" r="1.5" fill="currentColor"/></svg>
                        </div>
                        <span class="emoji-label">Baik</span>
                    </div>

                    <!-- 4: Sangat Baik -->
                    <div class="emoji-node-item" data-value="4" onclick="selectRating(4)">
                        <div class="emoji-circle">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 14C9 15.5 10.5 16.5 12 16.5C13.5 16.5 15 15.5 16 14" stroke-linecap="round"/><circle cx="9" cy="9.5" r="1.5" fill="currentColor"/><circle cx="15" cy="9.5" r="1.5" fill="currentColor"/></svg>
                        </div>
                        <span class="emoji-label">Sangat Baik</span>
                    </div>

                    <!-- 5: Sempurna -->
                    <div class="emoji-node-item" data-value="5" onclick="selectRating(5)">
                        <div class="emoji-circle">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M7.5 13.5C8.5 16 10.2 17 12 17C13.8 17 15.5 16 16.5 13.5" stroke-linecap="round"/><path d="M7.5 9.5C8 8.5 9 8.5 9.5 9.5" stroke-linecap="round"/><path d="M14.5 9.5C15 8.5 16 8.5 16.5 9.5" stroke-linecap="round"/></svg>
                        </div>
                        <span class="emoji-label">Sempurna</span>
                    </div>
                </div>
            </div>

            <!-- Question Progress Indicator -->
            <div id="progressBox" class="progress-indicator" style="margin-top: 24px;">
                Pertanyaan <span id="currentStepNum">1</span> dari 14
            </div>

            <!-- Card Step Navigation Action Buttons -->
            <div class="card-step-actions">
                <button id="btnBackCard" class="btn-nav-action btn-secondary" onclick="handleBack()">
                    <span>←</span> <span id="lblBack">Kembali</span>
                </button>

                <button id="btnNextCard" class="btn-nav-action" onclick="handleNext()">
                    <span id="lblNext">Selanjutnya</span> <span>→</span>
                </button>
            </div>
        </div>

        <!-- STEP 2: Confirmation Card -->
        <div id="viewStep2" class="step-card confirmation-card hidden">
            <div class="unit-icon-wrapper" style="background: rgba(77, 194, 198, 0.12); color: var(--brand-blue);">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>

            <h2 class="confirm-question">
                Apakah Anda Yakin Dengan Pilihan Anda?
            </h2>

            <div class="confirm-btn-group">
                <button class="btn-confirm btn-no" onclick="backToQuestions()">
                    <span>←</span> Belum
                </button>
                <button class="btn-confirm btn-yes" onclick="submitFeedback()">
                    <span>✓</span> Sudah
                </button>
            </div>
        </div>

        <!-- STEP 3: Thank You Card -->
        <div id="viewStep3" class="step-card hidden">
            <div class="thankyou-icon">✓</div>

            <h2 class="thankyou-heading">Terima Kasih!</h2>

            <p class="thankyou-desc">
                Terima Kasih Feedback yang diberikan untuk peningkatan kualitas pelayanan Bandara Ahmad Yani Semarang.
            </p>

            <button class="btn-nav-action" onclick="finishAndRedirect()" style="padding: 16px 40px; font-size: 17px;">
                <span>←</span> Kembali ke Utama
            </button>
        </div>

    </main>

    <!-- Pure JS Interactive Logic -->
    <script>
        // 14 Active Units Data
        var questionsData = [
            {
                fieldName: "Airport_Transport",
                title: "Transportasi Darat Dari & Ke Bandara",
                svg: '<svg viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z"/><circle cx="7.5" cy="15" r="1.5"/><circle cx="16.5" cy="15" r="1.5"/></svg>'
            },
            {
                fieldName: "Parking_Facility",
                title: "Fasilitas Parkir",
                svg: '<svg viewBox="0 0 24 24"><path d="M13.2 11H10V7h3.2c1.1 0 2 .9 2 2s-.9 2-2 2zM19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5.8 10H10v4H8V5h5.2c2.2 0 4 1.8 4 4s-1.8 4-4 4z"/></svg>'
            },
            {
                fieldName: "Trolley_Ready",
                title: "Ketersediaan Trolley Barang Bawaan",
                svg: '<svg viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>'
            },
            {
                fieldName: "Waiting_Time",
                title: "Waktu Tunggu Di Antrian Check-In",
                svg: '<svg viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>'
            },
            {
                fieldName: "Staff_Efficiency",
                title: "Keefisienan Petugas Check-In",
                svg: '<svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>'
            },
            {
                fieldName: "Staff_Attitude",
                title: "Kesopanan Dan Kecekatan Petugas Bandara",
                svg: '<svg viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>'
            },
            {
                fieldName: "Safety_Check",
                title: "Ketelitian Pemeriksaan Keamanan",
                svg: '<svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>'
            },
            {
                fieldName: "Safety_Time",
                title: "Waktu Tunggu Pemeriksaan Keamanan",
                svg: '<svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm1 14h-2v-6h2v6zm0-8h-2V5h2v2z"/></svg>'
            },
            {
                fieldName: "Safety_Feel",
                title: "Perasaan Aman Dan Nyaman Di Bandara",
                svg: '<svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 10.7c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>'
            },
            {
                fieldName: "Easy_Way",
                title: "Kemudahan Menemukan Tujuan Anda Di Bandara",
                svg: '<svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>'
            },
            {
                fieldName: "Flight_Info",
                title: "Layar Informasi Penerbangan",
                svg: '<svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>'
            },
            {
                fieldName: "Distance",
                title: "Jarak Jalan Kaki Di Dalam Terminal",
                svg: '<svg viewBox="0 0 24 24"><path d="M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2v-7.5l-2.1-2 .6-3C14.8 12 16.8 13 19 13v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1L6 8.3V13h2V9.6l1.8-.7z"/></svg>'
            },
            {
                fieldName: "Restaurant_Facility",
                title: "Fasilitas Restoran Makan",
                svg: '<svg viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.55 3.89 3.57 4.23V22h2.86v-8.77C11.45 12.89 13 11.12 13 9V2h-2v7zm5-3v6h3v10h2V2c-2.76 0-5 2.24-5 4z"/></svg>'
            },
            {
                fieldName: "Kebersihan_Terminal",
                title: "Kebersihan Terminal",
                svg: '<svg viewBox="0 0 24 24"><path d="M19.36 2.72l-1.42-1.42-3.88 3.88 1.42 1.42 3.88-3.88zM6.5 10c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm13.14 8.14l-8.5-8.5c-.39-.39-1.02-.39-1.41 0l-1.42 1.42c-.39.39-.39 1.02 0 1.41l8.5 8.5c.39.39 1.02.39 1.41 0l1.42-1.42c.39-.39.39-1.02 0-1.41zM3 21h4v-2H3v2z"/></svg>'
            }
        ];

        var currentIndex = 0;
        var userRatings = {}; // Stores rating 1..5 for each question

        // Track fill percentages & colors
        var fillPercentages = { 1: 0, 2: 25, 3: 50, 4: 75, 5: 100 };
        var fillColors = {
            1: "#ec6a56",
            2: "#faaf40",
            3: "#4dc2c6",
            4: "#9ebc2e",
            5: "#10b981"
        };

        var isDragging = false;

        function getRatingFromX(clientX) {
            var container = document.getElementById("sliderContainer");
            if (!container) return 3;
            var rect = container.getBoundingClientRect();
            var x = clientX - rect.left;
            var ratio = x / rect.width;
            var val = Math.round(ratio * 4) + 1;
            return Math.min(5, Math.max(1, val));
        }

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

        var autoAdvanceTimer = null;

        function setStep(stepNum) {
            if (autoAdvanceTimer) {
                clearTimeout(autoAdvanceTimer);
                autoAdvanceTimer = null;
            }

            var s1 = document.getElementById("viewStep1");
            var s2 = document.getElementById("viewStep2");
            var s3 = document.getElementById("viewStep3");

            if (s1) s1.classList.add("hidden");
            if (s2) s2.classList.add("hidden");
            if (s3) s3.classList.add("hidden");

            var activeStep = (stepNum === 1) ? s1 : (stepNum === 2) ? s2 : s3;
            if (activeStep) {
                activeStep.classList.remove("hidden");
                activeStep.classList.remove("fade-in");
                void activeStep.offsetWidth; // force DOM reflow
                activeStep.classList.add("fade-in");
            }
        }

        // Initialize view
        window.onload = function() {
            updateClock();
            
            // Set default rating 3 for all questions
            for (var i = 0; i < questionsData.length; i++) {
                userRatings[i] = 3;
            }

            // Check URL parameters for direct step testing (?step=2 or ?step=3)
            var urlParams = new URLSearchParams(window.location.search);
            var stepParam = parseInt(urlParams.get('step'));

            if (stepParam === 2) {
                showConfirmation();
            } else if (stepParam === 3) {
                setStep(3);
            } else {
                renderQuestion(0);
            }

            var sliderContainer = document.getElementById("sliderContainer");
            if (sliderContainer) {
                sliderContainer.addEventListener("pointerdown", function(e) {
                    isDragging = true;
                    try { sliderContainer.setPointerCapture(e.pointerId); } catch(err){}
                    var val = getRatingFromX(e.clientX);
                    if (userRatings[currentIndex] !== val) selectRating(val, true, true);
                });

                sliderContainer.addEventListener("pointermove", function(e) {
                    if (!isDragging) return;
                    var val = getRatingFromX(e.clientX);
                    if (userRatings[currentIndex] !== val) selectRating(val, true, true);
                });

                sliderContainer.addEventListener("pointerup", function(e) {
                    isDragging = false;
                });

                sliderContainer.addEventListener("pointercancel", function(e) {
                    isDragging = false;
                });
            }
        };

        function renderQuestion(index) {
            if (index < 0) index = 0;
            if (index >= questionsData.length) {
                showConfirmation();
                return;
            }

            currentIndex = index;
            var q = questionsData[index];

            // Update UI Title & Icon
            document.getElementById("unitIcon").innerHTML = q.svg;
            document.getElementById("unitTitle").innerText = q.title;
            document.getElementById("currentStepNum").innerText = index + 1;

            // Highlight selected rating node
            var currentVal = userRatings[index] || 3;
            selectRating(currentVal, false, true);

            // Update Header Buttons Text
            document.getElementById("lblBack").innerText = (index === 0) ? "Kembali" : "Sebelumnya";
            document.getElementById("lblNext").innerText = (index === questionsData.length - 1) ? "Konfirmasi" : "Selanjutnya";

            // Show Step 1 Card
            setStep(1);
        }

        function selectRating(val, playAudio, skipAutoAdvance) {
            if (playAudio !== false) playSound(val);
            userRatings[currentIndex] = val;

            // Update hidden input for backend form submit
            var fieldName = questionsData[currentIndex].fieldName;
            var hiddenInput = document.getElementById("val_" + fieldName);
            if (hiddenInput) hiddenInput.value = val;

            // Update Slider Track Fill width & color
            var fill = document.getElementById("sliderFill");
            if (fill) {
                fill.style.width = fillPercentages[val] + "%";
                fill.style.backgroundColor = fillColors[val];
            }

            // Update active styling on emoji nodes
            var nodes = document.querySelectorAll(".emoji-node-item");
            nodes.forEach(function(node) {
                var nodeVal = parseInt(node.getAttribute("data-value"));
                if (nodeVal === val) {
                    node.classList.add("active");
                } else {
                    node.classList.remove("active");
                }
            });

            // Auto-advance to next question or Step 2 after 500ms when user taps an emoji
            if (!skipAutoAdvance) {
                if (autoAdvanceTimer) clearTimeout(autoAdvanceTimer);
                autoAdvanceTimer = setTimeout(function() {
                    handleNext();
                }, 500);
            }
        }

        function handleNext() {
            if (autoAdvanceTimer) {
                clearTimeout(autoAdvanceTimer);
                autoAdvanceTimer = null;
            }
            try { buttonAudio.play(); } catch(e){}
            if (currentIndex < questionsData.length - 1) {
                renderQuestion(currentIndex + 1);
            } else {
                showConfirmation();
            }
        }

        function handleBack() {
            if (autoAdvanceTimer) {
                clearTimeout(autoAdvanceTimer);
                autoAdvanceTimer = null;
            }
            try { buttonAudio.play(); } catch(e){}
            if (currentIndex > 0) {
                renderQuestion(currentIndex - 1);
            } else {
                window.location.href = "../index.html";
            }
        }

        function showConfirmation() {
            setStep(2);
        }

        function backToQuestions() {
            try { buttonAudio.play(); } catch(e){}
            renderQuestion(questionsData.length - 1);
        }

        function submitFeedback() {
            try { buttonAudio.play(); } catch(e){}
            setStep(3);

            // Perform background submit to backend (proses.php & insert.php)
            var form = document.getElementById("feedbackForm");
            var formData = new FormData(form);
            formData.append("SUBMIT", "SUBMIT");

            fetch("proses.php", {
                method: "POST",
                body: formData
            }).catch(function(err){ console.log(err); });
        }

        function finishAndRedirect() {
            try { buttonAudio.play(); } catch(e){}
            window.location.href = "../index.html";
        }
    </script>

</body>
</html>
