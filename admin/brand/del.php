<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 11:26
 */

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234" ,"shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$id = $_GET[id];
$sql = "delete from brand where id = {$id}";

if (mysqli_query($conn,$sql)) {
    echo "<script>location = 'index.php?a=brand'</script>";
} else {
    echo "<script>alert('删除失败')</script>";
    echo "<script>location = 'index.php?a=brand'</script>";
}