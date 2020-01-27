<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--    Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">  
     <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.0.1/dist/css/adminlte.min.css">
<!--    Stylesheet-->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>


    <div class="content">
        <div class="top-bar">
        
            <img class="logo" src="images/logo.png">
    
        </div>
        <div class="container">
            <h1 class="title">Lots</h1><hr><br>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Lot Number</th>
                      <th>Status</th>
                      <th>Price</th>    
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
    
   <script src="AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        //        GETTING ID FROM URL
        
        var url_string = window.location.href;
        var url = new URL(url_string);
        var id = url.searchParams.get("id");
        
          $.ajax({
              type: "GET",
              url : "api/index.php?module=lot&id="+id +"",
              
              success:function(result){
                  var sNumber = 1;
                  var counter = 0;
                  $.each(result["body"], function(){
                           console.log(result);
                            var lotNumber = result["body"][counter]["alias"];
                            var lotStatus = result["body"][counter]["lot_status"];
                            var lotPrice  = result["body"][counter]["lot_price"];
                           
                           $("tbody").append('<tr><td>'+sNumber+'</td><td>'+lotNumber+'</td><td>'+lotStatus+'</td><td>'+lotPrice+'</td></tr>');
                            
                           counter++;
                           sNumber++;
                            });
              }
          })
      
    </script>

</body>
</html>
