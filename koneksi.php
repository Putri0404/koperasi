<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
