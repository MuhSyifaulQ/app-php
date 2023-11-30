<?php

require_once 'Mobil.php';

class CarAdmin extends Mobil {
    private $isAdmin;

    public function __construct($merk, $nama, $harga) {
        parent::__construct($merk, $nama, $harga);
        $this->isAdmin = true; // Misalnya, kita anggap semua admin mobil memiliki isAdmin = true
    }

    public function isAdmin() {
        return $this->isAdmin;
    }
}

?>
