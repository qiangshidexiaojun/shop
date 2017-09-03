<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234", "shop");

//3设置数据库字符集
mysqli_query($conn, "set names utf8");

$length = 10;

$pagenum = $_GET['page'] ? $_GET['page'] : 1;

$totsql = "select count(*) from touch";

$totarr = mysqli_fetch_row(mysqli_query($conn,$totsql));

$pagetot = ceil($totarr[0] / $length);

if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}

$offset = ($pagenum - 1) * $length;

$id = $_GET['id'];

$sql = "select * from touch where id = {$id} limit {$offset},{$length}";

$rsc = mysqli_query($conn, $sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看联系方式</h2>";
echo "<table width='100%'>";
echo "<th>ID</th>";
echo "<th>姓名</th>";
echo "<th>地址</th>";
echo "<th>电话</th>";
echo "<th>邮箱</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[addr]</td>";
    echo "<td>$row[tel]</td>";
    echo "<td>$row[email]</td>";

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


echo "<h3 class='page'><a href='index.php?a=touch&page={$prevpage}'>上一页</a>|<a href='index.php?a=touch&page={$nextpage}'>下一页</a></h3>";

echo "</center>";


mysqli_close($conn);

