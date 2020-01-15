<?php

include('api/include/dbConnect.php');
$dbConn = new DB_Connect();
$conn = $dbConn->connect(); 
if( isset( $_COOKIE[ session_name() ] ) ) {
        
        // empty the cookie
        setcookie( session_name(), '', time()-86400, '/' );
        
    }
    session_start();

    // clear all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('Location:login.php');
?>