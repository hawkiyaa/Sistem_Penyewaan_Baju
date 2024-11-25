<?php
include 'koneksi.php'; // Menghubungkan ke database
session_start(); // Memulai sesi

// Memeriksa apakah sesi login ada
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Jika tidak ada sesi login, redirect ke login.php
    exit;
}

// Proses hapus pelanggan
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "DELETE FROM pelanggan WHERE id_pelanggan='$id'";
    mysqli_query($koneksi, $query);
    header("Location: pelanggan.php"); // Redirect setelah menghapus pelanggan
    exit;
} else {
    header("Location: pelanggan.php"); // Redirect jika tidak ada ID yang diberikan
    exit;
}
?>
