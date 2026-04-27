<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Manajemen Blog (CMS)</title>
<style>
:root{
    --navy:#24384a;
    --navy-dark:#172637;
    --green:#22c55e;
    --green-soft:#e8f8ea;
    --blue:#0d6efd;
    --red:#ef4444;
    --gray:#6b7280;
    --border:#e5e7eb;
    --bg:#f5f6fb;
}
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: var(--bg);
    color: #111827;
}

/* HEADER */
.header {
    height: 92px;
    background: linear-gradient(90deg, var(--navy-dark), var(--navy));
    color: #ffffff;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 0 38px;
    box-shadow: 0 2px 10px rgba(15, 23, 42, 0.18);
}

.logo-header {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    background: #40556a;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow:
        inset 0 1px 0 rgba(255, 255, 255, 0.18),
        0 8px 20px rgba(0, 0, 0, 0.16);
}

.header-title h1 {
    font-size: 22px;
    margin: 0 0 5px;
    font-weight: 700;
}

.header-title p {
    margin: 0;
    color: #cbd5e1;
    font-size: 13px;
}

/* LAYOUT */
.page {
    display: flex;
    gap: 30px;
    padding: 34px 38px;
}

.sidebar {
    width: 285px;
    height: max-content;
    background: #ffffff;
    border-radius: 14px;
    padding: 22px 0;
    box-shadow: 0 10px 28px rgba(15, 23, 42, 0.08);
    overflow: hidden;
}

.sidebar-title {
    font-size: 14px;
    color: #6b7280;
    font-weight: 700;
    padding: 0 26px 16px;
}

.content {
    flex: 1;
    min-width: 0;
}

.content-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 8px 0 23px;
}

.content-top h2 {
    margin: 0;
    font-size: 26px;
}

/* MENU */
.menu-btn {
    width: 100%;
    border: 0;
    background: #ffffff;
    padding: 17px 26px;
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 15px;
    color: #1f2937;
    cursor: pointer;
    text-align: left;
    border-left: 5px solid transparent;
    transition: 0.2s;
}

.menu-btn:hover {
    background: #f8fafc;
}

.menu-btn.active {
    background: var(--green-soft);
    border-left-color: var(--green);
    color: #15803d;
    font-weight: 700;
}

.menu-btn svg {
    width: 22px;
    height: 22px;
}

/* CARD */
.card {
    background: #ffffff;
    border-radius: 14px;
    padding: 24px 28px;
    box-shadow: 0 10px 28px rgba(15, 23, 42, 0.08);
    overflow-x: auto;
}

/* BUTTON */
.btn {
    border: 0;
    border-radius: 7px;
    padding: 9px 14px;
    color: #ffffff;
    cursor: pointer;
    font-weight: 700;
    font-size: 14px;
    transition: 0.2s;
}

.btn:hover {
    filter: brightness(0.95);
}

.btn-green {
    background: #22c55e;
}

.btn-blue {
    background: #0d6efd;
}

.btn-red {
    background: #ef4444;
}

.btn-gray {
    background: #9ca3af;
}

.btn-add {
    padding: 13px 20px;
    font-size: 15px;
}

/* TABLE */
table {
    width: 100%;
    min-width: 720px;
    border-collapse: collapse;
}

th {
    font-size: 14px;
    color: #374151;
    text-align: left;
    padding: 16px 14px;
    border-bottom: 1px solid var(--border);
}

td {
    font-size: 14px;
    padding: 16px 14px;
    border-bottom: 1px solid var(--border);
    vertical-align: middle;
}

tr:last-child td {
    border-bottom: 0;
}

.thumb {
    width: 58px;
    height: 58px;
    border-radius: 8px;
    object-fit: cover;
    background: #eeeeee;
    border: 1px solid #f1f5f9;
}

.badge {
    background: #e8f1ff;
    color: #0d6efd;
    padding: 6px 10px;
    border-radius: 7px;
    font-weight: 700;
    display: inline-block;
}

.actions {
    display: flex;
    gap: 8px;
}

.empty {
    text-align: center;
    color: #6b7280;
    padding: 34px;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    align-items: center;
    justify-content: center;
    z-index: 20;
    padding: 20px;
}

