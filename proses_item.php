<?php
include "koneksi.php";

// Tambah
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_item'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "INSERT INTO item (nama_item, satuan, harga) VALUES ('$nama', '$satuan', '$harga')");
    header("Location: item.php");
    exit();
}

// Edit
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_item'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "UPDATE item SET nama_item='$nama', satuan='$satuan', harga='$harga' WHERE id_item=$id");
    header("Location: item.php");
    exit();
}

// Hapus
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM item WHERE id_item=$id");
    header("Location: item.php");
    exit();
}
