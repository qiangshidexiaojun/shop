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
$class_id = $_POST['class_id'];

$sql = "insert into brand(name,class_id) values('{$username}','{$class_id}')";

if (mysqli_query($conn,$sql)) {
    echo "<script>location = '../index.php?a=brand'</script>";
} else {
    echo "<script>alert('插入失败')</script>";
    echo "<script>location = '../index.php?a=addBrand'</script>";
}