.modal.show {
    display: flex;
}

.modal-box {
    background: #ffffff;
    border-radius: 8px;
    width: 480px;
    max-width: 100%;
    padding: 24px;
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2);
}

.modal-box.wide {
    width: 600px;
}

.modal-box h3 {
    margin: 0 0 20px;
    font-size: 19px;
    border-bottom: 1px solid #eeeeee;
    padding-bottom: 14px;
}

.modal-footer {
    text-align: right;
    margin-top: 18px;
    display: flex;
    justify-content: flex-end;
    gap: 8px;
}

/* FORM */
.form-row {
    display: flex;
    gap: 14px;
}

.form-group {
    margin-bottom: 14px;
    width: 100%;
}

label {
    display: block;
    font-size: 13px;
    margin-bottom: 6px;
    color: #374151;
    font-weight: 600;
}

input,
select,
textarea {
    width: 100%;
    padding: 10px 11px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
}

textarea {
    height: 110px;
    resize: vertical;
}

/* MODAL HAPUS / INFO */
.modal-hapus {
    text-align: center;
    width: 360px;
}

.modal-hapus h3 {
    border-bottom: 0;
    margin-bottom: 6px;
    padding-bottom: 0;
}

.modal-hapus p {
    font-size: 13px;
    color: #6b7280;
    margin-bottom: 18px;
}

.icon-hapus {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: #ffe4e6;
    color: #ef4444;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
}

/* RESPONSIVE */
@media (max-width: 850px) {
    .page {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
    }

    .content-top {
        align-items: flex-start;
        gap: 12px;
        flex-direction: column;
    }
}
</style>
</head>
<body>

<header class="header">
    <div class="logo-header" aria-label="Logo CMS">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none">
            <rect x="3.5" y="4" width="17" height="16" rx="2.2" stroke="#ffffff" stroke-width="2"/>
            <path d="M3.5 9.5H20.5" stroke="#ffffff" stroke-width="2"/>
            <path d="M9.2 9.5V20" stroke="#ffffff" stroke-width="2"/>
        </svg>
    </div>
    <div class="header-title">
        <h1>Sistem Manajemen Blog (CMS)</h1>
        <p>Blog Keren</p>
    </div>
</header>

<div class="page">
    <aside class="sidebar">
        <div class="sidebar-title">MENU UTAMA</div>
        <button class="menu-btn active" id="menuPenulis" onclick="gantiMenu('penulis')">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke="currentColor" stroke-width="2"/><path d="M4 21a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="2"/></svg>
            Kelola Penulis
        </button>
        <button class="menu-btn" id="menuArtikel" onclick="gantiMenu('artikel')">
            <svg viewBox="0 0 24 24" fill="none"><path d="M7 3h7l5 5v13H7V3Z" stroke="currentColor" stroke-width="2"/><path d="M14 3v6h5M9 13h8M9 17h6" stroke="currentColor" stroke-width="2"/></svg>
            Kelola Artikel
        </button>
        <button class="menu-btn" id="menuKategori" onclick="gantiMenu('kategori')">
            <svg viewBox="0 0 24 24" fill="none"><path d="M3 7h7l2 2h9v10H3V7Z" stroke="currentColor" stroke-width="2"/></svg>
            Kelola Kategori Artikel
        </button>
    </aside>

    <main class="content">
        <div class="content-top">
            <h2 id="judulHalaman">Data Penulis</h2>
            <button class="btn btn-green btn-add" id="btnTambah" onclick="bukaTambah()">+ Tambah Penulis</button>
        </div>
        <section class="card">
            <div id="areaData" class="empty">Memuat data...</div>
        </section>
    </main>
</div>

<div class="modal" id="modalForm">
    <div class="modal-box" id="modalBox">
        <h3 id="judulModal"></h3>
        <form id="formData" enctype="multipart/form-data"></form>
    </div>
</div>

<div class="modal" id="modalHapus">
    <div class="modal-box modal-hapus">
        <div class="icon-hapus">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6 7h12M10 11v6M14 11v6M9 7l1-2h4l1 2M8 7l1 13h6l1-13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        </div>
        <h3>Hapus data ini?</h3>
        <p>Data yang dihapus tidak dapat dikembalikan.</p>
        <button class="btn btn-gray" onclick="tutupModalHapus()">Batal</button>
        <button class="btn btn-red" onclick="prosesHapus()">Ya, Hapus</button>
    </div>
