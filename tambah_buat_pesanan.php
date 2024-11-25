<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Query untuk mengambil data baju dari database
$query = "SELECT * FROM baju";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buat Pesanan</title>
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

        /* Form input */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            margin-bottom: 5px;
            color: #ffffff;
            display: block;
        }

        select, input[type="text"], input[type="number"], input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
        }

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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #ffffff;
        }

        table, th, td {
            border: 1px solid #444;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Buat Pesanan</h2>

        <!-- Form untuk membuat pesanan -->
        <form method="POST">
            <div class="form-group">
                <label for="baju">Pilih Baju:</label>
                <select name="baju" id="baju" required>
                    <option value="">Pilih Baju</option>
                    <?php while ($data = mysqli_fetch_assoc($result)): ?>
                        <option value="<?= $data['id_baju'] ?>"><?= $data['nama_baju'] ?> - <?= $data['kategori'] ?> - Rp <?= number_format($data['harga_sewa'], 0, ',', '.') ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sewa_berapa_hari">Sewa Berapa Hari:</label>
                <input type="number" name="sewa_berapa_hari" required>
            </div>
            <div class="form-group">
                <label for="fitting">Fitting (Tanggal dan Waktu):</label>
                <input type="datetime-local" name="fitting" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" name="telepon">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat">
            </div>
            <button type="submit" name="tambah">Buat Pesanan</button>
        </form>

        <?php
        if (isset($_POST['tambah'])) {
            // Escape input untuk mencegah SQL injection
            $baju = mysqli_real_escape_string($koneksi, $_POST['baju']);
            $sewa_berapa_hari = mysqli_real_escape_string($koneksi, $_POST['sewa_berapa_hari']);
            $fitting = mysqli_real_escape_string($koneksi, $_POST['fitting']);
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $email = mysqli_real_escape_string($koneksi, $_POST['email']);
            $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
            
            // Query untuk memasukkan data ke tabel rencana_pemesanan
            $query = "INSERT INTO rencana_pemesanan (baju, sewa_berapa_hari, fitting, nama, email, telepon, alamat) 
                      VALUES ('$baju', '$sewa_berapa_hari', '$fitting', '$nama', '$email', '$telepon', '$alamat')";
            
            if (mysqli_query($koneksi, $query)) {
                echo "<p>Pesanan telah dibuat! <a href='baju_pelanggan.php'>Kembali ke halaman ketersediaan baju</a></p>";
            } else {
                echo "Gagal menambahkan data: " . mysqli_error($koneksi);
            }
        }
        ?>
    </div>
</body>
</html>
