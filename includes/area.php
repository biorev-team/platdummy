<?php
include("../api/include/dbConnect.php");
$dbCon = new DB_Connect();
$conn = $dbCon->connect();
session_start();

$adminQuery = "SELECT email FROM admins ";
$adminResult = mysqli_query($conn, $adminQuery);

while( $adminRow = mysqli_fetch_array($adminResult) ){
    $adminEmail = $adminRow['email']; 
    
    if($_SESSION['S_EMAIL'] != $adminEmail){
        header("location:../login.php");    
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel</title>
        
        <!--        Bootstrap-->
       <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.0.1/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
  <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        
        <style>
        .select2-container--default .select2-selection--single{
            height: 39px;
            margin-top: 9px;
            padding-top: 7px;
            background-color: transparent;
            border-color: #007bff;
        }    
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top:6px;
            color: #007bff;
        }
            .select2-container--default .select2-selection--single .select2-selection__rendered{
                color: #007bff;
                
            }
             .btn-outline-primary, .btn-outline-danger{
                margin: 0px 5px ;    
            } 
    </style>
        
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
            <a href="../admin-panel.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Builders 
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="area.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Areas</h1>
              <div class="row">
                  <div class="col-sm-4">
              <button id="addArea" style="width:150px; margin-top:10px;" type="submit" class="btn btn-block btn-outline-primary" >Add New Area</button>
                      </div>
                  <div class="col-sm-8">
                <select class="form-control select2" id="selectArea">
                    <option selected disabled>Assign lots to unpublished areas</option>
                </select> 
                      </div>
                  </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Areas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Area Information</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Area </th>
                      <th>Address</th>
                      <th>Builder Assigned</th>
                      <th>Total Lots</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      
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
<script src="../AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.0.1/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.0.1/dist/js/adminlte.min.js"></script>
<!--select2-->
<script src="../AdminLTE-3.0.1/plugins/select2/js/select2.full.min.js"></script>
     <!--SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.6.0/dist/sweetalert2.all.min.js"></script>
    <script> 
        
        //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
        
        var selectedAreaId ;

        $(document).ready(function(){
            
            
            //        FETCHONG DATA FROM DATABASE AND DISPLAYING
            
            $.ajax({
                type: "GET",
                url: "../api/index.php?module=area",
                
                success:function(result){
//                    console.log(result);
                    var counter = 0;
                    var sNumber = 1;
                    $.each(result["body"], function(){
                        
                        var areaName    = result["body"][counter]["area_name"];
                        var areaId      = result["body"][counter]["area_id"];
                        var areaAddress = result["body"][counter]["area_address"];
                        var builderName = result["body"][counter]["builder_name"];
                        var areaStatus  = result["body"][counter]["area_status"];
                        var status      = result["body"][counter]["status"];
                        
                            if(status == "active" && areaStatus == "active"){
                                
                                $("tbody").append('<tr><td>' + sNumber + '</td><td>'+areaName+ '</td><td>'+areaAddress+'</td><td>'+builderName+'</td><td>test</td><td><div class="btn-group"><button type="button" class="btn btn-outline-primary view" value="' + areaId + '">View</button><button type="button" class="btn btn-outline-danger delete" value="'+areaId+'">Delete</button></div></td></tr>');
                                    sNumber++;
                            }
                        
//                    DISPLAYING PASSIVE AREA LIST 
                                if(areaStatus == "passive" && status == "active"){    
                    $("#selectArea").append('<option value = "' +areaId + ' ">'+ areaName + '</option>');     
                    }     
                        counter++;
                        
                    });
                    
                    $( "#selectArea" ).change(function() {
            
            $( "#selectArea option:selected" ).each(function() {
                        selectedAreaId = $(this).val();
//                console.log(selectedAreaId);
                    window.location.href="add-lots.php?id="+selectedAreaId+"";
                    });
            });
                    
//                   VIEW BUTTON
                    
                     $(".view").click(function(){
                        var areaId = $(this).val();
                        window.location.href="view-area.php?id="+areaId+"";
                    });
                    
//                    DELETE BUTTON
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
                          
                            var areaId = $(this).val(); 
                        $.ajax({
                            type: "DELETE",
                            url : "../api/index.php?module=area",
                            data: JSON.stringify({
                                "area_id" : areaId 
                            }),
                            
                            success:function(result){
                                window.location.reload();
                            }
                        })
                                  
                              }
                          })
                        
                        
                    });
                }
            })    
       
//        ADD NEW BUTTON
            
        $("#addArea").click(function(){
            window.location.href="add-area.php";  
                });
            
             });
        
    </script>
    </body>
</html>
                