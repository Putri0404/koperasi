<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM manager WHERE id_manager=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Data Manager</h3>
    <form action="proses_manager.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_manager'] ?>">
<div class="col-md-10">
  <label>ID user</label>
        <input type="text" name="id_user" class="form-control" placeholder="ID" required>
      </div>
      <div class="col-md-10">
        <label>Nama</label>
        <input type="text" name="nama_user" class="form-control" placeholder="Nama">
      </div>
      <div class="col-md-10">
        <label>username</label>
        <input type="text" name="username" class="form-control" placeholder="username">
      </div>
      <div class="col-md-10">
        <label>password</label>
        <input type="text" name="password" class="form-control" placeholder="password">
      </div>
      <div class="col-md-10">
        <label>level</label>
        <input type="text" name="level" class="form-control" placeholder="level" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="manager.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
