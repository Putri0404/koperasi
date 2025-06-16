<?php
include "koneksi.php";

// Ambil data transaksi sementara
$transaksi_temp = mysqli_query($koneksi, "SELECT t.*, c.nama_customer, i.nama_item 
    FROM transaction_temp t 
    JOIN customer c ON t.id_customer = c.id_customer 
    JOIN item i ON t.id_item = i.id_item");

// Ambil data customer & item untuk dropdown
$customer = mysqli_query($koneksi, "SELECT * FROM customer");
$item = mysqli_query($koneksi, "SELECT * FROM item");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transaksi Sementara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3>Transaksi Sementara</h3>

  <!-- Form Tambah -->
  <form action="proses_transaction_temp.php" method="POST" class="row g-3">
    <input type="hidden" name="aksi" value="tambah">

    <div class="col-md-2">
      <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="col-md-3">
      <select name="id_customer" class="form-control" required>
        <option value="">Pilih Customer</option>
        <?php while($c = mysqli_fetch_assoc($customer)): ?>
          <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="col-md-3">
      <select name="id_item" class="form-control" required>
        <option value="">Pilih Item</option>
        <?php while($i = mysqli_fetch_assoc($item)): ?>
          <option value="<?= $i['id_item'] ?>"><?= $i['nama_item'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="col-md-2">
      <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
    </div>

    <div class="col-md-2">
      <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>

  <!-- Tabel Transaksi Sementara -->
  <table class="table table-bordered table-striped mt-4">
    <thead class="table-dark">
      <tr>
        <th>id transasksi</th>
        <th>id item</th>
        <th>quantity</th>
        <th>price</th>
        <th>amount</th>
        <th>session id</th>
        <th>remark</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($transaksi_temp)): ?>
      <tr>
        <td><?= $row['id_transaksi'] ?></td>
        <td><?= $row['id_item'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['amount'] ?></td>
        <td><?= $row['session_id'] ?></td>
        <td><?= $row['remark'] ?></td>
        <td><?= number_format($row['total'], 0, ',', '.') ?></td>
        <td>
          <a href="transaction_temp_edit.php?id=<?= $row['id_transaksi_temp'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="proses_transaction_temp.php?aksi=hapus&id=<?= $row['id_transaksi_temp'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
