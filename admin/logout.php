<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/5
 * Time: 15:24
 */

session_start();

$_SESSION = array();

session_destroy();

setcookie('PHPSESSID','',time()-3600,'/');

echo '<script>location = "login.php"</script>';