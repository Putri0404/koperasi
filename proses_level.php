<?php
include "koneksi.php";

// Tambah
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_level'];
    mysqli_query($koneksi, "INSERT INTO level (nama_level) VALUES ('$nama')");
    header("Location: level.php");
    exit();
}

// Edit
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_level'];
    mysqli_query($koneksi, "UPDATE level SET nama_level='$nama' WHERE id_level=$id");
    header("Location: level.php");
    exit();
}

// Hapus
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM level WHERE id_level=$id");
    header("Location: level.php");
    exit();
}
