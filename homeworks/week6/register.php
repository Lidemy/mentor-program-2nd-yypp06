
<?php
    require_once('conn.php');
    require_once('utils.php');
    

    if(!empty($_POST['username']) && !empty($_POST['password']) && 
       !empty($_POST['nickname']) && isset($_POST['password']) &&
       isset($_POST['username']) && isset($_POST['nickname']) 
        ){
        $nickname = $_POST['nickname'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO yypp06_users (username, password, nickname)VALUES('$username','$password','$nickname')";
        
        if($conn->query($sql)){
            setToken($conn, $username);
            header('Location: index.php');
        }else{
            
        
    }
    $conn->close();
    }
    
    
?>   

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>註冊</title>
    <style>
        .title{
            text-align: center;
            font-size: 50px;
            margin-top: 10%;
        }
        .board{
            
            font-size: 30px;
        }
        form{
           margin: 1% 30%;
        }

        .messageBoard{
            margin-left:15%; 
        }
        .submit{
            margin-left: 5%;
        }
       a{
        font-size: 20px;
       }

    </style>
</head>
<body>
    <div class='title'>註冊</div>
    <div class='board'>
        <div class ='messageBoard'>
            <form method="POST" action="register.php">
                <div>帳號 : <input type="text" name="username"></div>
                <div>密碼 : <input type="password" name="password"></div>
                <div>暱稱 : <input type="text" name="nickname"></div>
                <a href="login.php">登入</a>
                <a href="index.php">偷看留言版</a>
                <input type="submit" value="送出" class="submit">
            </form>
        </div>
    </div>
</body>
</html> 