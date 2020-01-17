<?php
 class Lot{
  // Properties
     public $connection;
     public $lot_id;
     public $area_id;
     public $alias;
     public $lot_status;
     public $lot_price;
     public $status;
     public $created_at;
     public $updated_at;
// constructor
    function __construct($conn){
        
// intialize the connection variable    
    $this->connection = $conn;
         
    } 
    //Function to update lots 
     public function update($id){
        
         
        $updateQuery = "UPDATE lots 
        
                   SET alias='$this->alias',
                        lot_price='$this->lot_price',
                        lot_status='$this->lot_status'
                        WHERE lot_id='$id'
                        ";
         if(mysqli_query($this->connection,$updateQuery)){
             return "con".$id;
         }
         else{
             return false;
                }
     }
     
 }


?>