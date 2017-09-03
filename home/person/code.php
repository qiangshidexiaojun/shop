<?php

//1连接数据库
$conn = @mysqli_connect("localhost", "root", "1234", "shop");

//3设置数据库字符集
mysqli_query($conn, "set names utf8");

$code = $_GET['code'];

$sql = "select shop.name,shop.img,indent.*,shop.id from shop,indent where indent.shop_id = shop.id and indent.code = '{$code}'";

$rsc = mysqli_query($conn, $sql);

$sqlIndent = "select count(code) from indent where code = '{$code}'";
$query = mysqli_fetch_row(mysqli_query($conn,$sqlIndent));
$summation = $query[0];

$sum = array();

$number=0;


echo "<link rel='stylesheet' href='../public/css/index.css'>";
echo "<table width='100%' style='background: #fff'>";
echo "<th>名称</th>";
echo "<th>图片</th>";
echo "<th>价格</th>";
echo "<th>数量</th>";
echo "<th>合计</th>";
echo "<th>评论</th>";

while ($row = @mysqli_fetch_assoc($rsc)) {

    echo "<tr>";

    echo "<td>$row[name]</td>";
    echo "<td><img src='../../publics/upload/s_{$row['img']}' style='width: 120px;height: 90px;'></td>";
    echo "<td>$row[price]</td>";
    echo "<td>$row[num]</td>";
    echo "<td>" . $sum[$number] = $row['price'] * $row['num'] . "</td>";
    if($row['confirm']){
        echo "<td><a href='index.php?c=comment&shop_id={$row['id']}' class='cartDel'>评论</a></td>";
    }else{
        echo "<td><a href='index.php?c=orderlist' class='cartDel editHover' style='background: #888' onclick=\"alert('请先确认收货')\">评论</a></td>";
    }

    echo "</tr>";

    $number++;

   if($summation == $number){
       echo "<tr>";

       echo "<td>总计</td>";
       echo "<td colspan='4'>" . array_sum($sum)  . "</td>";

       echo "</tr>";
   }

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





mysqli_close($conn);

