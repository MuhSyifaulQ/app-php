<?php
require_once 'config.php';

// Query untuk mendapatkan data mobil
$result = $mysqli->query("SELECT * FROM mobil");

// Tampilkan halaman HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Mobil</h2>
    <table>
        <tr>
            <th>Merk</th>
            <th>Nama</th>
            <th>Harga</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['merk']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['harga']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.php">Kembali</a>
</body>
</html>
