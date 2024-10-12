<?php
include "config/connection.php";

$sql = "SELECT * FROM mahasiswa";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <a href="add.php" class="btn-add">Tambah Data</a>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Program Studi</th>
        <th>Semester</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td style="text-align: center;"><?= $no++; ?></td>
          <td style="text-align: center;"><?= $row['nim']; ?></td>
          <td style="text-align: center;"><?= $row['nama']; ?></td>
          <td style="text-align: center;"><?= $row['fakultas']; ?></td>
          <td style="text-align: center;"><?= $row['prodi']; ?></td>
          <td style="text-align: center;"><?= $row['semester']; ?></td>
          <td style="text-align: center;"><?= $row['alamat']; ?></td>
          <td style="text-align: center;">
            <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
            <a href="delete.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>

</html>