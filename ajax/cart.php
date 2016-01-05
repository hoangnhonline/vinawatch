<?php 
session_start();
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$action = $_POST['action'];
$product_id = (int) $_POST['product_id'];
//var_dump($product_id);
$arrDetailProduct = $model->getDetailProduct($product_id);

$data = $arrDetailProduct['data'];
//var_dump("<pre>",$data);
if(!isset($_SESSION['cart_id'])){
	$_SESSION['cart_id'] = array();
}
if($product_id > 0){
	if($action=='add'){
		if(!in_array($product_id, $_SESSION['cart_id'])){
			$_SESSION['cart_id'][] = $product_id;
			$_SESSION['cart'][$product_id]['id'] = $product_id;			
			$_SESSION['cart'][$product_id]['soluong'] = 1;
			$_SESSION['cart'][$product_id]['giatien'] = $data['price_saleoff'] > 0 ? $data['price_saleoff'] : $data['price'];
			$_SESSION['cart'][$product_id]['image_url'] = $data['image_url'];
			$_SESSION['cart'][$product_id]['product_name'] = $data['product_name'];		
			$_SESSION['cart'][$product_id]['tientheosp'] = $data['price_saleoff'] > 0 ? $data['price_saleoff'] : $data['price'];		
			var_dump("<pre>",$_SESSION['cart'][$product_id]);die;
		}else{
			$_SESSION['cart'][$product_id]['soluong']++;
			$_SESSION['cart'][$product_id]['tientheosp'] = $_SESSION['cart'][$product_id]['soluong']*$_SESSION['cart'][$product_id]['giatien'];
		}
	}
	if($action == 'update'){
		$soluong = (int) $_POST['no'];
		if($soluong >= 0 && $soluong <= 100){
			$_SESSION['cart'][$product_id]['soluong']=$soluong;
			$_SESSION['cart'][$product_id]['tientheosp'] = $_SESSION['cart'][$product_id]['soluong']*$_SESSION['cart'][$product_id]['giatien'];
		}
	}
	if($action=='remove'){
		unset($_SESSION['cart'][$product_id]);
		if(!empty($_SESSION['cart'])){
			$tongtien = 0;
			foreach ($_SESSION['cart'] as $value) {
				$tongtien += $value['tientheosp'];
			}
		}else{
			$tongtien=0;
		}
		$arr = array('tongtien'=>$tongtien);
	
	}
	if($action == 'tang'){	
		if($_SESSION['cart'][$product_id]['soluong'] < 100){
			$_SESSION['cart'][$product_id]['soluong']++;
			$_SESSION['cart'][$product_id]['tientheosp'] = $_SESSION['cart'][$product_id]['soluong']*$_SESSION['cart'][$product_id]['giatien'];
			
			if(!empty($_SESSION['cart'])){
				$tongtien = 0;
				foreach ($_SESSION['cart'] as $value) {
					$tongtien += $value['tientheosp'];
				}
			}
			$arr = array('tientheosp' => $_SESSION['cart'][$product_id]['tientheosp'],'tongtien'=>$tongtien);
		
		}

	}
	if($action == 'giam'){
		if($_SESSION['cart'][$product_id]['soluong'] > 1){
			$_SESSION['cart'][$product_id]['soluong']--;
			$_SESSION['cart'][$product_id]['tientheosp'] = $_SESSION['cart'][$product_id]['soluong']*$_SESSION['cart'][$product_id]['giatien'];				
			if(!empty($_SESSION['cart'])){
				$tongtien = 0;
				foreach ($_SESSION['cart'] as $value) {
					$tongtien += $value['tientheosp'];
				}
			}
			$arr = array('tientheosp' => $_SESSION['cart'][$product_id]['tientheosp'],'tongtien'=>$tongtien);
			
		}
	}
}
$a = $_SESSION['cart'];
$tongsp = 0;
foreach ($a as $product) {    
  $tongsp+= $product['soluong'];
} 
$arr['tongsp'] = $tongsp;
echo json_encode($arr);
?>