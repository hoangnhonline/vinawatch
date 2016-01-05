<section class="section_offset">

	<h3>2. Thông tin người mua</h3>

	<div class="theme_box">
		
			<div class="col-md-7">
			<ul>
				
				<li class="row">
					
					<div class="col-sm-12">
						<?php if(!empty($_SESSION['user'])){ ?>
						<input type="hidden" name="customer_id" value="<?php echo $_SESSION['user']['id'];?>"/>
						<?php } ?>
						<label for="buyer_name" class="required">Họ Tên</label>
						<input type="text" name="buyer_name" id="buyer_name" value="<?php echo $_SESSION['user']['full_name']; ?>" aria-required="true" required="required">

					</div><!--/ [col] -->

				</li><!--/ .row -->					
				<li class="row">
					
					<div class="col-sm-12">
						
						<label for="buyer_email" class="required">Email</label>
						<input type="email" aria-required="true" required="required" value="<?php echo $_SESSION['user']['email']; ?>" class="form-control" id="buyer_email" name="buyer_email" >

					</div><!--/ [col] -->

				</li><!--/ .row -->		
				<li class="row">
					
					<div class="col-sm-12">
						
						<label for="buyer_phone">Điện thoại</label>
						<input type="text" value="<?php echo $_SESSION['user']['phone']; ?>" class="form-control" id="buyer_phone" name="buyer_phone" >

					</div><!--/ [col] -->

				</li><!--/ .row -->		
				<li class="row">
					
					<div class="col-sm-12">
						
						<label for="buyer_handphone" class="required">Di động</label>
						<input type="text" value="<?php echo $_SESSION['user']['handphone']; ?>" class="form-control" id="buyer_handphone" name="buyer_handphone" aria-required="true" required="required">

					</div><!--/ [col] -->

				</li><!--/ .row -->		
				<li class="row">
					
					<div class="col-sm-12">
						
						<label for="buyer_address" class="required">Địa chỉ</label>
						<textarea type="text" class="form-control" id="buyer_address" name="buyer_address"  aria-required="true" required="required"><?php echo $_SESSION['user']['address']; ?></textarea>

					</div><!--/ [col] -->

				</li><!--/ .row -->						

			</ul>
			</div>

		

	</div>

	<footer class="bottom_box on_the_sides">

		<div class="left_side">				

		</div>

		<div class="right_side">

			<span class="prompt">Bắt buộc</span>

		</div>

	</footer>

</section><!--/ .section_offset -->