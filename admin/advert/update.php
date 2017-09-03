<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */
include "../../publics/common/config.php";
include "../../publics/common/function.php";

$pos = $_POST['pos'];
$url = $_POST['url'];
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

    $sql = "update advert set pos='{$pos}',url='{$url}',img='{$img}' where id = '{$id}'";

    //上传新图
    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($src, $dst)) {
            //生成缩略图
            thumb($dst, 200, 200);
            //删除原图
            unlink($file);
            unlink($s_file);
        }
        header('Location:../index.php?a=advert');
    } else {
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = '../index.php?a=editAdvert'</script>";
    }


} else {

    $sql = "update advert set pos='{$pos}',url='{$url}' where id = '{$id}'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>location = '../index.php?a=advert'</script>";
    } else {
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = '../index.php?a=editAdvert'</script>";
    }

}



