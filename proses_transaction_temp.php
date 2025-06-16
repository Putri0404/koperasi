<?php
include "koneksi.php";

// Tambah transaksi
if ($_POST['aksi'] == 'tambah') {
    $tanggal = $_POST['tanggal'];
    $id_customer = $_POST['id_customer'];
    $id_item = $_POST['id_item'];
    $jumlah = $_POST['jumlah'];

    // Ambil harga item
    $query = mysqli_query($koneksi, "SELECT harga FROM item WHERE id_item = $id_item");
    $item = mysqli_fetch_assoc($query);
    $total = $item['harga'] * $jumlah;

    mysqli_query($koneksi, "INSERT INTO transaction_temp (tanggal, id_customer, id_item, jumlah, total) 
        VALUES ('$tanggal', '$id_customer', '$id_item', '$jumlah', '$total')");

    header("Location: transaction_temp.php");
    exit();
}

// Edit transaksi
if ($_POST['aksi'] == 'edit') {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $id_customer = $_POST['id_customer'];
    $id_item = $_POST['id_item'];
    $jumlah = $_POST['jumlah'];

    $query = mysqli_query($koneksi, "SELECT harga FROM item WHERE id_item = $id_item");
    $item = mysqli_fetch_assoc($query);
    $total = $item['harga'] * $jumlah;

    mysqli_query($koneksi, "UPDATE transaction_temp 
        SET tanggal='$tanggal', id_customer='$id_customer', id_item='$id_item', jumlah='$jumlah', total='$total'
        WHERE id_transaksi_temp=$id");

    header("Location: transaction_temp.php");
    exit();
}

// Hapus transaksi
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM transaction_temp WHERE id_transaksi_temp=$id");
    header("Location: transaction_temp.php");
    exit();
}
