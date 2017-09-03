<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/5
 * Time: 21:13
 */


?>

<center>

    <h2>修改口令</h2>
    <form action="adminupdate.php" method="post">

        账号：<input type="text" name="username" value="<?php echo "admin"; ?>" disabled><br>
        密码：<input type="password" name="password"><br>
        <input type="submit" value="修改">
        <input type="reset" value="重置">

    </form>

</center>

