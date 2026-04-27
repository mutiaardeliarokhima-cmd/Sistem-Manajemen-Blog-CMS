<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "db_blog";
$port = 3307; // Jika MySQL memakai port 3306, ganti menjadi 3306.

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    http_response_code(500);
    die(json_encode([
        "status" => "error",
        "message" => "Koneksi database gagal: " . mysqli_connect_error()
    ]));
}

mysqli_set_charset($koneksi, "utf8mb4");

function json_response($status, $message, $extra = []) {
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode(array_merge([
        "status" => $status,
        "message" => $message
    ], $extra));
    exit;
}

function bersih($value) {
    return trim($value ?? "");
}

function upload_file($field, $folder, $required = false, $default = "") {
    if (!isset($_FILES[$field]) || $_FILES[$field]["error"] === UPLOAD_ERR_NO_FILE) {
        if ($required) {
            json_response("error", "File wajib diunggah.");
        }
        return $default;
    }

    if ($_FILES[$field]["error"] !== UPLOAD_ERR_OK) {
        json_response("error", "Terjadi kesalahan saat upload file.");
    }

    if ($_FILES[$field]["size"] > 2 * 1024 * 1024) {
        json_response("error", "Ukuran file maksimal 2 MB.");
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES[$field]["tmp_name"]);

    $allowed = [
        "image/jpeg" => "jpg",
        "image/png"  => "png",
        "image/gif"  => "gif",
        "image/webp" => "webp"
    ];

    if (!array_key_exists($mime, $allowed)) {
        json_response("error", "Tipe file harus gambar JPG, PNG, GIF, atau WEBP.");
    }

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $nama_file = uniqid("img_", true) . "." . $allowed[$mime];
    $tujuan = rtrim($folder, "/") . "/" . $nama_file;

    if (!move_uploaded_file($_FILES[$field]["tmp_name"], $tujuan)) {
        json_response("error", "Gagal menyimpan file upload.");
    }

    return $nama_file;
}

function hapus_file_jika_ada($folder, $file, $kecuali = []) {
    if (!$file || in_array($file, $kecuali)) {
        return;
    }

    $path = rtrim($folder, "/") . "/" . basename($file);
    if (is_file($path)) {
        unlink($path);
    }
}

function tanggal_indonesia() {
    date_default_timezone_set("Asia/Jakarta");

    $hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    $bulan = [
        1=>"Januari", 2=>"Februari", 3=>"Maret", 4=>"April",
        5=>"Mei", 6=>"Juni", 7=>"Juli", 8=>"Agustus",
        9=>"September", 10=>"Oktober", 11=>"November", 12=>"Desember"
    ];

    $sekarang = new DateTime();
    $nama_hari = $hari[$sekarang->format("w")];
    $tanggal = $sekarang->format("j");
    $nama_bulan = $bulan[(int)$sekarang->format("n")];
    $tahun = $sekarang->format("Y");
    $jam = $sekarang->format("H:i");

    return "$nama_hari, $tanggal $nama_bulan $tahun | $jam";
}
?>
