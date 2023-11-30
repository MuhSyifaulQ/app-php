<?php
require_once 'config.php';
require_once 'CarAdmin.php';
session_start();

// Pemeriksaan apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses tambah data (tambahkan sesuai kebutuhan)
    $merk = $_POST['merk'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Validasi input harga
    if (!is_numeric($harga)) {
        $error_message = "Harga hanya bisa diisi dengan angka.";
    } elseif ($harga > 1000000000) { // Maximum price limit is 1 trillion
        $error_message = "Harga melewati batas.";
    } else {
        $carAdmin = new CarAdmin($merk, $nama, $harga);

        // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        $insertQuery = "INSERT INTO mobil (merk, nama, harga) VALUES ('{$carAdmin->getMerk()}', '{$carAdmin->getNama()}', '{$carAdmin->getHarga()}')";

        $result = $mysqli->query($insertQuery);

        if ($result) {
            header('Location: index.php');
            exit();
        } else {
            $error_message = "Error: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mobil</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .add-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #f00;
            margin-top: 10px;
        }
    </style>
    <script>
        function validatePrice() {
            var harga = document.getElementById('harga').value;
            if (isNaN(harga) || harga > 1000000000) {
                document.getElementById('error-message').innerHTML = 'Harga melewati batas.';
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="add-container">
        <h2>Tambah Data Mobil</h2>
        <form method="post" action="" onsubmit="return validatePrice();">
            <label for="merk">Merk:</label>
            <input type="text" name="merk" required>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="harga">Harga:</label>
            <input type="text" name="harga" id="harga" required>

            <button type="submit">Tambah Data</button>
        </form>
        <p id="error-message" class="error"><?php if (isset($error_message)) echo $error_message; ?></p>
    </div>
</body>
</html>
