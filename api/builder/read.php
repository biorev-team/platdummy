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

$builder = new Builder($conn);
$stmt = $builder->read();
$count = $stmt->num_rows;
if($count > 0){
    $builder = array();
    $builder["method"]=$_SERVER["REQUEST_METHOD"];
    $builder["response"]=http_response_code(200);
    $builder["success"]=true;
    $builder["data"] = array();
    $builder["count"] = $count;

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

        array_push($builder["data"], $p);
    }
    
    echo json_encode($builder,JSON_PRETTY_PRINT);
}

else {
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
    