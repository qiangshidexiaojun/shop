<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/11
 * Time: 15:15
 */

session_start();

$_SESSION['shops'] = array();

echo "<script>location = 'index.php'</script>";
