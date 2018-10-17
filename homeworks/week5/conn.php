<?php
$conn = mysqli_connect(" ",""," "," ");
$conn->query("SET NAMES 'UTF8'");


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
?>