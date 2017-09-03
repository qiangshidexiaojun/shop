<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/16
 * Time: 19:01
 */
session_start();

include "../../publics/common/config.php";

$name = $_POST['name'];
$addr = $_POST['addr'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$user_id = $_SESSION['home_userid'];

$sql = "insert into touch(name,addr,tel,email,user_id) value('{$name}','{$addr}','{$tel}','{$email}','{$user_id}')";

if(mysqli_query($conn,$sql)){
    echo "<script>location = 'index.php?c=userlist'</script>";
}else{
    echo "<script>alert('添加失败')</script>";
    echo "<script>location = 'index.php?c=userlist'</script>";
}