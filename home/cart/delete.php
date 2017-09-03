<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/11
 * Time: 15:15
 */

$id = $_GET['id'];

session_start();

unset($_SESSION['shops'][$id]);

echo "<script>location = 'index.php'</script>";
