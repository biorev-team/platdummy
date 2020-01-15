<?php 
include("api/include/dbConnect.php");
$dbConn = new DB_Connect();
$conn = $dbConn->connect(); 

$builderInfoQuery = "SELECT builders_info.builder_name, builders_info.contact, areas_info.area_name FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id WHERE builders_info.status ='active' AND areas_info.status='active'";

$builderInfoResult = mysqli_query($conn, $builderInfoQuery);
$counter = 1;

while( $builderRow = mysqli_fetch_array( $builderInfoResult ) ){
    $builderName    = $builderRow['builder_name'];
    $builderContact = $builderRow['contact'];
    $builderArea    = $builderRow['area_name'];
    
    if( $counter % 4 == 1){
        $display.= "<div class='row'><div class='col-sm-4'>
                        <div class='builder-wrapper'>
                        <form method='post'>
                        <h3>$builderName</h3>
                        <i class='fa fa-desktop'></i>
                        <p><b>Area :</b> $builderArea </p>
                        <p><b>Contact :</b> abc@builder1.com</p>
                        <button type='submit' class='button' value='$counter' name='explore'>Explore More</button
                        </form>
                        </div>
                        </div>";  
    }
    else if ($counter%4 == 0){
        $display.= "<div class='col-sm-4'>
                        <div class='builder-wrapper'>
                        <form method='post'>
                        <h3>$builderName</h3>
                        <i class='fa fa-desktop'></i>
                        <p><b>Area :</b> $builderArea </p>
                        <p><b>Contact :</b> abc@builder1.com</p>
                        <button type='submit' class='button' value='$counter' name='explore'>Explore More</button                        
                        </form>
                        </div>
                        </div>
                        </div>"; 
    }
    else{
        $display.= "<div class='col-sm-4'>
                        <div class='builder-wrapper'>
                        <form method='post'>
                        <h3>$builderName</h3>
                        <i class='fa fa-desktop'></i>
                        <p><b>Area :</b> $builderArea </p>
                        <p><b>Contact :</b> abc@builder1.com</p>
                        <button type='submit' class='button' value='$counter' name='explore'>Explore More</button                        
                        </form>
                        </div>
                        </div>"; 
    }
    $counter++;
    
}

if( isset( $_POST['explore'] ) ){
    session_start();
    $btnValue = $_POST['explore'];
    $query = "SELECT builder_id FROM builders_info WHERE builder_id = '$btnValue'";
    $result = mysqli_query($conn, $query);
    
    $row = mysqli_fetch_array($result);
        $builderId = $row['builder_id'];
//        echo $builderId;
        $_SESSION["BUILDER_ID"] = $builderId;
        header("location:builder1.php");
}
//mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    
    <div ng-app="">
    <div class="brand">
     <img src="https://i.imgur.com/nlJF2BM.jpg">
    </div>
    </div>
<div class = "w3-container">
<h3 style = "text-align: center"> Our Builders  </h3>
</div>
<hr>


<div class="builders">
<?php echo $display;?>
</div>  

   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>	
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

</body>
</html>

