<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM penyewaan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Penyewaan</title>
    <style>
        /* Latar belakang halaman */
        body {
            background-image: url('penyewaan.jpg'); /* Ganti dengan gambar latar Anda */
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

        /* Kontainer utama */
        .container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(128, 0, 0, 0.5);
            margin-top: 50px;
            width: 90%;
            max-width: 1000px;
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
            background-color: #333;
            color: #800000;
            padding: 10px;
        }

        td {
            padding: 10px;
            background-color: rgba(50, 50, 50, 0.8);
        }

        /* Tombol aksi dalam tabel (Edit dan Hapus) */
        .action-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .action-button {
            padding: 5px 15px;
            background-color: #800000; /* Maroon */
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .action-button:hover {
            background-color: #660000;
        }

        /* Kontainer untuk tombol sejajar */
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        /* Tombol utama */
        button {
            padding: 10px 20px;
            background-color: #800000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #660000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Penyewaan</h2>
        
        <table>
            <tr>
                <th>ID Penyewaan</th>
                <th>ID Pelanggan</th>
                <th>ID Baju</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $data['id_penyewaan'] ?></td>
                    <td><?= $data['id_pelanggan'] ?></td>
                    <td><?= $data['id_baju'] ?></td>
                    <td><?= $data['tanggal_sewa'] ?></td>
                    <td><?= $data['tanggal_kembali'] ?></td>
                    <td><?= $data['total_harga'] ?></td>
                    <td>
                        <div class="action-container">
                            <a href="edit_penyewaan.php?id=<?= $data['id_penyewaan'] ?>" class="action-button">Edit</a>
                            <a href="hapus_penyewaan.php?id=<?= $data['id_penyewaan'] ?>" class="action-button" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <div class="button-container">
            <a href="tambah_penyewaan.php"><button type="button">Tambah Penyewaan</button></a>
            <a href="tampilan_database.php"><button type="button">Tampilkan Database</button></a>
        </div>
    </div>
</body>
</html>
