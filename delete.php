<?php
require_once 'config.php';

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Query untuk menghapus data mobil berdasarkan ID
$mysqli->query("DELETE FROM mobil WHERE id=$id");

// Redirect kembali ke halaman utama setelah menghapus data
header('Location: index.php');
exit();
?>
