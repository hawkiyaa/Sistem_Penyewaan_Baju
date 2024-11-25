<?php
session_start();
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pastikan role yang benar (dalam hal ini 'pelanggan')
if (isset($_GET['role']) && $_GET['role'] == 'pelanggan') {
    $role = $_GET['role'];
} else {
    die("Role tidak valid.");
}

if (isset($_POST['daftar'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirm_password']);

    // Cek jika password dan konfirmasi password cocok
    if ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Cek apakah username sudah ada
        $query_check = "SELECT * FROM calon_pelanggan WHERE username='$username'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            $error = "Username sudah terdaftar, coba dengan username lain.";
        } else {
            // Masukkan data baru ke dalam tabel calon_pelanggan
            $query_insert = "INSERT INTO calon_pelanggan (username, password) VALUES ('$username', '$password')";
            $result_insert = mysqli_query($koneksi, $query_insert);

            if ($result_insert) {
                $_SESSION['role'] = 'pelanggan';
                $_SESSION['login'] = true;
                header("Location: login.php?role=pelanggan"); // Arahkan ke halaman login
                exit;
            } else {
                $error = "Terjadi kesalahan, coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggan</title>
    <style>
        body {
            background-image: url('login.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .login-form {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(128, 0, 0, 0.5);
            width: 320px;
            text-align: left;
        }
        .login-form h2 {
            color: #800000;
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form label {
            margin-top: 10px;
            display: block;
            color: #ffffff;
            font-size: 16px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #800000;
            border-radius: 4px;
            background-color: #333;
            color: #ffffff;
            font-size: 16px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #800000;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-form button:hover {
            background-color: #600000;
        }
        .error {
            color: #FF6347;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Daftar Pelanggan</h2>
        <form method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Konfirmasi Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit" name="daftar">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php?role=pelanggan">Login di sini</a></p>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
