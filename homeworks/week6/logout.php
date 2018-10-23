<?
 require_once('conn.php');
 $session_id = $_COOKIE["session_id"]; 
 $update ="UPDATE yypp06_certificates SET is_deleted=0 WHERE id ='$session_id' "; 
 $conn->query($update);
 setcookie("session_id", '', time()+3600*24);
 header('Location: login.php');
?>