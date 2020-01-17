<?php
class Area{
    //Properties
    public $area_id;
    public $builder_id;
    public $area_name;
    public $primary_image;
    public $images;
    public $status;
    public $created_at;
    public $updated_at;
    public $connection;
  // Constructor
    function __construct($conn){
        // include the connection file
        $this->connection = $conn;
    }

    // Select Area table information
    public function read(){
        $query = "SELECT * from areas_info";
        $resultSet = mysqli_query($this->connection,$query);
        return $resultSet;
    }
    
    
    
    
}


?>