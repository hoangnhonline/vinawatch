<?php
ini_set('display_errors',0);
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$product_id = (int) $_POST['product_id'];
$detail = $model->getDetailProduct($product_id);
$product = $detail['data'];
?>
<div class="col-md-5" style="padding:10px;background-color:#F5D927;height:400px">
	<h1><?php echo $product['product_name']; ?></h1>
	<div class="col-md-6">Giá thị trường</div>
	<div class="col-md-6">
		<h3 class="price-old" style="color:#FFF;text-decoration:line-through">
			<?php echo number_format($product['price'],0, ",", "."); ?> đ
		</h3>
	</div>
	<div class="col-md-6">Giá giờ vàng</div>
	<div class="col-md-6">
		<h3 class="price-sale" style="color:#ac0e0f">
			<?php echo number_format($product['price_saleoff'],0, ",", "."); ?> đ
		</h3>
	</div>
	
	<div class="new-goldentime-muapadding">Đã có 
		<span class="new-goldentime-mua"><?php echo $product['da_ban']; ?></span> lượt mua <div class="new-goldentime-maxmua"> 
		<div style="width: <?php echo $product['da_ban']*100/$product['deal_amount']; ?>%;">&nbsp;</div></div> 
	Còn lại <span class="new-goldentime-soluong"><?php echo $product['deal_amount'] - $product['da_ban']; ?></span> sản phẩm</div>
	<div class="countdown" id="countne" data-year="2015" data-month="08" data-day="14" data-hours="09" data-minutes="0" data-seconds="0"></div>

	<div class="col-md-12" style="text-align:center;margin-top:15px">
		<a href="chi-tiet/<?php echo $product['product_alias']; ?>-<?php echo $product['id'];?>.html">
			<img src="images/mua-ngay.png" width="170px" alt="Mua ngay" title="Mua ngay" />
		</a>
	</div>
</div>
<div class="col-md-7" style="background-color:#FFF;padding:10px;text-align:center">
	<img src="<?php echo $product['image_url'];?>" style="width:380px">
</div>
<script>
$(document).ready(function(){	
	
});

</script>
