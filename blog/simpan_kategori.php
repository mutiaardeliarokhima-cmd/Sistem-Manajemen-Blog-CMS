<?php
require "koneksi.php";

$nama_kategori = bersih($_POST["nama_kategori"] ?? "");
$keterangan = bersih($_POST["keterangan"] ?? "");

if ($nama_kategori === "") {
    json_response("error", "Nama kategori wajib diisi.");
}

$stmt = mysqli_prepare($koneksi, "INSERT INTO kategori_artikel (nama_kategori, keterangan) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $nama_kategori, $keterangan);

if (mysqli_stmt_execute($stmt)) {
    json_response("success", "Data kategori berhasil disimpan.");
}

json_response("error", "Gagal menyimpan kategori. Nama kategori mungkin sudah digunakan.");
?>
