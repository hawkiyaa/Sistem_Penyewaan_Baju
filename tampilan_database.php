<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Define the tables you want to display
$tables = [
    'pelanggan' => 'Data Pelanggan',
    'baju' => 'Data Baju',
    'penyewaan' => 'Data Penyewaan',
    'pembayaran' => 'Data Pembayaran'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampilan Database</title>
    <style>
        body {
            background-image: url('login.jpg'); /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            color: #ffffff;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            color: #800000; /* Maroon */
            margin: 20px 0;
        }
        .table-container {
            margin: 20px 0;
            background-color: rgba(0, 0, 0, 0.7); /* Hitam transparan */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(128, 0, 0, 0.5); /* Bayangan maroon */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
            color: #ffffff;
        }
        th {
            background-color: #800000; /* Maroon */
            color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Data dalam Database</h1>
    <a href="dashboard.php" style="color: #800000; text-decoration: none;">Kembali ke Dashboard</a><br><br>

    <?php foreach ($tables as $table => $title): ?>
        <div class="table-container">
            <h1><?= $title ?></h1>
            <table>
                <tr>
                    <?php
                    // Fetch the column names for the table
                    $columnsQuery = "SHOW COLUMNS FROM $table";
                    $columnsResult = mysqli_query($koneksi, $columnsQuery);
                    while ($col = mysqli_fetch_assoc($columnsResult)) {
                        echo "<th>" . $col['Field'] . "</th>";
                    }
                    ?>
                </tr>
                <?php
                // Fetch the data rows for the table
                $dataQuery = "SELECT * FROM $table";
                $dataResult = mysqli_query($koneksi, $dataQuery);
                while ($row = mysqli_fetch_assoc($dataResult)): ?>
                    <tr>
                        <?php foreach ($row as $data): ?>
                            <td><?= $data ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    <?php endforeach; ?>
</body>
</html>
