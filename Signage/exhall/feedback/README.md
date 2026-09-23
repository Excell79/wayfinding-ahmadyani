# 📄 Dokumentasi Sistem Feedback & Admin Dashboard
**Bandara Internasional Jenderal Ahmad Yani Semarang**

Sistem Feedback Kiosk & Dashboard Admin ini dirancang untuk mengumpulkan, mengelola, serta melaporkan masukan dari penumpang dan pengunjung bandara secara *real-time*. Sistem ini memiliki 2 bagian utama:
1. **Frontend Kiosk System**: Antarmuka layar sentuh (*touchscreen kiosk*) bagi pengguna bandara untuk memberikan Rating Layanan serta Formulir Saran & Apresiasi.
2. **Backend Admin Dashboard**: Panel manajemen berbasis web bagi tim Admin IT / Operasional untuk memantau metrik rating, meninjau saran, menyaring data berdasarkan bulan & tahun, serta mengekspor laporan dalam bentuk PDF dan Excel.

---

## 🛠️ Teknologi & Stack

- **Server-side Logic**: PHP (Dukungan penuh untuk PHP 5.6, PHP 7, dan PHP 8 melalui database shim `parserversion/mysql.php`).
- **Database Engine**: MariaDB / MySQL (`feedback.sql`).
- **Styling & UI Design**: Pure Vanilla CSS (Tanpa dependensi framework CSS eksternal), mengikuti *Design System* modern:
  - Font Global: **Plus Jakarta Sans** (Google Fonts).
  - Skema Warna Brand 4-Aksen Solid: `#ec6a56` (Merah), `#faaf40` (Kuning), `#4dc2c6` (Biru), `#9ebc2e` (Hijau).
  - Warna Utama Button / Header Badge: Solid Navy (`#0f172a`).
  - Efek Visual: Black vector logo filter (`filter: brightness(0);`) & repeating seamless background pattern (`patern.png`).
- **Client-side Scripting**: JavaScript Native (AJAX, Virtual ML-Keyboard, Live Real-time Clock, Local Instant Table Search, Reveal Password Toggle).

---

## 📁 Struktur Direktori & Fungsi File

```text
feedback/
├── index.html                    # Halaman Utama Kiosk (Menu Pilihan Feedback / Saran)
├── end.php                       # Halaman Ucapan Terima Kasih (Auto-redirect 10 detik)
├── README.md                     # File Dokumentasi Teknis Sistem
├── dokumentasi_slide.html        # Presentasi Slide PDF Dokumentasi Kode & Sistem
├── feedback.sql                  # Dump Skema & Data Database MariaDB/MySQL
├── FLOWCHARTFEEDBACK.jpg         # Diagram Alur Sistem Feedback
│
├── vote_n/                       # Modul Rating Layanan 5 Skala
│   ├── index.php                 # Pilihan 5 Skala Rating (Buruk s/d Sempurna)
│   ├── insert.php                # Handler Simpan Rating ke tabel `rate_n`
│   ├── koneksi.php               # Modul Koneksi DB dengan Multi-Password Fallback
│   └── css/
│       └── feedback_modern.css   # Stylesheet Utama Kiosk & Form
│
├── sender/                       # Modul Formulir Saran & Apresiasi
│   ├── index.php                 # Form Input Data Diri, Kontak, Tipe & Isi Saran
│   ├── insert2.php               # Handler Simpan Saran ke tabel `person`
│   ├── koneksi.php               # Modul Koneksi DB Fallback
│   └── jquery.ml-keyboard.js     # Virtual On-Screen Keyboard untuk Layar Sentuh
│
├── dashboard/                    # Modul Admin Dashboard
│   ├── login.php                 # Halaman Login Admin dengan Reveal Password Toggle
│   ├── auth_check.php            # Session Guard (Mencegah Akses Tanpa Login)
│   ├── index.php                 # Dashboard Utama (Metric Cards, Tab Table, Filter, Live Search)
│   ├── export_pdf.php            # Laporan PDF Siap Cetak (Layout A4 Landscape)
│   ├── export_excel.php          # Laporan Spreadsheet Excel (UTF-8 BOM CSV)
│   ├── logout.php                # Handler Logout & Destruction Sesi
│   └── css/
│       └── dashboard_modern.css  # Stylesheet Khusus Dashboard Admin
│
└── parserversion/
    └── mysql.php                 # MySQL Extension Shim untuk Kompatibilitas PHP 8
```

