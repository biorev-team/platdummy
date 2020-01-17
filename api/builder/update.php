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
// GET posted data which is in json form
$data = json_decode(file_get_contents("php://input"));
if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty($data->builder_id)&&
           !empty($data->name)&&
           !empty($data->email)&&
           !empty($data->contact)
          ){
    // set all the properties 
        $builder->builder_id = $data->builder_id; 
        $builder->builder_name = $data->name;
        $builder->email = $data->email;
        $builder->contact = $data->contact;
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
    else{
        
        
        $arr["method"]=$_SERVER["REQUEST_METHOD"];
        $arr["expected-method"] = "POST";
        $arr["success"] = false;
        $arr["response"] =http_response_code();
        $arr["body"] = array(); 
        array_push($arr["body"],array("message"=>" Data is not complete"));
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