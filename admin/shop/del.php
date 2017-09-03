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

$id = $_GET['id'];
$img = $_GET['img'];
$file = "../publics/upload/{$img}";
$s_file = "../publics/upload/s_{$img}";


$sql = "delete from shop where id = {$id}";

if (mysqli_query($conn,$sql)) {
    unlink($file);
    unlink($s_file);
    echo "<script>location = 'index.php?a=shop'</script>";
} else {
    echo "<script>alert('删除失败')</script>";
    echo "<script>location = 'index.php?a=shop'</script>";
}