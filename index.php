<?php
require_once 'config.php';
session_start();

// Pemeriksaan apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Jika pengguna mengklik tombol logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Hapus semua data sesi
    session_destroy();
    
    // Redirect ke halaman login
    header('Location: login.php');
    exit();
}

// Query untuk mendapatkan data mobil
$result = $mysqli->query("SELECT * FROM mobil");

// Periksa apakah query berhasil
if ($result === false) {
    die("Error executing the query: " . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Data Mobil</h2>
            <?php if (isset($_SESSION['username'])) : ?>
            <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
        </div>
        
        <a href="add.php">Tambah Data</a>

       <!-- ... (kode sebelumnya tetap sama) ... -->

    <?php
    // Periksa apakah ada data yang dikembalikan
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Merk</th><th>Nama</th><th>Harga</th><th>Aksi</th></tr>';
        
        // Tampilkan data
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['merk'] . '</td>';
            echo '<td>' . $row['nama'] . '</td>';
            echo '<td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>';
            echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a>';
            echo '<a href="delete.php?id=' . $row['id'] . '">Hapus</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data mobil.';
    }

    // Bebaskan hasil query
    $result->free_result();
    ?>

    <div class="logout">
        
            <a href="?action=logout">Logout</a>
        <?php endif; ?>
    </div>

</div>
</body>
</html>
