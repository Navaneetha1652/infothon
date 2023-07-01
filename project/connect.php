<?php
  define( 'WP_DEBUG', false);
  define( 'WP_DEBUG_DISPLAY', false );
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    
    $conn = new mysqli('localhost','root','','test1');
    if($conn->connect_error){
        die('connection failed    :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName,lastName,email,address,city)
        values(?, ?, ?, ?, ?");
        $stmt->bind_param("sssss",$firstName,$lastName,$email,$address,$city);
        $stmt->execute();
        echo "registration successfully......";
        $stmt->close();
        $conn->close();
        }
?>