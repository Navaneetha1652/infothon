<?php
  if(isset($_POST['firstName'])){
    $firstName=$_POST['firstName'];
  }
  if(isset($_POST['lastName'])){ 
    $lastName=$_POST['lastName'];
  }
  if(isset($_POST['email'])){  
  $email=$_POST['email'];
  }
  if(isset($_POST['address'])){
    $address=$_POST['address'];
  }
  if(isset($_POST['city'])){
    $city=$_POST['city'];
  }
    
    $conn = new mysqli('localhost','root','','test3');
    if($conn->connect_error){
        die('connection failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into register2(firstName,lastName,email,address,city)
        values(?, ?, ?, ?, ?");
        $stmt->bind_param("sssss",$firstName,$lastName,$email,$address,$city);
        $execval=$stmt->execute();
        echo $execval;
        echo "registration successfully......";
        $stmt->close();
        $conn->close();
        }
?>