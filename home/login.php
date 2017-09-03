<link rel="stylesheet" href="public/css/index.css">

<div class="main interface">

    <?php
    include "header.php";
    ?>

    <div class="split"></div>

    <div class="login">
        <div class="loginadvert">
            <img src="public/img/promPic.jpg" alt="">
        </div>
        <div class="mess">

            <form action="check.php" method="post">

                <div class="between">
                    <input type="text" placeholder="请输入用户名" name="username">
                    <input type="password" placeholder="请输入密码" name="password">
                    <input type="submit" value="登录">

                    <div class="btm">
                        <input type="checkbox" name="ten" id="ten">
                        <label for="ten">十天内免登陆</label>
                        <span>|</span>
                        <a href="javascript:;" class="frogetpass">忘记密码?</a>
                    </div>
                    <div class="register">
                        <a href="javascript:;" class="goreg">去注册</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <?php
    include "footer.php";
    ?>

</div>

