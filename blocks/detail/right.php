<aside class="col-md-3 col-sm-4">							
    <section class="section_offset">
      <h4 class="widget-title"><?php echo $arrText[24]; ?></h4>
      <div class="textwidget">
      	<?php $arrTaiSao = $model->getList('content', -1, -1, array('type' => 3));
	    $countTaiSao = 0;    
	    foreach ($arrTaiSao['data'] as $key => $value) {
	        $countTaiSao++;
	    ?>
        <p> 
          	<img alt="tai sao chọn " class="alignnone size-full wp-image-575" 
          	src="<?php echo $value['image_url'];?>" style="float: left;">          	
			<span style="line-height: 1.6em;">
			<?php echo $value['content'];?>
			</span>
		</p>
		<?php } ?>
      </div>
    </section>
	<?php $arr = $model->getListBannerByPosition(8,-1); ?>

	<?php
	  if(!empty($arr)){			  
		  foreach($arr as $img){				  		
			
		  	$link_url = "";
		  	if($img['type_id'] == 2){
		  		$link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
		  	}
		  	if($img['type_id'] == 3){
		  		$link_url = $img['link_url'];
		  	}
	  ?>
	<div class="section_offset">

		<a title="<?php echo $img['name_event']; ?>" href="<?php echo $link_url; ?>"  <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?> <?php if($img['type_id']==1) echo 'onclick="return false;"'; ?>
							  class="banner">
			
			<img src="<?php echo $img['image_url']; ?>"  alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>">

		</a>

	</div>
	<?php } } ?>

	<section class="section_offset">

		<h3>Bạn đang quan tâm</h3>

		<ul class="products_list_widget">

			<!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
			<?php if(!empty($_SESSION['view'])){
	      $count_viewed =  0;
	        foreach ($_SESSION['view'] as $viewed) {        
	          $count_viewed ++;
	          if($count_viewed < 8){
	          	
	        ?>   
			<li style="position:relative">
				<?php if($viewed['percent_deal'] > 0){ ?>
				<div class="label_new">- <?php echo $viewed['percent_deal']; ?>%</div>
				<?php } ?>
				<a title="<?php echo $viewed['product_name']; ?>" href="<?php echo $model->getLinkProduct($viewed['id']); ?>/<?php echo $viewed['product_alias']; ?>.html" class="product_thumb">
					
					<img src="<?php echo $viewed['image_url']; ?>" title="<?php echo $viewed['product_name']; ?>" alt="<?php echo $viewed['product_name']; ?>" width="83" />

				</a>

				<div class="wrapper">
					<a title="<?php echo $viewed['product_name']; ?>" href="<?php echo $model->getLinkProduct($viewed['id']); ?>/<?php echo $viewed['product_alias']; ?>.html" class="product_title">
						<?php echo $viewed['product_name']; ?>
					</a>

					<div class="clearfix product_info">

						<p class="product_price alignleft">
							<b>
							<?php 
							if($viewed['price_saleoff'] > 0){
								echo number_format($viewed['price_saleoff'],0,",","."); 
							}else{
								echo number_format($viewed['price'],0,",","."); 
							}
							?>đ
							</b>
						</p>												
						<p class="product_price_saleoff" style="clear:both">
							<b>
							<?php 
							if($viewed['price_saleoff'] > 0){
								echo number_format($viewed['price'],0,",",".")." đ"; 
							}
							?>
							</b>
						</p>

					</div>

				</div>

			</li>
			<?php }}}?>

		</ul><!--/ .list_of_products-->

	</section>

</aside><!--/ [col]-->