<?
 function setToken($conn, $username){
    $token = uniqid();
    $sql = "DELETE FROM yypp06_certificate where username= '$username'";
    $conn->query($sql);

    $sql = "INSERT INTO yypp06_certificate (username, token) VALUES('$username', '$token')";
    $result = $conn->query($sql); 
    setcookie("token", $token, time()+3600*24);
 }

 function getUserByToken($conn, $token){
    if(isset($token) && !empty($token)){
        $sql = "SELECT * FROM yypp06_certificate where token ='$token'";
        $result = $conn->query($sql);
      if (!$result || $result->num_rows <= 0) {
        return null;
      }
      $row = $result->fetch_assoc();
      return $row['username'];
    } else {
       $token = '';
    }
  }

  function renderDeleteBtn($id) {
    return "
            <div class='deleteComment'>
                <form method='POST' action='deleteComment.php'>
                    <input type='hidden' name='id' value='$id' />
                    <input type='submit' value='刪除' />
                </form>
            </div>
    ";
  }


    function renderEditBtn($id) {
    return "
            <div class='editComment'>
                <form method='GET' action='editComment.php'>
                    <input type='hidden' name='id' value='$id' />
                    <input type='submit' value='編輯' />
                </form>
            </div>
    ";
  }

?>