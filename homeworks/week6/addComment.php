
<?
    require_once('conn.php');
    require_once('utils.php');
    require_once('checkLogin.php');
     
    if(isset($_POST['content']) && !empty($_POST['content'])){
        $content = $_POST['content'];
        $parent_id = $_POST['parent_id'];       
        $sql = "INSERT INTO yypp06_comments (username, content, parent_id)VALUES('$user', '$content',$parent_id)";
    
    $conn->query($sql);
    $conn->close();
    
    header('Location: index.php');
    }
    

?>   