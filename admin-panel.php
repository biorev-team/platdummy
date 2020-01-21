<?php 
include("api/include/dbConnect.php");
$dbCon = new DB_Connect();
$conn = $dbCon->connect();
session_start();
$adminQuery = "SELECT email FROM admins ";
$adminResult = mysqli_query($conn, $adminQuery);
while( $adminRow = mysqli_fetch_array($adminResult) ){
    $adminEmail = $adminRow['email']; 
    
    if($_SESSION['S_EMAIL'] != $adminEmail){
        header("location:login.php");    
    }
    
//    else{

//$builderInfoQuery = "SELECT builders_info.email,builders_info.builder_id, builders_info.builder_name, builders_info.contact, areas_info.area_name FROM builders_info INNER JOIN areas_info ON builders_info.builder_id = areas_info.builder_id WHERE builders_info.status ='active' AND areas_info.status='active'";
//
//$builderInfoResult = mysqli_query($conn, $builderInfoQuery);
//$counter = 1;
//
//while( $builderRow = mysqli_fetch_array( $builderInfoResult ) ){
//   
//    $builderId       = $builderRow['builder_id'];
//    $builderName    = $builderRow['builder_name'];
//    $builderContact = $builderRow['contact'];
//    $builderArea    = $builderRow['area_name'];
//    $builderEmail   = $builderRow['email'];
//    
//         
//    $display.= "<tr>
//                    <td>$builderId</td>
//                    <td>$builderName</td>
//                    <td>$builderEmail</td>
//                    <td>$builderContact</td>
//                    <td>$builderArea</td>
//                    <td><form method='post'><button type='submit' class='btn btn-block btn-outline-primary' value='$counter' name='edit'>Edit</button></form></td>
//                </tr>";
//    $counter++;
//    
//}
//    }
}

//if( isset( $_POST['edit'] ) ){
//    $btnValue = $_POST['edit'];
//    
//    $editBuilderQuery = "SELECT builder_id FROM builders_info WHERE builder_id = '$btnValue' AND status = 'active'";
//    $editBuilderResult = mysqli_query($conn, $editBuilderQuery);
//    $editBuilderRow = mysqli_fetch_array($editBuilderResult);
//    
//    $builderId    = $editBuilderRow['builder_id'];
//    
//    $_SESSION['S_BUILDER_ID'] = $builderId;
//    header("location:includes/edit-builder.php");
//}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel</title>
        
        <!--        Bootstrap-->
       <link rel="stylesheet" href="AdminLTE-3.0.1/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.0.1/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
        <a class="nav-link" href="logout.php"><i
            class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
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
            <a href="admin-panel.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Builders 
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="includes/area.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Builders</h1>
              <button id="add" style="width:150px; margin-top:10px;" type="submit" class="btn btn-block btn-outline-primary" >Add New Builder</button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Builders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Builders Personal Data</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Area</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $display;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>  
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
<script src="AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-3.0.1/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-3.0.1/dist/js/adminlte.min.js"></script>
<script src="AdminLTE-3.0.1/dist/js/demo.js"></script>
    <!--SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.6.0/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $("#add").click(function(){
            window.location.href="includes/new-builder.php"; 
        });
        
$(document).ready(function(){
           
            $.ajax({
                type: "GET",
                url: "api/index.php?module=builder",
                
                success: function(result){
                    console.log(result);
                    var id =0;
                    var snumber = 1;
                    $.each(result["body"], function(){
                        
                        var builderId       = result["body"][id]["builder_id"];
                        var builderName     = result["body"][id]["builder_name"];
                        var builderContact  = result["body"][id]["contact"];
                        var builderStatus   = result["body"][id]["status"];
                        var builderArea     = result["body"][id]["area"];
                        var email           = result["body"][id]["email"];
                        
//                        console.log(builderStatus);
                            
                            if( builderStatus == "active" ){
                            
                        $("tbody").append("<tr><td>" + snumber  + "</td><td>" +builderName + "</td><td>" + email +"</td><td>" +builderContact+ "</td><td>" +builderArea +"</td><td><div class='btn-group'><button type='button' class='btn btn-outline-primary edit' value=" + builderId + " name='edit'>Edit</button><button type='button' class='btn btn-outline-danger delete' value=" + builderId + " >Delete</button></div></td></tr>");
                         snumber++
                            }
                       
                    id++;
                       });
                    
                         $(".edit").click(function(){
                            var builderId = $(this).val();    
                        localStorage.setItem("builderid", builderId);
                             window.location.href ="includes/edit-builder.php";
                    });
                    
                      $(".delete").click(function(){
                          
                          Swal.fire({
                            title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                          }).then((yes) => {
                              if (yes.value) {
                                  Swal.fire(
                                      'Deleted!',
                                      'Builder has been deleted.',
                                      'success')
                          
                            var builderId = $(this).val();    
                            $.ajax({
                                type: "DELETE",
                                url : "api/index.php?module=builder",
                                data: JSON.stringify({
                                      "builder_id": builderId
                                }),
                                dataType: "json",
                                
                                success: function(result){
                                    window.location.reload();
                                }
                                
                            });
                                  
                              }
                          })
                    });
                }
            })
            

        });
    </script>

    </body>
</html>