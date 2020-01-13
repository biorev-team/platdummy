<?php
class DB_Connect {
    private $conn;
 
    // Connecting to database
    public function connect() {
        require_once 'dbConfig.php';
          // Connecting to mysql database
        $this->conn = new mysqli($servername, $username, $password, $dbname);
         
        // return database handler
        return $this->conn;
    }
}
 
?>
