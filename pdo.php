<?php
$dsn="mysql:hots=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root',);
$sql="select * from `students`";
$rows=$pdo->query($sql)->fetchAll();
echo "<pre>";
print_r($rows);
echo "</pre>";

?>