<?php
session_start();
include "../../publics/common/config.php";
?>


<style>

    form{
        width: 300px;
        height: 100%;
        margin: 0 auto;
    }

    input{
        margin-bottom: 15px;
        width: 80%;
        height: 30px;
    }

    h1{
        font-size: 20px;
        margin-bottom: 15px;
        text-align: center;
    }
    
    label{
        font-size: 16px;
    }

    input[type=submit],input[type=reset]{
        width: 45%;
    }

</style>


<?php
$id = $_GET['id'];
$sql = "select * from touch where id = {$id}";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
?>


<form action="update.php" method="post">
    <h1>修改联系方式</h1>

    <label for="">姓名：</label><input type="text" name="name" placeholder="姓名" value="<?php echo $row['name']?>"><br>
    <label for="">地址：</label><input type="text" name="addr" placeholder="地址" value="<?php echo $row['addr']?>"><br>
    <label for="">电话：</label><input type="text" name="tel" placeholder="电话" value="<?php echo $row['tel']?>"><br>
    <label for="">邮箱：</label><input type="text" name="email" placeholder="邮箱" value="<?php echo $row['email']?>"><br>
    <input type="hidden" value="<?php echo $id?>" name="id">
    <input type="submit" value="修改">
    <input type="reset" value="重置">

</form>
