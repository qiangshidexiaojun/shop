<?php
    session_start();
    include "../../publics/common/config.php";
?>
<table>
    <tr>
        <th>订单号</th>
        <th>下单时间</th>
        <th>订单状态</th>
        <th>确认收货</th>
    </tr>

    <?php
        $user_id = $_SESSION["home_userid"];
        $sql = "select indent.*,status.name from indent,status where indent.status_id = status.id and user_id = {$user_id} group by indent.code";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td><a href='index.php?c=code&code={$row['code']}' class='cartDel'>{$row['code']}</a></td>";
            echo "<td>".@date('Y-m-d h:i:s',$row['time']+28800)."</td>";
            echo "<td>{$row['name']}</td>";
            if($row['confirm']){
                echo "<td><a href='index.php?c=code&code={$row['code']}' class='cartDel'>评论</a></td>";
            }else{
                echo "<td><a href='confirm.php?code={$row['code']}' class='cartDel'>确认</a></td>";
            }
            echo "</tr>";
        }
    ?>
</table>
