<?php
class Area{
    //Properties
    public $area_id;
    public $builder_name;
    public $area_name;
    public $area_address;
    public $primary_image;
    public $images;
    public $status;
    public $created_at;
    public $updated_at;
    public $connection;
    public $area_status;
    public $builder_id;
    
  // Constructor
    function __construct($conn){
        // include the connection file
        $this->connection = $conn;
    }

    // Select Area table information
    public function read(){
        $query = "SELECT areas_info.area_name,builders_info.builder_id, areas_info.area_id, areas_info.area_address, areas_info.area_status,areas_info.status ,builders_info.builder_name FROM areas_info INNER JOIN builders_info ON areas_info.builder_id=builders_info.builder_id";
        $resultSet = mysqli_query($this->connection,$query);
        return $resultSet;
    }
    // Add new area to the database    
    public function create(){
        // Check if the area name already exist in the data base.
        // select query
        $this->area_name = strtolower(htmlspecialchars(strip_tags($this->area_name)));
        $this->area_address = htmlspecialchars(strip_tags($this->area_address));
        $this->builder_id = htmlspecialchars(strip_tags($this->builder_id));
        $this->primary_image = htmlspecialchars(strip_tags($this->primary_image));
        $this->images = htmlspecialchars(strip_tags($this->images));
        $this->area_status = "passive";
        $this->status = "active";
        $selectQry = "SELECT area_name FROM areas_info WHERE area_name='$this->area_name'";
        $res = mysqli_query($this->connection,$selectQry);
        if($res->num_rows>0){
            
            return false;
        }
        else{
            
             // Query to insert    
        $query = "INSERT INTO areas_info(builder_id,area_name,area_address,primary_image,images,area_status,status) VALUES (?,?,?,?,?,?,?)";
        
        $stmt = $this->connection->prepare($query);
    
        // Bind the parameters
        $stmt->bind_param("issssss",$this->builder_id,$this->area_name,$this->area_address,$this->primary_image,$this->images,$this->area_status,$this->status);
        if($stmt->execute()){
            $this->area_id = $this->connection->insert_id;
            return true;
        }
        else {
            return false;
        }
        }
        
    }
      // DELETE A BUILDER FROM THE DATABASE USING THE BUILDER ID
     public function delete_area($id){
         $query = "UPDATE areas_info
         SET 
         status ='passive'
         WHERE area_id='$id'";
         if(mysqli_query($this->connection,$query)){
             return true;
         }
         else{
             return false;
                }

     }
    public function read_single($id){
        $query = "SELECT areas_info.area_name, areas_info.area_id, areas_info.area_address, areas_info.area_status, areas_info.status ,builders_info.builder_name,builders_info.builder_id FROM areas_info INNER JOIN builders_info ON areas_info.builder_id=builders_info.builder_id WHERE areas_info.area_id='$id'" ;
        $rs = mysqli_query($this->connection,$query);
        if(mysqli_num_rows($rs)){
            extract(mysqli_fetch_array($rs));
            $this->area_id = $area_id;
            $this->area_status = $area_status;
            $this->area_name = $area_name;
            $this->primary_image = $primary_image;
            $this->images = $images;
            $this->builder_name = $builder_name;
            $this->area_address = $area_address;
            $this->status = $status;
            $this->builder_id = $builder_id;
            
            return true;
        }
        else {
            return false;
        }
    }
    // Update the area status 
        public function update_status($id){
            $id=htmlspecialchars(strip_tags($id));
            $updateQuery = "UPDATE areas_info
            SET 
                area_status ='active'
            WHERE area_id=?";
         $stmt = $this->connection->prepare($updateQuery);
         $stmt->bind_param("i",$id);
         // execute query
        if($stmt->execute()){
        return true;
            
        }
 
        return false;    
            
            
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
                                'builder_name' => $this->builder_name,
                                'area_name' => $this->area_name,
                                'primary_image'=> $this->primary_image,
                                'image'=>$this->image,
                                'area_status' =>$this->area_status,
                                'status' =>$this->status,
                                'area_address' =>$this->area_address,
                                'builder_id' => $this->builder_id
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
                    "builder_name"=>$builder_name,
                    "area_name" => $area_name,
                    "area_address" => $area_address,    
                    "primary_image" =>$primary_image,
                    "images" => $images,
                    "area_status" => $area_status,
                    "status" => $status,
                    "builder_id" =>$builder_id    
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
        
       
        
        // CASE POST
        
            case 'POST': 
        
            $data = json_decode(file_get_contents("php://input"));
                
            if(!empty($data->area_name) &&
               !empty($data->area_address) &&
               !empty($data->builder_id) &&
               !empty($data->primary_image)
              )
            {
                // Bind all the properties of area
                $this->area_name = $data->area_name;
                $this->area_address = $data->area_address;
                $this->primary_image = $data->primary_image;
                $this->builder_id = $data->builder_id;
                $this->images = $data->images;
                // call create method to insert the data
                if($this->create()){
                    $message["success"] = true;  
                    $message["id"] = $this->area_id;
                    array_push($message["body"], "Area added successfully.");
                    return $message;
                }
                
                else {
                    $message["success"] = false;    
                    array_push($message["body"], "Area already exists");
                    return $message;
                }
            }
            
            else {
                    $message["success"]= false;
                    $message["body"] ="Unable to create new area. Data is incomplete.";     
                     return $message;
                
            }
            break;
                // End of case POST
                
            // start of PUT case  
                 case 'PUT':
            //code here Delete case here
            //get the the id to be updated
                $data = json_decode(file_get_contents("php://input"));
                if(!empty($data->area_id)){
                    if($this->update_status($data->area_id)){
                        
                    $message["success"] = true;
                    $message["body"] = array();  
                    array_push($message["body"], "Updated successfully");
                    return $message;
                    }
                    
                    else{
                    $message["success"] = false;
                    $message["body"] = array();  
                    array_push($message["body"], "Something went wrong, could not updated");
                    return $message;
                        
                    }
                    
                }
                else {
                    
                    $message["success"] = false;
                    $message["body"] = array();  
                    array_push($message["body"], "ID to be updated is null");
                    return $message;
                    
                }
                
//                Delete case here
                case 'DELETE':
            //code here Delete case here
            //get the the id to be deleted
                $data = json_decode(file_get_contents("php://input"));
                $id = $data->area_id;
                if(!empty($id)){
                    if($this->delete_area($id)){
                        
                    $message["success"] = true;
                    $message["body"] = array();  
                    array_push($message["body"], "Deleted successfully");
                    return $message;
                    }
                    
                    else{
                    $message["success"] = false;
                    $message["body"] = array();  
                    array_push($message["body"], "Something went wrong, could not deleted");
                    return $message;
                        
                    }
                    
                }
                else {
                    
                    $message["success"] = false;
                    $message["body"] = array();  
                    array_push($message["body"], "ID to be deleted is null");
                    return $message;
                    
                }  
                 break;
        // End of delete case here.
           
            default: 
                // default case here
                    $message["success"] = false;
                    $message["body"] = array();  
                    array_push($message["body"], "404 Not Found");
                    return $message;
                    break;    
                break;
       
                
         }
    }
}


?>