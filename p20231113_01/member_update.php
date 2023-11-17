<?php
session_start();
include_once("./inc/pdo.php");
if(isset($_POST['pwd'])){
    $_SESSION['pwd']=$_POST['pwd'];
}

if(isset($_POST['name'])){
    $_SESSION['name']=$_POST['name'];
}
if(isset($_POST['tel'])){
    $_SESSION['tel']=$_POST['tel'];
}
$sql="update `users` set `pwd`='{$_SESSION['pwd']}',`name`='{$_SESSION['name']}',`tel`='{$_SESSION['tel']}' where `id` = '{$_SESSION['id']}'";
$pdo->exec($sql);
// exit();
header("location:./index.php");
?>