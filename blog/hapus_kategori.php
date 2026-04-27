<?php
require "koneksi.php";

$id = (int)($_POST["id"] ?? 0);

$stmt = mysqli_prepare($koneksi, "SELECT COUNT(*) AS total FROM artikel WHERE id_kategori = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$cek = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if ((int)$cek["total"] > 0) {
    json_response("error", "Kategori tidak dapat dihapus karena masih digunakan oleh artikel.");
}

$stmt = mysqli_prepare($koneksi, "DELETE FROM kategori_artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    json_response("success", "Data kategori berhasil dihapus.");
}

json_response("error", "Gagal menghapus kategori.");
?>
