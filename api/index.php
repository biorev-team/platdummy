<?php 

include_once('/include/dbConnect.php');
include_once('/objects/builder.php');
include_once('/objects/area.php');
include_once('/objects/lot.php');
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Methods");
// Break the url
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
$requestMethod = $_SERVER["REQUEST_METHOD"];
$module = isset($_GET['module'])? $_GET['module'] : die("Invalid url");
$id = isset($_GET['id'])? $_GET['id'] : NULL;
$dbcon = new DB_Connect();
$conn = $dbcon->connect();
  // start of switch. process the request as per the entity.
   switch($module){
          
       case 'area': 
           // start of case area
           $area = new Area($conn);
           $response = $area->processRequest($requestMethod,$id);
           echo json_encode($response);
           // end of case area.
           break;
       case 'builder':
           // start of builder case
            $builder = new Builder($conn);
            $response = $builder->processRequest($requestMethod,$id);  
            echo json_encode($response);
           // end of builder case
           break;
           
         case 'lot':
           // start of builder case
            $lot = new Lot($conn);
            $response = $lot->processRequest($requestMethod,$id);  
            echo json_encode($response);
           // end of builder case
           break;
       default:
            $response = array();
            $response["success"] = false;
            $response["body"] = array();  
            array_push($response["body"], "404 Not Found");
            echo json_encode($response);
           break;
               
       
   } 



?>