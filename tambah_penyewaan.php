<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
    $id_baju = mysqli_real_escape_string($koneksi, $_POST['id_baju']);
    $tanggal_sewa = mysqli_real_escape_string($koneksi, $_POST['tanggal_sewa']);
    $tanggal_kembali = mysqli_real_escape_string($koneksi, $_POST['tanggal_kembali']);
    $total_harga = mysqli_real_escape_string($koneksi, $_POST['total_harga']);
    
    $query = "INSERT INTO penyewaan (id_pelanggan, id_baju, tanggal_sewa, tanggal_kembali, total_harga) VALUES ('$id_pelanggan', '$id_baju', '$tanggal_sewa', '$tanggal_kembali', '$total_harga')";
    mysqli_query($koneksi, $query);
    header("Location: penyewaan.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penyewaan</title>
    <style>
        body {
            background-image: url('penyewaan.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
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
        input[type="text"],
        input[type="date"] {
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
        <h2>Tambah Penyewaan</h2>
        <form method="POST">
            <div class="form-group">
                <label>ID Pelanggan:</label>
                <input type="number" name="id_pelanggan" required>
            </div>
            <div class="form-group">
                <label>ID Baju:</label>
                <input type="number" name="id_baju" required>
            </div>
            <div class="form-group">
                <label>Tanggal Sewa:</label>
                <input type="date" name="tanggal_sewa" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali" required>
            </div>
            <div class="form-group">
                <label>Total Harga:</label>
                <input type="number" name="total_harga" step="0.01" required>
            </div>
            <button type="submit" name="tambah">Tambah Penyewaan</button>
        </form>
    </div>
</body>
</html>
