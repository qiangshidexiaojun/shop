<?php
    session_start();
    include "../publics/common/config.php";
    $id = $_GET['class_id'];
    $sqlClass = "select * from class where id = '{$id}'";
    $resClass = mysqli_query($conn,$sqlClass);
    $rowClass = mysqli_fetch_assoc($resClass);
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
                <span><a href="index.php">首页</a> &raquo; <span><?php echo $rowClass['name']?></span>
            </div>
            <div class="right">

                <?php
                    $sqlBrand = "select * from brand where class_id = '{$id}'";
                    $resBrand = mysqli_query($conn,$sqlBrand);
                    $firstbrandId = 0;
                    $i = 0;
                    while($rowBrand = mysqli_fetch_assoc($resBrand)){
                        if($i == 0){
                            $firstbrandId = $rowBrand['id'];
                        }
                ?>

                        <span><a href='class.php?class_id=<?php echo $id?>&brand_id=<?php echo $rowBrand['id']?>'><?php echo $rowBrand['name']?></a></span>

                <?php
                        $i++;
                    }
                ?>

            </div>
        </div>
        <div class="floorFooter">

            <?php
                $brand_id = $_GET['brand_id'] ? $_GET['brand_id'] : $firstbrandId;
                $sqlShop = "select * from shop where brand_id = '{$brand_id}'";
                $resShop = mysqli_query($conn,$sqlShop);
                while($rowShop = mysqli_fetch_assoc($resShop)){
            ?>

                    <a href="shop.php?shop_id=<?php echo $rowShop['id']?>">
                        <div class="shop">
                            <div class="shopImg">
                                <img src="../publics/upload/<?php echo $rowShop['img']?>" style="width: 200px;height: 200px;" >
                            </div>
                            <div class="shopInfo">
                                <div class="shopPrice"><a href=""><?php echo $rowShop['price']?>元</a></div>
                                <div class="shopName"><a href=""><?php echo $rowShop['name']?></a></div>
                            </div>
                        </div>
                    </a>

            <?php
                }
            ?>



        </div>
    </div>

    <?php
        include "footer.php";
    ?>

</div>

</body>
</html>