---

## 🗄️ Skema Database (`feedback.sql`)

Database yang digunakan bernama `feedback` yang terdiri dari 4 tabel utama:

### 1. Tabel `rate_n` (Data Rating Feedback)
Menyimpan setiap transaksi penilaian rating bintang dari kiosk.
- `cookie` (`VARCHAR 200`): Kode unik transaksi/sesi.
- `Id_unit` (`INT 3`): ID Unit layanan bandara yang dinilai.
- `Id_vote` (`INT 3`): Nilai rating (`1` = Buruk, `2` = Lumayan, `3` = Baik, `4` = Sangat Baik, `5` = Sempurna).
- `date_time` (`DATETIME`): Tanggal dan waktu pengisian.

### 2. Tabel `person` (Data Saran & Apresiasi)
Menyimpan tanggapan pesan, kontak, dan masukan pengunjung.
- `cookie` (`VARCHAR 200`): Kode unik transaksi/sesi.
- `Name` (`VARCHAR 200`): Nama pengirim saran.
- `Gender` (`INT 1`): Jenis kelamin (`1` = Pria, `2` = Wanita).
- `Contact` (`VARCHAR 15`): Nomor HP / WhatsApp.
- `Subject` (`VARCHAR 200`): Tipe feedback (`1` = Saran, `2` = Apresiasi, `3` = Lainnya).
- `Email` (`VARCHAR 200`): Alamat email.
- `Coment` (`TEXT`): Isi pesan saran, apresiasi, atau masukan.
- `date_fb` (`DATETIME`): Tanggal dan waktu pengisian.
- `flag` (`INT 1`): Penanda status rekaman data.

### 3. Tabel `unit_n` (Master Unit Layanan)
- `Id_unit` (`INT 3`, PK): ID unik unit.
- `nama_unit` (`VARCHAR 200`): Nama unit layanan (misal: *Customer Service*, *Toilet Terminal*, *Boarding Gate*).

### 4. Tabel `registered_users` (Kredensial Admin)
- `id` (`INT 11`, PK, AI): ID User.
- `user_name` (`VARCHAR 50`): Username login.
- `password` (`VARCHAR 255`): Password (tersimpan versi MD5 atau plain-text fallback).

---

## 💡 Penjelasan Mendalam Logika Kode & Insert Database

### 1. Logika Pengiriman & Penyimpanan Rating Feedback (`vote_n/insert.php`)

#### A. Alur Kerja (Workflow):
1. Pengunjung memilih nilai rating pada unit layanan yang ada di kiosk (`vote_n/index.php`).
2. Kiosk mengirimkan data melalui metode `POST` ke script `vote_n/insert.php`.
3. Script menerima string unik `cookies` yang dihasilkan secara acak untuk mengelompokkan transaksi.
4. Script mengecek unit mana saja yang diisi menggunakan pengecekan kondisi `isset($_POST[...])`.
5. Nilai pilihan `1` sampai `5` dikonversi ke variabel `$status`.
6. Query SQL `INSERT INTO rate_n` dieksekusi untuk memasukkan data ke tabel.

