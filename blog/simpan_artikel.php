<?php
require "koneksi.php";

$id_penulis = (int)($_POST["id_penulis"] ?? 0);
$id_kategori = (int)($_POST["id_kategori"] ?? 0);
$judul = bersih($_POST["judul"] ?? "");
$isi = bersih($_POST["isi"] ?? "");

if ($id_penulis <= 0 || $id_kategori <= 0 || $judul === "" || $isi === "") {
    json_response("error", "Semua field artikel wajib diisi.");
}

$gambar = upload_file("gambar", "uploads_artikel", true);
$hari_tanggal = tanggal_indonesia();

$stmt = mysqli_prepare($koneksi, "INSERT INTO artikel (id_penulis, id_kategori, judul, isi, gambar, hari_tanggal) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iissss", $id_penulis, $id_kategori, $judul, $isi, $gambar, $hari_tanggal);

if (mysqli_stmt_execute($stmt)) {
    json_response("success", "Data artikel berhasil disimpan.");
}

hapus_file_jika_ada("uploads_artikel", $gambar);
json_response("error", "Gagal menyimpan artikel.");
?>
