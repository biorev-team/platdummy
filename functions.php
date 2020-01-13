

<?php
include("connection.php");

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
?>