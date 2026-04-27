<?php
require "koneksi.php";

$id = (int)($_POST["id"] ?? 0);
$nama_depan = bersih($_POST["nama_depan"] ?? "");
$nama_belakang = bersih($_POST["nama_belakang"] ?? "");
$user_name = bersih($_POST["user_name"] ?? "");
$password = $_POST["password"] ?? "";

if ($id <= 0 || $nama_depan === "" || $nama_belakang === "" || $user_name === "") {
    json_response("error", "Data tidak lengkap.");
}

$stmt = mysqli_prepare($koneksi, "SELECT foto FROM penulis WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$lama = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$lama) {
    json_response("error", "Data penulis tidak ditemukan.");
}

$foto_baru = upload_file("foto", "uploads_penulis", false, $lama["foto"]);

if ($password !== "") {
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = mysqli_prepare($koneksi, "UPDATE penulis SET nama_depan=?, nama_belakang=?, user_name=?, password=?, foto=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssssi", $nama_depan, $nama_belakang, $user_name, $password_hash, $foto_baru, $id);
} else {
    $stmt = mysqli_prepare($koneksi, "UPDATE penulis SET nama_depan=?, nama_belakang=?, user_name=?, foto=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssssi", $nama_depan, $nama_belakang, $user_name, $foto_baru, $id);
}

if (mysqli_stmt_execute($stmt)) {
    if ($foto_baru !== $lama["foto"]) {
        hapus_file_jika_ada("uploads_penulis", $lama["foto"], ["default.png"]);
    }
    json_response("success", "Data penulis berhasil diperbarui.");
}

if ($foto_baru !== $lama["foto"]) {
    hapus_file_jika_ada("uploads_penulis", $foto_baru, ["default.png"]);
}

json_response("error", "Gagal memperbarui data penulis.");
?>
