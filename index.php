

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>plat</title>
        
        <!--        Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

        <!--        Stylesheet-->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <!--        FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
      
    <body> 
        <div class="wrapper">
            <?php echo file_get_contents("plot.svg"); ?>
            
            <div class="color-palate"> 
            
                <div id="red" class="color-box">Sold</div>
                <div id="green" class="color-box">Available</div>
                <div id="blue" class="color-box">Hold</div>
                <div id="yellow" class="color-box">Blank</div>
                
            </div>
            
<!--
             Button trigger modal 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
</button>
-->

<!-- Modal -->
<!--
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
-->
        </div>
        <button class="reload-button"><i class="fas fa-redo-alt reload-icon"></i></button>
       
    </body>
        <!--        Bootstrap JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/index.js"></script>
        
    <script type="text/javascript">
         
        function test(){
        $.ajax({
            type: "POST",
            url: "api/include/functions.php",
            dataType:"json",
            
            success: function(result){
//                console.log(result);
  
                   $("g").each(function(){
                  var id =  $(this).attr("id");
                       $("#" + (id)).find("path").attr("fill",result[id-1].color);  
                        $("#" + (id)).find("path").attr("stroke",result[id-1].color); 
                        
                       $("#" + (id)).find("polygon").attr("fill",result[id-1].color);  
                        $("#" + (id)).find("polygon").attr("stroke",result[id-1].color);  
                     
                         $("#" + (id)).find("polyline").attr("fill",result[id-1].color);  
                        $("#" + (id)).find("polyline").attr("stroke",result[id-1].color);  
                        
                         $("#" + (id)).find("rect").attr("fill",result[id-1].color);  
                        $("#" + (id)).find("rect").attr("stroke",result[id-1].color);  

                     if( result[id-1].status == "available" ){
                  
                  $("#"+(id)).click(function(){
                     console.log(id);
                      $("g").find("path").attr("fill","white");
                      $("g").find("path").attr("stroke","white");
                      $("g").find("polygon").attr("fill","white");
                      $("g").find("polygon").attr("stroke","white");
                       $("g").find("polyline").attr("fill","white");
                      $("g").find("polyline").attr("stroke","white");
                         $("g").find("rect").attr("fill","white");
                      $("g").find("rect").attr("stroke","white");
                      $(this).find("path").attr("fill",result[id-1].color);  
                        $(this).find("path").attr("stroke",result[id-1].color);  
                        $(this).find("polygon").attr("fill",result[id-1].color);  
                        $(this).find("polygon").attr("stroke",result[id-1].color);  
                        $(this).find("rect").attr("fill",result[id-1].color);  
                        $(this).find("rect").attr("stroke",result[id-1].color);  
                        $(this).find("polyline").attr("fill",result[id-1].color);  
                        $(this).find("polyline").attr("stroke",result[id-1].color);  
                      
                });
//                         
//                         $("#"+(id)).click(function(){
//                         
//                        $("g").find("path").attr("fill","white");
//                      $("g").find("path").attr("stroke","white");
//                      $("g").find("polygon").attr("fill","white");
//                      $("g").find("polygon").attr("stroke","white");
//                       $("g").find("polyline").attr("fill","white");
//                      $("g").find("polyline").attr("stroke","white");
//                         $("g").find("rect").attr("fill","white");
//                      $("g").find("rect").attr("stroke","white");
//                      $(this).attr("fill",result[id-1].color);  
//                        $(this).attr("stroke",result[id-1].color); 
//                         });
//                         
//                         
//                         $("#"+(id)).click(function(){
//                         
//                         $("g").find("path").attr("fill","white");
//                      $("g").find("path").attr("stroke","white");
//                      $("g").find("polygon").attr("fill","white");
//                      $("g").find("polygon").attr("stroke","white");
//                       $("g").find("polyline").attr("fill","white");
//                      $("g").find("polyline").attr("stroke","white");
//                         $("g").find("rect").attr("fill","white");
//                      $("g").find("rect").attr("stroke","white");
//                      $(this).attr("fill",result[id-1].color);  
//                        $(this).attr("stroke",result[id-1].color); 
//                         
//                         });
//                             
//                         
//                         $("#"+(id)).click(function(){
//                             
//                         $("g").find("path").attr("fill","white");
//                      $("g").find("path").attr("stroke","white");
//                      $("g").find("polygon").attr("fill","white");
//                      $("g").find("polygon").attr("stroke","white");
//                       $("g").find("polyline").attr("fill","white");
//                      $("g").find("polyline").attr("stroke","white");
//                         $("g").find("rect").attr("fill","white");
//                      $("g").find("rect").attr("stroke","white");
//                      $(this).attr("fill",result[id-1].color);  
//                        $(this).attr("stroke",result[id-1].color); 
//                         });
//                         
                        }
                       
                   });

                
//                 $("polygon").click(function(){
//                    $(".modal").modal("show");
//                });
//                 $("polyline").click(function(){
//                    $(".modal").modal("show");
//                });
//                 $("rect").click(function(){
//                    $(".modal").modal("show");
//                });
            
                 
            }
            
        })
        }
        test();
       $(".reload-button").click(function(){
            $(".reload-icon").toggleClass("rotate");
            $( ".wrapper" ).load(window.location.href + " .wrapper",function(){
               test(); 
            });
        });
        
      
        
    
    </script>
</html>