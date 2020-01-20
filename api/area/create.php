<?php 

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods");
 
// inlude the required files
 include_once '../include/DbConnect.php';
 include_once '../objects/area.php';
$dbCon = new DB_Connect();
$conn = $dbCon->connect();
$area = new Area($conn);
// Get the data posted by client
$data = json_decode(file_get_contents("php://input"));
$message = array();
$message["method"] = $_SERVER["REQUEST_METHOD"];
$message["response"]= http_response_code();
$message["success"]="";
$message["body"] = array();

if(!empty($data->area_name)&&
   !empty($data->area_address)&&
   !empty($data->primary_image)&&
   !empty($data->builder_id)
  ){
    
    // intialize the parameters
    $area->area_name = $data->area_name;
    $area->area_address = $data->area_address;
    $area->primary_image = $data->primary_image;
    $area->builder_id = $data->builder_id;
    if($area->create()){
        $message["success"]=true;
        array_push($message["body"],"Area added successfully");
        echo json_encode($message,JSON_PRETTY_PRINT);
        
    }
    else {
         $message["success"]=false;
        array_push($message["body"],"Something went wrong. May be the given area alredy exist into the database.");
        echo json_encode($message,JSON_PRETTY_PRINT);
    }
    
}

  else{
      
 $error = array();
 $error["response"] =  http_response_code(400);    
 $error["status"] = true;
 $error["error"] ="Data is incomplete."; 
    // tell the user
    echo json_encode($error);
      
  }
?>