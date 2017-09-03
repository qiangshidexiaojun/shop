<?php
session_start();
include "../publics/common/config.php";

$sqlAdvert = "select * from advert";
$resAdvert = mysqli_query($conn, $sqlAdvert);
while ($rowAdvert = mysqli_fetch_assoc($resAdvert)) {
    $rowArd[$rowAdvert['pos']] = $rowAdvert;
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

</head>
<body>

<div class="main">

    <?php
    include "header.php";
    ?>

    <!--空白位-->
    <div class="split"></div>

    <section>
        <!--广告位-->
        <div class="advert">
            <a href=""><img src="../publics/upload/<?php echo $rowArd[0]['img']; ?>" alt=""></a>
        </div>
        <!--空白位-->
        <div class="split"></div>
        <!--楼层位-->

        <?php
            $sqlClass = "select * from class";
            $resClass = mysqli_query($conn, $sqlClass);
            $floor = 1;
            while ($rowClass = mysqli_fetch_assoc($resClass)) {
        ?>

                <div class="floor">
                    <div class="floorHeader">
                        <div class="left">
                            <span><?php echo $floor?>F <?php echo $rowClass['name']?></span>
                        </div>
                        <div class="right">
                            <span><a href="">热销产品</a></span>
                            <span><a href="class.php?class_id=<?php echo $rowClass['id']?>">More &gt;&gt;</a></span>
                        </div>
                    </div>
                    <div class="floorFooter">


                    <?php
                        $sqlShop = "select shop.* from shop,brand,class where shop.brand_id = brand.id and brand.class_id = class.id and class.id = '{$rowClass['id']}' order by rand() limit 4";
                        $resShop = mysqli_query($conn,$sqlShop);
                        while($rowShop = mysqli_fetch_assoc($resShop)){
                    ?>
                            <div class="shop">
                                    <div class="shopImg">
                                        <a href="shop.php?shop_id=<?php echo $rowShop['id']?>" class="shopMore">
                                            <img src="../publics/upload/s_<?php echo $rowShop['img'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="shopInfo">
                                        <div class="shopPrice"><a href="">￥<?php echo $rowShop['price'] ?>元</a></div>
                                        <div class="shopName"><a href=""><?php echo $rowShop['name'] ?></a></div>
                                    </div>
                            </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
        <?php
                $floor++;
            }
        ?>

        <div class="split"></div>

        <div class="advert">
            <a href=""><img src="../publics/upload/<?php echo $rowArd[1]['img'] ?>" alt=""></a>
        </div>
    </section>

    <!--空白位-->
    <div class="split"></div>

    <?php
    include "footer.php";
    ?>

</div>

</body>
</html>