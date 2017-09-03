<?php
    session_start();
    include "../../publics/common/config.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <script src="../public/js/jquery.js"></script>
</head>
<body>

<div class="main">

    <?php
    include "../header.php";
    ?>

    <div class="split"></div>

<!--    商品信息-->
    <div class="floor">
        <div class="floorHeader">
            <div class="left">
                <span>我的购物车 &raquo;</span>
            </div>
        </div>

        <div class="floorFooter">
            <table class="tablist">
                <tr>
                    <th>商品</th>
                    <th>图片</th>
                    <th>价格</th>
                    <th>库存</th>
                    <th>数量</th>
                    <th>合计</th>
                    <th>删除</th>
                </tr>


                <?php
                    $tot = 0;
                    if(!$_SESSION['shops']){
                        echo "您还没购物，<a href='../index.php'  class='cartDel'>继续购物</a>";
                    }else{
                        foreach ($_SESSION['shops'] as $shop){
                            $tot += $shop['num'] * $shop['price'];
                ?>

                        <tr>
                            <td><?php echo $shop['name']?></td>
                            <td>
                                <img src="../../publics/upload/s_<?php echo $shop['img']?>" style="width: 100px;height: 100px;" alt="">
                            </td>
                            <td><?php echo $shop['price']?>元</td>
                            <td><?php echo $shop['stock']?></td>
                            <td><a href="cut.php?id=<?php echo $shop['id']?>" class="cartreduce">-</a><span class="cartNum"><?php echo $shop['num']?></span><a href="add.php?id=<?php echo $shop['id']?>" class="cartadd">+</a></td>
<!--                            <td><a href="javascript:;" class="cartreduce">-</a><input class="cartNum" value="--><?php //echo $shop['num']?><!--"><a href="javascript:;" class="cartadd">+</a></td>-->
                            <td class="total"><?php echo $shop['price'] * $shop['num']."元"?></td>
                            <td><a href="delete.php?id=<?php echo $shop['id']?>" class="cartDel">删除</a></td>
                        </tr>
                       <!-- <script>
                            window.onload = function () {
                                var tot = document.querySelector(".tot");
                                var total = document.querySelector(".total");
                                var cartnum = document.querySelector(".cartNum");

                                var cut = document.querySelector(".cartreduce");
                                cut.onclick = function (){
                                    var request = new XMLHttpRequest();
                                    request.open("GET","cut.php?id=<?php /*echo $shop['id']*/?>");
                                    request.send();
                                    request.onreadystatechange = function () {
                                        if(request.readyState === 4){
                                            if(request.status === 200){
                                                cartnum.value = request.responseText;
                                            }
                                        }
                                    };
                                    var requestcut = new XMLHttpRequest();
                                    var val =  cartnum.value;
                                    requestcut.open("POST","tot.php?id=<?php /*echo $shop['id']*/?>&a=cut&value="+val);
                                    requestcut.send();
                                    requestcut.onreadystatechange = function () {
                                        if(requestcut.readyState === 4){
                                            if(requestcut.status === 200){
                                                tot.innerHTML = requestcut.responseText;
                                                total.innerHTML = requestcut.responseText;
                                            }else{
                                                alert("发生错误");
                                            }
                                        }
                                    };
                                    return false;
                                };

                                var add = document.querySelector(".cartadd");
                                add.onclick = function (){

                                    var request = new XMLHttpRequest();
                                    request.open("GET","add.php?id=<?php /*echo $shop['id']*/?>");
                                    request.send();
                                    request.onreadystatechange = function () {
                                        if(request.readyState === 4){
                                            if(request.status === 200){
                                                cartnum.value = request.responseText;
                                            }else{
                                                alert("发生错误");
                                            }
                                        }
                                    };
                                    var requestsum = new XMLHttpRequest();
                                    var val =  cartnum.value;
                                    requestsum.open("POST","tot.php?id=<?php /*echo $shop['id']*/?>&a=add&value="+val);
                                    requestsum.send();
                                    requestsum.onreadystatechange = function () {
                                        if(requestsum.readyState === 4){
                                            if(requestsum.status === 200){
                                                tot.innerHTML = requestsum.responseText;
                                                total.innerHTML = requestsum.responseText;
                                            }else{
                                                alert("发生错误");
                                            }
                                        }
                                    };
                                    return false;
                                };

                                cartnum.oninput = function () {
                                    var val = this.value;
                                    var request = new XMLHttpRequest();
                                    request.open("GET","tot.php?id=<?php /*echo $shop['id']*/?>&value="+val);
                                    request.send();
                                    request.onreadystatechange = function () {
                                        if(request.readyState === 4){
                                            if(request.status === 200){
                                                tot.innerHTML = request.responseText;
                                                total.innerHTML = request.responseText;
                                            }else{
                                                alert("发生错误");
                                            }
                                        }
                                    };
                                }

                            }
                        </script>-->
                <?php
                        }
                    }
                ?>

                <tr>
                    <td><a href="clear.php"  class="cartDel">清空购物车</a></td>
                    <td colspan="2"><a href="../index.php"  class="cartDel">继续购物</a></td>
                    <td colspan="2">总合计</td>
                    <td colspan="2" class="tot"><?php echo $tot;?>元</td>
                </tr>
            </table>


        </div>
    </div>

<!--    联系方式-->
    <div class="floor touch">
        <div class="floorHeader">
            <div class="left">
                <span>我的联系方式 &raquo;</span>
            </div>
        </div>

        <?php
            if($_SESSION['home_userid']){
        ?>
            <div class="floorFooter">
                <form action="commit.php" method="post">
                    <table class="tablist">
                    <tr>
                        <th>选择</th>
                        <th>姓名</th>
                        <th>地址</th>
                        <th>电话</th>
                        <th>邮箱</th>
                    </tr>
                    <?php
                        $user_id = $_SESSION['home_userid'];
                        $sql = "select * from touch where user_id = '{$user_id}'";
                        $res = mysqli_query($conn,$sql);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($res)){
                            if($i == 0){
                                echo "
                                    <tr>
                                        <td><input type='radio' name='touch_id' checked class='indent_id' value='{$row['id']}'></td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['addr']}</td>
                                        <td>{$row['tel']}</td>
                                        <td>{$row['email']}</td>
                                    </tr>
                                 ";
                            }else{
                                echo "
                                    <tr>
                                        <td><input type='radio' name='touch_id' class='indent_id' value='{$row['id']}'></td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['addr']}</td>
                                        <td>{$row['tel']}</td>
                                        <td>{$row['email']}</td>
                                    </tr>
                                ";
                            }
                            $i++;
                        }
                    ?>
                    </table>
                    <div class="bottom"><input type="submit" class="submit" value="提交订单"></div>
                </form>
            </div>


        <?php
            }else{
                echo "您还未登录,请先<a href='../login.php' class='cartDel'>登陆</a>";
            }
        ?>

    </div>


    <div class="split"></div>

    <div class="split"></div>

    <?php
    include "../footer.php";
    ?>

</div>

</body>
</html>