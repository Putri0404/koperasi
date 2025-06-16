<?php
include "koneksi.php";

// Tambah
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];

    mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");
    header("Location: petugas.php");
    exit();
}

// Edit
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $level = $_POST['level'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama', username='$username', password='$password', level='$level' WHERE id_petugas=$id");
    } else {
        mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama', username='$username', level='$level' WHERE id_petugas=$id");
    }

    header("Location: petugas.php");
    exit();
}

// Hapus
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas=$id");
    header("Location: petugas.php");
    exit();
}
