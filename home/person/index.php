<?php
session_start();
if (!$_SESSION['home_userid']) {
    echo "<script>location = '../login.php'</script>";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>class</title>
    <link rel="stylesheet" href="../public/css/index.css">
</head>
<body>

<div class="main">

    <?php
    include "../header.php";
    ?>

    <div class="split"></div>

    <div class="floor">
        <div class="floorHeader">
            <div class="left">
                <span>个人中心 &raquo;</span>
            </div>
        </div>
        <div class="floorFooter person">
            <div class="personLeft">
                <p><a href="index.php?c=userlist">查看联系方式</a></p>
                <p><a href="index.php?c=useradd">添加联系方式</a></p>
                <p><a href="index.php?c=orderlist">查看我的订单</a></p>
            </div>

            <div class="personRight">
                <?php
                    $c = $_GET['c'] ? $_GET['c'] : 'wel';
                    switch ($c) {
                        case "wel":
                            echo "
                                <h3>欢迎{$_SESSION['home_username']}回家</h3>
                                <p><img src='../public/img/ad1.jpg'></p>
                            ";
                            break;

                        case "orderlist":
                            include "orderlist.php";
                            break;

                        case "useradd":
                            include "useradd.php";
                            break;

                        case "userlist":
                            include "userlist.php";
                            break;

                        case "edit":
                            include "edit.php";
                            break;

                        case "code":
                            include "code.php";
                            break;

                        case "comment":
                            include "comment.php";
                            break;

                }

                ?>


            </div>

        </div>
    </div>

    <?php
    include "../footer.php";
    ?>

</div>

</body>
</html>