</div>


<div class="modal" id="modalInfo">
    <div class="modal-box modal-hapus">
        <div class="icon-hapus" id="iconInfo">✓</div>
        <h3 id="judulInfo">Berhasil</h3>
        <p id="pesanInfo">Pesan</p>
        <button class="btn btn-green" onclick="tutupInfo()">OK</button>
    </div>
</div>

<script>
let menuAktif = "penulis";
let idHapus = null;

function esc(text){
    if(text === null || text === undefined) return "";
    return String(text).replace(/[&<>"']/g, m => ({
        "&":"&amp;", "<":"&lt;", ">":"&gt;", "\"":"&quot;", "'":"&#039;"
    }[m]));
}

function pesanError(err){
    tampilInfo("error", "Terjadi kesalahan: " + err);
}

function tampilInfo(status, pesan){
    const icon = document.getElementById("iconInfo");
    const judul = document.getElementById("judulInfo");
    const teks = document.getElementById("pesanInfo");

    teks.textContent = pesan;

    if(status === "success"){
        icon.style.background = "#dcfce7";
        icon.style.color = "#16a34a";
        icon.textContent = "✓";
        judul.textContent = "Berhasil";
    }else{
        icon.style.background = "#ffe4e6";
        icon.style.color = "#ef4444";
        icon.textContent = "!";
        judul.textContent = "Gagal";
    }

    document.getElementById("modalInfo").classList.add("show");
}

function tutupInfo(){
    document.getElementById("modalInfo").classList.remove("show");
}

function gantiMenu(menu){
    menuAktif = menu;
    document.querySelectorAll(".menu-btn").forEach(btn => btn.classList.remove("active"));

    if(menu === "penulis"){
        menuPenulis.classList.add("active");
        judulHalaman.textContent = "Data Penulis";
        btnTambah.textContent = "+ Tambah Penulis";
        tampilPenulis();
    } else if(menu === "artikel"){
        menuArtikel.classList.add("active");
        judulHalaman.textContent = "Data Artikel";
        btnTambah.textContent = "+ Tambah Artikel";
        tampilArtikel();
    } else {
        menuKategori.classList.add("active");
        judulHalaman.textContent = "Data Kategori Artikel";
        btnTambah.textContent = "+ Tambah Kategori";
        tampilKategori();
    }
}

function bukaTambah(){
    if(menuAktif === "penulis") formPenulis();
    if(menuAktif === "artikel") formArtikel();
    if(menuAktif === "kategori") formKategori();
}

function tutupModal(){
    modalForm.classList.remove("show");
    formData.innerHTML = "";
}

function konfirmasiHapus(id){
    idHapus = id;
    modalHapus.classList.add("show");
}

function tutupModalHapus(){
    modalHapus.classList.remove("show");
    idHapus = null;
}

function prosesHapus(){
    const endpoint = menuAktif === "penulis" ? "hapus_penulis.php" :
                     menuAktif === "artikel" ? "hapus_artikel.php" :
                     "hapus_kategori.php";

    const fd = new FormData();
    fd.append("id", idHapus);

    fetch(endpoint, {method:"POST", body:fd})
    .then(r => r.json())
    .then(res => {
        tampilInfo(res.status, res.message);
        tutupModalHapus();
        gantiMenu(menuAktif);
    })
    .catch(pesanError);
}

/* ================= PENULIS ================= */
function tampilPenulis(){
    areaData.innerHTML = "Memuat data...";
    fetch("ambil_penulis.php")
    .then(r => r.json())
    .then(data => {
        if(data.length === 0){
            areaData.innerHTML = `<div class="empty">Belum ada data penulis.</div>`;
            return;
        }

        let html = `<table>
            <thead><tr><th>FOTO</th><th>NAMA</th><th>USERNAME</th><th>PASSWORD</th><th>AKSI</th></tr></thead><tbody>`;

        data.forEach(d => {
            html += `<tr>
                <td><img class="thumb" src="uploads_penulis/${esc(d.foto)}" alt="Foto Penulis"></td>
                <td>${esc(d.nama_depan)} ${esc(d.nama_belakang)}</td>
                <td><span class="badge">${esc(d.user_name)}</span></td>
                <td>${esc(d.password).substring(0, 18)}...</td>
                <td><div class="actions">
                    <button class="btn btn-blue" onclick="formPenulis(${d.id})">Edit</button>
                    <button class="btn btn-red" onclick="konfirmasiHapus(${d.id})">Hapus</button>
                </div></td>
            </tr>`;
        });

        html += `</tbody></table>`;
        areaData.innerHTML = html;
    })
    .catch(pesanError);
}

