<?php 
include("api/include/dbConnect.php");
$dbConn = new DB_Connect();
$conn = $dbConn->connect();

session_start();
    $builder_id = $_SESSION["BUILDER_ID"];
    
   $builderInfoQuery = "SELECT builders_info.builder_name, builders_info.contact, areas_info.area_name FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id WHERE builders_info.status ='active' AND areas_info.status='active' AND builders_info.builder_id = '$builder_id'";

$builderInfoResult = mysqli_query($conn, $builderInfoQuery);

while( $builderRow = mysqli_fetch_array($builderInfoResult) ){
    $builderName    = $builderRow['builder_name'];
    $builderContact = $builderRow['contact'];
    $builderArea    = $builderRow['area_name'];
    $areaLots       = $builderRow['lots'];
//    PRIMARY IMAGE VARIABLE
    
//    echo $builderName.'<br>';
//    echo $builderContact.'<br>';
//    echo $builderArea.'<br>';
//    echo $areaLots;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

.main {
  max-width: 100%;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 10px -16px;
}

.row,
.row > .column {
  padding: 8px;
}

.column {
  float: left;
  width: 33.33%;
  display: none; 
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.content {
  background-color: white;
  padding: 10px;
}

.show {
  display: block;
}

.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>


</head>
<body ng-controller="MainCtrl">


<div class="w3-content" style="max-width:100%">

  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="https://content.presspage.com/uploads/1877/1920_dronephotograph-maxampmoritz-232210.jpg?10000" class="w3-round w3-image" alt="Area" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h2 class="w3-center"><?php echo $builderName?></h2><br>
      <hr>
      <table align="right" style="table-layout:fixed; width:100%;">
  <col width="100">
  <col width="100">
  <col width="100">
  <col width="100">
  <tr>
    <th colspan="2">  Location</th>
    <th colspan="2"> <?php echo $builderArea?></th>
  </tr>
  
  <tr>
    <th align= "center" colspan="2">  Contact</th>
    <th colspan="2"> <?php echo $builderContact?></th>
  </tr>
   <tr>
    <th colspan="2">  Price starting from</th>
    <th colspan="2">  12000$</th>
  </tr>
</table>
  </div>
  </div>
  </div>

  
<div class="main">

<h2>Lots</h2>

<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all </button>
  <button class="btn" onclick="filterSelection('nature')"> Available </button>
  <button class="btn" onclick="filterSelection('cars')"> Hold </button>
  <button class="btn" onclick="filterSelection('people')"> Blank </button>
</div>

<div class="row">
  <div class="column nature">
    <div class="content">
      <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="First" style="width:100%">
      <h4>Lot 1</h4>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Second" style="width:100%">
      <h4>Lot 2</h4>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Third" style="width:100%">
      <h4>Lot 3</h4>
    </div>
  </div>
  
  <div class="column cars">
    <div class="content">
      <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Forth" style="width:100%">
      <h4>Lot 4</h4>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
    <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Fifth" style="width:100%">
      <h4>Lot 5</h4>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
    <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Sixth" style="width:100%">
      <h4>Lot 6</h4>
    </div>
  </div>

  <div class="column people">
    <div class="content">
      <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Seventh" style="width:100%">
      <h4>Lot 7</h4>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Eighth" style="width:100%">
      <h4>Lot 8</h4>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <img src="https://www.ofdesign.net/wp-content/uploads/files/2/4/5/architect-wooden-house-perfect-concept-of-small-plots-1-245.jpg" alt="Ninth" style="width:100%">
      <h4>Lot 9</h4>
    </div>
  </div>
</div>
</div>

  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
    <p>Lets get in touch and talk about your next project.</p>
    <form action="/action_page.php" target="_blank">
      <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
  
  <script>
    filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
  </script>


<footer class="w3-center w3-black w3-padding-16">
  
</footer>

</body></html>
