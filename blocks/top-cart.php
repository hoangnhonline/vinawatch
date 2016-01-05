<div class="top_part">

					<div class="container">

						<div class="row">							

							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-md-3 hidden-sm hidden-xs">

								</div>								
								<div class="col-md-2 hidden-sm hidden-xs">
									<img src="images/thanh-toan-khi-nhan-hang.png" align="left" style="float: left;" />
									<p style="margin: 0 0 0 3px !important; float: left; width: 120px;"><strong>Thanh toán</strong><br />khi nhận hàng</p>
								</div>
								<div class="col-md-2 hidden-sm hidden-xs">
									<img src="images/giao-hang-toan-quoc.png" align="left" height="25"  style="float: left;"/>
									<p style="margin: 0 0 0 3px !important; float: left; width: 120px;"><strong>Giao hàng</strong><br />toàn quốc</p>
								</div>
								<div class="col-md-2 hidden-sm hidden-xs">
									<img src="images/chat-luong.png" align="left" height="25"  style="float: left;"/>
									<p style="margin: 0 0 0 3px !important; float: left; width: 120px;"><strong>Chính hãng</strong><br />An toàn-chất lượng</p>
								</div>
								
								<div class="col-md-3">

									<!-- - - - - - - - - - - - - - Language change - - - - - - - - - - - - - - - - -->

									<div class="alignright site_settings">

										<span class="current open_">Hỗ trợ</span>

										<ul class="dropdown site_setting_list language">

											<li class="animated_item">

											</li>

										</ul>

									</div><!--/ .alignright.site_settings-->

									<!-- - - - - - - - - - - - - - End of language change - - - - - - - - - - - - - - - - -->
									
									<!-- - - - - - - - - - - - - - Currency change - - - - - - - - - - - - - - - - -->

									<div class="alignright site_settings currency">

										<span class="current open_">Thành viên</span>

										<ul class="dropdown site_setting_list">
											<?php if(!empty($_SESSION['user'])){ ?>
								              <li class="animated_item"><a href='quan-ly-don-hang.html' style="color:#E6006C;">Hi <?php echo $_SESSION['user']['full_name']; ?>!</a></li>
								              <li class="animated_item"><a href='quan-ly-don-hang.html' style="color:#0EB1EA">Quản lý đơn hàng</a></li>
								              <li class="animated_item"><a href="cap-nhat-thong-tin.html" style="color:#0EB1EA">Cập nhật thông tin</a></li>
								              <li class="animated_item"><a href="doi-mat-khau.html" style="color:#0EB1EA">Đổi mật khẩu</a></li>
								              <li class="animated_item"><a href="thoat.php" style="color:#0EB1EA">Thoát</a></li>
							              <?php }else{ ?>
											<li class="animated_item"><a href="dang-ky.html">Đăng nhập</a></li>
											<li class="animated_item"><a href="dang-ky.html">Đăng ký</a></li>	
										  <?php } ?>

										</ul>

									</div><!--/ .alignright.site_settings.currency-->

									<!-- - - - - - - - - - - - - - End of currency change - - - - - - - - - - - - - - - - -->
									<div class="clearfix"></div>
									<div class="call_us" style='text-align:right'>

										<span id="hitline"><?php echo $arrText[1];?>:</span> <b><?php echo $arrText[2];?></b>

									</div><!--/ .call_us-->
								</div><!--/ .clearfix-->

							</div><!--/ [col]-->

						</div><!--/ .row-->

					</div><!--/ .container -->

				</div><!--/ .top_part -->