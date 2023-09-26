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

    // insert data into database
    public function insert($sql){
        if (mysqli_query($this->conn, $sql)) {
            // Query executed successfully
            return "Added successfully";
        } else {
            die("Failed to execute : " . mysqli_error($this->conn));
        }
    }


    // read data from database
    public function read($table)
    {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            $data = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
            return $data;
        } else {
            die("Error: " . mysqli_error($this->conn));
        }
    }


    public function enc_password($password){
        return sha1($password);
    }
}
?>
