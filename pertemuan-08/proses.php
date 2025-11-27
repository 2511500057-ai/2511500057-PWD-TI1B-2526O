<?php
session_start();

if (isset($_POST["submit_data"])) {
  $_SESSION["NIM"] = $_POST["NIM"];
  $_SESSION["Nama_Lengkap"] = $_POST["Nama_Lengkap"];
  $_SESSION["Tempat_Lahir"] = $_POST["Tempat_Lahir"];
  $_SESSION["Tanggal_Lahir"] = $_POST["Tanggal_Lahir"];
  $_SESSION["Pekerjaan"] = $_POST["Pekerjaan"];
  $_SESSION["Pasangan"] = $_POST["Pasangan"];
  $_SESSION["Nama_Ayah"] = $_POST["Nama_Ayah"];
  $_SESSION["Nama_Ibu"] = $_POST["Nama_Ibu"];
  $_SESSION["Nama_Kakak"] = $_POST["Nama_Kakak"];
  $_SESSION["Nama_Adik"] = $_POST["Nama_Adik"];
}


if (isset($_POST["submit_contact"])) {
  $_SESSION["sesnama"] = $_POST["txtNama"];
  $_SESSION["sesemail"] = $_POST["txtEmail"];
  $_SESSION["sespesan"] = $_POST["txtPesan"];
}

header("Location: index.php");
exit();
?>