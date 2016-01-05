<?php 
session_start();
if($_POST['customer_id'] > 0){
	$url = "../index.php?mod=order&act=list-customer";
}else{
	$url = "../index.php?mod=order&act=list";
}
require_once "../model/Backend.php";
$model = new Backend;

$arrParam = $_POST;
$arrParam['total'] = str_replace(",", "", $_POST['total']);
$arrParam['ship'] = str_replace(",", "", $_POST['ship']);
$arrParam['sub_total'] = str_replace(",", "", $_POST['sub_total']);
$arrParam['delivery_date'] = strtotime($_POST['delivery_date']);
$arrParam['created_at'] = strtotime($_POST['created_at']);
$arrParam['updated_at'] = time();
$arrParam['updated_by'] = $_SESSION['user_id'];
$back_url = $_POST['back_url'];

if($arrParam['order_id'] > 0) {	
	$model->updateOrder($arrParam);
	header('location:'.$url.$back_url);
}

?>