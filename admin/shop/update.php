<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */
include "../../publics/common/config.php";
include "../../publics/common/function.php";

$sname = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$shelf = $_POST['shelf'];
$brand_id = $_POST['brand_id'];
$id = $_POST['id'];
$imgsrc = $_POST['imgsrc'];

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
    $s_file = "../../publics/upload/s_{$imgsrc}";

    $sql = "update shop set name='{$sname}',img='{$img}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}' where id = '{$id}'";

    //上传新图
    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($src, $dst)) {
            //生成缩略图
            thumb($dst, 200, 200);
            //删除原图
            unlink($file);
            unlink($s_file);
        }
        header('Location:../index.php?a=shop');
    } else {
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = '../index.php?a=editShop'</script>";
    }


} else {

    $sql = "update shop set name='{$sname}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}' where id = '{$id}'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>location = '../index.php?a=shop'</script>";
    } else {
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = '../index.php?a=editShop'</script>";
    }

}



