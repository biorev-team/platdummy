<?php
include("dbConnect.php");
$db_conn = new DB_Connect();
$conn =$db_conn->connect();
$array = array();
$colorQuery ="SELECT availability.ID, availability.STATUS, color_status.COLOR, color_status.COLORID FROM availability INNER JOIN color_status ON availability.STATUS = color_status.STATUS";
$colorResult = mysqli_query($conn, $colorQuery);
    
    if( mysqli_num_rows($colorResult) > 0){

        while ( $row = mysqli_fetch_array($colorResult) ){
        $id     = $row["ID"];    
        $color  = $row["COLOR"];
        $status = $row["STATUS"];
          
        $array []= array(   "idData"    => $id,
                            "color" => $color,
                            "status"=> $status
                            );

    }
        $array = json_encode($array);
        print_r( $array);
    }

//$fileName = $_FILES["file"]["tmp_name"];
//
//if( $_POST["check"] == "import" ){
//
//if($_FILES["file"]["size"] > 0){
//    $file = fopen($fileName, "r");
//    while( ( $getData = fgetcsv($file, 10000, "r")) != FALSE){
//        
//        $query = "INSERT INTO lots (lot_id, area_id, alias, lot_status, lot_price, status, created_at, updated_at) VALUES (NULL,'', '".$getData[0]."', '".$getData[1]."', ".$getData[2].", 'active', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() )";
//        $result = mysqli_query($conn, $query);
//        
//        if( !isset($result) ){
//            echo "Invalid File:Please Upload CSV File.";
//        }
//        
//        else{
//            echo "CSV File has been successfully Imported.";
//        }
//        
//    }
//        fclose($file);
//}
//    
//}
?>

