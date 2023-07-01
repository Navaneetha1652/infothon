<?php
  
    $servername="localhost";
    $email="root";
    $password="root";
    $db_name="login";
  
  $conn = new mysqli($servername,$email,$password,$db_name,3306);
    if($conn->connect_error){
        die('connection failed :'.$conn->connect_error);
    }
    echo "connection successful......";
      
?>