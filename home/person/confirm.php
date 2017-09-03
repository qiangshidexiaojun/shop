<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/17
 * Time: 13:48
 */

include  '../../publics/common/config.php';

$code = $_GET['code'];
$confirm = 1;

$sql = "update indent set confirm = {$confirm} where code = '{$code}'";

if(mysqli_query($conn,$sql)){
    echo "<script>location='index.php?c=orderlist'</script>";
}
