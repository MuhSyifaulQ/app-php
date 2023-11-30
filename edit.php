<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $merk = $_POST['merk'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Query untuk mengupdate data mobil
    $mysqli->query("UPDATE mobil SET merk='$merk', nama='$nama', harga=$harga WHERE id=$id");

    // Redirect kembali ke halaman utama setelah mengupdate data
    header('Location: index.php');
    exit();
}

// Ambil data mobil berdasarkan ID
$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM mobil WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Mobil</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <label for="merk">Merk:</label>
        <input type="text" name="merk" value="<?= $row['merk']; ?>" required>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $row['nama']; ?>" required>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="<?= $row['harga']; ?>" required>

        <button type="submit">Simpan Perubahan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
