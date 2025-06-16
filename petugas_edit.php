<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Petugas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Data Petugas</h3>
    <form action="proses_petugas.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_petugas'] ?>">

      <div class="mb-3">
        <label>Nama Petugas</label>
        <input type="text" name="nama_petugas" class="form-control" value="<?= $row['nama_petugas'] ?>" required>
      </div>

      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" required>
      </div>

      <div class="mb-3">
        <label>Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="mb-3">
        <label>Level</label>
        <select name="level" class="form-control" required>
          <option value="admin" <?= $row['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
          <option value="manager" <?= $row['level'] == 'manager' ? 'selected' : '' ?>>Manager</option>
          <option value="kasir" <?= $row['level'] == 'kasir' ? 'selected' : '' ?>>Kasir</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="petugas.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
