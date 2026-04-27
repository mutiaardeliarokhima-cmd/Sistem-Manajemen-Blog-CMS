<?php
require "koneksi.php";

$nama_depan = bersih($_POST["nama_depan"] ?? "");
$nama_belakang = bersih($_POST["nama_belakang"] ?? "");
$user_name = bersih($_POST["user_name"] ?? "");
$password = $_POST["password"] ?? "";

if ($nama_depan === "" || $nama_belakang === "" || $user_name === "" || $password === "") {
    json_response("error", "Semua field wajib diisi.");
}

$foto = upload_file("foto", "uploads_penulis", false, "default.png");
$password_hash = password_hash($password, PASSWORD_BCRYPT);

$stmt = mysqli_prepare($koneksi, "INSERT INTO penulis (nama_depan, nama_belakang, user_name, password, foto) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssss", $nama_depan, $nama_belakang, $user_name, $password_hash, $foto);

if (mysqli_stmt_execute($stmt)) {
    json_response("success", "Data penulis berhasil disimpan.");
}

if ($foto !== "default.png") {
    hapus_file_jika_ada("uploads_penulis", $foto);
}

json_response("error", "Gagal menyimpan data penulis. Username mungkin sudah digunakan.");
?>
