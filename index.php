<?php
session_start();
if (!isset($_SESSION['login'])) header('Location: login.php');
include "config.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Aktivitas Olahraga</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header>
      <h2>📋 Daftar Aktivitas Olahraga</h2>
      <div class="top-menu">
        <a href="tambah.php" class="btn">+ Tambah Aktivitas</a>
        <a href="logout.php" class="btn-logout">Logout</a>
      </div>
    </header>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jenis Olahraga</th>
          <th>Durasi</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM aktivitas ORDER BY tanggal DESC";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($result)) {
          echo "<tr>
            <td>$no</td>
            <td>{$data['nama']}</td>
            <td>{$data['jenis_olahraga']}</td>
            <td>{$data['durasi']} menit</td>
            <td>{$data['tanggal']}</td>
            <td><a href='hapus.php?id={$data['id']}' class='btn-danger' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a></td>
          </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
