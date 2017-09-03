<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234", "shop");

//3设置数据库字符集
mysqli_query($conn, "set names utf8");

$length = 10;

$pagenum = $_GET['page'] ? $_GET['page'] : 1;

$totsql = "select count(*) from shop";

$totarr = mysqli_fetch_row(mysqli_query($conn,$totsql));

$pagetot = ceil($totarr[0] / $length);

if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}

$offset = ($pagenum - 1) * $length;

$sql = "select shop.*,brand.name bname,class.name cname from shop,brand,class where brand.class_id = class.id and shop.brand_id = brand.id limit {$offset},{$length}";

$rsc = mysqli_query($conn, $sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看商品</h2>";
echo "<table width='100%'>";
echo "<th>ID</th>";
echo "<th>名称</th>";
echo "<th>图片</th>";
echo "<th>价格</th>";
echo "<th>库存</th>";
echo "<th>货架</th>";
echo "<th>品牌</th>";
echo "<th>分类</th>";
echo "<th>修改</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td>$row[name]</td>";
    echo "<td><img src='../publics/upload/{$row['img']}'style='width: 60px;height: 45px;'></td>";
    echo "<td>$row[price]</td>";
    echo "<td>$row[stock]</td>";
    if ($row['shelf']) {
        echo "<td>上架</td>";
    } else {
        echo "<td>下架</td>";
    }
    echo "<td>$row[bname]</td>";
    echo "<td>$row[cname]</td>";
    echo "<td><a href='index.php?a=editShop&id={$row['id']}'>修改</a></td>";
    echo "<td><a href='index.php?a=delShop&id={$row['id']}&img={$row['img']}'>删除</a></td>";

    echo "</tr>";

}

echo "</table>";

if ($pagenum == 1) {
    $prevpage = $pagenum;
} else {
    $prevpage = $pagenum - 1;
}

if ($pagenum == $pagetot) {
    $nextpage = $pagetot;
} else {
    $nextpage = $pagenum + 1;
}


echo "<h3 class='page'><a href='index.php?a=shop&page={$prevpage}'>上一页</a>|<a href='index.php?a=shop&page={$nextpage}'>下一页</a></h3>";

echo "</center>";


mysqli_close($conn);