function formPenulis(id = null){
    modalBox.classList.remove("wide");
    judulModal.textContent = id ? "Edit Penulis" : "Tambah Penulis";

    formData.innerHTML = `
        <input type="hidden" name="id" id="id">
        <div class="form-row">
            <div class="form-group">
                <label>Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" required>
            </div>
            <div class="form-group">
                <label>Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" required>
            </div>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="user_name" id="user_name" required>
        </div>
        <div class="form-group">
            <label>${id ? "Password Baru (kosongkan jika tidak diganti)" : "Password"}</label>
            <input type="password" name="password" id="password" ${id ? "" : "required"}>
        </div>
        <div class="form-group">
            <label>Foto Profil ${id ? "(kosongkan jika tidak diganti)" : ""}</label>
            <input type="file" name="foto" accept="image/*">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-gray" onclick="tutupModal()">Batal</button>
            <button type="submit" class="btn btn-green">${id ? "Simpan Perubahan" : "Simpan Data"}</button>
        </div>
    `;

    formData.onsubmit = e => {
        e.preventDefault();
        fetch(id ? "update_penulis.php" : "simpan_penulis.php", {
            method:"POST",
            body:new FormData(formData)
        })
        .then(r => r.json())
        .then(res => {
            tampilInfo(res.status, res.message);
            if(res.status === "success"){
                tutupModal();
                tampilPenulis();
            }
        })
        .catch(pesanError);
    };

    modalForm.classList.add("show");

    if(id){
        fetch("ambil_satu_penulis.php?id=" + id)
        .then(r => r.json())
        .then(d => {
            document.getElementById("id").value = d.id;
            document.getElementById("nama_depan").value = d.nama_depan;
            document.getElementById("nama_belakang").value = d.nama_belakang;
            document.getElementById("user_name").value = d.user_name;
        })
        .catch(pesanError);
    }
}

/* ================= KATEGORI ================= */
function tampilKategori(){
    areaData.innerHTML = "Memuat data...";
    fetch("ambil_kategori.php")
    .then(r => r.json())
    .then(data => {
        if(data.length === 0){
            areaData.innerHTML = `<div class="empty">Belum ada data kategori.</div>`;
            return;
        }

        let html = `<table>
            <thead><tr><th>NAMA KATEGORI</th><th>KETERANGAN</th><th>AKSI</th></tr></thead><tbody>`;

        data.forEach(d => {
            html += `<tr>
                <td><span class="badge">${esc(d.nama_kategori)}</span></td>
                <td>${esc(d.keterangan)}</td>
                <td><div class="actions">
                    <button class="btn btn-blue" onclick="formKategori(${d.id})">Edit</button>
                    <button class="btn btn-red" onclick="konfirmasiHapus(${d.id})">Hapus</button>
                </div></td>
            </tr>`;
        });

        html += `</tbody></table>`;
        areaData.innerHTML = html;
    })
    .catch(pesanError);
}

function formKategori(id = null){
    modalBox.classList.remove("wide");
    judulModal.textContent = id ? "Edit Kategori" : "Tambah Kategori";

    formData.innerHTML = `
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" id="keterangan"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-gray" onclick="tutupModal()">Batal</button>
            <button type="submit" class="btn btn-green">${id ? "Simpan Perubahan" : "Simpan Data"}</button>
        </div>
    `;

    formData.onsubmit = e => {
        e.preventDefault();
        fetch(id ? "update_kategori.php" : "simpan_kategori.php", {
            method:"POST",
            body:new FormData(formData)
        })
        .then(r => r.json())
        .then(res => {
            tampilInfo(res.status, res.message);
            if(res.status === "success"){
                tutupModal();
                tampilKategori();
            }
        })
        .catch(pesanError);
    };

    modalForm.classList.add("show");

    if(id){
        fetch("ambil_satu_kategori.php?id=" + id)
        .then(r => r.json())
        .then(d => {
            document.getElementById("id").value = d.id;
            document.getElementById("nama_kategori").value = d.nama_kategori;
            document.getElementById("keterangan").value = d.keterangan || "";
        })
        .catch(pesanError);
    }
}

