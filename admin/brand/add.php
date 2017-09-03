<?php
$conn = mysqli_connect("localhost", "root", "1234", "shop");

mysqli_query($conn, "set names utf8");

$sql = "select * from class";

$res = mysqli_query($conn, $sql);
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

        <h2>添加品牌</h2>
        <form action="brand/insert.php" method="post">

            <label for="">品牌名称：</label><input type="text" name="name"><br>
            <label for="">分类名称：</label><select name="class_id">

                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='{$row[id]}'>{$row['name']}</option>";
                }
                ?>

            </select><br>
            <input type="submit" value="提交">
            <input type="reset" value="重置">

        </form>
        
    </div>



