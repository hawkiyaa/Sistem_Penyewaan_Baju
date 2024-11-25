<?php 
include 'koneksi.php'; // Menghubungkan ke database
session_start(); // Memulai sesi

// Memeriksa apakah sesi login ada
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Jika tidak ada sesi login, redirect ke login.php
    exit;
}

// Mengambil data pelanggan
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <style>
        /* Latar belakang halaman */
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

        /* Kontainer utama */
        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Latar belakang hitam transparan */
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(128, 0, 0, 0.5); /* Bayangan maroon */
            margin-top: 50px;
            width: 90%;
            max-width: 800px;
        }

        /* Judul halaman */
        h2 {
            color: #800000; /* Warna maroon */
            margin-bottom: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #ffffff; /* Warna teks putih */
        }

        table, th, td {
            border: 1px solid #444; /* Warna border abu-abu gelap */
        }

        th {
            background-color: #333; /* Header tabel abu-abu gelap */
            color: #800000; /* Teks header maroon */
            padding: 10px;
        }

        td {
            padding: 10px;
            background-color: rgba(50, 50, 50, 0.8); /* Latar belakang sel abu-abu transparan */
        }

        /* Tombol aksi dalam tabel (Edit dan Hapus) */
        .action-button {
            padding: 5px 10px;
            background-color: #800000; /* Latar belakang maroon */
            color: #ffffff; /* Teks putih */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s;
            text-decoration: none;
            margin-right: 5px; /* Spasi antar tombol */
        }

        .action-button:hover {
            background-color: #660000; /* Warna maroon lebih gelap saat hover */
        }

        /* Kontainer untuk tombol sejajar */
        .button-container {
            display: flex;
            justify-content: space-between; /* Menjaga tombol di sisi yang berbeda */
            align-items: center;
            margin-top: 20px;
        }

        /* Link di dalam kontainer tombol */
        .button-container a {
            text-decoration: none;
        }

        /* Tombol utama (Tambah Pelanggan dan Tampilkan Database) */
        button {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #800000; /* Latar belakang tombol maroon */
            color: #ffffff; /* Teks putih */
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #660000; /* Warna maroon lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pelanggan</h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $data['id_pelanggan'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['telepon'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                        <div style="display: flex; justify-content: center;">
                            <a href="edit_pelanggan.php?id=<?= $data['id_pelanggan'] ?>" class="action-button">Edit</a>
                            <a href="hapus_pelanggan.php?id=<?= $data['id_pelanggan'] ?>" class="action-button" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <!-- Link untuk menambah pelanggan dan tampilan database di sisi berlawanan -->
        <div class="button-container">
            <a href="tambah_pelanggan.php"><button type="button">Tambah Pelanggan</button></a>
            <a href="tampilan_database.php"><button type="button">Tampilkan Database</button></a>
        </div>
    </div>
</body>
</html>
