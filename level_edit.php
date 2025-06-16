<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM level WHERE id_level=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Level</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Level</h3>
    <form action="proses_level.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_level'] ?>">

      <div class="mb-3">
        <label>Nama Level</label>
        <input type="text" name="nama_level" class="form-control" value="<?= $row['nama_level'] ?>" required>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="level.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
