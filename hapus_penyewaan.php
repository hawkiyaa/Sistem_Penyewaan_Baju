<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "DELETE FROM penyewaan WHERE id_penyewaan='$id'";
    mysqli_query($koneksi, $query);
    header("Location: penyewaan.php");
    exit;
} else {
    header("Location: penyewaan.php");
    exit;
}
?>
