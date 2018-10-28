
<?php
    require_once('conn.php');
    session_start();
    
    if(!empty($_POST['username'])){
        $nickname = $_POST['nickname'];
        $username = $_POST['username'];
        $user_id = $_SESSION['id'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO yypp06_users (username, password, nickname)VALUES('$username','$password','$nickname')";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
       
        

        if($result){
            $last_id=$conn->insert_id;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            
        }
        $conn->close();
        header('Location: index.php');
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