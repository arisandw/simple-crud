<?php
include "config/connection.php";

$id = $_GET['id'];
$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $fakultas = $_POST['fakultas'];
  $prodi = $_POST['prodi'];
  $semester = $_POST['semester'];
  $alamat = $_POST['alamat'];

  $sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', fakultas = '$fakultas', prodi = '$prodi', semester = '$semester', alamat = '$alamat' WHERE id = $id";
  if ($mysqli->query($sql)) {
    echo "<script>alert('Data Berhasil di edit'); window.location.href = 'index.php';</script>";
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
  <title>Edit Data</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <h1>Edit Data Mahasiswa</h1>
  <form method="POST" action="">
    <label>NIM:</label><br>
    <input type="number" name="nim" value="<?= $row['nim']; ?>" required><br>
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $row['nama']; ?>" required><br>
    <label>Fakultas:</label><br>
    <select name="fakultas">
    <option value="">--Pilih Fakultas--</option>
    <option value="Pascasarjana">Pascasarjana</option>
    <option value="Ilmu Komputer" <?= ($row['fakultas'] == 'Ilmu Komputer') ? 'selected' : ''; ?>>Ilmu Komputer</option>
      <option value="Ekonomi" <?= ($row['fakultas'] == 'Ekonomi') ? 'selected' : ''; ?>>Ekonomi</option>
      <option value="Hukum" <?= ($row['fakultas'] == 'Hukum') ? 'selected' : ''; ?>>Hukum</option>
    </select><br>
    </select>
    <label>Program Studi:</label><br>
    <select name="prodi">
    <option value="">--Pilih Program Studi--</option>
      <option value="S1 Teknik Informatika" <?= ($row['prodi'] == 'S1 Teknik Informatika') ? 'selected' : ''; ?>>S1 Teknik Informatika</option>
      <option value="S1 Sistem Informasi" <?= ($row['prodi'] == 'S1 Sistem Informasi') ? 'selected' : ''; ?>>S1 Sistem Informasi</option>
      <option value="S2 Teknik Informatika" <?= ($row['prodi'] == 'S2 Teknik Informatika') ? 'selected' : ''; ?>>S2 Teknik Informatika</option>
      <option value="S1 Akuntansi" <?= ($row['prodi'] == 'S1 Akuntansi') ? 'selected' : ''; ?>>S1 Akuntansi</option>
      <option value="S2 Akuntansi" <?= ($row['prodi'] == 'S2 Akuntansi') ? 'selected' : ''; ?>>S2 Akuntansi</option>
      <option value="S1 Hukum" <?= ($row['prodi'] == 'S1 Hukum') ? 'selected' : ''; ?>>S1 Hukum</option>
      <option value="S2 Hukum" <?= ($row['prodi'] == 'S2 Hukum') ? 'selected' : ''; ?>>S2 Hukum</option>
      <option value="S1 Manajemen" <?= ($row['prodi'] == 'S1 Manajemen') ? 'selected' : ''; ?>>S1 Manajemen</option>
      <option value="S2 Manajemen" <?= ($row['prodi'] == 'S2 Manajemen') ? 'selected' : ''; ?>>S2 Manajemen</option>
    </select><br>
    <label>Semester:</label><br>
    <input type="number" name="semester" value="<?= $row['semester']; ?>"><br>
    <label>Alamat:</label><br>
    <textarea name="alamat"><?= $row['alamat']; ?></textarea><br><br>
    <button type="submit">Update</button>
    <a href="index.php" class="btn-cancel">Cancel</a>
  </form>
</body>

</html>