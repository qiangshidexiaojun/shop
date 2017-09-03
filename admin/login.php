<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>

<!--登陆窗口-->
<div class="mess">

    <form action="check.php" method="post">
        <div class="top">
            <h3>登录</h3>
        </div>
        <div class="between">
            <input type="text" placeholder="请输入用户名" name="username">
            <input type="password" placeholder="请输入密码" name="password">
            <input type="submit" value="登录">
        </div>
    </form>

</div>

</body>
</html>