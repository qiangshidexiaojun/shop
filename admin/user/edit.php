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

$id = $_GET['id'];
$sql = "select * from user where id = {$id}";
$res = mysqli_query($conn,$sql);
$row = @mysqli_fetch_assoc($res);

?>

<style>

    .editUser{
        overflow: hidden;
        position: fixed;
        top: 13%;
        left: 45%;
    }

    .editUser h2{
        text-align: center;
    }

    form{
        float: left;
        margin-top: 10px;
    }

    label,input,select{
        margin-top: 10px;
        height:20px;
    }

    select{
        height:25px;
    }

    input[type=radio]{
        vertical-align: bottom;
    }

    input[type=file]{
        height:25px;
    }

    label,img{
        vertical-align: middle;
        margin-top: 10px;
    }

</style>

<div class="editUser">

    <h2>用户修改</h2>
    <form action="user/update.php" method="post" enctype="multipart/form-data">

        <label for="">姓名：</label><input type="text" name="username" value="<?php echo $row['username'] ?>"><br>
        <label for="">密码：</label><input type="password" name="password"><br>
        <label for="">原图：</label><img src="../publics/upload/<?php echo $row['img'] ?>" style="width: 60px;height:60px;"><br>
        <label for="">头像：</label><input type="file" name="img"><br>
        <input type="hidden" value="<?php echo $row['id']?>" name="id">
        <input type="hidden" value="<?php echo $row['img']?>" name="imgsrc">
        <input type="submit" value="修改">
        <input type="reset" value="重置">

    </form>


</div>



