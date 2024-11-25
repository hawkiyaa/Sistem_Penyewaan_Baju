<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $id_penyewaan = mysqli_real_escape_string($koneksi, $_POST['id_penyewaan']);
    $jumlah_pembayaran = mysqli_real_escape_string($koneksi, $_POST['jumlah_pembayaran']);
    $metode_pembayaran = mysqli_real_escape_string($koneksi, $_POST['metode_pembayaran']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    
    $query = "INSERT INTO pembayaran (id_penyewaan, jumlah_pembayaran, metode_pembayaran, status) VALUES ('$id_penyewaan', '$jumlah_pembayaran', '$metode_pembayaran', '$status')";
    mysqli_query($koneksi, $query);
    header("Location: pembayaran.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran</title>
    <style>
        body {
            background-image: url('pembayaran.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            color: #ffffff; /* Warna teks putih */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Hitam transparan */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(128, 0, 0, 0.5); /* Bayangan maroon */
            margin-top: 50px;
            width: 90%;
            max-width: 600px;
            text-align: left; /* Align text to the left for labels */
        }
        h2 {
            color: #800000; /* Maroon */
            margin-bottom: 20px;
            text-align: center; /* Center the header */
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            margin-bottom: 5px;
            color: #ffffff; /* Warna putih untuk label */
            display: block; /* Display label as block to occupy full width */
        }
        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #444; /* Border abu-abu gelap */
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8); /* Putih transparan */
            color: #333; /* Warna teks hitam */
        }
        button {
            padding: 10px 20px;
            background-color: #800000; /* Maroon */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            align-self: flex-start; /* Align button to the left */
        }
        button:hover {
            background-color: #660000; /* Maroon lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Pembayaran</h2>
        <form method="POST">
            <div class="form-group">
                <label>ID Penyewaan:</label>
                <input type="number" name="id_penyewaan" required>
            </div>
            <div class="form-group">
                <label>Jumlah Pembayaran:</label>
                <input type="number" name="jumlah_pembayaran" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Metode Pembayaran:</label>
                <input type="text" name="metode_pembayaran" required>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <input type="text" name="status" required>
            </div>
            <button type="submit" name="tambah">Tambah Pembayaran</button>
        </form>
    </div>
</body>
</html>
