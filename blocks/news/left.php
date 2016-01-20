<aside class="col-md-3 col-sm-4">

	<section class="section_offset">

		<h3>Danh mục</h3>

		<ul class="theme_menu">
			<?php $arrCate = $model->getListArticlesCate(); 
            foreach ($arrCate as $value) {
                
            ?>
			<li <?php if($cate_id==$value['id']) echo 'class="current"'; ?>>
				<a href="danh-muc/<?php echo $value['cate_alias'];?>.html" title="<?php echo $value['cate_name']; ?>">
					<?php echo $value['cate_name']; ?>
				</a>
			</li>
			<?php } ?>
		</ul>

	</section>

	<section class="section_offset">

		<h3>Tin mới nhất</h3>

		<ul class="list_of_entries">
			<?php         
	        $arrNews = $model->getArticlesNews(4);
	        if(!empty($arrNews)){ 
	            foreach ($arrNews as $value) {                
	        ?>
			<li>
					
				<article class="entry">

					<a href="tin-tuc/<?php echo $value['article_alias']; ?>.html" class="entry_thumb" title="<?php echo $value['article_title']; ?>">

						<img title="<?php echo $value['article_title']; ?>" width="100" src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['article_title']; ?>">

					</a>

					<div class="wrapper">

						<h6 class="entry_title">
							<a href="tin-tuc/<?php echo $value['article_alias']; ?>.html" title="<?php echo $value['article_title']; ?>">
								<?php echo $value['article_title']; ?>
							</a>
						</h6>

						<!-- - - - - - - - - - - - - - Byline - - - - - - - - - - - - - - - - -->

						<div class="entry_meta">

							<span><i class="icon-calendar"></i> <?php echo date('d-m-Y',$value['created_at']); ?></span>					

						</div>

					</div><!--/ .wrapper-->

				</article><!--/ .clearfix-->

			</li>
			<?php }} ?>	

		</ul>

	</section><!--/ .section_offset -->

	<?php $arr = $model->getListBannerByPosition(6,-1); ?>

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

		<a href="<?php echo $link_url; ?>"  <?php if($link_url!='' && $img['type_id']==3) echo 'target="_blank"'; ?> <?php if($img['type_id']==1) echo 'onclick="return false;"'; ?>
							  class="banner" title="<?php echo $img['name_event']; ?>">
			
			<img src="<?php echo $img['image_url']; ?>"  alt="<?php echo $img['name_event']; ?>" title="<?php echo $img['name_event']; ?>">

		</a>

	</div>
	<?php } } ?>	
</aside><!--/ [col]-->