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
    public function read_single($id){
        $query = "SELECT * FROM areas_info WHERE area_id='$id'";
        $rs = mysqli_query($this->connection,$query);
        if(mysqli_num_rows($rs)){
            extract(mysqli_fetch_array($rs));
            $this->area_id = $area_id;
            $this->builder_id = $builder_id;
            $this->area_name = $area_name;
            $this->primary_image = $primary_image;
            $this->images = $images;
            return true;
        }
        else {
            return false;
        }
    }
    
    // Request handler 
    
    public function processRequest($requestMethod,$id){
         // Variables to hold response
            $message = array();
            $message["method"] = $_SERVER["REQUEST_METHOD"];
            $message["response"]= http_response_code();
            $message["success"]="";
            $message["body"] = array();
        // Request methods switch statement starting from here
        switch($requestMethod){
            // case GET
            case 'GET':
            if(!empty($id)){
                $message["success"]=true;
                $message["count"] = 1;
                if($this->read_single($id)){
                $single_data = array(
                                'area_id' => $this->area_id,
                                'builder' => $this->builder_id,
                                'area_name' => $this->area_name,
                                'primary_image'=> $this->primary_image,
                                'image'=>$this->image,
                                    );
                                array_push($message["body"], $single_data);
                                return $message;
                    
                }
                 else{
                        $message["success"] = false;
                        array_push($message["body"], "Id does not exist ");
                        return $message;  
                 }
            }   
            else {
            $stmt = $this->read();
            $count = $stmt->num_rows;
                if($count>0){
                    $message["success"]=true;
                    $message["count"] = $count;
                while($row = mysqli_fetch_array($stmt)){
                    extract($row);
                    $p = array(
                    "area_id"=>$area_id,
                    "builder_id"=>$builder_id,
                    "area_name" => $area_name,
                    "primary_image" =>$primary_image,
                    "images" => $images    
                    );
                        array_push($message["body"],$p);
                    
                }  
                    return $message;
                    
                }
                else{
                    $message["success"] = false;
                    array_push($message["body"],"Data not found");
                    return $message;
                }
            }    
        
        }
        
    }
}


?>