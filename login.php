<?php
session_start();
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Tangkap parameter role dari URL
if (isset($_GET['role'])) {
    $role = $_GET['role'];
} else {
    die("Role tidak ditentukan. Silakan kembali dan pilih peran.");
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    if ($role === 'admin') {
        // Query untuk login sebagai admin (menggunakan tabel users)
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'admin';
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah untuk admin!";
        }
    } elseif ($role === 'pelanggan') {
        // Query untuk login sebagai pembeli (menggunakan tabel pembeli)
        $query = "SELECT * FROM calon_pelanggan WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'pelanggan';
            header("Location: dashboard_pelanggan.php");
            exit;
        } else {
            $error = "Username atau password salah untuk pembeli!";
        }
    } else {
        $error = "Role tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        .login-form input[type="password"],
        .login-form select {
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
        <h2>Login</h2>
        <form method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="daftar.php?role=pelanggan">Daftar di sini</a></p>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>