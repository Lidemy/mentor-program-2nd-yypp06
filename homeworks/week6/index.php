<?
    require_once('conn.php');
    require_once('utils.php');
    require_once('checkLogin.php'); 

    $token = false;

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>留言板</title>
    <style>
        body{
        background: block;           
        background-image: url(https://i.pinimg.com/originals/0d/2c/0e/0d2c0e0afd40114e18bc605c3ec38158.jpg);
        background-repeat: no-repeat;
        background-attachment:fixed;
        background-position: 10% 40%;     
        background-color:#f6f6f6;         
        }
       
        .boardTitle{
            text-align: center;
            font-size: 50px;
            margin-top: 4%;

        } 
        .commentHead{
            padding-top: 15px;
        }
        .boardMain{
            width: 500px;
            margin: 0px auto;
            border-radius: 5px;
        }
        form{
            background-color: #d2d4d4; 
        }
        textarea{
            width: 99%;
            height: 200px;
            margin-top: 2px;
            border-radius: 5px; 
        }

        .btn{
            background-color: #f6f6f6; 
        }
        .boardtext{
            background-color: #f6f6f6;
        }
        .name input{
            width: 25%;
        }
        .btn input{
            margin-top: 5px;
            padding: 8px 25px;
            font-size: 20px;
            color: #fff;
            background: #6e6862;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;   
        }
        .comment{
            border: 1px solid rgba(0, 0, 0, 0.1);
            margin: 20px 18px;
            border-left: none;
            border-right: none;
            border-top: none;
            border-radius: 5px;
        }
        
        .creatTime{
            margin-bottom: 4px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.5);
            display: inline;        
        }
        .reply{
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 21px;
            position: relative;
            border-radius: 5px;
            background-color: white;
        }
        .replyBoard{
            border: 1px solid rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border-bottom: none;
            background: #d2d4d4;
            border-radius: 5px;
 
        }

        .replyBoard textarea {
            width: 99%;
            height: 200px;
            margin-top: 20px;
        }

        .replyBoard .btn{
            margin-left: 77%;
            margin-bottom: 20px;
            background-color:#d2d4d4;

        }

        .deleteComment {
            position: relative;
            float: right;
            margin-right: 20px;
            padding-top: 20px;
    
        }

        .deleteComment input[type=submit]{
            font-size: 15px;
            color: #fff;
            background: #6e6862;
            border-radius: 5px;
            cursor: pointer;
        }
        .editComment {
            position: relative;
            float: right;
            display:  inline-block;
            margin-right: 5px;
            padding-top: 20px;
        }

        .editComment input[type=submit]{
            font-size: 15px;
            color: #fff;
            background: #6e6862;
            border-radius: 5px;
            cursor: pointer;
        }
        .page{
            text-align: center;
            margin-top: 20px;
        }
        .page a{
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class='boardMain'> 
        <?php if(!$user){ ?>

                <a href="register.php">註冊</a>
                <a href="login.php">登入</a>

        <?php }else{ ?>

                <a href="logout.php">登出</a>

        <?php

                echo "Hello,";
                echo $user; ?>        
                 
        <?php } ?>



        <h1 class='boardTitle'>留言板</h1>
        <div class="boardForm">
            <form method="POST" action="addComment.php">
                <div class="boardtext"><textarea name="content" placeholder="留言內容"></textarea></div>
                <input type="hidden" name="parent_id" value="0" />
                <?
                    if($user){
                        echo "<div class='btn'><input type='submit' value='送出'></div>";
                    }else{
                        
                    }
                ?>
                
            </form>
        </div>
        <div class="replyBoard">
<?
    require_once("conn.php");

      $page = 1;
      if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = (int) $_GET['page'];
      }
      $size = 5;
      $start = $size * ($page - 1);   
    $sql = "
        SELECT c.id, c.content, c.time, c.username, u.nickname
        FROM yypp06_comments as c
        LEFT JOIN yypp06_users as u
        ON c.username = u.username 
        where c.parent_id = 0 
        order by time DESC
        LIMIT $start, $size
         
    ";
    $result = $conn->query($sql);

    if($result){
        while($row = $result ->fetch_assoc()){
?>

                <div class='comment'>
            <?
                    if($user === $row['username']){
                        echo renderDeleteBtn($row['id']);
                        echo renderEditBtn($row['id']);
                    }

            ?>
                    <div class="commentHead">
                        <div class="author"><? echo $row['nickname']?></div>
                        <div class="creatTime"><? echo $row['time']?></div>
                    </div>
                    <div class="content"><? echo htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8')?></div>

                </div>

            <div class='reply'>

                <?
                    $parent_id = $row['id'];
                    $sql_child = "
                        SELECT c.id, c.content, c.time, c.username, u.nickname
                        FROM yypp06_comments as c
                        LEFT JOIN yypp06_users as u
                        ON c.username = u.username 
                        where c.parent_id = $parent_id 
                         
                    ";                   
                    $result_child = $conn->query($sql_child);

                    if($result_child){
                        while($row_child = $result_child ->fetch_assoc()){
                    
                ?>
                <?
                    if($user === $row_child['username']){
                        echo renderDeleteBtn($row_child['id']);
                        echo renderEditBtn($row_child['id']);
                    }

                ?>                
                     <div class='comment'>
                        <div class="commentHead">
                            <div class="author"><? echo $row_child['nickname']?></div>
                            <div class="creatTime"><? echo $row_child['time']?></div>
                        </div>
                        <div class="content"><? echo htmlspecialchars($row_child['content'], ENT_QUOTES, 'utf-8')?></div>
                         

                    </div>


                   
                        

                <?
                        }
                    }
                ?>
                
                <div class="boardForm">
                    <form method="POST" action="addComment.php">
                        <div><textarea name="content" placeholder="留言內容"></textarea></div>
                        <input type="hidden" name="parent_id" value="<? echo $row['id']?>" />
                        <?
                            if($user){
                                echo "<div class='btn'><input type='submit' value='送出'></div>";
                            }else{
                                
                            }
                        ?>
                        
                    </form>
                </div>
            </div>
            
            <div class="brbr">xxxx××××××××××××××××××××××××××××××××××××××××××××××××</div>

<?
        }  
    }
?>
<?php 
            $count_sql = "SELECT count(*) as count FROM yypp06_comments where parent_id=0";
            $count_result = $conn->query($count_sql);
            if($count_result && $count_result->num_rows >0){
                $count= $count_result->fetch_assoc()['count'];
                $size = 5;
                $total_page = ceil($count / $size);
                echo "<div class='page'>";
                for($i=1; $i<= $total_page; $i++){
                    echo "<a href='index.php?page=$i' >$i</a>";
                }
                echo "</div>"; 
            }
?>
      
        </div>
    </div>
</body>
</html>