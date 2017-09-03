<?php
    $arr = explode('/',$_SERVER['PHP_SELF']);
    $root = '/'.$arr[1];

?>

<header>
    <div class="logo">
        <a href="<?php echo $root?>/home/index.php"><img src="<?php echo $root?>/home/public/img/logo.png" alt="" title="云知梦商城"></a>
    </div>
    <div class="headerLeft">Shop商城</div>
    <div class="headerRight">
        <a href="<?php echo $root?>/home/index.php">首页</a>
        <?php
            if ($_SESSION['home_userid']){
                echo "<a href='{$root}/home/person/index.php'>欢迎{$_SESSION['home_username']}登陆</a><a href='{$root}/home/logout.php'>退出</a>";
            }else{
                echo "<a href='{$root}/home/login.php'>登陆</a>";
            }
        ?>
        <a href="<?php echo $root?>/home/person/index.php">个人中心</a>
        <a href="<?php echo $root?>/home/register.php">注册</a>
        <a href="<?php echo $root?>/home/cart/index.php">购物车</a>
    </div>
</header>