<?php

require_once 'User.php';

class Admin extends User {
    private $isAdmin;

    public function __construct($username, $password) {
        parent::__construct($username, $password);
        $this->isAdmin = true; // Misalnya, kita anggap semua admin memiliki isAdmin = true
    }

    public function isAdmin() {
        return $this->isAdmin;
    }
}

?>
