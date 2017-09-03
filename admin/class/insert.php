<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 15:50
 */

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234", "shop");

//3设置数据库字符集
mysqli_query($conn, "set names utf8");

$username = $_POST['name'];

$sql = "insert into class(name) values('{$username}')";

if (mysqli_query($conn,$sql)) {
    echo "<script>location = '../index.php?a=cls'</script>";
} else {
    echo "<script>alert('插入失败')</script>";
    echo "<script>location = '../index.php?a=addCls'</script>";
}
