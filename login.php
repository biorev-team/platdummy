<?php 
include("api/include/dbConnect.php");
$dbCon = new DB_Connect();
$conn = $dbCon->connect();
session_start();
if( !$_POST["email"] ){
    $emailError = "Please enter your email";
}
else{
    $email = $_POST["email"];
}

if( !$_POST["password"] ){
    $passwordError = "Please enter your password";
}
else{
    $password = $_POST["password"];
}
if( isset($_POST["login"]) ){
    $loginQuery = "SELECT email, hashed_password FROM admins WHERE email = '$email'";
    $loginResult = mysqli_query($conn, $loginQuery);
    
    if(mysqli_num_rows($loginResult) > 0){
        
         $loginRow = mysqli_fetch_array($loginResult); 
             $dbEmail = $loginRow['email'];
             $dbPass  = $loginRow['hashed_password'];
             
             if($dbPass == $password){
                 
                 $_SESSION['S_EMAIL'] = $dbEmail;
//                 echo $_SESSION['S_EMAIL'];
                 header("location:admin-panel.php");
             }
        else{
                $errorBox = "<div class='alert alert-danger' role='alert'>Please check your password</div>"; 
            }
                                        }
    else{
            $errorBox = "<div class='alert alert-danger' role='alert'>No such user exist in database</div>";
        }
    }   


?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
        <!--        FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
        

        <!--        Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" type="text/css">
         <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="background:#f7f7f7;">
        <div class="outer">  
            <div class="middle">
                <div class="inner">
            <form class="login-container" method="post">
                 <center>
                <i class="fas fa-user-circle login-user-icon"></i></center>
             <h2 class="login-heading">Welcome</h2>
              <div class="form-group">
                    
                    <input type="text" id="login-username" name="email" required autofocus autocomplete="none">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Password</label> 
                </div>
               
                <input type="submit" id="login-button" class="btn btn-default" name="login" value="Login">   
                <?php echo $errorBox;?>
            </form> 
                </div>
            </div>
          </div>
      
        <!--        Bootstrap JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    </body>
</html>