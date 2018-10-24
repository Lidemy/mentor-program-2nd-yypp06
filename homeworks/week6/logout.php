<?
 require_once('conn.php');
 session_start();
 unset($_SESSION['user_id']);
 
 header('Location: login.php');
?>