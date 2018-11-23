
<?
    require_once('conn.php');
    require_once('utils.php');
    require_once('checkLogin.php');
     
    if(isset($_POST['content']) && !empty($_POST['content'])){
     
        $content = $_POST['content'];
        $id = $_POST['id'];       
        $sql = "UPDATE yypp06_comments SET content = '$content' WHERE id = $id";
    
    $conn->query($sql);
    $conn->close();
    
    header('Location: index.php');
    }
    

?>   
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> 編輯留言</title>
    <style>
        .boardForm{
            text-align: center;
            font-size: 50px;
            margin-top: 4%;
        } 
        .boardMain{
            width: 500px;
            margin: 0px auto;
            border-radius: 5px;
        }
        textarea{
            width: 25%;
            height: 200px;
            margin-top: 2px;
            border-radius: 5px;
        }
        .name input{
            width: 25%;
        }
        .content{
            border-radius: 5px;
            margin-top: 6px;

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
    </style>
</head>
<body>
       
        <div class="boardForm">
        <h4>編輯留言<h4>
            <form method="POST" action="editComment.php">
                <div><textarea name="content" placeholder="留言內容"></textarea></div>
                <input type="hidden" name="id" value="<?echo $_GET['id'] ?>" />
                <div class='btn'><input type='submit' value='送出'></div>
            </form>
        </div>

</body>
</html>
