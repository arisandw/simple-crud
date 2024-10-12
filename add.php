<?php
include "config/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $fakultas = $_POST['fakultas'];
  $prodi = $_POST['prodi'];
  $semester = $_POST['semester'];
  $alamat = $_POST['alamat'];

  $sql = "INSERT INTO mahasiswa (nim, nama, fakultas, prodi, semester, alamat) VALUES ('$nim', '$nama', '$fakultas',
   '$prodi', '$semester','$alamat')";
  if ($mysqli->query($sql)) {
    echo "<script>alert('Data Berhasil disimpan'); window.location.href = 'index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <h1>Tambah Data Mahasiswa</h1>
  <form action="" method="POST">
    <label>NIM:</label><br>
    <input type="number" name="nim" required><br>
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>
    <label>Fakultas:</label><br>
    <select name="fakultas">
    <option value="">--Pilih Fakultas--</option>
    <option value="Pascasarjana">Pascasarjana</option>
    <option value="Ilmu Komputer">Ilmu Komputer</option>
      <option value="Ekonomi">Ekonomi</option>
      <option value="Hukum">Hukum</option>
    </select><br>
    </select>
    <label>Program Studi:</label><br>
    <select name="prodi">
    <option value="">--Pilih Program Studi--</option>
      <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
      <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
      <option value="S2 Teknik Informatika">S2 Teknik Informatika</option>
      <option value="S1 Akuntansi">S1 Akuntansi</option>
      <option value="S2 Akuntansi">S2 Akuntansi</option>
      <option value="S1 Hukum">S1 Hukum</option>
      <option value="S2 Hukum">S2 Hukum</option>
      <option value="S1 Manajemen">S1 Manajemen</option>
      <option value="S2 Manajemen">S2 Manajemen</option>
    </select><br>

    <label>Semester:</label><br>
    <input type="number" name="semester"><br>
    <label>Alamat:</label><br>
    <textarea name="alamat"></textarea><br><br>
    <button type="submit">Simpan</button>
    <a href="index.php" class="btn-cancel">Cancel</a>
    
  </form>
</body>

</html>