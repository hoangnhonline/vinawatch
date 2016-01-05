<?php 
session_start();
require_once "../backend/model/Frontend.php";
$model = new Fontend;

$arrParam = $_POST;

$_SESSION['cart'] = $_POST;

$arrParam['status'] = 1;
$arrParam['created_at'] = time();

$column = $valuee = "";

$delivery_date = $_POST['delivery_date'];

$date = strtotime($delivery_date);

$arrParam['delivery_date'] = $date;
foreach ($arrParam as $key => $value) {
	$column .= "$key".",";
	$values .= "'".$value."'".",";
}
$column = rtrim($column,",");
$values = rtrim($values,",");
$sql = "INSERT INTO order_info(".$column.") VALUES (".$values.")"; 

mysql_query($sql) or die(mysql_error());
$order_id = mysql_insert_id();
if($order_id > 0){
	echo "success";
}else{
	echo "error";
}
exit();
?>