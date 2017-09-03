<?php
/**
 * Created by PhpStorm.
 * User: 李志军
 * Date: 2017/5/19
 * Time: 16:02
 */
include "../../publics/common/config.php";

$status_id = $_POST['status_id'];
$code = $_POST['code'];

$sql = "update indent set status_id = $status_id where code = '{$code}'";

if (mysqli_query($conn, $sql)) {
    echo "<script>location = '../index.php?a=indent'</script>";
} else {
    echo "<script>alert('修改失败')</script>";
    echo "<script>location = '../index.php?a=editIndent'</script>";

}



