<?php
include_once("../inc/pdo.php");
$sql="delete from `users` where `id` = '{$_SESSION['id']}'";
$pdo->exec($sql);
unset($_SESSION['user']);
header("location:../index.php");
?>