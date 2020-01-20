<?php
// required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


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
$builder_info = array();
$builder_info["method"]=$_SERVER["REQUEST_METHOD"];
$builder_info["response"]=http_response_code(200);
$builder_info["success"] ="";
$builder = new Builder($conn);
$stmt = $builder->read();
$count = $stmt->num_rows;
if($count > 0){
    
    $builder_info["success"]=true;
    $builder_info["data"] = array();
    $builder_info["count"] = $count;

    while ($row = mysqli_fetch_array($stmt)){

        extract($row);

        $p  = array(
              "builder_id" => $builder_id,
              "builder_name" => $builder_name,
              "contact" =>$contact,
              "status" =>$status,
              "area" => $area_name,
              "email" => $email
        );

        array_push($builder_info["data"], $p);
    }
    
    echo json_encode($builder_info,JSON_PRETTY_PRINT);
}

else {
// set response code - 404 Not found   
    $builder_info["success"] = false;
    $builder_info["data"] = array();
    array_push($builder["data"],"Not found");
    echo json_encode($builder_info,JSON_PRETTY_PRINT);
}


?>
    