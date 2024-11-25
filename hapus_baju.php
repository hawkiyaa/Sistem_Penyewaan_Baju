<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "DELETE FROM baju WHERE id_baju='$id'";
    mysqli_query($koneksi, $query);
    header("Location: baju.php");
    exit;
} else {
    header("Location: baju.php");
    exit;
}
?>
