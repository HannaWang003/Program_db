<?php
session_start();
$acc=$_POST['acc'];
$pwd=$_POST['pwd'];

$dns="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dns,'root','');

$sql="select count(*) from users where `acc`='$acc' && `pwd`='$pwd'";
$user=$pdo->query($sql)->fetch();
$user=$pdo->query($sql)->fetchcolumn();

// if($user['acc']==$acc && $user['pwd']==$pwd){
    if($user==1){
    $_SESSION['user']=$acc;
    header("location:index.php");
}
else{
    header("location:login_form.php?error=輸入錯誤");
}




?>