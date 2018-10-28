
<?php
    session_start();
    require_once('conn.php');
    //$nickname = $_POST['nickname'];
    $content = $_POST['content'];
    $parent_id = $_POST['parent_id'];
    $user_id = $_SESSION['id'];
    echo $_SESSION['id'];
    $sql = "INSERT INTO yypp06_comments (user_id, content, parent_id)VALUES($user_id,'$content',$parent_id)";


    $conn->query($sql);
    $conn->close();
    echo '已送出留言';
    header('Location: index.php');

    

 ?>   