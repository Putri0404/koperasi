<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM petugas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Petugas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Data Petugas</h3>

    <!-- Form Tambah -->
    <form action="proses_petugas.php" method="POST" class="row g-3">
      <input type="hidden" name="aksi" value="tambah">
      <div class="col-md-1">
        <input type="text" name="id_user" class="form-control" placeholder="ID" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="nama_petugas" class="form-control" placeholder="Nama" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <div class="col-md-2">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="col-md-2">
        <select name="level" class="form-control" required>
          <option value="">Pilih Level</option>
          <option value="admin">Admin</option>
          <option value="manager">Manager</option>
          <option value="kasir">Kasir</option>
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped mt-4">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Username</th>
          <th>password</th>
          <th>Level</th>
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
            <a href="petugas_edit.php?id=<?= $row['id_petugas'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="proses_petugas.php?aksi=hapus&id=<?= $row['id_petugas'] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
