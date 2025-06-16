<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM item WHERE id_item=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Item</h3>
    <form action="proses_item.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_item'] ?>">

      <div class="mb-3">
        <label>Nama Item</label>
        <input type="text" name="nama_item" class="form-control" value="<?= $row['nama_item'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Satuan</label>
        <input type="text" name="satuan" class="form-control" value="<?= $row['satuan'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Harga</label>
        <input type="number" step="0.01" name="harga" class="form-control" value="<?= $row['harga'] ?>" required>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="item.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
