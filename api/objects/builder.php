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
     public function read_single($id){
         
$query = "SELECT builders_info.builder_id, builders_info.builder_name, builders_info.contact, builders_info.email,areas_info.area_name,builders_info.status FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id WHERE builders_info.builder_id='$id'";
     $rs = mysqli_query($this->connection,$query);
        if(mysqli_num_rows($rs)){
            $row = mysqli_fetch_array($rs);
            $this->builder_name = $row['builder_name'];
            $this->status = $row['status'];
            $this->contact = $row['contact']; 
            $this->area_name = $row['area_name']; 
            $this->email = $row['email']; 
       
         return true;
        } 
         else{
             return false;
             
         }
     
     }
     // CREAT NEW BUILDER
     public function create_builder(){
        
    // prepare query
    $stmt = $this->connection->prepare($query);
    date_default_timezone_set('Asia/Calcutta');
    // sanitize
    $this->email = htmlspecialchars(strip_tags($this->email));     
       
          //SELECT query 
    $selectQry = "SELECT email FROM builders_info WHERE email='$this->email'";     
         // query to insert record
    $query = "INSERT INTO
                builders_info(builder_name,email,status,updated_at,created_at,contact) VALUES(?,?,?,?,?,?) 
            ";
    $res = mysqli_query($this->connection,$selectQry);
     if($res->num_rows>0){
         return false;
     }
    else{
    $this->builder_name=htmlspecialchars(strip_tags($this->builder_name));
    $this->status= "active";
    $this->updated_at= date("Y-m-d H:i:s");
    $this->created_at=date("Y-m-d H:i:s");
    $this->contact=htmlspecialchars(strip_tags($this->contact)); 
    // Prepare query
    $stmt = $this->connection->prepare($query);    
        // bind values
    $stmt->bind_param("ssssss", $this->builder_name,$this->email,$this->status,$this->updated_at,$this->created_at,$this->contact);

    // execute query
    if($stmt->execute()){
        return true;
    }
      else {
    return false;
 }
             
         }
         
     }
     // DELETE A BUILDER FROM THE DATABASE USING THE BUILDER ID
     public function delete_builder(){
         $query = "UPDATE builders_info
         SET 
         status ='passive'
         WHERE builder_id=?";
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
      // Request handler funtion start
    public function processRequest($requestMethod,$id){
        // Variables to hold response
            $message = array();
            $message["method"] = $_SERVER["REQUEST_METHOD"];
            $message["response"]= http_response_code();
            $message["success"]="";
            $message["body"] = array();
            // Execute the functions according to the request method: POST,PUT,DELETE,GET
        switch($requestMethod){
            
                case 'GET':
                // code here
                    if(!empty($id)){
                        $message["success"]=true;
                        $message["count"] = 1;
                            if($this->read_single($id)){
                                $builder_arr = array(
                                'builder_name' => $this->builder_name,
                                'status' => $this->status,
                                'contact' => $this->contact,
                                'area'=> $this->area_name,
                                'email'=>$this->email,
                                    );
                                array_push($message["body"], $builder_arr);
                                return $message;
                                
                            }
                    else   {
                        $message["success"] = false;
                        array_push($message["body"], "Id does not exist");
                        return $message;       
                    }
            
        }
                    else{
                        $stmt = $this->read();
// use the result set and extract the data         
                        $count = $stmt->num_rows; 
                            if($count>0){
                    
                                $message["success"]=true;
                                $message["count"] = $count;
                                    while ($row = mysqli_fetch_array($stmt)){
                                        extract($row);
                                            $p  = array(
                                            "builder_id" => $builder_id,
                                            "builder_name" => $builder_name,
                                            "contact" =>$contact,
                                            "status" =>$status,
                                            "area" => $area_name,
                                            "email" => $email
                                            );

                                        array_push($message["body"], $p);
                                    }
                            return $message;       
                
                }
        else{               
        $message["success"] = false;
        $message["data"] = array();
        array_push($builder["body"],"Data notfound");
        return message;
                }
            
                    }          
            break;
            // start of post case
            case 'POST':
            // get posted data
                $data = json_decode(file_get_contents("php://input"));    
                // create builder
                if(
                    !empty($data->builder_name) &&
                    !empty($data->email)&&
                    !empty($data->contact)
                                            ){
 
    // set builder property values
                $this->builder_name = $data->builder_name;
                $this->email = $data->email;
                $this->contact = $data->contact;
 
    // create the product
                    if($this->create_builder()){
                    array_push($message["body"], "Added successfully");
                    return $message;
    }
 
    // if unable to create the builder, tell the user
                    else{ 
                    $message["success"] = false;
                    $message["body"] = "Email already exist. Select an different email address"; 
                    return $message;
    }
}
 
// tell the user data is incomplete
                    else{
 
                    $message["success"]= false;
                    $message["body"] ="Unable to create new builder into the database. Data is incomplete.";     
                       return $message;
}                                      
             // End of post case
                
            break;
            
            case 'PUT':
            // code here start of put case
            // Read the updated data sent to the api url
            $data = json_decode(file_get_contents("php://input"));  
            
         if(!empty($data->builder_id)&&
           !empty($data->builder_name)&&
           !empty($data->email)&&
           !empty($data->contact)
          ){
    // set all the properties 
        $this->builder_id = $data->builder_id; 
        $this->builder_name = $data->builder_name;
        $this->email = $data->email;
        $this->contact = $data->contact;
            if($this->update_builder()){
                    $message["success"] = true;
                    $message["body"] = array();  
                    array_push($message["body"], "Updated successfully");
                    return $message;
    }
            else{
       
                    $message["success"] = false;
                    $message["body"] = array(); 
                    array_push($message["body"], "Something went wrong, unable to update");
                    return $message;

            }
         }
            else{
                    $message["success"] = false;
                    $message["body"] = array(); 
                    array_push($message["body"],array("message"=>"Please provide all the data required to update"));
                    return $message;    
                }
        // End of put case here        
            break;
            
            case 'DELETE':
            //code here Delete case here
            //get the the id to be deleted
                $data = json_decode(file_get_contents("php://input"));
                $this->builder_id = $data->builder_id;
                if(!empty($this->builder_id)){
                    if($this->delete_builder()){
                        
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
        // End of delete case here.
            break;
            
            default:
               // code here  starting of defaule case
                    $message["success"] = false;
                    $message["body"] = array();  
                    array_push($message["body"], "404 Not Found");
                    return $message;
                break;    
        }   // End of switch statement.
        // End of function process handler.
    }

 }

?>
