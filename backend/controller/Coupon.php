<?php
session_start();

$list_url = "../index.php?mod=ma-giam-gia&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = isset($_POST['id']) ?  (int) $_POST['id'] : 0;

$arrData['code'] = $model->processData($_POST['code']);
$arrData['title'] = $model->processData($_POST['title']);
$arrData['content'] = $model->processData($_POST['content']);
$arrData['label'] = $model->processData($_POST['label']);
$arrData['start_date'] = date('Y-m-d H:i:s', strtotime($model->processData($_POST['start_date'])));
$arrData['end_date'] = date('Y-m-d H:i:s', strtotime($model->processData($_POST['end_date'])));


$arrData['status'] = (int) $_POST['status'];

$table = "coupon";
//var_dump("<pre>", $arrData);die;
if($id > 0) {	
	$arrData['id'] = $id;
	
	$model->update($table, $arrData);	
}
header('location:'.$list_url);
?>