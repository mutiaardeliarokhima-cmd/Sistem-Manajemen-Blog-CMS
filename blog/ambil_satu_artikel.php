<?php
require "koneksi.php";
header("Content-Type: application/json; charset=utf-8");

$id = (int)($_GET["id"] ?? 0);

$stmt = mysqli_prepare($koneksi, "SELECT id, id_penulis, id_kategori, judul, isi, gambar FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

echo json_encode($data ?: []);
?>
