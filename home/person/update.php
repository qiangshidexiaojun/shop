<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/16
 * Time: 17:36
 */

include "../../publics/common/config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$addr = $_POST['addr'];
$tel = $_POST['tel'];
$email = $_POST['email'];
echo "<pre>";
print_r($_POST);
echo "</pre>";

$sql = "update touch set name='{$name}',addr='{$addr}',tel='{$tel}',email='{$email}' where id = {$id}";


if(mysqli_query($conn,$sql)){
    echo "<script>location = 'index.php?c=userlist'</script>";
}else{
    echo "<script>alert('修改失败')</script>";
    echo "<script>location = 'index.php?c=edit'</script>";
}
