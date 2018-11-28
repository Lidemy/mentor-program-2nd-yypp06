<?

  include_once('checkLogin.php');
  require_once('conn.php');
  require_once('utils.php');

  if (isset($_POST['id']) && !empty($_POST['id'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM yypp06_comments where (id= $id or parent_id= $id) AND username = '$user'";
      if ($conn->query($sql)) {
         
        header('Location:index.php');
      } else {
        }
  }
        
?>