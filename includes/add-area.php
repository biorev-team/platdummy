<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add New</title>
        
        <!--        Bootstrap-->
       <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.0.1/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Select2 -->
  <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../AdminLTE-3.0.1/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">  
        <!--        SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.6.0/dist/sweetalert2.all.min.js"></script>    <style>
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
            <h1 class="m-0 text-dark">Add New Area</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Areas</a></li>
              <li class="breadcrumb-item active">Add New</li>
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
                    <div class="row">
                        <div class="col-sm-6">
                  <div class="form-group">
                    <label for="name">Area Name:</label>
                    <input style="text-transform:capitalize;" type="text" class="form-control" id="name" placeholder="Enter area name" name="name">
                  </div>
                        </div>
                        <div class="col-sm-6">

                  <div class="form-group">
                    <label for="address">Area Address:</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter area address" name="email">
                  </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                    <div class="form-group">
                  <label>Assign Builder</label>
                  <select class="form-control select2" id="selectBuilder">
                    <option selected disabled>Nothing Selected</option>
                  </select>
                </div>
                            </div>
                        </div>
                  <div class="form-group">
                    <label> Primary Image:</label>
             <div class="margin-bottom margin-top">
                 <input type="file" class="form-control" name="fileToUpload" id="avatar"><br>
                 <label id="labelForAvatar" for="avatar">
                     <img src="../images/placeholder-logo.png" id="imgupload">
                 </label>
             </div> 
                    </div>    
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-primary" name="add" id="addButton" value="false">Add New</button>
                </div>
              </form>
          
          <form role="form">
                <div class="card-body">
                    <div class="form-group">
                    <label> Select File:</label>
             <div class="margin-bottom margin-top">
                 <input type="file" class="form-control" name="file" id="file">
             </div> 
                    </div>           

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="import">Import File</button>
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
        var imageAddress = "G:/Ampps/www/platdummy/images/primary_images/";
        var selectedOption;
        var pImageName;
        var builderId;
        
//AJAX FOR READING BUILDER
        $.ajax({
            type: "POST",
            url: "../api/builder/read.php",
            
            
            success:function(result){
                var id = 0;
                $.each(result["data"],function(){
                    $("#selectBuilder").append('<option value = ' + result["data"][id]["builder_id"] + ' >' + result["data"][id]["builder_name"] + '</option>' ); 
                    id++;
                });     
            }
        })
        
        
        
        $( "#selectBuilder" ).change(function() {
            
            $( "#selectBuilder option:selected" ).each(function() {
                        selectedOption = $(this).html();
                        builderId = $(this).val();
//                console.log(selectedOption);
                
                    });
            }).trigger( "change" );
         
        
                $("#avatar").change(function(){
                pImageName = $('#avatar').val().split('\\').pop() + $.now();   
                });
        
//             Insert Area AJAX
         $("#addButton").click(function(){
             var areaName   = $("#name").val();
             var areaAddress = $("#address").val();
             
                        $.ajax({
                            type: "POST",
                            url : "../api/area/create.php",
                            data: JSON.stringify({
                                "builder_id": builderId,
                                "area_name" : areaName,
                                "area_address" : areaAddress,
                                "primary_image" : imageAddress + pImageName 
                            }),
                            dataType :"json",
                            
                            success: function(result){
                                
//                                console.log(result);
                               
                                Swal.fire({
                                title: '',
                                text: result["body"][0],
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Back to list'
                                }).then((next) => {
                                if (next.value) {
                                    window.location.href="area.php";
                                }
                                })
                               
                            }
                        })  
                    });
        
//        Import AJAX
        
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
                        console.log(result);
                    }
                }
            })
    
                     });
        
       
            
//        Display Image
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