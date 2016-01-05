<?php 
session_start();
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$action = $_POST['action'];
$code = $_POST['code'];
$arr = array();
$detail = $model->getDetailCode($code);
if(!empty($detail)){
if($detail['type']==1){
	$v = str_replace("%", "", $detail['code_value']);
}
if($detail['type']==2){
	$v = $detail['code_value'];
}

if(!empty($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $value) {
		$tongtien += $value['tientheosp'];
	}
}
if($detail['type']==1){
	$pay = $tongtien*(100-$v)/100;
	$coupon =  ($tongtien*$v)/100;
}
if($detail['type']==2){
	$pay = $tongtien-$v;
	$coupon =  $v;
}
$arr['mess'] = 'success';
$arr['pay'] = $pay;
$arr['coupon'] = $coupon;
$_SESSION['coupon'] = $coupon;
$_SESSION['pay'] = $pay;
$_SESSION['code_id'] = $detail['code_id'];
}else{
	$arr['mess'] = 'error';
}
echo json_encode($arr);
?>
