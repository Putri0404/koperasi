<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Customer</h3>
    <form action="proses.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_customer'] ?>">
      <div class="mb-3">
        <label>Nama Customer</label>
        <input type="text" name="nama_customer" class="form-control" value="<?= $row['nama_customer'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Telp</label>
        <input type="text" name="telp" class="form-control" value="<?= $row['telp'] ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan Perubahan</button>
      <a href="customer.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
