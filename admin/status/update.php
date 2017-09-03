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

$name = $_POST['name'];
$id = $_POST['id'];

$sql = "update status set name = '{$name}' where id = $id";

if(mysqli_query($conn,$sql)){
    echo "<script>location = '../index.php?a=status'</script>";
}else{
    echo "<script>alert('修改失败')</script>";
    echo "<script>location = '../index.php?a=editStatus'</script>";
}


?>

