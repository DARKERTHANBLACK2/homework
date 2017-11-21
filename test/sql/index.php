<?php


$link = mysql_connect('localhost', 'root', 'root', 'test');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where name = '{$_POST['name']}' and pw = '{$_POST['pw']}'";
        $result = mysql_query($link, $query);
        if (mysql_num_rows($result) == 1){
            header("Location:index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>123</title>
    <style type="text/css">
        form{
            width:300px;
            background-color:#EEE0E5;
            margin-left:300px;
            margin-top:30px;
            padding:30px;
        }
    </style>
</head>

<body>
<form method="post">
    <label>username:<input type="text" name="name"></label>
    <br/><br/>
    <label>password:<input type="password" name="pw"></label>
    <br/><br/>
    <button type="submit" name="submit">login</button>
</form>
</body>
</html>
