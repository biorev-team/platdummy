<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();

// includes files here  
include_once '../objects/builder.php';
include_once '../include/dbConnect.php';

$dbConn = new DB_Connect();
$conn = $dbConn->connect();
$builder = new Builder($conn);
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_SESSION['S_BUILDER_ID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
    // set all the properties 
        $builder->builder_id = $id;    
        $builder->builder_name = $name; 
        $builder->email = $email;
        $builder->contact = $contact;
    if($builder->update_builder()){
        $arr["method"]=$_SERVER["REQUEST_METHOD"];
        $arr["success"] = true;
        $arr["response"] =http_response_code();
        $arr["body"] = array();  
    array_push($arr["body"], "Updated successfully");
   echo(json_encode($arr,JSON_PRETTY_PRINT));
    }
    else{
        $arr["method"]=$_SERVER["REQUEST_METHOD"];
        $arr["success"] = false;
        $arr["response"] =http_response_code();
        $arr["body"] = array(); 
        array_push($arr["body"], "Something went wrong, unable to update");
        echo(json_encode($arr,JSON_PRETTY_PRINT));  

            }
    
}

else {
    
        $arr["method"]=$_SERVER["REQUEST_METHOD"];
        $arr["expected-method"] = "POST";
        $arr["response"] =http_response_code();
        $arr["body"] = array(); 
        array_push($arr["body"],array("message"=>"Bad request type"));
        echo(json_encode($arr,JSON_PRETTY_PRINT));


}



?>