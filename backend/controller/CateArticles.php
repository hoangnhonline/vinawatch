<?php 

$url = "../index.php?mod=cate_articles&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = (int) $_POST['cate_id'];

$dataArr['cate_name'] = $cate_name = $model->processData($_POST['cate_name']);

$dataArr['cate_alias'] =  $cate_alias = $model->processData($_POST['cate_alias']);

$dataArr['is_hot'] =  $is_hot = (int) $_POST['is_hot'];

$dataArr['hidden'] =  $hidden = (int) $_POST['hidden'];

$dataArr['meta_title'] =  $meta_title = $model->processData($_POST['meta_title']);
$dataArr['seo_title'] =  $seo_title = $model->processData($_POST['seo_title']);

$meta_description = $model->processData($_POST['meta_description']);

$meta_keyword = $model->processData($_POST['meta_keyword']);

if($meta_title =='') $meta_title = $cate_name;
if($meta_description =='') $meta_description = $cate_name;
if($meta_keyword =='') $meta_keyword = $cate_name;

$dataArr['meta_title'] = $meta_title;
$dataArr['meta_description'] = $meta_description;
$dataArr['meta_keyword'] = $meta_keyword;

$image_url_upload = $_FILES['image_url_upload'];
if(($image_url_upload['name']!='')){
	$arrRe = $model->uploadImages($image_url_upload);	
	$image_url = $arrRe['filename'];
}else{
	$image_url = str_replace('../', '', $_POST['image_url']);
}
$dataArr['image_url'] = $image_url;
$description = $model->processData($_POST['description']);
$dataArr['description'] = $description;
$seo_text = mysql_real_escape_string($_POST['seo_text']);
$dataArr['seo_text'] = $seo_text;
if($id > 0) {	
	$dataArr['id'] = $id;
	$model->update('article_cate', $dataArr);

	header('location:'.$url);

}else{

	$model->insert('article_cate', $dataArr);

	header('location:'.$url);
}
?>