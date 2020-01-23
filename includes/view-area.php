<?php
session_start();
//$areaId = $_SESSION['S_AREA_ID'];
//
//$areaQuery = "SELECT area_name from areas_info WHERE area_id = $areaId";
//$areaResult = mysqli_query($conn, $areaQuery );
//$areaRow = mysqli_fetch_array($areaResult);
//$areaName = $areaRow['area_name'];
//$counter=1;
//$lotsQuery = "SELECT alias, lot_status, lot_price FROM lots WHERE area_id ='$areaId'";
//$lotsResult = mysqli_query($conn, $lotsQuery);
//while( $lotsRow = mysqli_fetch_array($lotsResult) ){
//    $lotNumber = $lotsRow['alias'];
//    $lotStatus = $lotsRow['lot_status'];
//    $lotPrice  = $lotsRow['lot_price'];
//    $lotId     = $lotsRow['lot_id'];
//    $display.= "<tr>
//                    <td><input type = 'text' value='$lotNumber' class='inputs' disabled name='number' ></td>
//                    <td><input type = 'text' value='$lotStatus' class='inputs' disabled name='status' ></td>
//                    <td><input type = 'text' value='$lotPrice' class='inputs' disabled name='price' ></td>
//                    <td><button type='submit' class='btn btn-outline-primary edit' value='$counter' name='edit'>Edit</button>
//                    <button style='visibility:hidden;' type='submit' class='btn btn-outline-success save' value='$counter' name='save'>Save</button>
//                    <button style='visibility:hidden;' type='submit' class='btn btn-outline-danger cancel' value='$counter' name='cancel'>Cancel</button>
//                    </td>
//                    
//                </tr>";
//    $counter++;
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
       <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.0.1/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style>
            
            .inputs{
                border: none;
                outline: none;
                background: transparent;
            }
            
            tr:hover .inputs {
                background: transparent;
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
            <h1 style="text-transform:capitalize;" class="m-0 text-dark"><?php echo $areaName;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Areas</a></li>
              <li style="text-transform:capitalize;" class="breadcrumb-item active"><?php echo $areaName;?> </li>
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
                <h3 class="card-title">Area Lots</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Lot Number</th>
                      <th>Status</th>
                      <th>Price</th>    
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
    <!--SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.6.0/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        
//        GETTING ID FROM URL
        
        var url_string = window.location.href;
        var url = new URL(url_string);
        var id = url.searchParams.get("id");
        
//        DATA FETCHING OF AREA
        $.ajax({
            type: "GET",
            url: "../api/index.php?module=lot&id="+id+"",
            dataType:"json",
            
            success: function(result){
//                console.log(result);
                
                var counter = 0;
                var sNumber = 1;
                       $.each(result["body"], function(){
//                           console.log(result);
                            var lotNumber = result["body"][counter]["alias"];
                            var lotStatus = result["body"][counter]["lot_status"];
                            var lotPrice  = result["body"][counter]["lot_price"];
                           var lotId      = result["body"][counter]["lot_id"];
                           
                           $("tbody").append('<tr><td>'+sNumber+'</td><td><input type = "text" value=' + lotNumber + ' class="inputs" disabled name="number"></td><td><input type = "text" value=' + lotStatus + ' class="inputs" disabled name="status" ></td><td><input type = "text" value=' + lotPrice +' class="inputs" disabled name="price" ></td><td><button type="button" class="btn btn-outline-primary edit" value=' + counter +' name="edit">Edit</button><button style="visibility:hidden;" type="button" class="btn btn-outline-success save" value=' +counter+' name="save">Save</button><button style="visibility:hidden;" type="button" class="btn btn-outline-danger cancel" value=' + counter + ' name="cancel">Cancel</button></td></tr>');
                            
                           counter++;
                           sNumber++;
                            
                           //        EDIT BUTTON CLICK
        $(".edit").click(function(){
            $(this).css("visibility", "hidden");
            $(this).parent().siblings().find("input[type=text]").prop('disabled', false);
            $(this).parent().siblings().find("input[type=text]").removeClass("inputs");
            $(this).siblings().css("visibility","visible");
            $(this).parent().parent().css("background-color", "rgba(0,0,0,.075)");
        });
        
//        CANCEL BUTTON CLICK
        $(".cancel").click(function(){
            $(this).css("visibility", "hidden");
            $(this).siblings(".edit").css("visibility","visible");
            $(this).siblings(".save").css("visibility", "hidden");
            $(this).parent().siblings().find("input[type=text]").prop('disabled', true);
            $(this).parent().siblings().find("input[type=text]").addClass("inputs");
            $(this).parent().parent().css("background-color", "inherit");
        });
        
//        SAVE BUTTON CLICK
        $(".save").click(function(){
            var lotNumber = $(this).parent().siblings().find("input[name=number]").val();
            var lotStatus = $(this).parent().siblings().find("input[name=status]").val();
            var lotPrice = $(this).parent().siblings().find("input[name=price]").val();
            
            console.log(lotNumber);
            console.log(lotId);
            
            $.ajax({
                type:"PUT",
                url: "../api/index.php?module=lot",
                data: JSON.stringify({
                    "lot_id":lotId,
                    "alias":lotNumber,
                    "lot_price":lotPrice,
                    "lot_status":lotStatus
                }),
                dataType:"json",
                success: function(result){
                    
                    if(result["success"]){
                    
                    $(this).css("visibility", "hidden");
            $(this).siblings(".edit").css("visibility","visible");
            $(this).siblings(".cancel").css("visibility", "hidden");
            $(this).parent().siblings().find("input[type=text]").prop('disabled', true);
            $(this).parent().siblings().find("input[type=text]").addClass("inputs");
            $(this).parent().parent().css("background-color", "inherit");
                    
                     Swal.fire({
                                title: '',
                                text: result["body"],
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Back to Area list'
                                }).then((next) => {
                                if (next.value) {
                                    window.location.href="area.php";
                                }
                                })     
                    
                    }
                    
                    else{
                         Swal.fire({
                                title: '',
                                text: result["body"],
                                icon: 'error',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                                }) 
                    }
                
                }
                
            })
        });

                       });
                
      
        }
        })
        
        
                
    </script>
    </body>
</html>