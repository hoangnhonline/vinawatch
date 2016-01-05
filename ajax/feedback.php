<?php 
session_start();
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$id = (int) $_POST['id'];
$type = (int) $_POST['type'];
$created_at = time();

$sql = "INSERT INTO feedback VALUES (NULL,$id, $type, $created_at)";
mysql_query($sql) or die(mysql_error());


?>
