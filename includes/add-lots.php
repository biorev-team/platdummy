<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add New</title>
        
        <!--        Font Awesome-->
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
            height: 36px;
        }    
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top:4px;
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
            <h1 class="m-0 text-dark">Import Lots Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Areas</a></li>
              <li class="breadcrumb-item active">Import lots</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            
           <form role="form">
                <div class="card-body">
                    <label> Select File:</label>
                    <div class="form-group row">
                        <div class="col-sm-10">
                    
             <div class="margin-bottom margin-top">
                 <input type="file" class="form-control" name="file" id="file">
             </div> 
                        </div>
                        <div class="col-sm-2">
                        <button type="button" class="btn btn-danger" id="import">Import</button>
                    </div>           
                        </div>
                </div>
              </form>
           <div class="card-footer">
                  <button type="button" class="btn btn-success" id="upload" value="false">Upload</button>
                </div>
         
          
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
<!--select2-->
    <script src="../AdminLTE-3.0.1/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.0.1/dist/js/adminlte.min.js"></script>
<!--SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.6.0/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        
//Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
        
//        Defining Variables
        var selectedOption;
        var lots = []; 
        
//        Getting id from link
        
        var url_string = window.location.href;
        var url = new URL(url_string);
        var areaId = url.searchParams.get("id");
        
//        Import File
        
                $("#import").click(function(){
                    
                    var file_data = $('#file').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            $.ajax({
                type :"POST",
                url: "../api/include/export.php",
                data : form_data,
                contentType: false,
                cache: false,
                processData:false,
                
                success: function(result){
                    if(result == "Error1"){
                        alert("Invalid File");
                    }
                    else if(result == "Error2"){
                        alert("Please select file");
                    }
                    else{
//                        console.log(result);
                        Swal.fire({
                                title: '',
                                text: 'Imported Successfuly',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                                })
                        
                        lots = result;
                        
                    }
                }
            })
                     });
//        SENDING DATA TO DATABASE
        
        $("#upload").click(function(){
            
            $.ajax({
                type:"POST",
                url:"../api/index.php?module=lot",
                data:JSON.stringify({
                    "lots" : lots,
                    "area_id": areaId 
                }),
                dataType:"json",
                
                success:function(result){
                    if(result["success"]){
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
                        
                         $.ajax({
                             type: "PUT",
                             url : "../api/index.php?module=area",
                             data: JSON.stringify({
                                 "area_id" : areaId
                             }),
                             dataType: "json",
                             
                             success:function(result){
                                 console.log(result);
                             }
                         })
                    }
                    
                   
                    
                    else{
                        Swal.fire({
                                title: '',
                                text: result["body"],
                                icon: 'error',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Retry'
                                })
                    }
                }
                
            })    
        });
        

   
    </script>
    </body>
</html>