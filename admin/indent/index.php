<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234", "shop");

//3设置数据库字符集
mysqli_query($conn, "set names utf8");

$length = 10;

$pagenum = $_GET['page'] ? $_GET['page'] : 1;

$totsql = "select count(*) from indent";

$totarr = mysqli_fetch_row(mysqli_query($conn,$totsql));

$pagetot = ceil($totarr[0] / $length);

if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}

$offset = ($pagenum - 1) * $length;

$sql = "select indent.*,user.username,status.name from indent,user,status where indent.user_id=user.id and indent.status_id=status.id group by indent.code limit {$offset},{$length}";
$rsc = mysqli_query($conn, $sql);

echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<center>";
echo "<h2>查看订单</h2>";
echo "<table width='100%'>";
echo "<th>ID</th>";
echo "<th>订单号</th>";
echo "<th>用户</th>";
echo "<th>下单时间</th>";
echo "<th>订单状态</th>";
echo "<th>联系方式</th>";
echo "<th>确认收货</th>";
echo "<th>修改</th>";
echo "<th>删除</th>";
while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[id]</td>";
    echo "<td><a href='index.php?a=code&code=$row[code]'>$row[code]</a></td>";
    echo "<td>$row[username]</td>";
    echo "<td>".@date('Y-m-d H:i:s',$row['time']+28800)."</td>";
    echo "<td>$row[name]</td>";
    echo "<td><a href='index.php?a=touch&id={$row['touch_id']}'>联系方式</a></td>";
    if($ror['confirm']){
        echo "<td><a href='index.php?a=touch&id={$row['touch_id']}'>是</a></td>";
    }else{
        echo "<td><a href='index.php?a=touch&id={$row['touch_id']}'>否</a></td>";
    }
    echo "<td><a href='index.php?a=editIndent&id={$row['id']}&code={$row['code']}&status_id={$row['status_id']}'>修改</a></td>";
    echo "<td><a href='index.php?a=delIndent&code={$row['code']}'>删除</a></td>";

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


echo "<h3 class='page'><a href='index.php?a=indent&page={$prevpage}'>上一页</a>|<a href='index.php?a=indent&page={$nextpage}'>下一页</a></h3>";

echo "</center>";


mysqli_close($conn);

