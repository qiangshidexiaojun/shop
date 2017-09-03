<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/16
 * Time: 20:36
 */
session_start();
include "../../publics/common/config.php";

$code = time() . mt_rand();
$user_id = $_SESSION['home_userid'];
$time = time();
$touch_id = $_POST['touch_id'];

foreach ($_SESSION['shops'] as $shop) {
    $sql = "insert into indent(code,user_id,time,touch_id,shop_id,price,num) value('{$code}','{$user_id}','{$time}','{$touch_id}','{$shop['id']}','{$shop['price']}','{$shop['num']}')";
    mysqli_query($conn, $sql);

    $st = $shop['stock'] - $shop['num'];
    $sqlStock = "update shop set stock = '{$st}' where id = {$shop['id']}";
    mysqli_query($conn, $sqlStock);
}

$_SESSION['shops'] = array();

echo "<script>alert('您的订单号为:{$code}')</script>";
echo "<script>location='../person/index.php?c=orderlist'</script>";