#### B. Kode & Penjelasan Baris demi Baris:
```php
<?php
include "koneksi.php"; // 1. Memanggil file koneksi database

$cookie = $_POST['cookies']; // 2. Menangkap identifier transaksi unik

// 3. Pengecekan unit layanan (Contoh: Transportasi Bandara)
if (isset($_POST['Airport_Transport_1']) && isset($_POST['Airport_Transport'])) {
    $zx = $_POST['Airport_Transport_1']; // Captures Id_unit (misal ID #1)
    $ky = $_POST['Airport_Transport'];   // Captures nilai vote (1 - 5)

    // 4. Konversi nilai rating ke variabel $status
    if ($ky == '1') {
        $status = '1';
    } elseif ($ky == '2') {
        $status = '2';
    } elseif ($ky == '3') {
        $status = '3';
    } elseif ($ky == '4') {
        $status = '4';
    } elseif ($ky == '5') {
        $status = '5';
    }

    // 5. Menyusun Query SQL Insert
    $query_insert = "INSERT INTO rate_n (cookie, Id_vote, Id_unit, date_time) 
                     VALUES ('$cookie', '$status', '$zx', NOW())";

    // 6. Eksekusi query ke database MariaDB/MySQL
    $insert = mysql_query($query_insert);
}
?>
```

#### C. Catatan Teknis Insert Rating:
- **`NOW()` Function**: Menggunakan fungsi bawaan MySQL `NOW()` untuk mencatat tanggal dan jam presisi saat data dimasukkan oleh server.
- **Support Multi-Unit**: Script mengevaluasi seluruh blok unit layanan sehingga pengunjung dapat memberikan penilaian pada beberapa unit sekaligus dalam satu kali klik.

---

### 2. Logika Pengiriman & Penyimpanan Saran & Apresiasi (`sender/insert2.php`)

#### A. Alur Kerja (Workflow):
1. Pengunjung mengisi formulir data diri (Nama, Jenis Kelamin, No. HP, Email, Tipe Feedback, Isi Masukan) pada `sender/index.php`.
2. Form dikirimkan menggunakan metode `POST` ke `sender/insert2.php`.
3. Handler memastikan permintaan valid (`isset($_POST['submit']) || $_SERVER['REQUEST_METHOD'] === 'POST'`).
4. Data masukan ditangkap ke dalam variabel PHP (`$Name`, `$Gender`, `$Contact`, `$Subject`, `$Email`, `$Coment`, `$cookie`).
5. Query `INSERT INTO person` dieksekusi dengan menetapkan `flag = 1`.
6. Pengunjung otomatis di-redirect ke halaman `end.php?nama=[Nama]` dengan menyertakan nama pengirim pada URL query string.

#### B. Kode & Penjelasan Baris demi Baris:
```php
<?php
include("koneksi.php"); // 1. Memasang koneksi database

// 2. Memastikan permintaan dikirim melalui metode POST / Tombol Submit
if (isset($_POST['submit']) || $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 3. Menangkap seluruh field form masukan pengunjung
    $Name    = $_POST['name'];     // Nama Lengkap
    $Gender  = $_POST['gender'];   // 1 = Pria, 2 = Wanita
    $Contact = $_POST['contact'];  // No. Telp / WA
    $Subject = $_POST['subject'];  // Tipe: 1 = Saran, 2 = Apresiasi, 3 = Lainnya
    $Email   = $_POST['email'];    // Alamat Email
    $Coment  = $_POST['coment'];   // Isi Pesan / Masukan
    $cookie  = $_POST['cookies'];  // Kode unik sesi

    // 4. Menyusun Query SQL Insert ke tabel `person`
    $query_insert = "INSERT INTO person (cookie, Name, Gender, Contact, Subject, Email, Coment, date_fb, flag)
                     VALUES ('$cookie', '$Name', '$Gender', '$Contact', '$Subject', '$Email', '$Coment', NOW(), '1')";

    // 5. Eksekusi query penyimpan data
    $insert = mysql_query($query_insert);

    // 6. Redirect ke halaman ucapan terima kasih dengan parameter nama
    header("location:../end.php?nama=" . urlencode($Name));
}
?>
```

