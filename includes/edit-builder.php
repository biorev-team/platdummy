<?php
include("../api/include/dbConnect.php");
$dbConn = new DB_Connect();
$conn = $dbConn->connect();
// $builderId = $_SESSION['S_BUILDER_ID'];
//$editBuilderQuery = "SELECT builders_info.email, builders_info.builder_name, builders_info.contact, areas_info.area_name, areas_info.lots, areas_info.primary_image FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id WHERE builders_info.status ='active' AND areas_info.status='active' AND builders_info.builder_id = '$builderId'";
//    
//    $editBuilderResult = mysqli_query($conn, $editBuilderQuery);
//
//    while( $editBuilderRow = mysqli_fetch_array($editBuilderResult) ){
//    
//    $builderName    = $editBuilderRow['builder_name'];
//    $builderEmail   = $editBuilderRow['email'];
//    $builderArea    = $editBuilderRow['area_name'];
//    $builderPrImage = $editBuilderRow['primary_image'];
//    $builderLots    = $editBuilderRow['lots'];
//    $builderContact = $editBuilderRow['contact'];
//        
//        if($builderPrImage == ""){
//            $builderPrImage = "https://www.freeiconspng.com/uploads/no-image-icon-11.PNG";
//        }
//}
//if( isset( $_POST['save'] ) ){
//    
//    if( !$_POST['name'] ){
//        $nameError = "Please enter your name";   
//        }
//    else{
//        $formName = $_POST['name'];
//    }
//    
//    if( !$_POST['email'] ){
//        $emailError = "Please enter your email";   
//    }
//    else{
//        $formEmail = $_POST['email'];
//    }
//    
//    if( !$_POST['contact'] ){
//        $contactError = "Please enter your contact";   
//}
//    else{
//        $formContact = $_POST['contact'];
//    }
//    if( !$_POST['area'] ){
//        $areaError = "Please enter your area";   
//}
//    else{
//        $formArea = $_POST['area'];
//    }
//    if( !$_POST['lots'] ){
//        $lotsError = "Please enter number of lots";   
//}
//    else{
//        $formLots = $_POST['lots'];
//    }
//    if( !$_POST['fileToUpload'] ){
//        $imageError = "Please select the image";   
//    }
//    else{
//        $formImage = $_POST['fileToUpload'];
//    }
//    
////    echo $builderId;
//    if( $formName && $formEmail && $formContact && $formLots && $formImage && $formArea ){
//       $updateQuery = "UPDATE builders_info INNER JOIN areas_info ON ( builders_info.builder_id = areas_info.builder_id ) 
//       SET 
//            builders_info.builder_name = '$formName' ,
//            builders_info.contact      = '$formContact',
//            builders_info.email        = '$formEmail',
//            areas_info.area_name       = '$formArea',
//            areas_info.lots            = '$formLots',
//            areas_info.primary_image   = '../images/$formImage'
//            WHERE builders_info.builder_id = '$builderId' AND areas_info.builder_id = '$builderId'
//            ";
//    if(mysqli_query( $conn, $updateQuery )){
//        echo "<div class='alert alert-success'>Successfully Changed</div>";
//    }
//    else{
//        echo "<div class='alert alert-danger'>Please check your internet connection or try again later.</div>";
//    }
//    }
//    
//    else{
//        echo "<div class='alert alert-danger'>No Updates Done</div>";
//    }
//}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>
        
        <!--        Bootstrap-->
       <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.0.1/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../logout.php"><i
            class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Plat Dummy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="../admin-panel.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Builders 
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="area.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Areas 
              </p>
            </a>
          </li>
            
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Builders</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <form role="form" method="post" action="http://localhost/platdummy/api/builder/update.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input style="text-transform:capitalize;" type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" placeholder="Enter contact number" name="contact">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-primary" name="save" id="saveButton">Save Changes</button>
                </div>
              </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.0.1/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.0.1/dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        
        var builderId = localStorage.getItem("builderid");
        $.ajax({
                type: "GET",
                url: "../api/builder/single.php",
                data: "id=" + builderId,
                success: function(result){
                    $("#name").val(result["body"][0]["builder_name"]);
                    $("#email").val(result["body"][0]["email"]); 
                    $("#contact").val(result["body"][0]["contact"]);
                }
            })
        
        $("#saveButton").click(function(){
                var name    = $("#name").val();
                var email   = $("#email").val();
                var contact = $("#contact").val();
            $.ajax({
                type: "POST",
                url : "../api/builder/update.php",
                data: JSON.stringify({
                    "builder_id": builderId,  
                    "name": name,
                    "email":email,
                    "contact":contact
            }),
                dataType:"json",
                
                
                success:function(result){
                    console.log(result);
                }
                
            }) 
        });
        
//        DISPLAY UPLOAD IMAGE
        function readFile() {
    if(this.files[0].size > 1000000){
        alert("File must be less than 1MB");
       this.value = "";
    }
    else{
          if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.onload = function(e) {
              document.getElementById("imgupload").src = e.target.result;
              document.getElementById("imgupload").style.width = "200px";
                
            };
            FR.readAsDataURL( this.files[0] );
          }
        }
}

        var el= document.getElementById("avatar");
        
        if(el){
        el.addEventListener("change", readFile, false);
        }
    </script>
    </body>
</html>