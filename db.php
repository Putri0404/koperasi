<?php
class db {
    public $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_koperasi");
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function escape($string) {
        return $this->conn->real_escape_string($string);
    }
}
?>
