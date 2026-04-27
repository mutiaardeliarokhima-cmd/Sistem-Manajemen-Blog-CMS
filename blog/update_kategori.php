<?php
require "koneksi.php";

$id = (int)($_POST["id"] ?? 0);
$nama_kategori = bersih($_POST["nama_kategori"] ?? "");
$keterangan = bersih($_POST["keterangan"] ?? "");

if ($id <= 0 || $nama_kategori === "") {
    json_response("error", "Data tidak lengkap.");
}

$stmt = mysqli_prepare($koneksi, "UPDATE kategori_artikel SET nama_kategori=?, keterangan=? WHERE id=?");
mysqli_stmt_bind_param($stmt, "ssi", $nama_kategori, $keterangan, $id);

if (mysqli_stmt_execute($stmt)) {
    json_response("success", "Data kategori berhasil diperbarui.");
}

json_response("error", "Gagal memperbarui kategori.");
?>
