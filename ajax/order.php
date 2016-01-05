<?php 
session_start();
require_once "../backend/model/Frontend.php";
$model = new Fontend;

$arrParam = $_POST;

$total_price = $total_amount = $total_pay = $customer_id = $code_id = $discount = 0;
/*$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
*/

$order_code = "DH-".date('Ym');
$idMax = $model->getOrderIdMax();
$order_code = "DH-".date('Ym').'-'.$idMax;

$arrParam['order_code'] = $order_code;
$arrParam['status'] = 1;
$arrParam['created_at'] = time();
$arrParam['delivery_date'] = strtotime($_POST['delivery_date']);

$back_url = $_POST['back_url'];

if(!empty($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $product) {
		$total_price += $product['tientheosp'];
		$total_amount += $product['soluong'];
	}
}
$arrParam['sub_total'] = $total_price;
if(isset($_SESSION['pay'])){
   $arrParam['total'] = $_SESSION['pay'];	
}else{
   $arrParam['total'] = $total_price;
} 
if(isset($_SESSION['coupon'])){
   $arrParam['sale'] = $_SESSION['coupon'];	
}
if(isset($_SESSION['code_id'])){
   $arrParam['code_id'] = $_SESSION['code_id'];	
}
$arrParam['total_amount'] = $total_amount;

$column = $valuee = "";

foreach ($arrParam as $key => $value) {
	$column .= "$key".",";
	$values .= "'".$value."'".",";
}
$column = rtrim($column,",");
$values = rtrim($values,",");
$sql = "INSERT INTO orders(".$column.") VALUES (".$values.")";

mysql_query($sql) or die(mysql_error());
$order_id = mysql_insert_id();
foreach ($_SESSION['cart'] as $key => $value) {
	$product_id = $value['id'];
	$product_name = $value['product_name'];
	$amount = $value['soluong'];
	$price = $value['giatien'];
	$total = $value['tientheosp'];
	$product_id = $value['id'];
	$model->insertOrderDetail($order_id,$product_id,$product_name,$amount,$price,$total);
}
unset($_SESSION['cart']);
?>
