<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 15:50
 */

include "../../publics/common/config.php";
include "../../publics/common/function.php";

$sname = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$shelf = $_POST['shelf'];
$brand_id = $_POST['brand_id'];

//图片上传
$src = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];
$ext = array_pop(explode('.', $name));
$dst = '../../publics/upload/' . time() . mt_rand() . '.' . $ext;

$img = basename($dst);

$sql = "insert into shop(name,price,stock,shelf,brand_id,img) values ('{$sname}','{$price}','{$stock}','{$shelf}','{$brand_id}','{$img}')";

if (mysqli_query($conn, $sql)) {
    if(move_uploaded_file($src, $dst)){
        thumb($dst, 200, 200);
    }
    header('Location:../index.php?a=shop');
} else {
    echo "<script>alert('插入失败')</script>";
    echo "<script>location = '../index.php?a=addShop'</script>";
}

