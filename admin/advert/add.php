
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

</style>


    <div class="addAdvert">

        <h2>添加广告</h2>
        <form action="advert/insert.php" method="post" enctype="multipart/form-data">

            <label for="">位置：</label><select name="pos" id="">
                <option value="0">顶部</option>
                <option value="1">底部</option>
            </select><br>
            <label for="">图片：</label><input type="file" name="img"><br>
            <label for="">url：</label><input type="text" name="url"><br>
            <input type="submit" value="提交">
            <input type="reset" value="重置">

        </form>
        
    </div>



