<?php
$dsn="mysql:hots=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root',);
// $sql="select * from `students`";
// $rows=$pdo->query($sql)->fetchAll();
// echo "<pre>";
// print_r($rows);
// echo "</pre>";

// $sql="insert into `dept` (`code`,`name`) values('801','會計科');";
// $pdo->query($sql);
 
// $sql="update `dept` set `name`='財經科',`code`='802' where `id`='11'";
// $pdo->query($sql);

$sql="delete from `dept` where `id`='10'";
echo "<h2>影響".$pdo->exec($sql)."筆資料</h2>";

?>