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
                            array_push($message["body"], "Area added successfully.");
                        }
                      else {
                            $message["success"]=false;
                            array_push($message["body"], "Something went wrong.");
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