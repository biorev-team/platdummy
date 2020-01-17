<?php 
 class Builder{
 // connection instance    
private $connection;
// store builder id     
public $builder_id;
// store builder name     
public $builder_name; 
// store buildr status is active or passive?     
public $status;
// builder contact info     
public $contact;     
 // builder area
public $area_name;
// updated at
public $updated_at;
// created at
public $created_at;
// email
public $email;     
     
     function __construct($conn){
        $this->connection = $conn;
    }      
 //function which will read the builders available into the database      
public function read(){
    // select all query
    $query = "SELECT builders_info.builder_id, builders_info.builder_name, builders_info.contact, builders_info.email,areas_info.area_name,builders_info.status FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id";
    // prepare query statement
    $resultSet = mysqli_query($this->connection, $query);
    return $resultSet;
}  
// read single builder information
     public function read_single(){
         
     $query = "SELECT * FROM builders_info WHERE builder_id = '$this->builder_id' ";      
     $rs = mysqli_query($this->connection,$query);
     $row = mysqli_fetch_array($rs);
     $this->builder_name = $row['builder_name'];
     $this->status = $row['status'];
     $this->contact = $row['contact']; 
     $this->area_name = $row['area_name']; 
         return true;
     }
     // CREAT NEW BUILDER
     public function create_builder(){
         
         // query to insert record
    $query = "INSERT INTO
                builders_info(builder_name,status,updated_at,created_at,contact) VALUES(?,?,?,?,?) 
            ";
 
    // prepare query
    $stmt = $this->connection->prepare($query);
 
    // sanitize
    $this->builder_name=htmlspecialchars(strip_tags($this->builder_name));
    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->updated_at=htmlspecialchars(strip_tags($this->updated_at)); 
    $this->created_at=htmlspecialchars(strip_tags($this->created_at));  
    $this->contact=htmlspecialchars(strip_tags($this->contact));     
 
    // bind values
    $stmt->bind_param("sssss", $this->builder_name,$this->status,$this->updated_at,$this->created_at,$this->contact);
    
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
         
     }
     // DELETE A BUILDER FROM THE DATABASE USING THE BUILDER ID
     public function delete_builder(){
         $query = "DELETE FROM builders_info WHERE builder_id=?";
         $stmt = $this->connection->prepare($query);
         $this->builder_id=htmlspecialchars(strip_tags($this->builder_id));
         $stmt->bind_param("i",$this->builder_id);
         // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;

     }
     // update function here
     public function update_builder(){
         $updateQuery = "UPDATE builders_info
         SET
         builder_name ='$this->builder_name',
         email ='$this->email',
         contact='$this->contact' 
         WHERE builder_id ='$this->builder_id'";
         if(mysqli_query($this->connection,$updateQuery)){
             return true;
         }
         else {
             return false;
         }
     }
     
 }

?>
