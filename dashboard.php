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
    <title>Dashboard</title>
    <style>
        /* Latar belakang halaman menggunakan gambar */
        body {
            background-image: url('pembayaran.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            color: #ffffff; /* Warna teks putih untuk kontras */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center; /* Memastikan konten berada di tengah */
            align-items: center; /* Memastikan konten berada di tengah */
            height: 100vh;
            margin: 0;
        }

        /* Tampilan utama dashboard */
        .dashboard-container {
            background-color: rgba(0, 0, 0, 0.85); /* Latar belakang hitam transparan */
            padding: 40px; /* Padding untuk memberi ruang */
            border-radius: 15px; /* Meningkatkan sudut */
            box-shadow: 0px 0px 30px rgba(128, 0, 0, 0.7); /* Bayangan maroon */
            width: 90%; /* Menggunakan lebar penuh */
            max-width: 600px; /* Batas maksimum lebar */
            text-align: center; /* Menjaga teks di tengah */
        }

        /* Judul dashboard */
        .dashboard-container h2 {
            color: #800000; /* Warna maroon */
            margin-bottom: 30px; /* Jarak lebih besar dari menu */
            font-size: 30px; /* Ukuran font lebih kecil */
            white-space: nowrap; /* Mencegah teks terputus menjadi beberapa baris */
        }

        /* Link menu dashboard */
        .dashboard-container a {
            display: block;
            padding: 12px; /* Padding lebih besar */
            margin: 10px 0; /* Margin lebih besar untuk jarak antar menu */
            color: #ffffff; /* Warna teks putih */
            text-decoration: none;
            background-color: #333333; /* Warna abu-abu gelap */
            border-radius: 8px; /* Sudut membulat */
            font-weight: bold;
            font-size: 20px; /* Ukuran font lebih besar untuk menu */
            transition: background-color 0.3s, transform 0.3s; /* Efek transisi saat hover */
        }

        /* Hover efek pada link */
        .dashboard-container a:hover {
            background-color: #800000; /* Maroon saat hover */
            color: #ffffff; /* Teks putih saat hover */
            transform: scale(1.05); /* Sedikit efek zoom saat hover */
        }

        /* Logout link */
        .logout {
            margin-top: 20px;
            color: #800000; /* Warna maroon untuk logout */
            font-size: 20px; /* Ukuran font lebih besar untuk logout */
            font-weight: bold; /* Mencetak tebal */
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Selamat Datang di Sistem Penyewaan</h2>
        <a href="pelanggan.php">Kelola Pelanggan</a>
        <a href="baju.php">Kelola Baju</a>
        <a href="penyewaan.php">Kelola Penyewaan</a>
        <a href="pembayaran.php">Kelola Pembayaran</a>
        <a href="tampilan_database.php">Tampilkan Database</a>
        <a href="buat_pesanan.php">Calon Pelanggan</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
