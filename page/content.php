<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

<div class="secondary_page_wrapper">

	<div class="container">

		<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

		<ul class="breadcrumbs">

			<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
			<li><?php echo $data['page_name']; ?></li>

		</ul>

		<div class="row">

			<aside class="col-md-3 col-sm-4">
				<section class="section_offset">

					<h3>Thông tin</h3>
					 <?php
                      $arrInfo = $model->getDetailBlockFooter(10);  
                      $url_current = str_replace("/", "", $_SERVER['REQUEST_URI']);         
                      ?>                      
					<ul class="theme_menu">
						<?php foreach($arrInfo['link'] as $link ){ ?>
						<li>
							<a <?php if($url_current == $link['link_url']) echo "class='hover'"; ?> href="<?php echo $link['link_url']; ?>" title="<?php echo $link['text_link']; ?>">
								<?php echo $link['text_link']; ?>
							</a>
						</li>	
						<?php } ?>
					</ul>

				</section><!--/ .section_offset -->		
				<!-- - - - - - - - - - - - - - Information - - - - - - - - - - - - - - - - -->
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

							<a href="#" title="<?php echo $catetype['cate_type_name']; ?>"><?php echo $catetype['cate_type_name']; ?></a>

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

					<h3>Newsletter</h3>

					<div class="theme_box">

						<p class="form_caption">Nhập email của bạn để nhận thông tin khuyến mãi từ Vinawatch</p>

						<form class="newsletter subscribe clearfix" novalidate>

							<input type="email" name="sc_email" placeholder="Email...">

							<button class="button_blue def_icon_btn"></button>

						</form>

					</div><!--/ .theme_box-->

				</section>
					

				

			</aside><!--/ [col]-->

			<main class="col-md-9 col-sm-8">

				<h2 class="page_title"><?php echo $data['page_name']; ?></h2>

				<div class="col-md-12" style="padding:20px;background-color:#FFF;margin-top:-12px;">   
   	
			   		<?php echo $data['content']; ?>
			   	
			   </div>	

			</main><!--/ [col]-->

		</div><!--/ .row-->

	</div><!--/ .container-->

</div><!--/ .page_wrapper-->

<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->