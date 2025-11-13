<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;
?>

<!DOCTYPE html>
<html lang="en">

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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="entrydatamahasiswa">
       <h2>ENTRY DATA MAHASISWA</h2>
      <?php
            $NIM            = "2511500057";
            $Nama_Lengkap   = "Steven Marcelino";
            $Tempat_Lahir   = "Pangkalpinang";
            $Tanggal_Lahir  = "29 Maret 2007";
            $Pekerjaan      = "Mahasiswa";
            $Pasangan       = "Michelle";
            $Nama_Ayah      = "Niko Febrianto";
            $Nama_Ibu       = "Ervina";
            $Nama_Kakak     = "Shintya Desilia";
            $Nama_Adik      = "Akila Widya Lestari";
            ?>

        <label for="txtNIM"><span>NIM:</span>
          <input type="NIM" id="NIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="NIM">
        </label>

        <label for="txtNama Lengkap"><span>Nama Lengkap:</span>
          <input type="Nama Lengkap" id="txtNama Lengkap" name="txtNama Lengkap" placeholder="Nama Lengkap" required autocomplete="Nama Lengkap">
        </label>

         <label for="txtTempat Lahir"><span>Tempat Lahir:</span>
          <input type="Tempat Lahir" id="Tempat Lahir" name="txtTempat Lahir" placeholder="Masukkan Tempat Lahir" required autocomplete="Tempat Lahir">
        </label>

        <label for="txtTanggal Lahir"><span>Tanggal Lahir:</span>
          <input type="Tanggal Lahir" id="txtTanggal Lahir" name="txtTanggal Lahir" placeholder="Tanggal Lahir" required autocomplete="Tanggal Lahir">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="Pekerjaan" id="txtPekerjaan" name="txtPekerjaan" placeholder="Pekerjaan" required autocomplete="Pekerjaan">
        </label>

         <label for="txtPasangan"><span>Pasangan:</span>
          <input type="Pasangan" id="txtPasangan" name="txtPasangan" placeholder="Pasangan" required autocomplete="Pasangan">
        </label>

         <label for="txtNama_Ayah"><span>Nama_Ayah:</span>
          <input type="Nama_Ayah" id="txtNama_Ayah" name="txtNama_Ayah" placeholder="Nama_Ayah" required autocomplete="Nama_Ayah">
        </label>

        <label for="txtNama_Ibu"><span>Nama_Ibu:</span>
          <input type="Nama_Ibu" id="txtNama_Ibu" name="txtNama_Ibu" placeholder="Nama_Ibu" required autocomplete="Nama_Ibu">
        </label>

        <label for="txtNama_Kakak"><span>Nama_Kakak:</span>
          <input type="Nama_Kakak" id="txtNama_Kakak" name="txtNama_Kakak" placeholder="Nama_Kakak" required autocomplete="Nama_Kakak">
        </label>

        <label for="txtNama_Adik"><span>Nama_Adik:</span>
          <input type="Nama_Adik" id="txtNama_Adik" name="txtNama_Adik" placeholder="Nama_Adik" required autocomplete="Nama_Adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
      </section>

        
    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
      $tempat = "Jebus";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        echo $NIM;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        echo $Nama;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> <?php echo $tempat; ?></p>
      <p><strong>Tanggal Lahir:</strong> 1 Januari 2000</p>
      <p><strong>Hobi:</strong> Memasak, coding, dan bermain musik &#127926;</p>
      <p><strong>Pasangan:</strong> Belum ada &hearts;</p>
      <p><strong>Pekerjaan:</strong> Dosen di ISB Atma Luhur &copy; 2025</p>
      <p><strong>Nama Orang Tua:</strong> Bapak Setiawan dan Ibu Maria</p>
      <p><strong>Nama Kakak:</strong> Antonius Setiawan</p>
      <p><strong>Nama Adik:</strong> <?php echo $sespesan ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>