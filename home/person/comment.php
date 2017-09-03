<style>

    textarea{
        resize: none;
        width: 100%;
        margin: 15px 0;
        /*padding: 5px;*/
    }


</style>

<form action="commentinsert.php" method="post">

    <p>请发表评论:</p>
    <textarea name="content" id="" cols="140" rows="10"></textarea>
    <input type="hidden" name="shop_id" value="<?php echo $_GET['shop_id']?>">
    <p><input type="submit" value="提交" class="submit"></p>

</form>