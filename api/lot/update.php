<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

// includes files here  
include_once '../objects/lot.php';
include_once '../include/dbConnect.php';
$dbConn = new DB_Connect();
$conn = $dbConn->connect();
$lot = new Lot($conn);
// GET posted data which is in json form
$data = json_decode(file_get_contents("php://input"));
if(!empty($data->id)&&
   !empty($data->alias)&&
   !empty($data->lot_price)&&
   !empty($data->lot_status)
  ){
    // Bind the parameters 
    $lot->alias = $data->alias;
    $lot->lot_price = $data->lot_price;
    $lot->lot_status = $data->lot_status;
    if($lot->update($data->id)){
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "updated to the database."));
    }
    else{
        
        $error = array();
        $error["response"] =  http_response_code();    
        $error["status"] = false;
        $error["message"] ="Unable to update into the database."; 
    // tell the user
       echo json_encode($error);
    }
    
}

else{
    // set response code - 400 bad request
 $error = array();
 $error["response"] =  http_response_code(400);    
 $error["status"] = false;
 $error["message"] ="Unable to update. Data is incomplete."; 
    // tell the user
    echo json_encode($error);
    
}

?>