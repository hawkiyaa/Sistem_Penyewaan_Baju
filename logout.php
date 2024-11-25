<?php
session_start();

// Hapus semua session
session_unset();

// Hapus cookie sesi jika ada
session_destroy();

// Arahkan pengguna kembali ke halaman login
header("Location: pilih_login.php");
exit;
?>
