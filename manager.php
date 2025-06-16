<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM manager");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Data Manager</h3>

    <!-- Form Tambah -->
    <form action="proses_manager.php" method="POST" class="row g-3">
      <input type="hidden" name="aksi" value="tambah">
      <div class="col-md-1">
        <input type="text" name="id_user" class="form-control" placeholder="ID" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="nama_user" class="form-control" placeholder="Nama">
      </div>
      <div class="col-md-3">
        <input type="text" name="username" class="form-control" placeholder="username">
      </div>
      <div class="col-md-3">
        <input type="text" name="password" class="form-control" placeholder="password">
      </div>
      <div class="col-md-1">
        <input type="text" name="level" class="form-control" placeholder="level" required>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped mt-4">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>username</th>
          <th>password</th>
          <th>level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $row['id_user'] ?></td>
          <td><?= $row['nama_user'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $row['password'] ?></td>
          <td><?= $row['level'] ?></td>
          <td>
            <a href="manager_edit.php?id=<?= $row['id_manager'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="proses_manager.php?aksi=hapus&id=<?= $row['id_manager'] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
