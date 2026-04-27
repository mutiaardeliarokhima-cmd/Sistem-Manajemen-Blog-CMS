<?php
require "koneksi.php";
header("Content-Type: application/json; charset=utf-8");

$sql = "SELECT id, nama_kategori, keterangan FROM kategori_artikel ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row["id"] = (int)$row["id"];
    $data[] = $row;
}

echo json_encode($data);
?>
