<section class="section_offset1">

	<h3 class="offset_title">Sản phẩm cùng loại</h3>

	<div class="owl_carousel related_products">

		<!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
		<?php if(!empty($arrRelated)){ 
          foreach ($arrRelated as $related) {
        ?>
		<div class="product_item">

			<!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->

			<div class="image_wrap">				
				<img title="<?php echo $related['product_name']; ?>" src="<?php echo $related['image_url']; ?>" alt="<?php echo $related['product_name']; ?>">
				<div class="actions_wrap" onclick='location.href="<?php echo $arrDetailCate['cate_alias']; ?>/<?php echo $related['product_alias']; ?>.html"'>

					<div class="centered_buttons">						
						<a title="<?php echo $related['product_name']; ?>" href="<?php echo $arrDetailCate['cate_alias']; ?>/<?php echo $related['product_alias']; ?>.html" class="button_blue add_to_cart">Xem ngay</a>

					</div>										

				</div>

			</div>
			<?php if($related['percent_deal'] > 0){ ?>
			<div class="label_new">- <?php echo $related['percent_deal']; ?>%</div>
			<?php } ?>

			<div class="description">

				<a href="<?php echo $arrDetailCate['cate_alias']; ?>/<?php echo $related['product_alias']; ?>.html" title="<?php echo $related['product_name']; ?>">
					<?php echo $related['product_name']; ?>
				</a>

				<div class="clearfix product_info">

					<p class="product_price alignleft">
						<b>
						<?php 
						if($related['price_saleoff'] > 0){
							echo number_format($related['price_saleoff'],0,",","."); 
						}else{
							echo number_format($related['price'],0,",","."); 
						}
						?>đ
						</b>
					</p>
					<p class="product_price_saleoff alignright">
						<b>
						<?php 
						if($related['price_saleoff'] > 0){
							echo number_format($related['price'],0,",",".")." đ"; 
						}
						?>
						</b>
					</p>

				</div>

			</div>

		</div>
		<?php  } } ?>		

	</div><!--/ .owl_carousel -->

</section><!--/ .section_offset -->