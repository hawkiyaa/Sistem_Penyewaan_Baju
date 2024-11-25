<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['edit'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama_baju = mysqli_real_escape_string($koneksi, $_POST['nama_baju']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $harga_sewa = mysqli_real_escape_string($koneksi, $_POST['harga_sewa']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);

    $query = "UPDATE baju SET nama_baju='$nama_baju', kategori='$kategori', harga_sewa='$harga_sewa', stok='$stok' WHERE id_baju='$id'";
    mysqli_query($koneksi, $query);
    header("Location: baju.php");
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = "SELECT * FROM baju WHERE id_baju='$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Baju</title>
    <style>
        body {
            background-image: url('baju.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            color: #ffffff;
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
        input[type="number"] {
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
        <h2>Edit Baju</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $data['id_baju'] ?>">
            <div class="form-group">
                <label>Nama Baju:</label>
                <input type="text" name="nama_baju" value="<?= $data['nama_baju'] ?>" required>
            </div>
            <div class="form-group">
                <label>Kategori:</label>
                <input type="text" name="kategori" value="<?= $data['kategori'] ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Sewa:</label>
                <input type="number" name="harga_sewa" step="0.01" value="<?= $data['harga_sewa'] ?>" required>
            </div>
            <div class="form-group">
                <label>Stok:</label>
                <input type="number" name="stok" value="<?= $data['stok'] ?>" required>
            </div>
            <button type="submit" name="edit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
