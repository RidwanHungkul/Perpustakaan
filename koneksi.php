<?php

class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect() {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if(mysqli_connect_errno()){
            echo "Koneksi database gagal: " . mysqli_connect_error();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }
}

$database = new Database("localhost", "root", "", "perpustakaan");
$koneksi = $database->getConnection();

?>
