<?php
require 'koneksi.php';

// Tentukan alamat gudang video
$target_dir = "../wayfinding/videos/";

// Logika Algojo: Kalau tombol Hapus ditekan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    // Cari nama file di database dulu
    $stmt = $pdo->prepare("SELECT nama_file FROM screensavers WHERE id = ?");
    $stmt->execute([$id]);
    $video = $stmt->fetch();

    if ($video) {
        $file_path = $target_dir . $video['nama_file'];
        // Musnahkan file fisiknya dari folder
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        // Hapus datanya dari database
        $stmt = $pdo->prepare("DELETE FROM screensavers WHERE id = ?");
        $stmt->execute([$id]);
        $pesan = "🔥 Video sukses dimusnahkan!";
    }
}

// Logika Kurir: Kalau tombol Upload ditekan
if (isset($_POST['upload'])) {
    $nama_file = basename($_FILES["video"]["name"]);
    // Bersihin spasi di nama file biar gak error pas dibaca JS
    $nama_file = str_replace(" ", "_", $nama_file); 
    $target_file = $target_dir . $nama_file;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi murni MP4
    if ($file_type === "mp4") {
        // Pindahin dari memory sementara ke gudang folder 'videos'
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            // Catet namanya ke database
            $stmt = $pdo->prepare("INSERT INTO screensavers (nama_file) VALUES (?)");
            $stmt->execute([$nama_file]);
            $pesan = "✅ Video berhasil mengudara!";
        } else {
            $pesan = "❌ Error: Gagal pindahin file ke folder.";
        }
    } else {
        $pesan = "❌ Ditolak: Format wajib .mp4 doang bos!";
    }
}

// Tarik semua daftar video dari database untuk ditampilin
$videos = $pdo->query("SELECT * FROM screensavers ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Humas - Video Screensaver</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; padding: 40px; color: #333; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        h2 { border-bottom: 2px solid #075b61; padding-bottom: 10px; color: #075b61; }
        .pesan { background: #e2f0e6; color: #2d6a4f; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-weight: bold; }
        form { background: #fafafa; padding: 20px; border: 1px dashed #ccc; border-radius: 8px; margin-bottom: 30px; }
        input[type="file"] { margin-bottom: 15px; }
        button { background: #075b61; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        button:hover { background: #064e53; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; }
        .btn-hapus { background: #e63946; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; }
        .btn-hapus:hover { background: #d62828; }
    </style>
</head>
<body>

<div class="container">
    <h2>Dapur Humas: Upload Video Kiosk</h2>
    
    <?php if (isset($pesan)) echo "<div class='pesan'>$pesan</div>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <label><b>Pilih File Video (.mp4):</b></label><br><br>
        <input type="file" name="video" accept="video/mp4" required><br>
        <button type="submit" name="upload">Upload Video</button>
    </form>

    <h3>Daftar Video Tayang</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama File</th>
            <th>Waktu Upload</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($videos as $vid): ?>
        <tr>
            <td><?= $vid['id'] ?></td>
            <td><?= htmlspecialchars($vid['nama_file']) ?></td>
            <td><?= $vid['uploaded_at'] ?></td>
            <td>
                <a href="?hapus=<?= $vid['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin mau musnahin video ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>