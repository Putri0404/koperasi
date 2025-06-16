<?php
include 'db.php';
$db = new db();

if (isset($_POST['submit'])) {
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];

    $insert = $db->conn->query("INSERT INTO customer (id_customer, nama_customer, alamat, telp, fax, email) 
        VALUES ('$id_customer', '$nama_customer', '$alamat', '$telp', '$fax', '$email')");

    if ($insert) {
        header("Location: customer.php");
        exit;
    } else {
        echo "Gagal menambahkan data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 500px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        input[type="su]()
