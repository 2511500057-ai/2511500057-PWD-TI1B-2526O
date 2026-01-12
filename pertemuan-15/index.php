<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Judul Halaman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
  <h1>Ini Header</h1>
</header>

<main>

<!-- ================= HOME ================= -->
<section id="home">
  <h2>Selamat Datang</h2>
  <?php
    echo "halo dunia!<br>";
    echo "nama saya hadi";
  ?>
</section>

<!-- ================= BIODATA ================= -->
<section id="biodata">
  <h2>Biodata Sederhana Mahasiswa</h2>

  <?php
  // FLASH MESSAGE BIODATA
  $flash_sukses_bio = $_SESSION['flash_sukses_bio'] ?? '';
  $flash_error_bio  = $_SESSION['flash_error_bio'] ?? '';
  unset($_SESSION['flash_sukses_bio'], $_SESSION['flash_error_bio']);
  ?>

  <?php if ($flash_sukses_bio): ?>
    <div style="background:#d4edda;color:#155724;padding:10px;margin-bottom:10px;border-radius:5px;">
      <?= $flash_sukses_bio ?>
    </div>
  <?php endif; ?>

  <?php if ($flash_error_bio): ?>
    <div style="background:#f8d7da;color:#721c24;padding:10px;margin-bottom:10px;border-radius:5px;">
      <?= $flash_error_bio ?>
    </div>
  <?php endif; ?>

  <form action="proses.php" method="POST">
    <input type="text" name="nim" placeholder="NIM" required>
    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
    <input type="date" name="tanggal_lahir" required>
    <input type="text" name="hobi" placeholder="Hobi" required>
    <input type="text" name="pasangan" placeholder="Pasangan" required>
    <input type="text" name="pekerjaan" placeholder="Pekerjaan" required>
    <input type="text" name="nama_orang_tua" placeholder="Nama Orang Tua" required>
    <input type="text" name="nama_kakak" placeholder="Nama Kakak" required>
    <input type="text" name="nama_adik" placeholder="Nama Adik" required>

    <button type="submit">Simpan Biodata</button>
  </form>
</section>

<!-- ================= ABOUT ================= -->
<section id="about">
  <h2>Tentang Saya</h2>
  <?php
  $biodata = $_SESSION['biodata'] ?? [];
  $fieldConfig = [
    "nim" => ["label" => "NIM"],
    "nama" => ["label" => "Nama"],
    "tempat" => ["label" => "Tempat Lahir"],
    "tanggal" => ["label" => "Tanggal Lahir"],
    "hobi" => ["label" => "Hobi"],
    "pasangan" => ["label" => "Pasangan"],
    "pekerjaan" => ["label" => "Pekerjaan"],
    "ortu" => ["label" => "Orang Tua"],
    "kakak" => ["label" => "Kakak"],
    "adik" => ["label" => "Adik"],
  ];
  echo tampilkanBiodata($fieldConfig, $biodata);
  ?>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact">
  <h2>Kontak Kami</h2>

  <?php
  $flash_sukses = $_SESSION['flash_sukses'] ?? '';
  $flash_error  = $_SESSION['flash_error'] ?? '';
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
  ?>

  <?php if ($flash_sukses): ?>
    <div style="background:#d4edda;color:#155724;padding:10px;margin-bottom:10px;">
      <?= $flash_sukses ?>
    </div>
  <?php endif; ?>

  <?php if ($flash_error): ?>
    <div style="background:#f8d7da;color:#721c24;padding:10px;margin-bottom:10px;">
      <?= $flash_error ?>
    </div>
  <?php endif; ?>

  <form action="proses.php" method="POST">
    <input type="text" name="txtNama" placeholder="Nama" required>
    <input type="email" name="txtEmail" placeholder="Email" required>
    <textarea name="txtPesan" placeholder="Pesan" required></textarea>
    <input type="number" name="txtCaptcha" placeholder="2 + 3 = ?" required>
    <button type="submit">Kirim</button>
  </form>

  <hr>
  <?php include 'read_inc.php'; ?>
</section>

</main>

<footer>
  <p>&copy; 2025</p>
</footer>
</body>
</html>
