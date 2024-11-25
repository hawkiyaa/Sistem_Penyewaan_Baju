<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Jika tidak ada sesi login, redirect ke login.php
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan</title>
    <style>
        /* Latar belakang halaman */
        body {
            background-image: url('pembayaran.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            color: #ffffff; /* Warna teks putih untuk kontras */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Tampilan utama dashboard */
        .dashboard-container {
            background-color: rgba(0, 0, 0, 0.85); /* Latar belakang hitam transparan */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 0px 30px rgba(128, 0, 0, 0.7); /* Bayangan maroon */
            text-align: center;
        }

        /* Judul dashboard */
        .dashboard-container h2 {
            color: #800000; /* Warna maroon */
            margin-bottom: 30px;
            font-size: 26px;
        }

        /* Link menu */
        .dashboard-container a {
            display: inline-block;
            padding: 12px;
            margin: 10px 5px;
            color: #ffffff;
            text-decoration: none;
            background-color: #333333; /* Warna abu-abu gelap */
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Hover efek */
        .dashboard-container a:hover {
            background-color: #800000; /* Maroon saat hover */
            transform: scale(1.05);
        }

        /* Logout khusus */
        .logout {
            color: #800000;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Dashboard Pelanggan</h2>
        <a href="baju_pelanggan.php">Ketersediaan Baju</a> <!-- Mengarahkan ke halaman ketersediaan baju -->
        <a href="logout.php" class="logout">Logout</a> <!-- Logout -->
    </div>
</body>
</html>