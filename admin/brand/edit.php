<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */


//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234","shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$id = $_GET[id];

$sqlBrand = "select * from brand where id = '{$id}'";
$resBrand = mysqli_query($conn,$sqlBrand);
$rowBrand = mysqli_fetch_assoc($resBrand);

$sqlClass = "select * from class";
$resClass = mysqli_query($conn,$sqlClass);

?>



<style>

    .addBrand{
        overflow: hidden;
        position: fixed;
        top: 13%;
        left: 45%;
    }

    .addBrand h2{
        text-align: center;
    }

    form{
        float: left;
        margin-top: 10px;
    }

</style>


<div class="addBrand">

    <h2>修改品牌</h2>
    <form action="brand/update.php" method="post">

        <label for="">品牌名称：</label><input type="text" name="name" value="<?php echo $rowBrand['name']?>"><br>
        <label for="">分类名称：</label><select name="class_id">

            <?php
            while ($rowClass = mysqli_fetch_assoc($resClass)) {
                if($rowClass['id'] == $rowBrand['class_id']){
                    echo "<option selected value='{$rowClass[id]}'>{$rowClass['name']}</option>";
                }else{
                    echo "<option value='{$rowClass[id]}'>{$rowClass['name']}</option>";
                }
            }
            ?>

        </select><br>
        <input type="hidden" value="<?php echo $rowBrand['id']?>" name="id">
        <input type="submit" value="提交">
        <input type="reset" value="重置">

    </form>

</div>
