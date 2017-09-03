<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234","shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$sql = "select * from user  where isadmin = 0";

$rsc = mysqli_query($conn,$sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看用户</h2>";
echo "<table width='700px'>";
echo "<th>ID</th>";
echo "<th>头像</th>";
echo "<th>用户名</th>";
echo "<th>修改</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td><img src='../publics/upload/{$row['img']}'style='width: 50px;height:50px;'></td>";
    echo "<td>$row[username]</td>";
    echo "<td><a href='index.php?a=editUser&id={$row['id']}'>修改</a></td>";
    echo "<td><a href='index.php?a=delUser&id={$row['id']}&img={$row['img']}''>删除</a></td>";

    echo "</tr>";

}

echo "</table>";

echo "</center>";


mysqli_close($conn);
