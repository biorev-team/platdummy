<?php 

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods");
// includes files here  
include_once '../objects/builder.php';
include_once '../include/dbConnect.php';

$dbConn = new DB_Connect();
$conn = $dbConn->connect();
//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//$uri = explode( '/', $uri );
//if ($uri[1] !== 'platdummy') {
//    header("HTTP/1.1 404 Not Found");
//    exit();
//}

  $builder = new Builder($conn);
  $builder_name = $_GET['builder_name'];
  $status = $_GET['status'];
//// get posted data
//$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($builder_name) &&
    !empty($status) 
    
   
){
 
    // set product property values
    $builder->builder_name = $builder_name;
    $builder->status = $status;
//    $builder->updated_at =$data->updated_at;
//    $builder->created_at =$data->created_at;
//    $builder->contact =$data->contact;
 
    // create the product
    if($builder->create_builder()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "New Builder added to the database."));
    }
 
    // if unable to create the builder, tell the user
    else{
 
        $error = array();
        $error["response"] =  http_response_code();    
        $error["status"] = false;
        $error["message"] ="Unable to create new builder into the database."; 
    // tell the user
       echo json_encode($error);
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
 $error = array();
 $error["response"] =  http_response_code(400);    
 $error["status"] = false;
 $error["message"] ="Unable to create new builder into the database. Data is incomplete."; 
    // tell the user
    echo json_encode($error);
}




?>