<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM identitas WHERE id_identitas=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Identitas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Identitas</h3>
    <form action="proses_identitas.php" method="POST">
      <input type="hidden" name="aksi" value="edit">
      <input type="hidden" name="id" value="<?= $row['id_identitas'] ?>">
<div class="col-md-10">
  <label>Id identitas </label>
        <input type="text" name="id_identitas" class="form-control" placeholder="ID" required>
      </div>
      <div class="col-md-10">
        <label>nama identitas</label>
        <input type="text" name="nama_identitas" class="form-control" placeholder="Nama Identitas" required>
      </div>
      <div class="col-md-10">
        <label>badan hukum</label>
        <input type="text" name="badan_hukum" class="form-control" placeholder="badan hukum" required>
      </div>
      <div class="col-md-10">
        <label>npwp</label>
        <input type="text" name="npwp" class="form-control" placeholder="npwp" required>
      </div>
      <div class="col-md-10">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="col-md-10">
        <label>Url</label>
        <input type="text" name="url" class="form-control" placeholder="url" required>
      </div>
      <div class="col-md-10">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="alamat" required>
      </div>
      <div class="col-md-10">
        <label>telp</label>
        <input type="text" name="telp" class="form-control" placeholder="telp" required>
      </div>
      <div class="col-md-10">
        <label>Fax</label>
        <input type="text" name="fax" class="form-control" placeholder="fax" required>
      </div>
      <div class="col-md-10">
        <label>Rekening</label>
        <input type="text" name="rekening" class="form-control" placeholder="rekening" required>
      </div>
      <div class="col-md-10">
        <label>foto</label>
        <input type="text" name="foto" class="form-control" placeholder="foto" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan Perubahan</button>
      <a href="identitas.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
