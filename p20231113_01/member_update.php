<?php
session_start();
include_once("./inc/pdo.php");

$sql="update `users` set `pwd`='{$_POST['pwd']}',`name`='{$_POST['name']}',`tel`='{$_POST['tel']}' where `id` = '{$_SESSION['id']}'";
if($pdo->exec($sql)>0){
    $_SESSION['msg']="更新成功";
}
else{
    $_SESSION['msg']="資料無異動";
};
// exit();
header("location:./member.php");
?>