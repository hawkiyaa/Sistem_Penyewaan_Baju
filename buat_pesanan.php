<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Query untuk mengambil data baju dari database
$query = "SELECT * FROM rencana_pemesanan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pelanggan yang Membuat Pesanan</title>
    <style>
        /* Latar belakang halaman */
        body {
            background-image: url('baju.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            color: #ffffff;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            text-align: center;
        }

        /* Kontainer utama */
        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Hitam transparan */
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(128, 0, 0, 0.5); /* Bayangan maroon */
            margin-top: 50px;
            width: 90%;
            max-width: 800px;
        }

        /* Judul halaman */
        h2 {
            color: #800000; /* Maroon */
            margin-bottom: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #ffffff;
        }

        table, th, td {
            border: 1px solid #444; /* Border abu-abu gelap */
        }

        th {
            background-color: #333; /* Header tabel abu-abu gelap */
            color: #800000; /* Maroon */
            padding: 10px;
        }

        td {
            padding: 10px;
            background-color: rgba(50, 50, 50, 0.8); /* Latar belakang sel abu-abu transparan */
        }

        /* Tombol aksi dalam tabel (Edit dan Hapus) */
        .action-button {
            padding: 5px 10px;
            background-color: #800000; /* Maroon */
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s;
            text-decoration: none;
            margin-right: 5px; /* Spasi antar tombol */
        }

        .action-button:hover {
            background-color: #660000; /* Maroon lebih gelap saat hover */
        }

        /* Kontainer untuk tombol sejajar */
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        /* Link di dalam kontainer tombol */
        .button-container a {
            text-decoration: none;
        }

        /* Tombol utama (Tambah Baju dan Tampilkan Database) */
        button {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #800000; /* Maroon */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #660000; /* Maroon lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pelanggan yang Membuat Pesanan</h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Baju</th>
                <th>Sewa Berapa Hari</th>
                <th>Fitting</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['baju'] ?></td>
                    <td><?= $data['sewa_berapa_hari'] ?></td>
                    <td><?= $data['fitting'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['telepon'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                        <div style="display: flex; justify-content: center;">
                            <a href="hapus_buat_pesanan.php?id=<?= $data['id'] ?>" class="action-button" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

    </div>
</body>
</html>
