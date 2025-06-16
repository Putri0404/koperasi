<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM identitas");
?>





  <?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Koperasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #343a40;
      padding-top: 60px;
    }

    .sidebar a {
      color: #ddd;
      padding: 15px;
      display: block;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #495057;
      color: #fff;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
    }

    .sidebar .nav-link.active {
      background-color: #0d6efd;
      color: white;
    }

    .sidebar .nav-link i {
      margin-right: 10px;
    }

    .topbar {
      height: 60px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      position: fixed;
      left: 250px;
      right: 0;
      top: 0;
      z-index: 1030;
      display: flex;
      align-items: center;
      padding: 0 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column">
    <h4 class="text-white text-center">Koperasi</h4>
    <a href="customer.php" class="nav-link "><i class="bi bi-people"></i> Customer</a>
    <a href="identitas.php" class="nav-link active"><i class="bi bi-card-text"></i> Identitas</a>
    <a href="./item.php" class="nav-link"><i class="bi bi-box-seam"></i> Item</a>
    <a href="level.php" class="nav-link"><i class="bi bi-person-badge"></i> Level</a>
    <a href="manager.php" class="nav-link"><i class="bi bi-person-badge"></i> Manager</a>
    <a href="petugas.php" class="nav-link"><i class="bi bi-person-check"></i> Petugas</a>
    <a href="sales.php" class="nav-link"><i class="bi bi-graph-up"></i> Sales</a>
    <a href="transaction.php" class="nav-link"><i class="bi bi-cash-stack"></i> Transaction</a>
    <a href="logout.php" class="nav-link"><i class="bi bi-hourglass-split"></i> logout</a>
  </div>

  <!-- Topbar -->
  <div class="topbar">
    <h5 class="m-0">Dashboard</h5>
  </div>

  <!-- Main Content -->
  <div class="main-content">
   
   <div class="container mt-5">
    <h3>Data Identitas</h3>

    <!-- Form Tambah -->
    <form action="proses_identitas.php" method="POST" class="row g-3">
      <input type="hidden" name="aksi" value="tambah">
      <div class="col-md-1">
        <input type="text" name="id_identitas" class="form-control" placeholder="ID" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="nama_identitas" class="form-control" placeholder="Nama Identitas" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="badan_hukum" class="form-control" placeholder="badan hukum" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="npwp" class="form-control" placeholder="npwp" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="col-md-1">
        <input type="text" name="url" class="form-control" placeholder="url" required>
      </div>
      <div class="col-md-1">
        <input type="text" name="alamat" class="form-control" placeholder="alamat" required>
      </div>
      <div class="col-md-1">
        <input type="text" name="telp" class="form-control" placeholder="telp" required>
      </div>
      <div class="col-md-1">
        <input type="text" name="fax" class="form-control" placeholder="fax" required>
      </div>
      <div class="col-md-1">
        <input type="text" name="rekening" class="form-control" placeholder="rekening" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="foto" class="form-control" placeholder="foto" required>
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
          <th>Identitas</th>
          <th>badan hukum</th>
          <th>npwp</th>
          <th>Email</th>
          <th>url</th>
          <th>alamat</th>
          <th>telp</th>
          <th>fax</th>
          <th>rekening</th>
          <th>foto</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $row['id_identitas'] ?></td>
          <td><?= $row['nama_identitas'] ?></td>
          <td><?= $row['badan_hukum'] ?></td>
          <td><?= $row['npwp'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['url'] ?></td>
          <td><?= $row['alamat'] ?></td>
          <td><?= $row['telp'] ?></td>
          <td><?= $row['fax'] ?></td>
          <td><?= $row['rekening'] ?></td>
          <td><?= $row['foto'] ?></td>
          <td>
            <a href="identitas_edit.php?id=<?= $row['id_identitas'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="proses_identitas.php?aksi=hapus&id=<?= $row['id_identitas'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  </div>

  <!-- Bootstrap JS (Optional if using dropdowns etc.) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


 

