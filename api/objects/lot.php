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
     public $requestMethod;
     public $created_at;
     public $updated_at;
// constructor
    function __construct($conn){
        
// intialize the connection variable    
    $this->connection = $conn;
         
    } 
      // Select Area table information
    public function read($id){
        $query = "SELECT * FROM lots WHERE area_id='$id'";
        $resultSet = mysqli_query($this->connection,$query);
        return $resultSet;
    }
     // Function to read individual lot details.
     public function read_single($id){
          $query = "SELECT * FROM lots WHERE lot_id='$id'" ;
          $rs = mysqli_query($this->connection,$query);
        if(mysqli_num_rows($rs)){
            extract(mysqli_fetch_array($rs));
            $this->area_id = $area_id;
            $this->status = $status;
            $this->lot_id = $lot_id;
            $this->alias = $alias;
            $this->lot_status = $lot_status;
            $this->lot_price = $lot_price;
            return true;
        }
        else {
            return false;
        }
         
     }
    //Function to update lots 
     public function update($id){
        $selectQuery = "SELECT lot_id FROM lots WHERE lot_id ='$id'";
         $res = mysqli_query($this->connection,$selectQuery);
         if(mysqli_num_rows($res)>0){
             $updateQuery = "UPDATE lots 
        
                   SET alias='$this->alias',
                        lot_price='$this->lot_price',
                        lot_status='$this->lot_status'
                        WHERE lot_id='$id'
                        ";
         
         if(mysqli_query($this->connection,$updateQuery)){
             return true;
         }
         else{
             return false;
                }  
             
         }
            
            else { 
               return false;
            }
       
     }
//     INSERT LOT INFORMATION
     public function create(){
         $query = "INSERT INTO lots(area_id,alias,lot_status,lot_price,status) VALUES(?,?,?,?,?)";
         // prepare the query
         $stmt = $this->connection->prepare($query);
         // bind the parameters
         $stmt->bind_param("issss",$this->area_id,$this->alias,$this->lot_status,$this->lot_price,$this->status);
         // execute
         if($stmt->execute()){
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
          // switch statements start here
          
          switch($requestMethod){
              case 'GET':
                   if(!empty($id)){
                $stmt = $this->read($id);
                $count = $stmt->num_rows;
                if($count>0){
                    $message["success"]=true;
                    $message["count"] = $count;
                while($row = mysqli_fetch_array($stmt)){
                    extract($row);
                    $p = array(
                    "lot_id"=>$lot_id,
                    "area_id"=>$area_id,
                    "alias" => $alias,
                    "lot_status" => $lot_status,    
                    "lot_price" =>$lot_price,
                    "status" => $status   
                    );
                    array_push($message["body"],$p);
                    
                }  
                    return $message;
                }
                  else {
                      
                    $message["success"]=false;
                    array_push($message["body"], "Something went wrong.");
                    return $message;
                  }
            } 
                  else {
                      $message["success"]=false;
                      array_push($message["body"], "Please provide ID.");
                        return $message;
                  }
                  
              case 'POST':
                  // code for post goes here
                  $data = json_decode(file_get_contents("php://input"));
                  $this->area_id = $data->area_id;
                  $lots_data = json_decode($data->lots,true);
                  
                  foreach($lots_data as $lot){
                      $this->alias = $lot["alias"];
                      $this->lot_price = $lot["lot_price"];
                      $this->lot_status = $lot["lot_status"];
                      $this->status = "active";
                        if($this->create()){
                           
                        }
                      else {
                            $message["success"]=false;
                            array_push($message["body"], "Something went wrong.");
                            return $message;
                          break;
                      }
                  }
                            $message["success"]=true;
                            array_push($message["body"], "Lots added successfully.");
                   return $message;
                      break;
              case 'PUT':
                  $data = json_decode(file_get_contents("php://input"));
                  
                  if(
                    !empty($data->alias) &&
                    !empty($data->lot_price)&&
                    !empty($data->lot_status)&&
                    !empty($data->lot_id)  
                                          
                  )
                  {
                  $this->alias = $data->alias;
                  $this->lot_price = $data->lot_price;
                  $this->lot_status = $data->lot_status;
                  $id = $data->lot_id;
                  if(!empty($id)){
                      if($this->update($id)){
                         $message["success"] = true;
                         $message["body"] = array();  
                         array_push($message["body"], "Updated successfully");
                         return $message;
                          
                      }
                      else {
                          $message["success"] = false;
                          $message["body"] = array();  
                          array_push($message["body"], "ID does not exist");
                          return $message;
                          
                      }
                
                  }
                  
                  else {
                        $message["success"] = false;
                        array_push($message["body"], "Id does not exist ");
                        return $message; 
                  }
                  }
                  else {
                       $message["success"] = false;
                        array_push($message["body"], "Data is incomplete ");
                        return $message; 
                      
                      
                  }
                break;  
              default: 
                            $message["success"]=false;
                            array_push($message["body"], "Action is not allowable.");
                            return $message;
                // default case code's goes here.  
                  break;
                  
                  
          }
          
          
          
          
      }
     
 }


?>