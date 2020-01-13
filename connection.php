<?php 

$server = "localhost";
$user   = "root";
$pass   = "mysql";
$db     = "platDummy"; 
$conn = mysqli_connect($server,$user,$pass,$db);

if(!$conn){
   
    die("ERROR: Could not connect".mysqli_connect_error());    

    }

?>