<?php
$conn = mysqli_connect(" "," "," "," ");


// Check connection
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $conn->query("SET NAMES 'UTF8'");
  $conn->query("SET time_zone = '+08:00'");
  
?>