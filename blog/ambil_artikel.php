<?php
require "koneksi.php";
header("Content-Type: application/json; charset=utf-8");

$sql = "SELECT 
            artikel.id,
            artikel.judul,
            artikel.gambar,
            artikel.hari_tanggal,
            kategori_artikel.nama_kategori,
            CONCAT(penulis.nama_depan, ' ', penulis.nama_belakang) AS nama_penulis
        FROM artikel
        JOIN penulis ON artikel.id_penulis = penulis.id
        JOIN kategori_artikel ON artikel.id_kategori = kategori_artikel.id
        ORDER BY artikel.id DESC";

$result = mysqli_query($koneksi, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row["id"] = (int)$row["id"];
    $data[] = $row;
}

echo json_encode($data);
?>
