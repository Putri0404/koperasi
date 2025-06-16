<?php
include "koneksi.php";

// Tambah
if ($_POST['aksi'] == 'tambah') {
    $nama = $_POST['nama_instansi'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['no_telp'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "INSERT INTO identitas (nama_instansi, alamat, no_telp, email) VALUES ('$nama', '$alamat', '$telp', '$email')");
    header("Location: identitas.php");
    exit();
}

// Edit
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama_instansi'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['no_telp'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "UPDATE identitas SET nama_instansi='$nama', alamat='$alamat', no_telp='$telp', email='$email' WHERE id_identitas=$id");
    header("Location: identitas.php");
    exit();
}

// Hapus
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM identitas WHERE id_identitas=$id");
    header("Location: identitas.php");
    exit();
}
