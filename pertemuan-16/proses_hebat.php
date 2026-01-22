<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#contact');
}

#ambil dan bersihkan nilai dari form
$kode_pengunjung  = bersihkan($_POST['txtKodePen']  ?? '');
$nama_pengunjung = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat_rumah = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal_kunjungan = bersihkan($_POST['txtTglKunjungan'] ?? '');
$hobi = bersihkan($_POST['txtHobi']  ?? '');
$asal_slta = bersihkan($_POST['txtAsalSMA'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$nama_orang_tua = bersihkan($_POST['txtNmOrtu'] ?? '');
$nama_pacar = bersihkan($_POST['txtNmPacar'] ?? '');
$nama_mantan = bersihkan($_POST['txtNmMantan'] ?? '');

#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

if ($kode_pengunjung === '') {
  $errors[] = 'Kode Pengunjung wajib diisi.';
}

if ($nama_pengunjung === '') {
  $errors[] = 'Nama Pengunjung wajib diisi.';
}

if ($alamat_rumah === '') {
  $errors[] = 'Alamat Rumah wajib diisi.';
}

if ($tanggal_kunjungan === '') {
  $errors[] = 'Tanggal Kunjungan wajib diisi.';
}

if ($hobi === '') {
  $errors[] = 'Hobi wajib diisi.';
}

if ($asal_slta === '') {
  $errors[] = 'Asal SLTA wajib diisi.';
}

if ($pekerjaan === '') {
  $errors[] = 'Pekerjaan wajib diisi.';
}

if ($nama_orang_tua === '') {
  $errors[] = 'Nama Orang Tua Kunjungan wajib diisi.';
}

if ($nama_pacar === '') {
  $errors[] = 'Nama Pacar wajib diisi.';
}

if ($nama_mantan === '') {
  $errors[] = 'Nama Mantan wajib diisi.';
}

if (mb_strlen($nama_pengunjung) < 3) {
  $errors[] = 'Nama Pengunjung minimal 3 karakter.';
}

if (mb_strlen($alamat_rumah) < 3) {
  $errors[] = 'Alamat Rumah minimal 3 karakter.';
}

if (mb_strlen($nama_orang_tua) < 3) {
  $errors[] = 'Nama Oranf Tua minimal 3 karakter.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old'] = [
    'kode_pengunjung'  => $kode_pengunjung,
    'nama_pengunjung'  => $nama_pengunjung,
    'alamat_rumah' => $alamat_rumah,
    'tanggal_kunjungan' => $tanggal_kunjungan,
    'hobi' => $hobi,
    'asal_slta'  => $asal_slta,
    'pekerjaan'  => $pekerjaan,
    'nama_orang_tua' => $nama_orang_tua,
    'nama_pacar' => $nama_pacar,
    'nama_mantan' => $nama_mantan,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#contact');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO orang_hebat (kode_pengunjung, nama_pengunjung, alamat_rumah, tanggal_kunjungan, hobi, asal_slta, pekerjaan, nama_orang_tua, nama_pacar, nama_mantan)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#contact');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "ssssssssss", $kode_pengunjung, $nama_pengunjung, $alamat_rumah, $tanggal_kunjungan, $hobi, $asal_slta, $pekerjaan, $nama_orang_tua, $nama_pacar, $nama_mantan);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#contact'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali old value dan tampilkan error umum
  $_SESSION['old'] = [
    'kode_pengunjung'  => $kode_pengunjung,
    'nama_pengunjung'  => $nama_pengunjung,
    'alamat_rumah' => $alamat_rumah,
    'tanggal_kunjungan' => $tanggal_kunjungan,
    'hobi' => $hobi,
    'asal_slta'  => $asal_slta,
    'pekerjaan'  => $pekerjaan,
    'nama_orang_tua' => $nama_orang_tua,
    'nama_pacar' => $nama_pacar,
    'nama_mantan' => $nama_mantan,
  ];
  $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#contact');
}
#tutup statement
mysqli_stmt_close($stmt);

$arrBiodata = [
  "kode_pengunjung" => $_POST["txtKodePen"] ?? "",
  "nama_pengunjung" => $_POST["txtNmPengunjung"] ?? "",
  "alamat_rumah" => $_POST["txtAlRmh"] ?? "",
  "tanggal_kunjungan" => $_POST["txtTglKunjungan"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "asal_slta" => $_POST["txtAsalSMA"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "nama_orang_tua" => $_POST["txtNmOrtu"] ?? "",
  "nama_pacar" => $_POST["txtNmPacar"] ?? "",
  "nama_mantan" => $_POST["txtNmMantan"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");
