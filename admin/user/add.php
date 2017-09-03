<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        .addUser{
            overflow: hidden;
            position: fixed;
            top: 13%;
            left: 45%;
        }

        .addUser h2{
            text-align: center;
        }

        form{
            float: left;
            margin-top: 10px;
        }

        label,input,select{
            margin-top: 10px;
            height:20px;
        }

        select{
            height:25px;
        }

        input[type=radio]{
            vertical-align: bottom;
        }

        input[type=file]{
            height:25px;
        }

    </style>


</head>
<body>

<div class="addUser">

    <h2>添加用户</h2>
    <form action="user/insert.php" method="post" enctype="multipart/form-data">

        <label for="">姓名：</label><input type="text" name="username"><br>
        <label for="">密码：</label><input type="password" name="password"><br>
        <label for="">头像：</label><input type="file" name="img"><br>
        <input type="submit" value="提交">
        <input type="reset" value="重置">

    </form>

</div>



</body>
</html>
