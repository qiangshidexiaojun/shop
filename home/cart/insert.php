<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/11
 * Time: 14:55
 */

session_start();

include "../../publics/common/config.php";

$id = $_GET['shop_id'];

$sql = "select * from shop where id = '{$id}'";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($res);

if($row['stock']>0){
    $_SESSION['shops'][$id] = $row;
    $_SESSION['shops'][$id]['num'] = 1;

    echo "<script>location = 'index.php'</script>";
}else{
    echo "<script>alert('此商品库存不足，请挑选其他商品')</script>";
    echo "<script>location='../index.php'</script>";
}

