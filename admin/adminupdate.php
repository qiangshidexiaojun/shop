<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */

session_start();

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234","shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$password = md5($_POST['password']);

$sql = "update user set password = '{$password}' where username = 'admin'";

if(mysqli_query($conn,$sql)){

    $_SESSION = array();
    session_destroy();
    setcookie('PHPSESSID','',time()-3600,'/');

    echo "<script>location = 'login.php'</script>";
}else{
    echo "<script>alert('修改失败')</script>";
    echo "<script>location = 'index.php?a=adminpass'</script>";
}


?>
