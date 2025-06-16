<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");

// Cek koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk mencari user dengan username dan password yang sesuai
    $query = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_user'] = $user['nama_user'];
        $_SESSION['level'] = $user['level'];
        $_SESSION['status'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Koperasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 8px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2980b9;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1f5c87;
        }

        .error {
            background-color: #fdd;
            border: 1px solid #f99;
            color: #900;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-size: 14px;
        }

    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    <form method="POST">
        <div class="form-group">
            <label>Nama Pengguna</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="login">Masuk</button>
    </form>
</div>

</body>
</html>
