<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/14
 * Time: 18:20
 */

session_start();

$arr = $_SESSION['shops'];

$_SESSION = array();

$_SESSION['shops'] = $arr;

echo '<script>location = "login.php"</script>';