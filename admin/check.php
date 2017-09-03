<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/5
 * Time: 21:29
 */

$conn = mysqli_connect("localhost","root","1234","shop");

mysqli_query($conn,"set names utf8");

$sql = "select * from user";

session_start();

$username = $_POST['username'];

$password = md5($_POST['password']);

$_SESSION['login'] = 0;

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($res)){
    if($row['isadmin']){
        if($row['username'] == $username && $row['password'] == $password){
            $_SESSION['username'] = $row['username'];
            $_SESSION['login'] = 1;
            echo "<script>location = 'index.php'</script>";
        }else{
            echo "<script>alert('账号或密码错误')</script>";
//            echo "<script>alert('{$username}'+' '+'{$password}'+' '+'{$row[password]}')</script>";
            echo "<script>location = 'login.php'</script>";
        }
    }
}
