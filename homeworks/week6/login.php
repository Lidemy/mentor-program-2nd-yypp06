<?php
    require_once('conn.php');
    
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $conn->prepare( "SELECT * FROM yypp06_users WHERE username=? ");
        $sql->bind_param("s" ,$username ); 
        $sql->execute();
        $sql_result = $sql->get_result();
        $sql_row = $sql_result->fetch_assoc();
        $hash = $sql_row['password'];
        $id = $sql_row['id'];
    if (password_verify($password, $hash)) {
        $session_id = uniqid(); 
        $create = "INSERT INTO yypp06_certificates VALUES ('$session_id', $id, 1)";
        $conn->query($create) or die ('error');
        setcookie("session_id", $session_id, time()+3600*24); 
        header('Location: forum.php');
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