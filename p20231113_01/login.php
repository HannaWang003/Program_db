<?php
session_start();
include_once("./inc/pdo.php");

$acc=$_POST['acc'];
$pwd=$_POST['pwd'];


$sql="select count(*),`id` from users where `acc`='$acc' && `pwd`='$pwd'";
$user=$pdo->query($sql)->fetch();
$userNumber=$pdo->query($sql)->fetchcolumn();
// fetchcolumn() 傳回資料列中的第一個資料行
    // 檢查用
    // echo "<pre>";
    // echo print_r($user);
    // echo "</pre>";
    // exit();
    // 檢查用end
// if($user['acc']==$acc && $user['pwd']==$pwd){
    if($userNumber==1){
    $_SESSION['id']=$user['id'];
    $_SESSION['user']=$acc;
    header("location:index.php");
}
else{
    header("location:login_form.php?error=輸入錯誤");
}




?>