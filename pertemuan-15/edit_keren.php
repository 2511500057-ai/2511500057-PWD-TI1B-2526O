<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai cid dari GET dan lakukan validasi untuk 
    mengecek cid harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya cid harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $cid = $_GET['cid'] ?? '';
    $cid = (int)$cid;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $cid bernilai valid:
    Kalau $cid tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (read.php) sembari 
    mengirim penanda error.
  */
  if (!$cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_keren.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT cid, nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adik 
                                    FROM orang_keren WHERE cid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_keren.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read_keren.php');
  }

  #Nilai awal (prefill form)
    $nim            = $row['nim'] ?? '';
    $nama_lengkap   = $row['nama_lengkap'] ?? '';
    $tempat_lahir   = $row['tempat_lahir'] ?? '';
    $tanggal_lahir  = $row['tanggal_lahir'] ?? '';
    $hobi           = $row['hobi'] ?? '';
    $pasangan       = $row['pasangan'] ?? '';
    $pekerjaan      = $row['pekerjaan'] ?? '';
    $nama_orang_tua = $row['nama_orang_tua'] ?? '';
    $nama_kakak     = $row['nama_kakak'] ?? '';
    $nama_adik      = $row['nama_adik'] ?? '';

  #Ambil error dan nilai old input kalau ada
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old']);
  if (!empty($old)) {
    $nim            = $old['nim']            ?? $nim;
    $nama_lengkap   = $old['nama_lengkap']   ?? $nama_lengkap;
    $tempat_lahir   = $old['tempat_lahir']   ?? $tempat_lahir;
    $tanggal_lahir  = $old['tanggal_lahir']  ?? $tanggal_lahir;
    $hobi           = $old['hobi']           ?? $hobi;
    $pasangan       = $old['pasangan']       ?? $pasangan;
    $pekerjaan      = $old['pekerjaan']      ?? $pekerjaan;
    $nama_orang_tua = $old['nama_orang_tua'] ?? $nama_orang_tua;
    $nama_kakak     = $old['nama_kakak']     ?? $nama_kakak;
    $nama_adik      = $old['nama_adik']      ?? $nama_adik;
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Ini Header</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
      <nav>
        <ul>
          <li><a href="#home">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="biodata">
        <h2>Edit Biodata Mahasiswa</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        <form action="keren_update.php" method="POST">

          <input type="text" name="cid" value="<?= (int)$cid; ?>">

          <label for="txtNim"><span>NIM:</span>
            <input type="text" name="nim" value="<?= $nim ?>" 
              placeholder="Masukkan NIM" required autocomplete="NIM"
              value="<?= !empty($nim) ? $nim : '' ?>">
          </label>

          <label for="txtNamaLengkap"><span>Nama Lengkap:</span>
            <input type="text" name="nama_lengkap" value="<?= $nama_lengkap ?>" 
              placeholder="Masukkan Nama Lengkap" required autocomplete="Nama Lengkap"
              value="<?= !empty($nama_lengkap) ? $nama_lengkap : '' ?>">
          </label>

          <label for="txtTempatLahir"><span>Tempat Lahir:</span>
            <input type="text" name="tempat_lahir" value="<?= $tempat_lahir ?>"
             placeholder="Masukkan Tempat Lahir" required autocomplete="Tempat Lahir" 
              value="<?= !empty($tempat_lahir) ? $tempat_lahir : '' ?>">
          </label>

         <label for="txtTanggalLahir"><span>Tanggal Lahir:</span>
            <input type="text" name="tanggal_lahir" value="<?= $tanggal_lahir ?>"
              placeholder="Masukkan Tanggal Lahir" required autocomplete="Tanggal Lahir"
              value="<?= !empty($tanggal_lahir) ? $tanggal_lahir : '' ?>">
          </label>

          <label for="txtHobi"><span>Hobi:</span>
            <input type="text" name="hobi" value="<?= $hobi ?>"
              placeholder="Masukkan Hobi" required autocomplete="Hobi"
              value="<?= !empty($hobi) ? $hobi : '' ?>">
          </label>

          <label for="txtPasangan"><span>Pasangan:</span>
            <input type="text" name="pasangan" value="<?= $pasangan ?>"
               placeholder="Masukkan Pasangan" required autocomplete="Pasangan" 
              value="<?= !empty($pasangan) ? $pasangan : '' ?>">
          </label>

          <label for="txtPekerjaan"><span>Pekerjaan:</span>
            <input type="text" name="pekerjaan" value="<?= $pekerjaan ?>"
              placeholder="Masukkan Pekerjaan" required autocomplete="Pekerjaan"
              value="<?= !empty($pekerjaan) ? $pekerjaan : '' ?>">
          </label>

          <label for="txtNamaOrangTua"><span>Nama Orang Tua:</span>
            <input type="text" name="nama_orang_tua" value="<?= $nama_orang_tua ?>" 
              placeholder="Masukkan Nama Orang Tua" required autocomplete="Nama Orang Tua"
              value="<?= !empty($nama_orang_tua) ? $nama_orang_tua : '' ?>">
          </label>

          <label for="txtNamaKakak"><span>Nama Kakak:</span>
            <input type="text" name="nama_kakak" value="<?= $nama_kakak ?>" 
              placeholder="Masukkan Nama Kakak" required autocomplete="Nama Kakak"
              value="<?= !empty($nama_kakak) ? $nama_kakak : '' ?>">
          </label>

          <label for="txtAdik"><span>Nama Adik:</span>
            <input type="text" name="nama_adik" value="<?= $nama_adik ?>"
              placeholder="Masukkan Nama Adik" required autocomplete="Nama Adik"
              value="<?= !empty($nama_adik) ? $nama_adik : '' ?>">
          </label>

          

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="read_keren.php" class="reset">Kembali</a>
        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>