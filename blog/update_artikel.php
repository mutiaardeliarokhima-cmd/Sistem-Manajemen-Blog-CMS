<?php
require "koneksi.php";

$id = (int)($_POST["id"] ?? 0);
$id_penulis = (int)($_POST["id_penulis"] ?? 0);
$id_kategori = (int)($_POST["id_kategori"] ?? 0);
$judul = bersih($_POST["judul"] ?? "");
$isi = bersih($_POST["isi"] ?? "");

if ($id <= 0 || $id_penulis <= 0 || $id_kategori <= 0 || $judul === "" || $isi === "") {
    json_response("error", "Data artikel tidak lengkap.");
}

$stmt = mysqli_prepare($koneksi, "SELECT gambar FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$lama = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$lama) {
    json_response("error", "Data artikel tidak ditemukan.");
}

$gambar_baru = upload_file("gambar", "uploads_artikel", false, $lama["gambar"]);

$stmt = mysqli_prepare($koneksi, "UPDATE artikel SET id_penulis=?, id_kategori=?, judul=?, isi=?, gambar=? WHERE id=?");
mysqli_stmt_bind_param($stmt, "iisssi", $id_penulis, $id_kategori, $judul, $isi, $gambar_baru, $id);

if (mysqli_stmt_execute($stmt)) {
    if ($gambar_baru !== $lama["gambar"]) {
        hapus_file_jika_ada("uploads_artikel", $lama["gambar"]);
    }
    json_response("success", "Data artikel berhasil diperbarui.");
}

if ($gambar_baru !== $lama["gambar"]) {
    hapus_file_jika_ada("uploads_artikel", $gambar_baru);
}

json_response("error", "Gagal memperbarui artikel.");
?>
