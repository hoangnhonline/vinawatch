<?php
session_start();
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once "../backend/model/Frontend.php";
$model1 = new Fontend;
if (!isset($_GET['keyword'])) {
	die("");
}

$keyword = $_GET['keyword'];    //echo $keyword;die;
$data = $model1->searchForKeyword($keyword);

echo json_encode($data['data'], JSON_HEX_APOS);