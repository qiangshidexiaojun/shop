<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234","shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$sql = "select brand.*,class.name cname from brand,class where brand.class_id = class.id";

$rsc = mysqli_query($conn,$sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看品牌</h2>";
echo "<table width='700px'>";
echo "<th>ID</th>";
echo "<th>品牌名称</th>";
echo "<th>分类名称</th>";
echo "<th>修改</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[cname]</td>";
    echo "<td><a href='index.php?a=editBrand&id={$row[id]}'>修改</a></td>";
    echo "<td><a href='index.php?a=delBrand&id={$row[id]}'>删除</a></td>";

    echo "</tr>";

}

echo "</table>";


echo "</center>";


mysqli_close($conn);
