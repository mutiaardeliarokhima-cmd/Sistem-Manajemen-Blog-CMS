<?php
require "koneksi.php";

$id = (int)($_POST["id"] ?? 0);

$stmt = mysqli_prepare($koneksi, "SELECT gambar FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    json_response("error", "Data artikel tidak ditemukan.");
}

$stmt = mysqli_prepare($koneksi, "DELETE FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    hapus_file_jika_ada("uploads_artikel", $data["gambar"]);
    json_response("success", "Data artikel berhasil dihapus.");
}

json_response("error", "Gagal menghapus artikel.");
?>