#### C. Catatan Teknis Insert Saran:
- **Parameter `urlencode($Name)`**: Memastikan nama pengunjung yang mengandung spasi atau karakter khusus terenkode dengan aman pada URL redirect (contoh: `end.php?nama=Budi%20Santoso`).
- **Respon Halaman `end.php`**: Mengambil `$_GET['nama']` untuk menampilkan pesan personalisasi *"Terima Kasih, Budi Santoso!"*.

---

### 3. Modul Multi-Password Auto-Fallback Connection (`koneksi.php`)

Untuk menjamin aplikasi berjalan tanpa error database di berbagai lingkungan server (XAMPP Windows default tanpa password, Linux Apache dengan password `'1212'`, atau server MariaDB produksi dengan password `'root'`), modul `koneksi.php` menerapkan percobaan koneksi bertingkat secara otomatis:

```php
<?php
$host = "localhost";
$user = "root";
$db   = "feedback";

// Daftar password yang dicoba secara berurutan
$passwords_to_try = array("", "1212", "root");
$con = false;

foreach ($passwords_to_try as $pass) {
    // Mencoba koneksi dengan menekan tampilan error awal (@)
    $con = @mysql_connect($host, $user, $pass);
    if ($con) {
        $selected_db = @mysql_select_db($db, $con);
        if ($selected_db) {
            break; // Koneksi & DB berhasil ditemukan, keluar dari loop
        }
    }
}

if (!$con) {
    die("Koneksi Database Gagal: " . mysql_error());
}
?>
```

---

### 4. Shim Kompatibilitas PHP 8 (`parserversion/mysql.php`)

Pada versi PHP 8+, ekstensi `mysql_*` lama telah dihapus sepenuhnya dari PHP core. File `parserversion/mysql.php` berfungsi sebagai *shim layer* yang menerjemahkan kembali perintah `mysql_*` menjadi perintah `mysqli_*`:

```php
<?php
// Mencegah uncaught mysqli_sql_exception saat koneksi fallback probing
@mysqli_report(MYSQLI_REPORT_OFF);

if (!function_exists('mysql_connect')) {
    function mysql_connect($host, $user, $pass) {
        global $global_mysqli_link;
        $global_mysqli_link = @mysqli_connect($host, $user, $pass);
        return $global_mysqli_link;
    }
}

if (!function_exists('mysql_select_db')) {
    function mysql_select_db($db, $link = null) {
        global $global_mysqli_link;
        $l = $link ? $link : $global_mysqli_link;
        return @mysqli_select_db($l, $db);
    }
}

if (!function_exists('mysql_query')) {
    function mysql_query($query, $link = null) {
        global $global_mysqli_link;
        $l = $link ? $link : $global_mysqli_link;
        return @mysqli_query($l, $query);
    }
}
?>
```

---

### 5. Sesi & Autentikasi Admin (`dashboard/login.php` & `auth_check.php`)

#### A. Verifikasi Login (`dashboard/login.php`):
```php
$clean_user = mysql_real_escape_string($username);
$md5_pass   = md5($password);

// Query cek username di tabel `registered_users`
$query  = "SELECT * FROM registered_users WHERE user_name = '$clean_user' LIMIT 1";
$result = @mysql_query($query);

if ($result && mysql_num_rows($result) > 0) {
    $row = mysql_fetch_assoc($result);
    // Mendukung pencocokan hash MD5 maupun plain-text
    if ($row['password'] === $md5_pass || $row['password'] === $password) {
        $_SESSION['admin_user'] = $row['display_name'];
        header("Location: index.php");
        exit();
    }
}
```

#### B. Session Guard (`dashboard/auth_check.php`):
Disisipkan di awal setiap halaman admin internal:
```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_user'])) {
    header("Location: login.php");
    exit();
}
?>
```

---

### 6. Query Agregasi & Filter Data Dashboard (`dashboard/index.php`)

