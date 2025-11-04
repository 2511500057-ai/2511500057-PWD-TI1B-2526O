<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <p>Ini contoh paragraf HTML.</p>
            <?php
            echo "<p>Halo Dunia</p>";
            echo "<p>Nama saya Steven Marcelino</p>";
            ?>
        </section>

        <section id="about">
            <h2>About Steven Marcelino &#128516;</h2>
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

            echo "<p><strong>NIM:</strong> $NIM</p>";
            echo "<p><strong>Nama Lengkap:</strong> $Nama_Lengkap &#128512;</p>";
            echo "<p><strong>Tempat Lahir:</strong> $Tempat_Lahir</p>";
            echo "<p><strong>Tanggal Lahir:</strong> $Tanggal_Lahir</p>";
            echo "<p><strong>Pekerjaan:</strong> $Pekerjaan</p>";
            echo "<p><strong>Pasangan:</strong> $Pasangan &hearts;</p>";
            echo "<p><strong>Nama Ayah:</strong> $Nama_Ayah</p>";
            echo "<p><strong>Nama Ibu:</strong> $Nama_Ibu</p>";
            echo "<p><strong>Nama Kakak:</strong> $Nama_Kakak</p>";
            echo "<p><strong>Nama Adik:</strong> $Nama_Adik</p>";
            ?>
        </section>
     <section id="ipk">
     <h2>Nilai Saya</h2>
    <?php
    $namaMatkul1    = "Algoritma dan Struktur Data";
    $sksMatkul1     = 4;
    $nilaiHadir1    = 90;
    $nilaiTugas1    = 80;
    $nilaiUTS1      = 80;
    $nilaiUAS1      = 70;

    $namaMatkul2    = "Agama";
    $sksMatkul2     = 2;
    $nilaiHadir2    = 70;
    $nilaiTugas2    = 85;
    $nilaiUTS2      = 75;
    $nilaiUAS2      = 80;

    $namaMatkul3    = "Matematika Diskrit";
    $sksMatkul3     = 3;
    $nilaiHadir3    = 85;
    $nilaiTugas3    = 75;
    $nilaiUTS3      = 85;
    $nilaiUAS3      = 90;

    $namaMatkul4    = "Bahasa Inggris";
    $sksMatkul4     = 3;
    $nilaiHadir4    = 95;
    $nilaiTugas4    = 80;
    $nilaiUTS4      = 85;
    $nilaiUAS4      = 88;

    $namaMatkul5    = "Pemrograman Web Dasar";
    $sksMatkul5     = 3;
    $nilaiHadir5    = 90;
    $nilaiTugas5    = 80;
    $nilaiUTS5      = 90;
    $nilaiUAS5      = 100;

    function hitungGrade($nilaiAkhir, $hadir) {
      if ($hadir < 70) return ['E', 0];
      if ($nilaiAkhir >= 91) return ['A', 4];
      if ($nilaiAkhir >= 81) return ['A-', 3.7];
      if ($nilaiAkhir >= 76) return ['B+', 3.3];
      if ($nilaiAkhir >= 71) return ['B', 3];
      if ($nilaiAkhir >= 66) return ['B-', 2.7];
      if ($nilaiAkhir >= 61) return ['C+', 2.3];
      if ($nilaiAkhir >= 56) return ['C', 2];
      if ($nilaiAkhir >= 51) return ['C-', 1.7];
      if ($nilaiAkhir >= 36) return ['D', 1];
      return ['E', 0];
    }

    $totalBobot = 0;
    $totalSKS = 0;

    for ($i = 1; $i <= 5; $i++) {
      $nilaiAkhir = (0.1 * ${"nilaiHadir$i"}) + (0.2 * ${"nilaiTugas$i"}) + (0.3 * ${"nilaiUTS$i"}) + (0.4 * ${"nilaiUAS$i"});
      list($grade, $mutu) = hitungGrade($nilaiAkhir, ${"nilaiHadir$i"});
      $bobot = $mutu * ${"sksMatkul$i"};
      $status = ($grade == "D" || $grade == "E") ? "Gagal" : "Lulus";

      echo "<p><strong>Nama Matakuliah ke-$i:</strong> ${"namaMatkul$i"}</p>";
      echo "<p><strong>SKS:</strong> ${"sksMatkul$i"}</p>";
      echo "<p><strong>Kehadiran:</strong> ${"nilaiHadir$i"}</p>";
      echo "<p><strong>Tugas:</strong> ${"nilaiTugas$i"}</p>";
      echo "<p><strong>UTS:</strong> ${"nilaiUTS$i"}</p>";
      echo "<p><strong>UAS:</strong> ${"nilaiUAS$i"}</p>";
      echo "<p><strong>Nilai Akhir:</strong> " . round($nilaiAkhir, 2) . "</p>";
      echo "<p><strong>Grade:</strong> $grade</p>";
      echo "<p><strong>Angka Mutu:</strong> $mutu</p>";
      echo "<p><strong>Bobot:</strong> $bobot</p>";
      echo "<p><strong>Status:</strong> $status</p>";
      echo "<hr>";

      $totalBobot += $bobot;
      $totalSKS += ${"sksMatkul$i"};
    }

    $IPK = $totalBobot / $totalSKS;

    echo "<p><strong>Total Bobot:</strong> $totalBobot</p>";
    echo "<p><strong>Total SKS:</strong> $totalSKS</p>";
    echo "<p><strong>IPK:</strong> " . round($IPK, 2) . "</p>";
    ?>
        </section>
        <section id="contact">
            <h2>Kontak Kami</h2>
           
            <form action="" method="GET">
                <label for="txtNama">Nama:</label>
                <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        
                <label for="txtEmail">Email:</label>
                <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
                
                <label for="txtPesan">Pesan:</label>
                <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
                <small id="charCount">0/200 karakter</small>
            </label>

                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
      </section>
    </main>
    <footer>
        <p>&copy; 2025 Steven Marcelino [2511500057]</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>