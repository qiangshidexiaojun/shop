<?php
    session_start();
    if(!$_SESSION['login']) {
        echo "<script>location = 'login.php'</script>";
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
    <title>index</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/index.css">
    <script src="public/js/jquery.js"></script>

    <script>

        window.onload = function () {
            $("h4").click(function () {
                $(this).next().toggle(100);
                $('nav div').not($(this).next()).hide();
            })
        }

    </script>

</head>
<body>

<div class="main">

    <!--header头-->
    <header><h3>欢迎 <?php echo $_SESSION['username'];?> 登陆<a href="../home/index.php" target="_blank">Shop商城</a>后台</h3></header>

    <!--侧边栏-->
    <nav>
        <h4>用户管理</h4>
        <div>
            <p><a href="index.php?a=index">查看用户</a></p>
            <p><a href="index.php?a=addUser">添加用户</a></p>
        </div>
        <h4>分类管理</h4>
        <div>
            <p><a href="index.php?a=cls">查看分类</a></p>
            <p><a href="index.php?a=addClass">添加分类</a></p>
        </div>
        <h4>品牌管理</h4>
        <div>
            <p><a href="index.php?a=brand">查看品牌</a></p>
            <p><a href="index.php?a=addBrand">添加品牌</a></p>
        </div>
        <h4>商品管理</h4>
        <div>
            <p><a href="index.php?a=shop">查看商品</a></p>
            <p><a href="index.php?a=addShop">添加商品</a></p>
        </div>
        <h4>评论管理</h4>
        <div>
            <p><a href="index.php?a=comment">查看评论</a></p>
        </div>
        <h4>订单状态</h4>
        <div>
            <p><a href="index.php?a=status">产看状态</a></p>
            <p><a href="index.php?a=addStatus">添加状态</a></p>
        </div>
        <h4>订单管理</h4>
        <div>
            <p><a href="index.php?a=indent">查看订单</a></p>
        </div>
        <h4>广告管理</h4>
        <div>
            <p><a href="index.php?a=advert">查看广告</a></p>
            <p><a href="index.php?a=addAdvert">添加广告</a></p>
        </div>
        <h4>系统管理</h4>
        <div>
            <p><a href="index.php?a=adminpass">修改口令</a></p>
            <p><a href="logout.php" onclick="return confirm('您确认要退出吗!')">退出系统</a></p>
            <p><a href="../home/index.php" target="_blank">网站首页</a></p>
        </div>

    </nav>

    <!--内容栏-->
    <section>

        <!--内容区-->
        <div class="contain">

            <?php
                switch ($_GET['a']){
                    /*登陆界面*/
                    case 'login':
                        include "login.php";
                        break;

                    /*修改口令*/
                    case 'adminpass':
                        include "adminpass.php";
                        break;

                    /*主页面的增删该查*/
                    case 'index':
                        include "user/index.php";
                        break;

                    case 'editUser':
                        include "user/edit.php";
                        break;

                    case 'delUser':
                        include "user/del.php";
                        break;

                    case 'addUser':
                        include "user/add.php";
                        break;

                    /*分类页面的增删该查*/
                    case 'cls':
                        include "class/index.php";
                        break;

                    case 'editCls':
                        include "class/edit.php";
                        break;

                    case 'delCls':
                        include "class/del.php";
                        break;

                    case 'addClass':
                        include "class/add.php";
                        break;

                    /*品牌管理页面的增删该查*/
                    case 'brand':
                        include "brand/index.php";
                        break;

                    case 'editBrand':
                        include "brand/edit.php";
                        break;

                    case 'delBrand':
                        include "brand/del.php";
                        break;

                    case 'addBrand':
                        include "brand/add.php";
                        break;

                    /*商品管理页面的增删该查*/
                    case 'shop':
                        include "shop/index.php";
                        break;

                    case 'editShop':
                        include "shop/edit.php";
                        break;

                    case 'delShop':
                        include "shop/del.php";
                        break;

                    case 'addShop':
                        include "shop/add.php";
                        break;

                    /*评论页面的增删该查*/
                    case 'comment':
                        include "comment/index.php";
                        break;

                    case 'delComment':
                        include "comment/del.php";
                        break;

                    /*订单状态页面的增删该查*/
                    case 'status':
                        include "status/index.php";
                        break;

                    case 'editStatus':
                        include "status/edit.php";
                        break;

                    case 'delStatus':
                        include "status/del.php";
                        break;

                    case 'addStatus':
                        include "status/add.php";
                        break;

                    /*广告管理页面的增删该查*/
                    case 'advert':
                        include "advert/index.php";
                        break;

                    case 'editAdvert':
                        include "advert/edit.php";
                        break;

                    case 'delAdvert':
                        include "advert/del.php";
                        break;

                    case 'addAdvert':
                        include "advert/add.php";
                        break;

                    /*订单管理页面的增删该查*/
                    case 'indent':
                        include "indent/index.php";
                        break;

                    case 'editIndent':
                        include "indent/edit.php";
                        break;

                    case 'delIndent':
                        include "indent/del.php";
                        break;

                    case 'touch':
                        include "indent/touch.php";
                        break;

                    case 'code':
                        include "indent/code.php";
                        break;

                    default:
                        echo "<img src='public/img/bg.jpg' alt=''>";
                }
            ?>
        </div>


    </section>

    <!--底部版权区-->
    <footer style="display:<?php if($_GET['a'] == "login" || $_GET['a'] == "shop"){echo "none";}else{echo "block";}?>">Copyright &copy; <a href="http://blog.doyoe.com/">doyoe.com</a></footer>



</div>

</body>

</html>