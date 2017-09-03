<?php
$conn = mysqli_connect("localhost", "root", "1234", "shop");

mysqli_query($conn, "set names utf8");

$id = $_GET['id'];

$sqlShop = "select * from shop where id = '{$id}'";

$resShop = mysqli_query($conn, $sqlShop);

$rowShop = mysqli_fetch_assoc($resShop);

$sqlClass = "select * from class";

$resClass = mysqli_query($conn,$sqlClass);

?>

<style>

    .editShop{
        overflow: hidden;
        position: fixed;
        top: 13%;
        left: 45%;
    }

    .editShop h2{
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

    input[type=text]{
        width: 200px;
    }

    input[type=radio]{
        vertical-align: bottom;
    }

    input[type=file]{
        height:25px;
    }

    label,img{
        vertical-align: middle;
        margin-top: 10px;
    }

</style>


<div class="editShop">

    <h2>修改商品</h2>
    <form action="shop/update.php" method="post" enctype="multipart/form-data">

        <label for="">名称：</label><input type="text" name="name" value="<?php echo $rowShop['name']?>"><br>
        <label for="">价格：</label><input type="text" name="price" value="<?php echo $rowShop['price']?>"><br>
        <label for="">库存：</label><input type="text" name="stock" value="<?php echo $rowShop['stock']?>"><br>
        <label for="shelf">货架：</label>
        <input type="radio" name="shelf" value="1" <?php if($rowShop['shelf']){echo "checked";}?>>上架
        <input type="radio" name="shelf" value="0" <?php if(!$rowShop['shelf']){echo "checked";}?>>下架<br>
        <label for="">品牌：</label><select name="brand_id"><br>

            <?php
            while ($rowClass = mysqli_fetch_assoc($resClass)) {
                echo "<option disabled>{$rowClass['name']}</option>";

                $sqlBrand = "select * from brand where class_id = {$rowClass['id']}";
                $resBrand = mysqli_query($conn,$sqlBrand);

                while($rowBrand = mysqli_fetch_assoc($resBrand)){
                    if($rowBrand['id'] == $rowShop['brand_id']){
                        echo "<option selected value='{$rowBrand['id']}'>--{$rowBrand['name']}--</option>";
                    }else{
                        echo "<option value='{$rowBrand['id']}'>--{$rowBrand['name']}--</option>";
                    }
                }

            }
            ?>
            <input type="hidden" value="<?php echo $rowShop['id']?>" name="id">
            <input type="hidden" value="<?php echo $rowShop['img']?>" name="imgsrc">
        </select><br>
        <label for="">原图：</label><img src="../publics/upload/s_<?php echo $rowShop['img']?>" style="width: 50%;height: 50%;" alt=""><br>
        <label for="">图片：</label><input type="file" name="img"><br>
        <input type="submit" value="提交">
        <input type="reset" value="重置">

    </form>

</div>



