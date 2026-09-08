<?php
include "../koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM tabel_jalur 
WHERE lantai_jalur='2' 
AND type='tenant'
ORDER BY nomor_jalur ASC");

$data = [];

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data);