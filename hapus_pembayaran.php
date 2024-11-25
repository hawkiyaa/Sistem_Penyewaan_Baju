<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "DELETE FROM pembayaran WHERE id_pembayaran='$id'";
    mysqli_query($koneksi, $query);
    header("Location: pembayaran.php");
    exit;
} else {
    header("Location: pembayaran.php");
    exit;
}
?>
