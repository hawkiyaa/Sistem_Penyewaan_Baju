<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Login</title>
    <style>
        body {
            background-image: url('login.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .choice-container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7); /* Background transparan */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(128, 0, 0, 0.5);
        }
        .choice-container h2 {
            color: #800000; /* Warna judul */
            font-size: 30px;
            margin-bottom: 20px;
        }
        .choice-button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .admin-button {
            background-color: #800000; /* Warna maroon untuk Admin */
            color: #fff;
        }
        .pelanggan-button {
            background-color: #007bff; /* Warna biru untuk Pelanggan */
            color: #fff;
        }
        .choice-button:hover {
            opacity: 0.8;
        }
        .error {
            color: #FF6347;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="choice-container">
        <h2>Pilih Login Sebagai</h2>
        <button class="choice-button admin-button" onclick="window.location.href='login.php?role=admin'">Login sebagai Admin</button>
        <button class="choice-button pelanggan-button" onclick="window.location.href='login.php?role=pelanggan'">Login sebagai Pelanggan</button>
    </div>
</body>
</html>
