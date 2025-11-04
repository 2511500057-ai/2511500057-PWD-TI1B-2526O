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