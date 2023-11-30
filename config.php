<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Sesuaikan dengan username MySQL Anda
define('DB_PASS', '');     // Sesuaikan dengan password MySQL Anda (biasanya kosong)
define('DB_NAME', 'crud');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>