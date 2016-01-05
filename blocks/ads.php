<div class="row">
    <div class="col-sm-3">
        <section class="section_offset">
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

				<a href="<?php echo $catetype['cate_type_alias'].'.html';?>" title="<?php echo $catetype['cate_type_name']; ?>"><?php echo $catetype['cate_type_name']; ?></a>

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
    </div>
	<div class="col-sm-6">
		<div class="revolution_slider">

			<div class="rev_slider">
				<?php $arr = $model->getListBannerByPosition(1,-1); ?>
				<ul>
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
					<li data-transition="papercut">						
						<img src="<?php echo $img['image_url']; ?>"  alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>">												
					</li>
					<?php } } ?>				

				</ul>

			</div><!--/ .rev_slider-->

		</div><!--/ .revolution_slider-->	
	</div>
	<div class="col-sm-3 hidden-xs" id="ads-1">
		<?php $arr2 = $model->getListBannerByPosition(2,1);
		  if(!empty($arr2)){			  
			  foreach($arr2 as $img){
		  //var_dump($img);die;				  	
			  if($img['status']==1){
			  	$link_url = "";
			  	if($img['type_id'] == 2){
			  		$link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
			  	}
			  	if($img['type_id'] == 3){
			  		$link_url = $img['link_url'];
			  	}				  	
	  ?>
		<a href="<?php echo $link_url; ?>" <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?>
<?php if($img['type_id']==1) echo 'onclick="return false;"'; ?> title="<?php echo $img['name_event']; ?>">
			<img alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>" src="<?php echo $img['image_url']; ?>"  height="278px" />
		</a>
		<?php } }} ?>
	</div>
</div><!--/ .row-->
<div class="row hidden-xs" style="margin-top:5px">
	<div class="col-sm-4" style="padding:0px;padding-left:15px">
		<?php $arr2 = $model->getListBannerByPosition(3,1);
	  if(!empty($arr2)){			  
		  foreach($arr2 as $img){			
			  if($img['status']==1){
					$link_url = "";
				  	if($img['type_id'] == 2){
				  		$link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
				  	}
				  	if($img['type_id'] == 3){
				  		$link_url = $img['link_url'];
				  	}

	  ?>
		<a href="<?php echo $link_url; ?>" title="<?php echo $img['name_event']; ?>"
<?php if($img['type_id']==1) echo 'onclick="return false;"'; ?>  <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?> >
			<img alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>" src="<?php echo $img['image_url']; ?>" width="100%"  />
		</a>
		<?php }}} ?>
	</div>
	<div class="col-sm-4" style="padding-left:7px;padding-right:7px">
		<?php $arr2 = $model->getListBannerByPosition(4,1);
	  if(!empty($arr2)){			  
		  foreach($arr2 as $img){			
			  if($img['status']==1){
$link_url = "";
				  	if($img['type_id'] == 2){
				  		$link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
				  	}
				  	if($img['type_id'] == 3){
				  		$link_url = $img['link_url'];
				  	}

	  ?>
		<a  href="<?php echo $link_url; ?>" title="<?php echo $img['name_event']; ?>"
<?php if($img['type_id']==1) echo 'onclick="return false;"'; ?>  <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?> >
			<img alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>" src="<?php echo $img['image_url']; ?>" width="100%"/>
		</a>
		<?php }}} ?>
	</div>
	<div class="col-sm-4" style="padding:0px;padding-right:15px">
		<?php $arr3 = $model->getListBannerByPosition(5,1);
	  if(!empty($arr3)){			  
		  foreach($arr3 as $img){			
			  if($img['status']==1){
$link_url = "";
				  	if($img['type_id'] == 2){
				  		$link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
				  	}
				  	if($img['type_id'] == 3){
				  		$link_url = $img['link_url'];
				  	}

	  ?>
		<a  href="<?php echo $link_url; ?>" title="<?php echo $img['name_event']; ?>"
<?php if($img['type_id']==1) echo 'onclick="return false;"'; ?>  <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?> >
			<img alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>" src="<?php echo $img['image_url']; ?>" width="100%"/>
		</a>
		<?php }}} ?>
	</div>
</div><!--/ .row-->