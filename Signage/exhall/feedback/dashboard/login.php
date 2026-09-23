<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit();
}

include_once __DIR__ . "/../sender/koneksi.php";

$error_msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($username) && !empty($password)) {
        $clean_user = mysql_real_escape_string($username);
        $md5_pass = md5($password);

        $query = "SELECT * FROM registered_users WHERE user_name = '$clean_user' LIMIT 1";
        $result = @mysql_query($query);

        $authenticated = false;
        $user_display = "";

        if ($result && mysql_num_rows($result) > 0) {
            $row = mysql_fetch_assoc($result);
            if ($row['password'] === $md5_pass || $row['password'] === $password) {
                $authenticated = true;
                $user_display = !empty($row['display_name']) ? $row['display_name'] : $row['user_name'];
            }
        }

        if ($authenticated) {
            $_SESSION['admin_user'] = $user_display;
            header("Location: index.php");
            exit();
        } else {
            $error_msg = "Username atau password yang Anda masukkan salah!";
        }
    } else {
        $error_msg = "Silakan isi username dan password!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Login Admin — Dashboard Feedback Bandara Ahmad Yani</title>
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

    <!-- Login Viewport -->
    <main class="login-viewport">
        <div class="login-card">
            
            <img src="../../wayfinding/gambar/Home/JenderalAhmadYani.png" alt="Logo Bandara Ahmad Yani" class="header-logo-img" style="height: 48px; max-width: 280px;">

            <h2 class="login-title">Admin Dashboard</h2>

            <?php if (!empty($error_msg)): ?>
                <div class="alert-danger">
                    <?php echo htmlspecialchars($error_msg); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="login.php" class="login-form">
                <div class="form-field">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Masukkan username" required autofocus autocomplete="username">
                </div>

                <div class="form-field">
                    <label class="form-label" for="password">Password</label>
                    <div class="password-input-wrapper">
                        <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password" required autocomplete="current-password">
                        <button type="button" class="btn-toggle-password" id="togglePasswordBtn" title="Tampilkan Password" aria-label="Tampilkan atau sembunyikan password">
                            <!-- Eye Open Icon -->
                            <svg id="eyeIconShow" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                            </svg>
                            <!-- Eye Closed Slash Icon -->
                            <svg id="eyeIconHide" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="display: none;">
                                <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.44-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.17c0-1.66-1.34-3-3-3l-.17.02z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit-login">
                    Masuk ke Dashboard
                </button>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementById('password');
            var toggleBtn = document.getElementById('togglePasswordBtn');
            var eyeShow = document.getElementById('eyeIconShow');
            var eyeHide = document.getElementById('eyeIconHide');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    eyeShow.style.display = isPassword ? 'none' : 'block';
                    eyeHide.style.display = isPassword ? 'block' : 'none';
                    toggleBtn.setAttribute('title', isPassword ? 'Sembunyikan Password' : 'Tampilkan Password');
                });
            }
        });
    </script>
</body>
</html>
