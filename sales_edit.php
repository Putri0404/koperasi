<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM sales WHERE id_sales=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Sales</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Data Sales</h3>
    <form action="proses_sales.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_sales'] ?>">

      <div class="mb-3">
        <label>Nama Sales</label>
        <input type="text" name="nama_sales" class="form-control" value="<?= $row['nama_sales'] ?>" required>
      </div>

      <div class="mb-3">
        <label>Wilayah</label>
        <input type="text" name="wilayah" class="form-control" value="<?= $row['wilayah'] ?>">
      </div>

      <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" value="<?= $row['no_hp'] ?>">
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="sales.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
