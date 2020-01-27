<!DOCTYPE html>
<html lang="en-US">
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
    <div class="top-bar">
        
            <img class="logo" src="images/logo.png">
    
    </div>
    <div class="content">
        <div class="container">
        <h1 class="heading">Our Builders</h1>
        <hr class="heading-line">
        <div class="builders">
<!--            <?php echo $display;?>-->
        </div>  
        </div>
    </div>
   <script type="text/javascript" src="AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
    
        $(document).ready(function(){
           $.ajax({
               type:"GET",
               url:"api/index.php?module=builder",
               
               success:function(result){
                   console.log(result);
                   var counter = 0;
                   var rowCounter = 1;
                   var builders = "";
                   $.each(result["body"], function(){
                       var builderName      = result["body"][counter]["builder_name"];
                       var areaName         = result["body"][counter]["area"];
                       var builderEmail     = result["body"][counter]["email"];
                       var builderContact   = result["body"][counter]["contact"];
                       var status           = result["body"][counter]["status"];
                       var builderId        = result["body"][counter]["builder_id"];
                       
                       if(status == "active"){
//                           console.log(rowCounter);
                           if( rowCounter % 3 == 1){
//                               console.log("ed");
                                builders += "<div class='row'>";
                                builders += "<div class='col-sm-4'><div class='builder-wrapper'><img src='images/user.png'><h3>" +builderName+ "</h3><div class='row'><div class='col-sm-3'><p style='text-transform:capitalize;' class='label'>Area:</p></div><div class='col-sm-9'> <p>"+areaName+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Email:</p></div><div class='col-sm-9'> <p>"+builderEmail+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Contact:</p></div><div class='col-sm-9'> <p>"+builderContact+"</p></div></div><button type='button' class='button' value='"+builderId+"'>Explore More</button></div></div>";  
//                               console.log(builders);
                                }
                            else if (rowCounter%3 == 0){
                                
//                                console.log("ed1");

                                builders += "<div class='col-sm-4'><div class='builder-wrapper'><img src='images/user.png'><h3>" +builderName+ "</h3><div class='row'><div class='col-sm-3'><p style='text-transform:capitalize;' class='label'>Area:</p></div><div class='col-sm-9'> <p>"+areaName+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Email:</p></div><div class='col-sm-9'> <p>"+builderEmail+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Contact:</p></div><div class='col-sm-9'> <p>"+builderContact+"</p></div></div><button type='button' class='button' value='"+builderId+"'>Explore More</button></div></div></div>"; 
                                        }
                           else{
//                                                              console.log("ed2");

                              builders += "<div class='col-sm-4'><div class='builder-wrapper'><img src='images/user.png'><h3>" +builderName+"</h3><div class='row'><div class='col-sm-3'><p style='text-transform:capitalize;' class='label'>Area:</p></div><div class='col-sm-9'><p>"+areaName+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Email:</p></div><div class='col-sm-9'><p>"+builderEmail+"</p></div></div><div class='row'><div class='col-sm-3'><p class='label'>Contact:</p></div><div class='col-sm-9'><p>"+builderContact+"</p></div></div><button type='button' class='button' value='"+builderId+"'>Explore More</button></div></div>"; 
                           }
                           
                           
                           rowCounter++;

                       }
                       
                       counter++;
                       
                   });
                   
                   $(".builders").html(builders);
                   
                   $(".button").click(function(){
                        var builderId = $(this).val();
                       window.location.href="area-info.php?id="+builderId+"";
                   });
                   
               }
           }) 
        });
        
        
        
        
    </script>

</body>
</html>

