<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/14
 * Time: 11:22
 */
session_start();
include "../publics/common/config.php";
$name = $_GET['username'];
$pass = $_GET['passwordajax'];
$length = $_GET['length'];
$regpassword = $_GET['regpassword'];
$code = strtolower($_GET['code']);
$vcode = strtolower($_SESSION['vstr']);
$type = $_GET['a'];
$_SESSION['disabled'] = 0;


if ($_SERVER["REQUEST_METHOD"] == "GET" && $type == "name") {
    if ($name == "") {
        $_SESSION['disabled'] = 0;
        echo "<span style='color: red'>用户名不能为空</span>";
    } else {
        $sql = "select * from user where username = '{$name}'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        if ($row['username'] == $name) {
            $_SESSION['disabled'] = 0;
            echo "<span style='color: red'>用户名已存在</span>";
        } else {
            $_SESSION['disabled'] = 1;
            echo "<span style='color: green'>用户名可用</span>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "name") {
    if ($name == "") {
        echo $_SESSION['disabled'] = 0;
    } else {
        $sql = "select * from user where username = '{$name}'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        if ($row['username'] == $name) {
            echo $_SESSION['disabled'] = 0;
        } else {
            echo $_SESSION['disabled'] = 1;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && $type == "psd") {
    $_SESSION['repassword'] = $pass;
    if ($pass == "") {
        $_SESSION['disabled'] = 0;
        echo "<span style='color: red'>密码不能为空</span>";
    } else {
        if ($length < 6) {
            $_SESSION['disabled'] = 0;
            echo "<span style='color: red'>密码长度必须不得小于6位</span>";
        } else {
            $_SESSION['disabled'] = 1;
            echo "<span style='color: green'>密码可用</span>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "psd") {
    $_SESSION['repassword'] = $pass;
    if ($pass == "") {
        echo $_SESSION['disabled'] = 0;
    } else {
        if ($length < 6) {
            echo $_SESSION['disabled'] = 0;
        } else {
            echo $_SESSION['disabled'] = 1;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && $type == "regpsd") {
    if ($regpassword == "") {
        $_SESSION['disabled'] = 0;
        echo "<span style='color: red'>确认密码不能为空</span>";
    } else {
        if ($_SESSION['repassword'] == $regpassword) {
            $_SESSION['disabled'] = 1;
            echo "<span style='color: green'>确认密码一致</span>";
        } else {
            $_SESSION['disabled'] = 0;
            echo "<span style='color: red'>确认密码密码不一致</span>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "regpsd") {
    if ($regpassword == "") {
        echo $_SESSION['disabled'] = 0;
    } else {
        if ($_SESSION['repassword'] == $regpassword) {
            echo $_SESSION['disabled'] = 1;
        } else {
            echo $_SESSION['disabled'] = 0;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && $type == "rcode") {
    if ($code == $vcode) {
        $_SESSION['disabled'] = 1;
        echo "<span style='color: green'>验证码正确</span>";
    } else {
        $_SESSION['disabled'] = 0;
        echo "<span style='color: red'>验证码错误</span>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "rcode") {
    if ($code == $vcode) {
        echo $_SESSION['disabled'] = 1;
    } else {
        echo $_SESSION['disabled'] = 0;
    }
}



