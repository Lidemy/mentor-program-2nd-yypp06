<?
    require_once('conn.php');
    session_start();
    $is_login = false;
    


    if(isset($_SESSION['username'])){
        
        $is_login = true;
        
    }else{

    }
    
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>留言板</title>
    <style>
        .boardTitle{
            text-align: center;
            font-size: 50px;
            margin-top: 4%;

        } 

        .boardMain{
            width: 500px;
            margin: 0px auto;
        }
        textarea{
            width: 99%;
            height: 200px;
            margin-top: 2px;
        }
        .name input{
            width: 25%;
        }
        .btn input{
            margin-top: 5px;
            padding: 8px 25px;
            font-size: 20px;
            color: #fff;
            background: #de8531;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;   
        }
        .comment{
            border: 1px solid rgba(0, 0, 0, 0.5);
            margin: 20px 18px;
            border-left: none;
            border-right: none;
            border-top: none;
        }
        
        .creatTime{
            margin-bottom: 4px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.5);
            display: inline;
            
        }
        .commentHead{
            
        }
        .reply{
            margin-top: 20px;
            margin-left: 20px;

        }
        .replyBoard{
            border: 1px solid rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            border-bottom: none;
 
        }
        .replyBoard textarea{
            width: 95%;
            height: 200px;
            margin-top: 2px;
        }
        .replyBoard .btn{
            margin-left: 77%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class='boardMain'> 
        <?
            if(!$is_login){
        ?>
                <a href="register.php">註冊</a>
                <a href="login.php">登入</a>
        <? }else{
        ?>
                <a href="logout.php">登出</a>
        <? }
        ?>

        <h1 class='boardTitle'>留言板</h1>
        <div class="boardForm">
            <form method="POST" action="addComment.php">
                <div><textarea name="content" placeholder="留言內容"></textarea></div>
                <input type="hidden" name="parent_id" value="0" />
                <?
                    if($is_login){
                        echo "<div class='btn'><input type='submit' value='送出'></div>";
                    }else{
                        
                    }
                ?>
                
            </form>
        </div>
        <div class="replyBoard">
<?
    require_once("conn.php");
    $sql = "SELECT yypp06_comments.id, yypp06_comments.content, yypp06_comments.time, yypp06_users.nickname FROM 
    yypp06_comments left join yypp06_users on yypp06_comments.user_id = yypp06_users.id where parent_id = 0 order by time DESC";
    $result = $conn->query($sql);

    while($row = $result ->fetch_assoc()){
?>
            <div class="comment">
                    <div class="commentHead">
                        <div class='author'><? echo $row['nickname'] ?></div>
                        <div class='creatTime'><? echo $row['time'] ?></div>
                    </div>
                    <div class="content"><? echo htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') ?></div>
            </div>

            <div class='reply'>
<?
    $parent_id =$row['id'];
    $sql_child = "SELECT  yypp06_comments.*, yypp06_users.nickname FROM yypp06_comments left join yypp06_users on 
     yypp06_users.id = yypp06_comments.user_id where parent_id = $parent_id order by time DESC";
    $result_child = $conn->query($sql_child);

    while($reply = $result_child ->fetch_assoc()){

?>
                <div class='comment'>
                    <div class="commentHead">
                        <div class="author"><? echo $reply['nickname'] ?></div>
                        <div class="creatTime"><? echo $reply['time'] ?></div>
                    </div>
                    <div class="content"><? echo htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') ?></div>
                </div>
<?
    }  
?>
                <div class="boardForm">
                    <form method="POST" action="addComment.php">
                        <div><textarea name="content" placeholder="留言內容"></textarea></div>
                        <input type="hidden" name="parent_id" value="<? echo $row['id']?>" />
                        <?
                            if($is_login){
                                echo "<div class='btn'><input type='submit' value='送出'></div>";
                            }else{
                                
                            }
                        ?>
                        
                    </form>
                </div>
            </div>
            <div class="brbr">×××××××××××××××××××××××××××××××××××××××××××××××××××</div>

<?
    }
?>
         
        </div>
    </div>
</body>
</html>