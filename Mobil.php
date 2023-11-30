<?php

class Mobil {
    protected $merk;
    protected $nama;
    protected $harga;

    public function __construct($merk, $nama, $harga) {
        $this->merk = $merk;
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function getMerk() {
        return $this->merk;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getHarga() {
        return $this->harga;
    }
}

?>
