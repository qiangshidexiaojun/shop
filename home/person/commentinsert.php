<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/17
 * Time: 14:23
 */
session_start();
include "../../publics/common/config.php";

$content = $_POST['content'];
$user_id = $_SESSION['home_userid'];
$shop_id = $_POST['shop_id'];
$time = time();

$sql = "insert into comment(user_id,content,shop_id,time) value('{$user_id}','{$content}','{$shop_id}','{$time}')";
echo $sql;
if(mysqli_query($conn,$sql)){
    echo "<script>location = '../shop.php?shop_id={$shop_id}'</script>";
}