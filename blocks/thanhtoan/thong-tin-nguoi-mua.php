<div class="col-md-12">
<?php if(empty($_SESSION['user'])){ ?>
<div class="col-md-6">
	<div class="cold-md-10" style="text-align:center;background-color:#FFF;height:350px;margin-top:20px;padding:10px">
	<h3>Bạn là khách hàng mới của conyeuoi.com</h3>
	<p>
		Với một tài khoản duy nhất bạn có thể dễ dàng đăng ký & quản lý các dịch vụ của bạn
	</p>
	<p>
	<button class="btn bttOpenAccount" type="button" onclick="location.href='dang-ky.html?ref=thanh-toan'">Đăng ký tài khoản</button>									
	</p>
	</div>
</div>
<div class="col-md-6">
	<div class="cold-md-10" style="background-color:#FFF;height:350px;margin-top:20px;padding:10px">
		<h3>Bạn đã là khách hàng tại conyeuoi.com</h3>
		<div class="form-group">
    <label for="fullname">Tên đăng nhập</label>
    <input type="text" class="form-control" id="fullname" name="fullname"  aria-required="true" required="required">
  </div>
   <div class="form-group">
    <label for="address">Mật khẩu</label>
    <input type="text" class="form-control" id="address" name="address"  aria-required="true" required="required">
  </div>
  <div style="text-align:right">
  	<button class="btn btnBack">Quay lại</button>
  	<button class="btn btnLogin">Đăng nhập</button>
  </div>
  
	</div>
</div>
<?php }else{ ?>
<div class="col-md-7">	
<div class="col-md-10">							
<div class="form-group">
    <label for="fullname">Họ Tên <span class="error">( * )</span></label>
    <input type="text" class="form-control" id="buyer_name" name="buyer_name"  
    aria-required="true" required="required" value="<?php echo $_SESSION['user']['full_name']; ?>">
</div>
<!--			
<div class="form-group">
    <label for="city_id">Giới tính <span class="error">( * )</span></label>								  
    <select class="form-control" id="buyer_gender" name="buyer_gender"  aria-required="true" class="required" required="required">
    	<option value="0">--Chọn--</option>
    	<option value="1">Nam</option>
    	<option value="2">Nữ</option>		
    </select>    
  </div>								  				     
-->
<input type="hidden" name="customer_id" value="<?php echo $_SESSION['user']['id']; ?>" />
<div class="form-group">
    <label for="email">Email <span class="error">( * )</span></label>
    <input type="email" value="<?php echo $_SESSION['user']['email']; ?>" class="form-control" id="buyer_email" name="buyer_email"  aria-required="true" required="required">
</div>
<div class="form-group">
    <label for="phone">Điện thoại</label>
    <input type="text" value="<?php echo $_SESSION['user']['phone']; ?>" class="form-control" id="buyer_phone" name="buyer_phone"  >
  </div>
<div class="form-group">
   <label for="company">Di động <span class="error">( * )</span></label>
   <input type="text" value="<?php echo $_SESSION['user']['handphone']; ?>" class="form-control" id="buyer_handphone" name="buyer_handphone" aria-required="true" required="required">
</div>
 <div class="form-group">
    <label for="address">Địa chỉ <span class="error">( * )</span></label>
    <input type="text" value="<?php echo $_SESSION['user']['address']; ?>" class="form-control" id="buyer_address" name="buyer_address"  aria-required="true" required="required">
  </div>		
<div class="form-group">
    <label for="city_id">Tỉnh/TP <span class="error">( * )</span></label>								  
    <select class="form-control" id="buyer_city_id" name="buyer_city_id"  aria-required="true" required="required">
    	<option value="0">--Chọn--</option>
		<?php 
		$arrCity = $model->getListCity();
		if(!empty($arrCity)){
			foreach ($arrCity as $city) {
				?>
				<option <?php if($_SESSION['user']['city_id']== $city['city_id']) echo "selected"; ?> value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>	
				<?php
			}
		}
		?>
    </select>
    <label class="error" id="error_buyer_city_id" style="display:none;">Vui lòng chọn 1 Tỉnh/TP.</label>
  </div>								  				     

  <div class="row" style="margin-bottom:20px"></div>	
</div>

</div>
<?php } ?>
</div>