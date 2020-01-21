<?php
include("dbConnect.php");
$db_conn = new DB_Connect();
$conn =$db_conn->connect();



 if(!empty($_FILES["file"]["name"]))  
 {
      $array = array();
      $output = '';  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
         
           while($row = fgetcsv($file_data))  
           {  
                $alias = mysqli_real_escape_string($conn, $row[0]);  
                $lot_status = mysqli_real_escape_string($conn, $row[1]);  
                $lot_price = mysqli_real_escape_string($conn, $row[2]);  
               
               $array [] = array(
               
                   "alias" => $alias,
                   "lot_status" => $lot_status,
                   "lot_price" => $lot_price
               );
//                $query = "  
//                INSERT INTO lots (lot_id, area_id, alias, lot_status, lot_price, status, created_at, updated_at) VALUES (NULL,'', '$alias', '$lot_status', '$lot_price', 'active', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() )";  
//                mysqli_query($conn, $query);  
           }  
          print_r (json_encode($array));
//          echo "Successfully Added";
      }  
      else  
      {  
           echo 'Error1';  
      }  
 }  
 else  
 {  
      echo "Error2";  
 }  
 

?>