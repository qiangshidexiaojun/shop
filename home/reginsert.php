<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/14
 * Time: 11:09
 */

session_start();

include "../publics/common/config.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "insert into user(username,password) values ('{$username}','{$password}')";
if(mysqli_query($conn,$sql)){
    $_SESSION['home_username'] = $username;
    $_SESSION['home_userid'] = mysqli_insert_id($conn);
    echo "<script>location = 'person/index.php'</script>";
}else{
    echo "<script>location = 'register.php'</script>";
}

