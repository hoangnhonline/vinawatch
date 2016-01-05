<header id="header" class="type_6" style="padding-bottom: 0px;">
	<div class="top_part">

		<div class="container">

			<div class="row">							

				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="col-md-4 col-sm-2 hidden-xs">

					</div>								
					<div class="col-md-2 col-sm-3 hidden-xs">
						<img src="img/thanh-toan-khi-nhan-hang.png" align="left" alt="Thanh toán khi nhận hàng" title="Thanh toán khi nhận hàng">
						<p><strong>Thanh toán</strong><br>khi nhận hàng</p>
					</div>
					<div class="col-md-2 col-sm-3 hidden-xs">
						<img src="img/giao-hang-toan-quoc.png" align="left" height="25" alt="Giao hàng toàn quốc" title="Giao hàng toàn quốc">
						<p><strong>Giao hàng</strong><br>toàn quốc</p>
					</div>								
					<div class="col-md-3 col-sm-4">

						<div class="alignright site_settings">

							<span class="current open_">Hỗ trợ</span>

							<ul class="dropdown site_setting_list language">

								<li class="animated_item" style="transition-delay:0.1s"></li>

							</ul>

						</div>

						<div class="alignright site_settings currency">

							<span class="current open_">Thành viên</span>

							<ul class="dropdown site_setting_list">
								<?php if(!empty($_SESSION['user'])){ ?>
								<li class="animated_item">
									<a href='quan-ly-don-hang.html' style="color:#E6006C;" title="Xin chào <?php echo $_SESSION['user']['full_name']; ?>">
										Hi <?php echo $_SESSION['user']['full_name']; ?>!
									</a>
								</li>
								<li class="animated_item">
									<a href='quan-ly-don-hang.html' style="color:#0EB1EA" title="Quản lý đơn hàng">
										Quản lý đơn hàng
									</a>
								</li>
								<li class="animated_item">
									<a href="cap-nhat-thong-tin.html" style="color:#0EB1EA" title="Cập nhật thông tin">
										Cập nhật thông tin
									</a>
								</li>
								<li class="animated_item">
									<a href="doi-mat-khau.html" style="color:#0EB1EA" title="Đổi mật khẩu">
										Đổi mật khẩu
									</a>
								</li>
								<li class="animated_item">
									<a href="thoat.php" style="color:#0EB1EA" title="Thoát">
										Thoát
									</a>
								</li>
								<?php }else{ ?>
								<li class="animated_item">
									<a href="dang-ky.html" title="Đăng nhập">Đăng nhập</a>
								</li>
								<li class="animated_item">
									<a href="dang-ky.html" title="Đăng ký">Đăng ký</a>
								</li>	
								<?php } ?>
							</ul>

						</div>
					</div>

				</div>

			</div>

		</div>

	</div><!--/ .top_part -->				
	<div class="bottom_part">

		<div class="container">

			<div class="row">

				<div class="main_header_row">

					<div class="col-sm-3">

					<!-- - - - - - - - - - - - - - Logo - - - - - - - - - - - - - - - - -->

					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="logo" title="logo vinawatch">

					<img src="images/logo.png" alt="logo vinawatch" title="logo vinawatch">

					</a>

					<!-- - - - - - - - - - - - - - End of logo - - - - - - - - - - - - - - - - -->

					</div><!--/ [col]-->

					<div class="col-sm-5 col-md-5">
						<!-- - - - - - - - - - - - - - Search form - - - - - - - - - - - - - - - - -->
						<form action="tim-kiem.html" class="clearfix search">
							<input type="text" name="tu-khoa" tabindex="1" placeholder="Tìm kiếm sản phẩm..." class="alignleft" id="keyword_search" value="<?php if(isset($_GET['tu-khoa']) && $model->processData($_GET['tu-khoa']) != '') echo $_GET['tu-khoa'];else echo ""; ?>">										
							<button class="button_blue def_icon_btn alignleft" type="submit"></button>
							<button id="open_shopping_cart" onclick="location.href='gio-hang.html'" class="open_button" data-amount="0" type="button" 
							style="margin-left:10px;border-style:none !important;z-index:1;">

							</button>
						</form><!--/ #search-->

					</div><!--/ [col]-->
					<div class="col-sm-4 col-md-4">
						<p style="  color: #4AC4FA;font-weight: bold;font-size: 25px;" id="hotlines">
						<span style="font-size:18px">HOTLINE: </span><br />
						<span style="color:#FF4557" id="phone-hotline">09.38.38.00.56 - 0988.54.0988</span>
						</p>
					</div>

				</div><!--/ .main_header_row-->

			</div><!--/ .row-->

		</div><!--/ .container-->

	</div><!--/ .bottom_part -->				

	<div id="main_navigation_wrap">

		<div class="container">

			<div class="row">	

				<div class="col-xs-12">
					<div class="sticky_inner type_2">								
						<div class="nav_item size_4" style="width:190px;padding-right:5px">
							<a id="dmsp">Danh mục sản phẩm</a>
							<button class="open_menu"></button>

							<ul class="theme_menu cats dropdown">
								<?php 
								$cateTypeArr = $model->getListCateType();

								if(!empty($cateTypeArr)){                   

								foreach($cateTypeArr as $catetype){

								$cate_type_id = $catetype['id'];

								?>
								<li class="has_megamenu animated_item" style="transition-delay:0.1s">

								<a href="javascript:;" title="<?php echo $catetype['cate_type_name']; ?>"><?php echo $catetype['cate_type_name']; ?></a>

								<!-- - - - - - - - - - - - - - Mega menu - - - - - - - - - - - - - - - - -->
								<?php $cateArr = $model->getListCate($cate_type_id); 
								if(!empty($cateArr)){
								?>
									<div class="mega_menu type_2 clearfix">

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


						</div><!--/ .nav_item-->
													
						<div class="nav_item">
							<nav class="main_navigation">
								<ul>
									<li class="current">
										<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>" title="Trang chủ">Trang chủ</a>
									</li>
									<li><a href="bang-gia.html" title="Bảng giá">Bảng giá</a></li>			
									<li><a href="khuyen-mai.html" title="Khuyến mãi">Khuyến mãi</a></li>
									<li><a href="huong-dan-mua-hang.html" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>
									<li><a href="tin-tuc.html" title="Tin tức">Tin tức</a></li>
									<li><a href="lien-he.html" title="Liên hệ">Liên hệ</a></li>		
								</ul>
							</nav><!--/ .main_navigation-->									
						</div>
					</div><!--/ .sticky_inner -->

				</div><!--/ .col-xs-12-->
			</div><!--/ .row-->

		</div><!--/ .container-->

	</div><!--/ .main_navigation_wrap-->
</header>
<script type="text/javascript">
$(document).ready(function(){
	$('#dmsp').click(function(){
		$(this).next().click();
	});
	
});
</script>		