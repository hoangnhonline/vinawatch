<section class="section_offset">

		<h3 class="offset_title">1. Thành viên</h3>

		<div class="relative">

			<div class="table_layout">

				<div class="table_row">

					<div class="table_cell">

						<section>

							<h4>Thanh toán như khách vãng lai hoặc thành viên</h4>				

							

								<ul>
									
									<li>
										
										<input type="radio" checked name="radio_2" id="radio-guest"  <?php if(empty($_SESSION['user'])) { echo "checked";}else{ echo "disabled"; } ?>>
										
										<label for="radio-guest">Khách vãng lai</label>
										<br />

									</li>
									<li>&nbsp;</li>
									<li>

										<input type="radio" name="radio_2" id="radio-user" <?php if(!empty($_SESSION['user'])) echo "checked"; ?>>
										<label for="radio-user">Thành viên</label>

									</li>

								</ul>

							<div class="clearfix"></div>						
							<h5>&nbsp;</h5>
							<?php if(empty($_SESSION['user'])){ ?>
							<p class="subcaption">Đăng ký thành viên rất hữu ích:</p>

							<ul class="list_type_7">

								<li>Thanh toán nhanh chóng và dễ dàng</li>
								<li>Dễ dàng tra cứu thông tin lịch sử đơn hàng và trạng thái</li>

							</ul>
							<?php } ?>

						</section>

					</div><!--/ .table_cell -->
					<!--
					<div class="table_cell">

						<section>
							<form id="loginForm" method="post"  name="loginForm" action="ajax/user.php">
							<h4>Đăng nhập</h4>

							<p class="subcaption">Bạn đã là thành viên? Vui lòng đăng nhập:</p>

							

								<ul>

									<li class="row">

										<div class="col-xs-12">

											<label for="username_login" class="required">Tên đăng nhập</label>
											<input type="text" id="username_login" name="username_login"  aria-required="true" required="required">

										</div>

									</li>

									<li class="row">

										<div class="col-xs-12">

											<label for="password_login" class="required">Mật khẩu</label>
											<input type="password" class="form-control" id="password_login" name="password_login"  aria-required="true" required="required">

										</div>

									</li>

									<li class="row">

										<div class="col-xs-12">

											<div class="on_the_sides">

												<div class="left_side">													

												</div>

												<div class="right_side">

													<span class="prompt">Bắt buộc</span>

												</div>

											</div>

										</div>

									</li>
									<li class="row">
										<div class="col-xs-12">
											<button type="submit" form="login_form" class="button_blue middle_btn">Login</button>
										</div>
									</li>

								</ul>

							<input name="action" value="login" type="hidden" />
							</form>
						</section>


					</div><!--/ .table_cell -->

				</div><!--/ .table_row -->				

			</div><!--/ .table_layout -->

		</div><!--/ .relative -->

	</section><!--/ .section_offset -->
	<script type="text/javascript">
		$(function(){
			<?php if(empty($_SESSION['user'])){ ?>
			$('#radio-user').click(function(){
				swal({   title: "Bạn đã có tài khoản?",   
					text: "Hệ thống sẽ tự động chuyển đến trang đăng nhập.",   
					type: "warning",   showCancelButton: true,   
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "OK",   
					closeOnConfirm: false }, function(){   
						location.href='dang-ky.html?rel=thanh-toan';
					});
			});
			<?php } ?>
		});
	</script>