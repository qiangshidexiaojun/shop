<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/6/16
 * Time: 18:56
 */

include "../../publics/common/config.php";

$id = $_GET['id'];
$sql = "delete from touch where id = {$id}";

if(mysqli_query($conn,$sql)){
    echo "<script>location = 'index.php?c=userlist'</script>";
}else{
    echo "<script>alert('删除失败')</script>";
    echo "<script>location = 'index.php?c=userlist'</script>";
}