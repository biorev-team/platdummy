<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../objects/area.php';
include_once '../include/dbConnect.php';
$db = new DB_Connect();
$conn = $db->connect();
$area = new Area($conn);
$stmt=$area->read();
$count = $stmt->num_rows;
if($count>0){
    $area = array();
    $area["method"]=$_SERVER["REQUEST_METHOD"];
    $area["response"]=http_response_code(200);
    $area["success"]=true;
    $area["data"] = array();
    $area["count"] = $count;
    while($row= mysqli_fetch_array($stmt)){
        
        extract($row);
        $a = array(
        "area_id"=>$area_id,
        "builder_id"=>$builder_id,
        "area_name"=>$area_name,
        "primary_image"=>$primary_image,
        "images" =>$images   
        );
        array_push($area["data"],$a);
        
    }
    echo json_encode($area,JSON_PRETTY_PRINT);
    
}

else{
   // set response code - 404 Not found
    $error_arr = array();   
    $error_arr["success"] = false;
    $error_arr["response"] =http_response_code(404);
    $error_arr["data"] = array();
    echo json_encode(
        $error_arr,JSON_PRETTY_PRINT
    );
    
}


?>