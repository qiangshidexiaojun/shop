<?php

include "../publics/common/config.php";

$sql = "select comment.*,user.username,shop.name from comment,user,shop where comment.shop_id=shop.id and comment.user_id=user.id";

$res = mysqli_query($conn,$sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看评论</h2>";
echo "<table width='100%'>";
echo "<th>ID</th>";
echo "<th>用户</th>";
echo "<th>商品</th>";
echo "<th>评论</th>";
echo "<th>时间</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($res)) {


    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td>$row[username]</td>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[content]</td>";
    echo "<td>".@date('Y-m-d H:i:s',$row['time']+28800)."</td>";
    echo "<td><a href='index.php?a=delComment&id={$row['id']}'>删除</a></td>";

    echo "</tr>";

}
echo "</table>";


echo "</center>";

