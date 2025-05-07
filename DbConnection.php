<?php
  $servername= "localhost";
  $username= "root";
  $password="";
  $DBName= "homebanking";

  $con=new mysqli($servername,$username,$password,$DBName);
  if($con->error){
    die("Connection failed: ".$con->connect_error . "<br>");
  }
?>