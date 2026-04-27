<?php
require "koneksi.php";
header("Content-Type: application/json; charset=utf-8");

$sql = "SELECT id, nama_depan, nama_belakang, user_name, password, foto FROM penulis ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row["id"] = (int)$row["id"];
    $data[] = $row;
}

echo json_encode($data);
?>
