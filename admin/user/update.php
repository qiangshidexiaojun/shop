<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234", "shop");

//3设置数据库字符集
mysqli_query($conn, "set names utf8");

$username = $_POST['username'];
$password = md5($_POST['password']);
$imgsrc = $_POST['imgsrc'];
$id = $_POST['id'];


$imageerror = $_FILES['img']['error'];
if ($imageerror == 0) {

    //图片上传
    $src = $_FILES['img']['tmp_name'];
    $name = $_FILES['img']['name'];
    $ext = array_pop(explode('.', $name));
    $dst = '../../publics/upload/' . time() . mt_rand() . '.' . $ext;

    $img = basename($dst);

    //原图路径
    $file = "../../publics/upload/{$imgsrc}";

    $sql = "update user set username = '{$username}',password = '{$password}',img='{$img}' where id = '{$id}'";

    //上传新图
    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($src, $dst)) {
            //删除原图
            unlink($file);
        }
        header('Location:../index.php?a=index');
    } else {
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = '../index.php?a=editUser'</script>";
    }
} else {
    $sql = "update user set username = '{$username}',password = '{$password}' where id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>location = '../index.php?a=index'</script>";
    } else {
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = '../index.php?a=editUser'</script>";
    }

}
