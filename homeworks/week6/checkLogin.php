<?php
  include_once('conn.php');
  include_once('utils.php');
    
  $user = getUserByToken($conn, $_COOKIE['token']);  
  
?>