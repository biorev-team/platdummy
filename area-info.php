<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--    Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">   
<!--    Stylesheet-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <div class="content">
        <div class="top-bar">
        
            <img class="logo" src="images/logo.png">
    
        </div>
        <div class="container">
            <h1 class="title">Builder <span class="builder-name"></span> Areas</h1><hr><br>
            <div class="areas">
            </div>
        </div>
    </div>
    
   <script src="AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        
        $(document).ready(function(){
        
            var url_string = window.location.href;
            var url = new URL(url_string);
            var builderId = url.searchParams.get("id");
            
            $.ajax({
                type:"GET",
                url:"api/index.php?module=area",
                
                success:function(result){
                    var counter = 0;
                     var areas = "";
                    $.each(result["body"], function(){
                       
                        if( result["body"][counter]["builder_id"] == builderId ){
                            
                            var areaName     = result["body"][counter]["area_name"];
                            var builderName  = result["body"][counter]["builder_name"];
                            var areaAddress  = result["body"][counter]["area_address"];
                            var areaId       = result["body"][counter]["area_id"];
                            var builderName  = result["body"][counter]["builder_name"];
                            
                            $(".builder-name").html(builderName);
                            var rowCounter = 1;
                            
                             if( rowCounter % 3 == 1){
                                 areas += "<div class='row'><div class='col-sm-4'><div class='builder-wrapper'><img class='card-image' src='images/community-halfmoon.jpg'><h3>"+areaName+"</h3><div class='row'><div class='col-sm-3'><p class='label'>Location:</p></div><div class='col-sm-9'> <p>"+areaAddress+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Builder Assigned:</p></div><div class='col-sm-9'><p style='text-transform:capitalize;'>"+builderName+"</p></div></div><button type='button' class='button view' value='"+areaId+"'>View Lots</button></div></div>";  
                             }
                            else if (rowCounter % 3 == 0){
                                
                                areas += "<div class='col-sm-4'><div class='builder-wrapper'><img class='card-image' src='images/community-halfmoon.jpg'><h3>"+areaName+"</h3><div class='row'><div class='col-sm-3'><p class='label'>Location:</p></div><div class='col-sm-9'> <p>"+areaAddress+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Builder Assigned:</p></div><div class='col-sm-9'><p style='text-transform:capitalize;'>"+builderName+"</p></div></div><button type='button' class='button view' value='"+areaId+"'>View Lots</button></div></div></div>"; 
                    
                            }
                            else{

                                areas += "<div class='col-sm-4'><div class='builder-wrapper'><img class='card-image' src='images/community-halfmoon.jpg'><h3>"+areaName+"</h3><div class='row'><div class='col-sm-3'><p class='label'>Location:</p></div><div class='col-sm-9'> <p>"+areaAddress+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Builder Assigned:</p></div><div class='col-sm-9'><p style='text-transform:capitalize;'>"+builderName+"</p></div></div><button type='button' class='button view' value='"+areaId+"'>View Lots</button></div></div>"; 
                            
                            }
                            
                            rowCounter++;
                            
                        }
                        
                            
                        counter++;
                    });
                    
                    $(".areas").html(areas);
                    
                    $(".view").click(function(){
                    var areaId = $(this).val();
                    window.location.href="lots-info.php?&id="+areaId+"";
                    });
                }
            })
        
      
            
        
        });        
    </script>

</body>
</html>
