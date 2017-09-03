<?php
session_start();
include "../publics/common/config.php";
$id = $_GET['shop_id'];
$sqlShop = "select * from shop where id = '{$id}'";
$resShop = mysqli_query($conn,$sqlShop);
$rowShop = mysqli_fetch_assoc($resShop);
$sqlBrand = "select brand.*,shop.brand_id,class.id from brand,shop,class where shop.brand_id = brand.id and brand.class_id = class.id and shop.id = '{$id}'";
$resBrand = mysqli_query($conn,$sqlBrand);
$rowBrand = mysqli_fetch_assoc($resBrand);

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
</head>
<body>

<div class="main">

    <?php
    include "header.php";
    ?>

    <div class="split"></div>

    <div class="floor">
        <div class="floorHeader">
            <div class="left">
                <span><a href="class.php?class_id=<?php echo $rowBrand['class_id']?>&brand_id=<?php echo $rowBrand['brand_id']?>">品牌</a> &raquo; <span><?php echo $rowShop['name']?></span></span>
            </div>
        </div>
        <div class="floorFooter">
            <table class="tablist">
                <tr>
                    <th>图片</th>
                    <th>价格</th>
                    <th>库存</th>
                    <th>购物车</th>
                </tr>
                <tr>
                    <td>
                        <img src="../publics/upload/<?php echo $rowShop['img']?>" alt="">
                    </td>
                    <td><?php echo $rowShop['price']?>元</td>
                    <td><?php echo $rowShop['stock']?></td>
                    <td>
                        <a href="cart/insert.php?shop_id=<?php echo $rowShop['id']?>"><img src="public/img/car.png" alt=""></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="split"></div>

    <div class="floor">
        <div class="floorHeader">
            <div class="left">
                <span><a href="">商品评论</a></span>
            </div>
        </div>


        <?php
            $sqlComment = "select comment.*,user.username,user.img from comment,user where comment.shop_id={$id} and comment.user_id=user.id";
            $resComment = mysqli_query($conn,$sqlComment);
            while($rowComment = mysqli_fetch_assoc($resComment)){
        ?>

                <div class="floorFooter comment">
                    <div class="left">
                        <a href=""><img src="../publics/upload/<?php echo $rowComment['img']?>" class="header"></a>
                        <p><?php echo $rowComment['username']?></p>
                    </div>
                    <div class="right">
                        <p><?php echo $rowComment['content']?></p>
                        <p class="commenttime"><?php echo @date("Y-m-d H:i:s",$rowComment['time']+28800)?></p>
                    </div>
                </div>


        <?php
            }
        ?>

    </div>

    <div class="split"></div>

    <?php
    include "footer.php";
    ?>

</div>

</body>
</html>