<?php
include "koneksi.php";

// Tambah
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_manager'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO manager (nama_manager, email, no_telp, alamat) VALUES ('$nama', '$email', '$no_telp', '$alamat')");
    header("Location: manager.php");
    exit();
}

// Edit
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_manager'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE manager SET nama_manager='$nama', email='$email', no_telp='$no_telp', alamat='$alamat' WHERE id_manager=$id");
    header("Location: manager.php");
    exit();
}

// Hapus
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM manager WHERE id_manager=$id");
    header("Location: manager.php");
    exit();
}
