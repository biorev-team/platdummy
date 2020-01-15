<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// includes files here
include_once '../objects/builder.php';
include_once '../include/dbConnect.php';

$dbConn = new DB_Connect();
$conn = $dbConn->connect();
$builder = new Builder($conn);
//GET ID FROM URL like something.com?id=3
$builder->builder_id = isset($_GET['id'])? $_GET['id'] : die("Not getting any parameters");

$builder->read_single();
$single_builder_info = array();
$single_builder_info["method"]=$_SERVER["REQUEST_METHOD"];
$error_arr["success"] = false;
$single_builder_info["response"] =http_response_code();
$single_builder_info["count"] = 1;
$single_builder_info["body"] = array();
if(!empty($builder->builder_name)){
$builder_arr = array(
    'builder_name' => $builder->builder_name,
    'status' => $builder->status,
    'contact' => $builder->contact,
);
 array_push($single_builder_info["body"], $builder_arr);

  echo(json_encode($single_builder_info,JSON_PRETTY_PRINT));
}
else{
    
    $error_arr = array();   
    $error_arr["success"] = false;
    $error_arr["response"] =http_response_code();
    $error_arr["message"] = "Id does not exist";
    $error_arr["data"] = array();
    echo json_encode(
        $error_arr,JSON_PRETTY_PRINT
    );
    
}

?>