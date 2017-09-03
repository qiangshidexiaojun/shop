<?php
$conn = mysqli_connect("localhost", "root", "1234", "shop");

mysqli_query($conn, "set names utf8");

$id = $_GET['id'];

$sql = "select * from advert where id = '{$id}'";

$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);


?>

<style>

    .addAdvert{
        overflow: hidden;
        position: fixed;
        top: 13%;
        left: 45%;
    }

    .addAdvert h2{
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

    label,img{
        vertical-align: middle;
        margin-top: 10px;
    }

</style>


<div class="addAdvert">

    <h2>修改广告</h2>
    <form action="advert/update.php" method="post" enctype="multipart/form-data">

        <label for="">位置：</label><select name="pos" id="">
            <option value="0" <?php if(!$row['pos']){echo "selected";}?>>顶部</option>
            <option value="1" <?php if($row['pos']){echo "selected";}?>>底部</option>
        </select><br>
        <label for="">原图：</label><img src="../publics/upload/<?php echo $row['img'] ?>" style="width: 200px;height:50px;"><br>
        <label for="">图片：</label><input type="file" name="img" ><br>
        <label for="">url：</label><input type="text" name="url" value="<?php echo $row['url']?>"><br>
        <input type="hidden" value="<?php echo $row['id']?>" name="id">
        <input type="hidden" value="<?php echo $row['img']?>" name="imgsrc">
        <input type="submit" value="提交">
        <input type="reset" value="重置">

    </form>

</div>



