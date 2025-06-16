<?php
include "koneksi.php";

// Tambah
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_sales'];
    $wilayah = $_POST['wilayah'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "INSERT INTO sales (nama_sales, wilayah, no_hp, email) VALUES ('$nama', '$wilayah', '$no_hp', '$email')");
    header("Location: sales.php");
    exit();
}

// Edit
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_sales'];
    $wilayah = $_POST['wilayah'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "UPDATE sales SET nama_sales='$nama', wilayah='$wilayah', no_hp='$no_hp', email='$email' WHERE id_sales=$id");
    header("Location: sales.php");
    exit();
}

// Hapus
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM sales WHERE id_sales=$id");
    header("Location: sales.php");
    exit();
}
