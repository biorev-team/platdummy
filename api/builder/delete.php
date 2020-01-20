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
$arr = array();
$arr["success"] ="";
$arr["method"]=$_SERVER["REQUEST_METHOD"]; 
$arr["response"] =http_response_code();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$builder->builder_id = isset($_POST['id'])? $_POST['id'] : die("Please provide the builder id you want to delete"); 
$stmt=$builder->delete_builder();
if($stmt){
    $arr["success"] = true;
    $arr["body"] = array();  
    array_push($arr["body"], "Deleted successfully");
   echo(json_encode($arr,JSON_PRETTY_PRINT));
}
else{
$arr["success"] = false;
$arr["body"] = array(); 
array_push($arr["body"], "Something went wrong");
echo(json_encode($arr,JSON_PRETTY_PRINT));  
}
}
else
{
$arr["success"] = false;    
$arr["expected-method"] = "POST";
$arr["body"] = array(); 
array_push($arr["body"],array("message"=>"Bad request type"));
echo(json_encode($arr,JSON_PRETTY_PRINT));
}

?>