<?php
session_start();
$type = (int) $_POST['type'];
if($type == 1){
	$mod = "content";
}elseif($type == 2){
	$mod = "tin-dung";
}else{
	$mod = "tai-sao";
}

$list_url = "../index.php?mod=".$mod."&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = isset($_POST['id']) ?  (int) $_POST['id'] : 0;

$arrData['name'] = $model->processData($_POST['name']);
$arrData['title'] = $model->processData($_POST['title']);
$arrData['description'] = $model->processData($_POST['description']);
$arrData['content'] = $_POST['content'];

$image_url_upload = $_FILES['image_url_upload'];
if(($image_url_upload['name']!='')){
    $arrRe = $model->uploadImages($image_url_upload);   
    $image_url = $arrRe['filename'];
}else{
    $image_url = str_replace('../', '', $_POST['image_url']);
}

$arrData['image_url'] = $image_url;
$arrData['type'] = (int) $_POST['type'];

$table = "content";

if($id > 0) {	
	$arrData['id'] = $id;
	
	$model->update($table, $arrData);	
}else{	
	$id = $model->insert($table, $arrData);	
}

header('location:'.$list_url);
?>