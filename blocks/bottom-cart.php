<div class="bottom_part">

	<div class="container">

		<div class="row">

			<div class="main_header_row">

				<div class="col-sm-3">

					<!-- - - - - - - - - - - - - - Logo - - - - - - - - - - - - - - - - -->

					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="logo" title="Logo vinawatch">

						<img src="images/logo.png" alt="logo vinawatch" title="Logo vinawatch">

					</a>

					<!-- - - - - - - - - - - - - - End of logo - - - - - - - - - - - - - - - - -->

				</div><!--/ [col]-->

				<div class="col-sm-7 col-md-7" id="fixboxsearch">
					<!-- - - - - - - - - - - - - - Search form - - - - - - - - - - - - - - - - -->
                    <ul id="catemenu" style="display: none; margin-right: 20px;">
                        <li>
                            <a id="dmsp1">Danh mục sản phẩm</a>
							<button class="open_menu1"></button>
							<ul id="hovermenu" class="drop">
								<?php 
								$cateTypeArr = $model->getListCateType();//var_dump($cateTypeArr);die;

								if(!empty($cateTypeArr)){                   

								foreach($cateTypeArr as $catetype){

								$cate_type_id = $catetype['id'];

								?>
								<li class="has_megamenu animated_item" style="transition-delay:0.1s;">

								<a href="<?php echo 'http://vinawatch.vn/'.$catetype['cate_type_alias'].'.html';?>" title="<?php echo $catetype['cate_type_name']; ?>"><?php echo $catetype['cate_type_name']; ?></a>

								<?php $cateArr = $model->getListCate($cate_type_id); //echo '<pre>'; var_dump($cateArr); die;
								if(!empty($cateArr)){
								?>
									<div class="mega_menu clearfix">

									<!-- - - - - - - - - - - - - - Mega menu item - - - - - - - - - - - - - - - - -->

										<div class="mega_menu_item">					

											<ul class="list_of_links">
												<?php foreach ($cateArr as $cate) { ?>
												<li>

												<a title="<?php echo $cate['cate_name']; ?>" href="<?php echo $cate['cate_alias']; ?>-<?php echo $catetype['cate_type_alias']; ?>-p<?php echo  $cate['id'];?>.html"> 
												<?php echo $cate['cate_name']; ?>
												</a> 

												</li>
												<?php } ?>
											</ul>

										</div><!--/ .mega_menu_item-->	

									</div><!--/ .mega_menu-->
								<?php } ?>
								</li>
								<?php } }  ?>

							</ul>
                        </li>
                    </ul>
					<form class="clearfix search"  action="tim-kiem.html" id="hoversearch">
						<input type="text" name="tu-khoa" list="datalist" tabindex="1" placeholder="Bạn muốn mua đồng hồ hiệu gì?" class="alignleft" id="keyword_search" value="" />										
						<button class="button_blue alignleft">Tìm kiếm</button> <img id="cart" src="images/cart.png" />
                        <div id="results"></div>
					
						<!--<button id="open_shopping_cart" onclick="location.href='gio-hang.html'" class="open_button" data-amount="<?php echo $tongsp; ?>" type="button" style="margin-left:10px;border:none;z-index:1">
							
						</button>-->
					</form><!--/ #search-->									

						
						
				
					<!-- - - - - - - - - - - - - - End search form - - - - - - - - - - - - - - - - -->

				</div><!--/ [col]-->

			</div><!--/ .main_header_row-->

		</div><!--/ .row-->

	</div><!--/ .container-->

</div><!--/ .bottom_part -->