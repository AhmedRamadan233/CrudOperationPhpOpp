<?php
class DataBase {
    private $serverName = "localhost";
    private $userName = "root"; 
    private $password = ""; // Make sure to set your MySQL password here
    private $dbName = "php-oop-soft-compony"; 
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);
        if (!$this->conn) {
            die("Could not connect: " . mysqli_connect_error());
        }
    }

    public function insert($sql){
        if (mysqli_query($this->conn, $sql)) {
            // Query executed successfully
            return "Added successfully";
        } else {
            die("Failed to execute : " . mysqli_error($this->conn));
        }
    }

    public function enc_password($password){
        return sha1($password);
    }
}
?>