/* ================= ARTIKEL ================= */
function tampilArtikel(){
    areaData.innerHTML = "Memuat data...";
    fetch("ambil_artikel.php")
    .then(r => r.json())
    .then(data => {
        if(data.length === 0){
            areaData.innerHTML = `<div class="empty">Belum ada data artikel.</div>`;
            return;
        }

        let html = `<table>
            <thead><tr><th>GAMBAR</th><th>JUDUL</th><th>KATEGORI</th><th>PENULIS</th><th>TANGGAL</th><th>AKSI</th></tr></thead><tbody>`;

        data.forEach(d => {
            html += `<tr>
                <td><img class="thumb" src="uploads_artikel/${esc(d.gambar)}" alt="Gambar Artikel"></td>
                <td>${esc(d.judul)}</td>
                <td><span class="badge">${esc(d.nama_kategori)}</span></td>
                <td>${esc(d.nama_penulis)}</td>
                <td>${esc(d.hari_tanggal)}</td>
                <td><div class="actions">
                    <button class="btn btn-blue" onclick="formArtikel(${d.id})">Edit</button>
                    <button class="btn btn-red" onclick="konfirmasiHapus(${d.id})">Hapus</button>
                </div></td>
            </tr>`;
        });

        html += `</tbody></table>`;
        areaData.innerHTML = html;
    })
    .catch(pesanError);
}

async function formArtikel(id = null){
    modalBox.classList.add("wide");
    judulModal.textContent = id ? "Edit Artikel" : "Tambah Artikel";

    const penulis = await fetch("ambil_penulis.php").then(r => r.json());
    const kategori = await fetch("ambil_kategori.php").then(r => r.json());

    const opsiPenulis = penulis.map(p => `<option value="${p.id}">${esc(p.nama_depan)} ${esc(p.nama_belakang)}</option>`).join("");
    const opsiKategori = kategori.map(k => `<option value="${k.id}">${esc(k.nama_kategori)}</option>`).join("");

    formData.innerHTML = `
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" id="judul" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Penulis</label>
                <select name="id_penulis" id="id_penulis" required>
                    <option value="">Pilih Penulis</option>${opsiPenulis}
                </select>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" id="id_kategori" required>
                    <option value="">Pilih Kategori</option>${opsiKategori}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Isi Artikel</label>
            <textarea name="isi" id="isi" required></textarea>
        </div>
        <div class="form-group">
            <label>Gambar ${id ? "(kosongkan jika tidak diganti)" : ""}</label>
            <input type="file" name="gambar" accept="image/*" ${id ? "" : "required"}>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-gray" onclick="tutupModal()">Batal</button>
            <button type="submit" class="btn btn-green">${id ? "Simpan Perubahan" : "Simpan Data"}</button>
        </div>
    `;

    formData.onsubmit = e => {
        e.preventDefault();
        fetch(id ? "update_artikel.php" : "simpan_artikel.php", {
            method:"POST",
            body:new FormData(formData)
        })
        .then(r => r.json())
        .then(res => {
            tampilInfo(res.status, res.message);
            if(res.status === "success"){
                tutupModal();
                tampilArtikel();
            }
        })
        .catch(pesanError);
    };

    modalForm.classList.add("show");

    if(id){
        fetch("ambil_satu_artikel.php?id=" + id)
        .then(r => r.json())
        .then(d => {
            document.getElementById("id").value = d.id;
            document.getElementById("judul").value = d.judul;
            document.getElementById("id_penulis").value = d.id_penulis;
            document.getElementById("id_kategori").value = d.id_kategori;
            document.getElementById("isi").value = d.isi;
        })
        .catch(pesanError);
    }
}

tampilPenulis();
</script>
</body>
</html>
