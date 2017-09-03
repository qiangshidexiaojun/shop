<?php
    session_start();
    include "../../publics/common/config.php";
?>
<table>
    <tr>
        <th>姓名</th>
        <th>地址</th>
        <th>电话</th>
        <th>邮箱</th>
<th>修改</th>
<th>删除</th>
</tr>
<?php
$user_id = $_SESSION['home_userid'];
$sql = "select * from touch where user_id = '{$user_id}'";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['addr']}</td>
                    <td>{$row['tel']}</td>
                    <td>{$row['email']}</td>
                    <td><a href='index.php?c=edit&id={$row['id']}' class='cartDel'>修改</a></td>
                    <td><a href='delete.php?id={$row['id']}' class='cartDel'>删除</a></td>
                </tr>
                ";
}

?>

</table>
