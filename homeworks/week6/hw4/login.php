<?php
    require_once('conn.php');
    
    if(!empty($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT * FROM yypp06_users where username=? and password=?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result(); 

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            setcookie("user_id", $row["id"], time()+3600*24);
            header('Location: index.php');
        }else{
            header('Location: login.php');
        }
        $conn->close();
        
    }   
?>   

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登入</title>
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
    <div class='title'>登入</div>
    <div class='board'>
        <div class ='messageBoard'>
            <form method="POST" action="login.php">
                <div>帳號 : <input type="text" name="username"></div>
                <div>密碼 : <input type="password" name="password"></div>
                <a href="register.php">註冊</a>
                <a href="index.php">偷看留言版</a>
                <input type="submit" value="送出" class="submit">
            </form>
        </div>
    </div>
</body>
</html>