Dashboard menampilkan data tabel serta kartu metrik ringkasan menggunakan query SQL teroptimasi:

```php
// 1. Menghitung Total Rating & Rata-Rata Skor Bintang
$res_total_rate   = @mysql_query("SELECT COUNT(*) as total, AVG(Id_vote) as avg_score FROM rate_n");
$stat_rate        = @mysql_fetch_assoc($res_total_rate);
$total_ratings    = intval($stat_rate['total']);
$avg_rating_score = number_format($stat_rate['avg_score'], 1); // Hasil format: 4.8 / 5.0

// 2. Menghitung Total Saran & Apresiasi
$res_total_person = @mysql_query("SELECT COUNT(*) as total FROM person");
$stat_person      = @mysql_fetch_assoc($res_total_person);
$total_saran      = intval($stat_person['total']);

// 3. Query Filter Tabel dengan JOIN Master Unit & Paginasi
$query = "SELECT r.*, u.nama_unit 
          FROM rate_n r 
          LEFT JOIN unit_n u ON r.Id_unit = u.Id_unit 
          WHERE MONTH(r.date_time) = $month AND YEAR(r.date_time) = $year 
          ORDER BY r.date_time DESC 
          LIMIT $offset, $limit";
```

---

### 7. Ekspor Laporan PDF & Excel (`export_pdf.php` & `export_excel.php`)

#### A. Ekspor Laporan PDF (`export_pdf.php`):
Menggunakan layout cetak CSS `@page { size: A4 landscape; margin: 12mm; }` yang disesuaikan untuk printer & pengunduhan PDF browser.
```html
<style>
  @page { size: A4 landscape; margin: 12mm; }
  @media print {
    body { padding: 0; margin: 0; width: 100%; }
    .no-print { display: none !important; }
    .pdf-table thead { display: table-header-group; } /* Header tabel muncul berulang di tiap halaman */
    .pdf-table tr { page-break-inside: avoid; }       /* Mencegah baris terpotong di tengah halaman */
  }
</style>
```

#### B. Ekspor Laporan Excel (`export_excel.php`):
Mengirimkan data berformat CSV dengan **UTF-8 BOM Header (`\xEF\xBB\xBF`)** di awal file agar karakter bahasa Indonesia dan angka nol telepon (`'08...`) terbaca dengan sempurna di Microsoft Excel:
```php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="export_saran_' . date("Y-m-d_H-i") . '.csv"');

// Output UTF-8 BOM untuk kompatibilitas Microsoft Excel
echo "\xEF\xBB\xBF";

$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'Tanggal & Waktu', 'Kode Cookie', 'Nama', 'Jenis Kelamin', 'Kontak', 'Email', 'Komentar & Saran'));

while ($row = mysql_fetch_assoc($result)) {
    fputcsv($output, array(
        $no++,
        $row['date_fb'],
        $row['cookie'],
        $row['Name'],
        ($row['Gender'] == 1) ? 'Pria' : 'Wanita',
        "'" . $row['Contact'], // Tanda kutip tunggal di awal agar Excel membaca kontak sebagai Text
        $row['Email'],
        $row['Coment']
    ));
}
fclose($output);
```

---

## 💻 Cara Mengakses & Penggunaan

1. **Akses Kiosk Layar Utama**:
   ```text
   http://localhost/Signage2/exhall/feedback/index.html
   ```
2. **Akses Admin Dashboard**:
   ```text
   http://localhost/Signage2/exhall/feedback/dashboard/login.php
   ```
   - **Username**: `admin1`
   - **Password**: `Angkasapura123`

3. **Dokumentasi Presentasi Slide (PDF)**:
   ```text
   http://localhost/Signage2/exhall/feedback/dokumentasi_slide.html
   ```
   *(Buka URL di atas di browser, lalu tekan tombol **Cetak / Simpan ke PDF** untuk mengunduh slide presentasi).*
