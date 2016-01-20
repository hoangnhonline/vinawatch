<?php 

$url = "../index.php?mod=articles&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = (int) $_POST['article_id'];

$dataArr['article_title'] = $article_title = $model->processData($_POST['article_title']);
$dataArr['title_en'] = $title_en = $model->processData($_POST['title_en']);
$dataArr['article_alias'] = $article_alias = $model->processData($_POST['article_alias']);

$dataArr['description'] = $description = $model->processData($_POST['description']);

$dataArr['content'] = $content = mysql_escape_string($_POST['content']);
$dataArr['source'] = $source = mysql_escape_string($_POST['source']);
$dataArr['seo_text'] = $seo_text = mysql_escape_string($_POST['seo_text']);

$dataArr['cate_id'] = $cate_id = (int) $_POST['cate_id'];

$dataArr['is_hot'] = $is_hot = (int) $_POST['is_hot'];
$dataArr['hidden'] = $hidden = (int) $_POST['hidden'];

$image_url_upload = $_FILES['image_url_upload'];
if(($image_url_upload['name']!='')){
	$arrRe = $model->uploadImages($image_url_upload);	
	$image_url = $arrRe['filename'];
}else{
	$image_url = str_replace('../', '', $_POST['image_url']);
}
$dataArr['image_url'] = $image_url;

$meta_title = $model->processData($_POST['meta_title']);

$seo_title = $model->processData($_POST['seo_title']);
$dataArr['seo_title'] = $seo_title; 

$meta_keyword = $model->processData($_POST['meta_keyword']);
$meta_description = $model->processData($_POST['meta_description']);

if($meta_title=='') $meta_title = $page_name;
if($meta_keyword=='') $meta_keyword = $page_name;
if($meta_description=='') $meta_description = $page_name;
$dataArr['meta_title'] = $meta_title;
$dataArr['meta_keyword'] = $meta_keyword;
$dataArr['meta_description'] = $meta_description;
$dataArr['updated_at'] = time();
if($id > 0) {	
	$dataArr['id'] = $id;
	$model->update('articles', $dataArr);

	header('location:'.$url."&cate_id=".$cate_id);

}else{
	$dataArr['created_at'] = time();
	$model->insert('articles', $dataArr);
	
	header('location:'.$url."&cate_id=".$cate_id);
}
?>