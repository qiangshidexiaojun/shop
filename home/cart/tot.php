<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/13
 * Time: 23:25
 */

session_start();
$id = $_GET['id'];
$value = $_GET['value'];
$stock = $_SESSION['shops'][$id]['stock'];
$type = $_GET['a'];
if($_SERVER["REQUEST_METHOD"] == "GET"){

    if($value > $stock){
        $value = $stock;
    }
    $_SESSION['shops'][$id]['num'] = $value;
    $price = $_SESSION['shops'][$id]['price'];
    $sum = $value * $price;

    echo $sum."元";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION['shops'][$id]['num'] = $value;

    $price = $_SESSION['shops'][$id]['price'];
    if($type == "add"){
        if($value + 1 <= $stock){
            $sum = ($value+1) * $price;
        }else{
            $sum = $value * $price;
        }
        echo $sum."元";
    }else if($type == "cut"){
        if($value-1 < 1){
            $sum = $value * $price;
        }else{
            $sum = ($value-1) * $price;
        }
        echo $sum."元";
    }
}




