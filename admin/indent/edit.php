<?php
$conn = mysqli_connect("localhost", "root", "1234", "shop");

mysqli_query($conn, "set names utf8");

$code = $_GET['code'];
$status_id = $_GET['status_id'];
$id = $_GET['id'];

$sql = "select * from status";

$res = mysqli_query($conn, $sql);


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

    <h2>修改订单</h2>
    <form action="indent/update.php" method="post">

        <label for="">订单号：</label><input disabled type="text" name="code" value="<?php echo $code?>"><br>
        <label for="">选择状态：</label><select name="status_id"><br>

            <?php
            while ($row = mysqli_fetch_assoc($res)){
                if($row['id'] == $status_id){
                    echo "<option selected value='$row[id]'>{$row['name']}</option>";
                }else{
                    echo "<option value='$row[id]'>{$row['name']}</option>";
                }
            }

            ?>
        </select><br>
        <input type="hidden" value="<?php echo $code?>" name="code">
        <input type="submit" value="修改">
        <input type="reset" value="重置">

    </form>

</div>



