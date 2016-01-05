<aside class="col-md-3 col-sm-4 has_mega_menu">

	<section class="section_offset">

		<h3>Danh mục</h3>

		<ul class="theme_menu cats">
				<?php 
			$cateTypeArr = $model->getListCateType();
			  $i = 0;

			  if(!empty($cateTypeArr)){       

			  foreach($cateTypeArr as $catetype){

			  $i++;
			  $cate_type_id = $catetype['id'];

			?>
			<li class="has_megamenu">

				<a href="<?php echo $catetype['cate_type_alias']; ?>.html" title="<?php echo $catetype['cate_type_name']; ?>"><?php echo $catetype['cate_type_name']; ?></a>

				<!-- - - - - - - - - - - - - - Mega menu - - - - - - - - - - - - - - - - -->

				<div class="mega_menu clearfix">											<!-- - - - - - - - - - - - - - Mega menu item - - - - - - - - - - - - - - - - -->

					<div class="mega_menu_item">
					
						<ul class="list_of_links">							
					    <?php 
					    $arrCateBlock = $model->getCateCap1ByCateType($cate_type_id);
					    if(!empty($arrCateBlock)){
					      foreach ($arrCateBlock as $cate) {
					    ?> 
							<li>
								<a href="<?php echo $cate['cate_alias']; ?>.html" title="<?php echo $cate['cate_name']; ?>">
									<?php echo $cate['cate_name']; ?>
								</a>
							</li>
							<?php }} ?>
						
						</ul>

					</div><!--/ .mega_menu_item-->										

				</div><!--/ .mega_menu-->
			</li>
			<?php }}  ?>
		</ul>

	</section><!--/ .animated.transparent-->

	<section class="section_offset">

		<h3>Tìm theo giá</h3>

		<form class="type_2">

			<div class="table_layout list_view">

				<div class="table_row">										

					<div class="table_cell">

						<fieldset>

							<legend></legend>

							<ul class="checkboxes_list">

								<li>
									
									<input type="checkbox" class="check_price" min="0" max="1000000" id="price_1" <?php if($giatu==0 && $giaden == 1000000) echo "checked"; ?>>
									<label for="price_1">Giá dưới 1.000.000</label>

								</li>

								<li>
									
									<input type="checkbox" class="check_price" min="1000000" max="3000000"  id="price_2" <?php if($giatu==1000000 && $giaden == 3000000) echo "checked"; ?>>
									<label for="price_2">1.000.000 - 3.000.000</label>

								</li>

								<li>
									
									<input type="checkbox" min="3000000" max="5000000" class="check_price" id="price_3" <?php if($giatu==3000000 && $giaden == 5000000) echo "checked"; ?>>
									<label for="price_3">3.000.000 - 5.000.000</label>

								</li>
								<li>									
									<input type="checkbox" min="5000000" max="10000000" class="check_price" id="price_4" <?php if($giatu==5000000 && $giaden == 10000000) echo "checked"; ?>>
									<label for="price_4">5.000.000 - 10.000.000</label>
								</li>
								<li>									
									<input type="checkbox" min="10000000" max="1000000000" class="check_price" id="price_5" <?php if($giatu==10000000 && $giaden == 1000000000) echo "checked"; ?>>
									<label for="price_5">Giá trên 10.000.000</label>
								</li>

							</ul>

						</fieldset>

					</div><!--/ .table_cell -->

				</div><!--/ .table_row -->

			</div><!--/ .table_layout -->									

		</form>

	</section>

	<?php $arr = $model->getListBannerByPosition(7,-1); ?>

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

		<a  title="<?php echo $img['name_event']; ?>" href="<?php echo $link_url; ?>"  <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?> <?php if($img['type_id']==1) echo 'onclick="return false;"'; ?>
							  class="banner">
			
			<img src="<?php echo $img['image_url']; ?>"  alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>">

		</a>

	</div>
	<?php } } ?>

</aside>