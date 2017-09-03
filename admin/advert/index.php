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

$sql = "select * from advert";

$rsc = mysqli_query($conn, $sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看广告</h2>";
echo "<table width='100%'>";
echo "<th>ID</th>";
echo "<th>图片</th>";
echo "<th>位置</th>";
echo "<th>URL</th>";
echo "<th>修改</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td><img src='../publics/upload/{$row['img']}'style='width: 200px;height:50px;'></td>";
    echo "<td>$row[pos]</td>";
    echo "<td>$row[url]</td>";
    echo "<td><a href='index.php?a=editAdvert&id={$row['id']}'>修改</a></td>";
    echo "<td><a href='index.php?a=delAdvert&id={$row['id']}&img={$row['img']}'>删除</a></td>";

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

