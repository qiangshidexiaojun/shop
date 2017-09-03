<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/11
 * Time: 15:48
 */

session_start();
$id = $_GET['id'];

$num = ++$_SESSION['shops'][$id]['num'];

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if ($_SESSION['shops'][$id]['num'] > $_SESSION['shops'][$id]['stock']) {
        $_SESSION['shops'][$id]['num'] = $_SESSION['shops'][$id]['stock'];
        echo $num-1;
    }else{
        echo $num;
    }
}

echo "<script>location = 'index.php'</script>";
