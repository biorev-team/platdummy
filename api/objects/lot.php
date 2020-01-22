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
    public function read(){
        $query = "SELECT * FROM lots";
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
                $message["success"]=true;
                $message["count"] = 1;
                if($this->read_single($id)){
                $single_data = array(
                                 "lot_id"=>$this->lot_id,
                                 "area_id" =>$this->area_id,
                                 "alias" => $this->alias,
                                 "lot_status" => $this_>lot_status,    
                                 "lot_price" =>$this->lot_price,
                                 "status" => $this->status   
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
                            $message["success"]=true;
                            array_push($message["body"], "Lots added successfully.");
                            return $message;
                        }
                      else {
                            $message["success"]=false;
                            array_push($message["body"], "Something went wrong.");
                            return $message;
                          break;
                      }
                  }
                      break;
              default: 
                // default case code's goes here.  
                  break;
                  
                  
          }
          
          
          
          
      }
     
 }


?>