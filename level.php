<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM level");
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
  <title>Admin Panel</title>
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
    <a href="identitas.php" class="nav-link "><i class="bi bi-card-text"></i> Identitas</a>
    <a href="./item.php" class="nav-link"><i class="bi bi-box-seam"></i> Item</a>
    <a href="level.php" class="nav-link active"><i class="bi bi-person-badge"></i> Level</a>
    <a href="manager.php" class="nav-link"><i class="bi bi-person-badge"></i> Manager</a>
    <a href="petugas.php" class="nav-link"><i class="bi bi-person-check"></i> Petugas</a>
    <a href="sales.php" class="nav-link"><i class="bi bi-graph-up"></i> Sales</a>
    <a href="transaction.php" class="nav-link"><i class="bi bi-cash-stack"></i> Transaction</a>
    <a href="logout.php" class="nav-link"><i class="bi bi-hourglass-split"></i> Logout</a>
  </div>

  <!-- Topbar -->
  <div class="topbar">
    <h5 class="m-0">Dashboard</h5>
  </div>

  <!-- Main Content -->
  <div class="main-content">
   
   
   <div class="container mt-5">
    <h3>Data Level</h3>

    <!-- Form Tambah -->
    <form action="proses_level.php" method="POST" class="row g-3">
      <input type="hidden" name="aksi" value="tambah">
      <div class="col-md-2">
        <input type="text" name="id_level" class="form-control" placeholder="ID" required>
      </div>
      <div class="col-md-8">
        <input type="text" name="nama_level" class="form-control" placeholder="Nama Level" required>
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
          <th>level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $row['id_level'] ?></td>
          <td><?= $row['level'] ?></td>
          <td>
            <a href="level_edit.php?id=<?= $row['id_level'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="proses_level.php?aksi=hapus&id=<?= $row['id_level'] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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


 

 


 
