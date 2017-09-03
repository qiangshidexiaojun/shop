<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>class</title>
    <link rel="stylesheet" href="public/css/index.css">
    <script src="public/js/jquery.js"></script>

    <script>

        window.onload = function () {
            var regname = document.querySelector(".regname");
            var password = document.querySelector(".password");
            var regpass = document.querySelector(".regpass");
            var regcode = document.querySelector(".regcode");
            var savename = document.querySelector(".savename");
            var pass = document.querySelector(".pass");
            var savepass = document.querySelector(".savepass");
            var savecode = document.querySelector(".savecode");
            var disabled = document.querySelector(".input");


            /*检查用户名*/
            regname.onblur = function () {
                var name = this.value;
                var request = new XMLHttpRequest();
                request.open("GET", "AjaxTest.php?a=name&username=" + name);
                request.send();
                request.onreadystatechange = function () {
                    if (request.readyState === 4) {
                        if (request.status === 200) {
                            savename.innerHTML = request.responseText;
                        } else {
                            alert("发生错误");
                        }
                    }
                };
                savename.style.display = 'block';

                var requestpost = new XMLHttpRequest();
                requestpost.open("POST", "AjaxTest.php?a=name&username=" + name);
                requestpost.send();
                requestpost.onreadystatechange = function () {
                    if (requestpost.readyState === 4) {
                        if (requestpost.status === 200) {
                            if(requestpost.responseText == 1){
                                disabled.disabled = false;
                            }else{
                                disabled.disabled = true;
                            }
                        } else {
                            alert("发生错误");
                        }
                    }
                };
            };

            /*检查密码*/
            password.onblur = function () {
                var password = this.value;
                var request = new XMLHttpRequest();
                request.open("GET", "AjaxTest.php?a=psd&passwordajax=" + password + "&length=" + password.length);
                request.send();
                request.onreadystatechange = function () {
                    if (request.readyState === 4) {
                        if (request.status === 200) {
                            pass.innerHTML = request.responseText;
                        } else {
                            alert("发生错误");
                        }
                    }
                };
                pass.style.display = 'block';

                var requestpost = new XMLHttpRequest();
                requestpost.open("POST", "AjaxTest.php?a=psd&passwordajax=" + password + "&length=" + password.length);
                requestpost.send();
                requestpost.onreadystatechange = function () {
                    if (requestpost.readyState === 4) {
                        if (requestpost.status === 200) {
                            if(requestpost.responseText == 1){
                                disabled.disabled = false;
                            }else{
                                disabled.disabled = true;
                            }
                        } else {
                            alert("发生错误");
                        }
                    }
                };
                pass.style.display = 'block';
            };

            /*检查确认密码*/
            regpass.onblur = function () {
                var regpassword = this.value;
                var request = new XMLHttpRequest();
                request.open("GET", "AjaxTest.php?a=regpsd&regpassword=" + regpassword);
                request.send();
                request.onreadystatechange = function () {
                    if (request.readyState === 4) {
                        if (request.status === 200) {
                            savepass.innerHTML = request.responseText;
                        } else {
                            alert("发生错误");
                        }
                    }
                };
                savepass.style.display = 'block';

                var requestpost = new XMLHttpRequest();
                requestpost.open("POST", "AjaxTest.php?a=regpsd&regpassword=" + regpassword);
                requestpost.send();
                requestpost.onreadystatechange = function () {
                    if (requestpost.readyState === 4) {
                        if (requestpost.status === 200) {
                            if(requestpost.responseText == 1){
                                disabled.disabled = false;
                            }else{
                                disabled.disabled = true;
                            }
                        } else {
                            alert("发生错误");
                        }
                    }
                };
            };

            /*检查验证码*/
            regcode.oninput = function () {
                var code = this.value;
                var request = new XMLHttpRequest();
                request.open("GET", "AjaxTest.php?a=rcode&code=" + code);
                request.send();
                request.onreadystatechange = function () {
                    if (request.readyState === 4) {
                        if (request.status === 200) {
                            savecode.innerHTML = request.responseText;
                        } else {
                            alert("发生错误");
                        }
                    }
                };
                savecode.style.display = 'block';

                var requestpost = new XMLHttpRequest();
                requestpost.open("POST", "AjaxTest.php?a=rcode&code=" + code);
                requestpost.send();
                requestpost.onreadystatechange = function () {
                    if (requestpost.readyState === 4) {
                        if (requestpost.status === 200) {
                            if(requestpost.responseText == 1){
                                disabled.disabled = false;
                            }else{
                                disabled.disabled = true;
                            }
                        } else {
                            alert("发生错误");
                        }
                    }
                };
            };

            if(regname.value == "" || password.value == "" || regpass.value == "" || regcode.value == ""){
                disabled.disabled = true;
            }
        }

    </script>

</head>
<body>

<div class="main">

    <?php
    include "header.php";
    ?>

    <div class="split"></div>

    <div class="login">
        <div class="loginadvert">
            <img src="public/img/promPic.jpg" alt="">
        </div>
        <div class="reg">

            <i class="savename">用户名已存在</i>
            <i class="pass">密码长度必须不得小于6位</i>
            <i class="savepass">确认密码一致</i>
            <i class="savecode">验证码正确</i>

            <form action="reginsert.php" method="post">

                <div class="between">
                    <input type="text" placeholder="注册用户名" name="username" class="regname">
                    <input type="password" placeholder="设置密码" name="password" class="password">
                    <input type="password" placeholder="确认密码" name="repassword" class="regpass">
                    <input type="text" placeholder="输入验证码" name="fcode" class="regcode">
                    <a href="javascript:refresh();" onclick="refresh();" class="regrep">看不清楚换一张</a>
                    <img src='../publics/common/vcodefun.php' onclick='this.src = "../publics/common/vcodefun.php?rand=" + Math.random();' class='vcode'>
                    <input type="submit" value="完成" class="input">
                </div>
            </form>

        </div>
    </div>

    <?php
    include "footer.php";
    ?>

</div>

</body>
</html>