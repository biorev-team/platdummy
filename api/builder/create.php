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
//  $builder_name = $_GET['builder_name'];
//  $status = $_GET['status'];
// get posted data
$data = json_decode(file_get_contents("php://input"));

// Response data prepared
$message =array();
$message["method"]=$_SERVER["REQUEST_METHOD"];
$message["success"] = "";
$message["response"] =http_response_code(); 
$message["body"] = array(); 
// make sure data is not empty
if(
    !empty($data->builder_name) &&
    !empty($data->email)&&
    !empty($data->contact)
){
 
    // set builder property values
    $builder->builder_name = $data->builder_name;
    $builder->email = $data->email;
    $builder->contact = $data->contact;
 
    // create the product
    if($builder->create_builder()){
      array_push($message["body"], "Added successfully");
      echo(json_encode($message,JSON_PRETTY_PRINT));
    }
 
    // if unable to create the builder, tell the user
    else{ 
        $message["success"] = false;
        $message["message"] = "Email already exist. Select an different email address"; 
    // tell the user
       echo json_encode($message);
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
   // $date = new DateTime(null, new DateTimeZone('Asia/Calcutta'));
    //$date->format('Y-m-d H:i:s');
 $message["success"]= false;
 $message["message"] ="Unable to create new builder into the database. Data is incomplete."; 
    // tell the user
    echo json_encode($message);
}




?>