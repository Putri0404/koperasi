<?php
include "koneksi.php";
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM transaction WHERE id_transaksi = $id");
$row = mysqli_fetch_assoc($data);

$customer = mysqli_query($koneksi, "SELECT * FROM customer");
$item = mysqli_query($koneksi, "SELECT * FROM item");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3>Edit Transaksi</h3>
  <form action="proses_transaction.php" method="POST">
    <input type="hidden" name="aksi" value="edit">
    <input type="hidden" name="id" value="<?= $row['id_transaksi'] ?>">

    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal'] ?>" required>
    </div>

    <div class="mb-3">
      <label>Customer</label>
      <select name="id_customer" class="form-control" required>
        <?php while($c = mysqli_fetch_assoc($customer)): ?>
          <option value="<?= $c['id_customer'] ?>" <?= ($c['id_customer'] == $row['id_customer']) ? 'selected' : '' ?>>
            <?= $c['nama_customer'] ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Item</label>
      <select name="id_item" class="form-control" required>
        <?php while($i = mysqli_fetch_assoc($item)): ?>
          <option value="<?= $i['id_item'] ?>" <?= ($i['id_item'] == $row['id_item']) ? 'selected' : '' ?>>
            <?= $i['nama_item'] ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" value="<?= $row['jumlah'] ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="transaction.php" class="btn btn-secondary">Batal</a>
  </form>
</div>
</body>
</html>
