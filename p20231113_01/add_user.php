<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');
$acc=htmlspecialchars(trim($_POST['acc']));
$sql="insert into `users` (`acc`,`pwd`,`name`,`tel`) values ('{$acc}','{$_POST['pwd']}','{$_POST['name']}','{$_POST['tel']}')";
echo "影響{$pdo->exec($sql)}筆資料";
exit();
header("location:login_form.php");
?>