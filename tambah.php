<?php session_start(); if (!isset($_SESSION['login'])) header('Location: login.php'); include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Aktivitas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Tambah Aktivitas Olahraga</h2>
  <form method="post" action="">
    Nama: <input type="text" name="nama" required><br><br>
    Jenis Olahraga: <input type="text" name="jenis_olahraga" required><br><br>
    Durasi (menit): <input type="number" name="durasi" required><br><br>
    Tanggal: <input type="date" name="tanggal" required><br><br>
    <input type="submit" name="simpan" value="Simpan">
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis_olahraga'];
    $durasi = $_POST['durasi'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO aktivitas (nama, jenis_olahraga, durasi, tanggal) VALUES ('$nama', '$jenis', $durasi, '$tanggal')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<p>Data berhasil ditambahkan. <a href='index.php'>Lihat Data</a></p>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
  }
  ?>
</body>
</html>
