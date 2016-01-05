<?php $dealArr = $model->getListDeal(); 
		if(!empty($dealArr)){
			?>	

		<style type="text/css">
			/*.owl-nav{
				margin-bottom: 30px !important;
			}*/

		</style>	
<section class="section_offset" style="margin-top:30px; float: left; width: 100%; margin-bottom: 10px !important;">

	<h3 class="offset_title" id="title-deal-hot">
		<img src="images/fire.png" align="left" style="margin-top:-15px" alt="deal" title="deal"> 
		<span style="font-size:36px">DEAL</span><span  style="font-size:19px">TRONG NGÀY</span>
	</h3>

	<div class="owl_carousel product_products three_items">

		<!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
		<?php 
				foreach ($dealArr as $product) {					
				?>
		<div class="product_item">

			<!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->

			<div class="image_wrap">

				<a href="<?php echo $model->getLinkProduct($product['id']); ?>/<?php echo $product['product_alias']; ?>.html" style="font-size:18px;margin-bottom:10px" title="<?php echo $product['product_name']; ?>">
					<img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>" title="<?php echo $product['product_name']; ?>">
				</a>
				<?php echo date('d-m-Y', $product['end_date']); ?>
			</div>
			<?php if($product['percent_deal'] > 0){ ?>
			<div class="label_new" style="padding: 5px 6px 8px;right:10px;left:auto;border-radius:5px 5px 5px 10px">
				<span style="font-size:11px;text-transform:capitalize;font-weight:normal">Tiết kiệm</span><br /> 
				<?php echo number_format($product['price']-$product['price_saleoff'],0,",","."); ?><span style="text-transform:lowercase"> đ</span>
			</div>
			<?php } ?>

			<!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->

			<!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->

			<div class="description" style="text-align:center">

				<a title="<?php echo $product['product_name']; ?>" href="<?php echo $model->getLinkProduct($product['id']); ?>/<?php echo $product['product_alias']; ?>.html" style="font-size:18px;margin-bottom:10px">
					<?php echo $product['product_name']; ?></a>
					<div style="margin-top:10px" class="countdown" 
					data-year="<?php echo date('Y', $product['end_date']); ?>" data-month="<?php echo date('m', $product['end_date']) - 1 ; ?>" data-day="<?php echo date('d', $product['end_date']); ?>" data-hours="<?php echo date('H', $product['end_date']); ?>" data-minutes="<?php echo date('i', $product['end_date']); ?>" data-seconds="<?php echo date('s', $product['end_date']); ?>"></div>
				<div class="clearfix product_info">
					<p class="product_price_saleoff">
						<b>
						<?php 
						if($product['price_saleoff'] > 0){
							echo number_format($product['price'],0,",",".")." đ"; 
						}
						?>
						</b>
					</p>
					<p class="product_price" style="font-size:25px">
						<b>
						<?php 
						if($product['price_saleoff'] > 0){
							echo number_format($product['price_saleoff'],0,",","."); 
						}else{
							echo number_format($product['price'],0,",","."); 
						}
						?>đ
						</b>
					</p>
					

				</div>				
			</div>

		</div><!--/ .product_item-->
		<?php  } ?>
		

	</div><!--/ .owl_carousel -->

</section><!--/ .section_offset -->
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on('click','.loadDeal',function(){
		var product_id = $(this).attr('data-value');
		$.ajax({
	        url: "ajax/deal.php",
	        type: "POST", 
	        async: false,      
	        data: {
	            'product_id' : product_id
	        },
	        success: function(data){                         
	            $('#dataDeal').html(data);
	            $('.countdown').countdown('destroy'); 
	            $('#countne').each(function(){
					var $this = $(this),
						endDate = $this.data(),
						until = new Date(
							endDate.year,
							endDate.month || 0,
							endDate.day || 1,
							endDate.hours || 0,
							endDate.minutes || 0,
							endDate.seconds || 0
						);
					// initialize
					$this.countdown({
						until : until,
						format : 'dHMS',
						labels : ['Năm', 'Tháng', 'Tuần', 'Ngày', 'Giờ', 'Phút', 'Giây']
					});
				});
	        }
		});
	});
});
</script>
<style type="text/css">
.loadDeal{
	cursor: pointer;
}
.new-goldentime-muapadding {
  text-align: center;
  margin: 10px 0;
  font-size: 12px;
}
.new-goldentime-maxmua {
  background: #fff;
  margin: 2px auto;
  width: 90%;
  text-align: left;
  padding: 1px;
  border: 1px #ccc solid;
  border-radius: 3px;
}
.new-goldentime-maxmua div {
  background: #099;
  color: #009;
  width: 0%;
  border-radius: 2px;
}
</style>