<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */


//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234","shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$id = $_GET[id];
$sql = "select * from status where id = {$id}";
$res = mysqli_query($conn,$sql);
$row = @mysqli_fetch_assoc($res);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<center>

    <h2>名称修改</h2>
    <form action="status/update.php" method="post">

        状态名称：<input type="text" name="name" value="<?php echo $row['name'] ?>"><br>
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

    </form>

</center>

</body>
</html>

