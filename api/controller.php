<?php 
include_once('controller.php');
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Methods");
// Break the url
$uri = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
$uri = explode('/',$uri);
echo $uri[1];

?>