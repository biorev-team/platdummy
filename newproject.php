<?php 
include("api/include/dbConnect.php");
$dbConn = new DB_Connect();
$conn = $dbConn->connect(); 

$builderInfoQuery = "SELECT builders_info.builder_name, builders_info.contact, areas_info.area_name FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id WHERE builders_info.status ='active'";

$builderInfoResult = mysqli_query($conn, $builderInfoQuery);

while( $builderRow = mysqli_fetch_array( $builderInfoResult ) ){
    $builderName    = $builderRow['builder_name'];
    $builderContact = $builderRow['contact'];
    $builderArea    = $builderRow['area_name'];
    
            $display.= "<div class='w3-third'>
  <div class='w3-card w3-container' style='min-height:460px'>
  <h3>$builderName</h3><br>
  <i class='fa fa-desktop w3-margin-bottom w3-text-theme' style='font-size:120px'></i>
  <p>Area : $areaName </p>
  <p>Contact : abc@builder1.com</p>
  <button type='button' onclick='window.location.href = 'file:///C:/Users/UNNAMED/Desktop/builder1.html';'>Explore More</button>
  
  </div>
</div>";
        
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>	
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>

</head>
<body>

<div ng-app="">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Builder's Home</a>
    </div>
    <ul class="nav navbar-nav">
     <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Builders</a>
            <div class="dropdown-menu">
                <a href="file:///C:/Users/UNNAMED/Desktop/builder1.html" class="dropdown-item">Builder 1</a>
                <div class="dropdown-divider"></div>
                <a href="#"class="dropdown-item">Builder 2</a>
                <div class="dropdown-divider"></div>
                <a href="#"class="dropdown-item">Builder3</a>
            </div>
        </li>
     <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Assets</a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Status</a>
         </div>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
    </div>
<div class="slideshow-container">
  <div class="mySlides1">
    <img src="https://www.cruden-ltd.co.uk/sites/default/files/2017-10/Construction-Homepage-Slideshow-001.jpg" style="width:100%">
  </div>
    </div>

<div class="w3-row-padding w3-center w3-margin-top">
<?php echo $display;?>
</div>

</body>
</html>

