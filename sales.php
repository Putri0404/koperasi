<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM sales");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Sales</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Data Sales</h3>

    <!-- Form Tambah -->
    <form action="proses_sales.php" method="POST" class="row g-3">
      <input type="hidden" name="aksi" value="tambah">
      <div class="col-md-1">
        <input type="email" name="email" class="form-control" placeholder="ID">
      </div>
      <div class="col-md-3">
        <input type="text" name="nama_sales" class="form-control" placeholder="Tanggal" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="wilayah" class="form-control" placeholder="ID Costumer">
      </div>
      <div class="col-md-2">
        <input type="text" name="no_hp" class="form-control" placeholder="do number">
      </div>
      <div class="col-md-3">
        <input type="email" name="email" class="form-control" placeholder="status">
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
          <th>Tanggal</th>
          <th>ID Costumer</th>
          <th>do number</th>
          <th>status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $row['id_sales'] ?></td>
          <td><?= $row['tgl_sales'] ?></td>
          <td><?= $row['id_customer'] ?></td>
          <td><?= $row['do_number'] ?></td>
          <td><?= $row['status'] ?></td>
          <td>
            <a href="sales_edit.php?id=<?= $row['id_sales'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="proses_sales.php?aksi=hapus&id=<?= $row['id_sales'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
