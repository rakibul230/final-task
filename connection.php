<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "HMS";


$conn = mysqli_connect($servername,$username,$password,$dbname); 

if($conn)
   {
   //echo "connection ok with database";
   }

else 
  {
  echo "connection failed with database".mysqli_connect_error();
  }
 
?>