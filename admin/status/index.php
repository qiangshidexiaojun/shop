<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234","shop");

//3设置数据库字符集
mysqli_query($conn,"set names utf8");

$length = 10;

$pagenum = $_GET['page'] ? $_GET['page'] : 1;

$totsql = "select count(*) from status";

$totarr = mysqli_fetch_row(mysqli_query($conn,$totsql));

$pagetot = ceil($totarr[0] / $length);

if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}

$offset = ($pagenum - 1) * $length;

$sql = "select * from status order by id asc limit {$offset},{$length}";

$rsc = mysqli_query($conn,$sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看状态</h2>";
echo "<table width='700px'>";
echo "<th>ID</th>";
echo "<th>订单状态</th>";
echo "<th>修改</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td>$row[name]</td>";
    echo "<td><a href='index.php?a=editStatus&id={$row['id']}'>修改</a></td>";
    if($row['id'] == 1){
        echo "<td><a href='javascript:' style='background: #888;' class='editHover'>删除</a></td>";
    }else{
        echo "<td><a href='index.php?a=delStatus&id={$row['id']}'>删除</a></td>";
    }

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


echo "<h3 class='page'><a href='index.php?a=status&page={$prevpage}'>上一页</a>|<a href='index.php?a=status&page={$nextpage}'>下一页</a></h3>";

echo "</center>";


mysqli_close($conn);
