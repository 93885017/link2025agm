<?php
// generate connect mysql database class
class dbConnect {
    private $conn;

    function connect() { 
        include_once 'config.php';
        try {
            $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
            echo "Connection Fail.";
        }
        // return database handler
        return $this->conn;
    }
}
