<?php
$conn = mysqli_connect("localhost", "root", "1234", "shop");

mysqli_query($conn, "set names utf8");

$sqlClass = "select * from class";

$resClass = mysqli_query($conn, $sqlClass);
?>

<style>
    
    .addShop{
        overflow: hidden;
        position: fixed;
        top: 13%;
        left: 45%;
    }

    .addShop h2{
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


    <div class="addShop">

        <h2>添加商品</h2>
        <form action="shop/insert.php" method="post" enctype="multipart/form-data">

            <label for="">名称：</label><input type="text" name="name"><br>
            <label for="">价格：</label><input type="text" name="price"><br>
            <label for="">库存：</label><input type="text" name="stock"><br>
            <label for="shelf">货架：</label>
            <input type="radio" name="shelf" value="1" checked>上架
            <input type="radio" name="shelf" value="0">下架<br>
            <label for="">品牌：</label><select name="brand_id"><br>

                <?php
                while ($rowClass = mysqli_fetch_assoc($resClass)) {
                    echo "<option disabled>{$rowClass['name']}</option>";

                    $sqlBrand = "select * from brand where class_id = {$rowClass['id']}";
                    $resBrand = mysqli_query($conn,$sqlBrand);

                    while($rowBrand = mysqli_fetch_assoc($resBrand)){
                        echo "<option value='{$rowBrand['id']}'>--{$rowBrand['name']}--</option>";
                    }

                }
                ?>

            </select><br>
            <label for="">图片：</label><input type="file" name="img"><br>
            <input type="submit" value="提交">
            <input type="reset" value="重置">

        </form>
        
    </div>



