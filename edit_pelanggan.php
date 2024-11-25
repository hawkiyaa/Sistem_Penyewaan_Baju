<?php
include 'koneksi.php'; // Menghubungkan ke database
session_start(); // Memulai sesi

// Memeriksa apakah sesi login ada
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Jika tidak ada sesi login, redirect ke login.php
    exit;
}

// Memproses edit pelanggan
if (isset($_POST['edit'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $query = "UPDATE pelanggan SET nama='$nama', email='$email', telepon='$telepon', alamat='$alamat' WHERE id_pelanggan='$id'";
    mysqli_query($koneksi, $query);
    header("Location: pelanggan.php"); // Redirect setelah mengedit pelanggan
}

// Mengambil data pelanggan berdasarkan ID
$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = "SELECT * FROM pelanggan WHERE id_pelanggan='$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <style>
        body {
            background-image: url('pelanggan.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
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
        input[type="text"],
        input[type="email"] {
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
        <h2>Edit Pelanggan</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $data['id_pelanggan'] ?>">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?= $data['email'] ?>" required>
            </div>
            <div class="form-group">
                <label>Telepon:</label>
                <input type="text" name="telepon" value="<?= $data['telepon'] ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required>
            </div>
            <button type="submit" name="edit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
