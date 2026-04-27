<?php
require "koneksi.php";

$id = (int)($_POST["id"] ?? 0);

$stmt = mysqli_prepare($koneksi, "SELECT COUNT(*) AS total FROM artikel WHERE id_penulis = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$cek = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if ((int)$cek["total"] > 0) {
    json_response("error", "Penulis tidak dapat dihapus karena masih memiliki artikel.");
}

$stmt = mysqli_prepare($koneksi, "SELECT foto FROM penulis WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    json_response("error", "Data penulis tidak ditemukan.");
}

$stmt = mysqli_prepare($koneksi, "DELETE FROM penulis WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    hapus_file_jika_ada("uploads_penulis", $data["foto"], ["default.png"]);
    json_response("success", "Data penulis berhasil dihapus.");
}

json_response("error", "Gagal menghapus data penulis.");
?>
