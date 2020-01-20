<?php
class Area{
    //Properties
    public $area_id;
    public $builder_id;
    public $area_name;
    public $area_address;
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
    // Add new area to the database
    
    public function create(){
        // Check if the area name already exist in the data base.
        // select query
        $this->area_name = htmlspecialchars(strip_tags($this->area_name));
        $this->area_address = htmlspecialchars(strip_tags($this->area_address));
        $selectQry = "SELECT area_name FROM areas_info WHERE area_name='$this->area_name'";
        $res = mysqli_query($this->connection,$selectQry);
        if($res->num_rows>0){
            
            return false;
        }
        else{
            
             // Query to insert    
        $query = "INSERT INTO areas_info(builder_id,area_name,area_address,primary_image) VALUES (?,?,?,?)";
        
        $stmt = $this->connection->prepare($query);
    
        // Bind the parameters
        $stmt->bind_param("isss",$this->builder_id,$this->area_name,$this->area_address,$this->primary_image);
        if($stmt->execute()){
            return true;
        }
        else {
            return false;
        }
        }
   
        
    }
    
    
}


?>