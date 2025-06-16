<?php
include "koneksi.php";

// TAMBAH
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    mysqli_query($koneksi, "INSERT INTO customer (nama_customer, alamat, telp) VALUES ('$nama', '$alamat', '$telp')");
    header("Location: customer.php");
    exit();
}

// EDIT
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    mysqli_query($koneksi, "UPDATE customer SET nama_customer='$nama', alamat='$alamat', telp='$telp' WHERE id_customer=$id");
    header("Location: customer.php");
    exit();
}

// HAPUS
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM customer WHERE id_customer=$id");
    header("Location: customer.php");
    exit();
}
