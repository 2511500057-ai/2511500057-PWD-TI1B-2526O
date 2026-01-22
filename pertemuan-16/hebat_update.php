<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_hebat.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
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
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE orang_hebat
                                SET kode_pengunjung = ?, nama_pengunjung = ?, alamat_rumah = ?, tanggal_kunjungan = ?, hobi = ?, asal_slta = ?, pekerjaan = ?, nama_orang_tua = ?, nama_pacar = ?, nama_mantan = ? 
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssssssssi", $kode_pengunjung, $nama_pengunjung, $alamat_rumah, $tanggal_kunjungan, $hobi, $asal_slta, $pekerjaan, $nama_orang_tua, $nama_pacar, $nama_mantan, $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read_keren.php'); #pola PRG: kembali ke data dan exit()
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

    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit.php?cid='. (int)$cid);