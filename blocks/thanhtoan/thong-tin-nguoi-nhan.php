<div class="col-md-7">	
<div class="col-md-10">		
<p style="color:#10B1E8;font-weight:bold">
  <input type="checkbox" id="check_same" style="display:none;"> <label for="check_same">Như thông tin người mua</span>
</p>		
<div class="clearfix"></div>		
<div class="form-group">
    <label for="fullname">Họ Tên <span style="color:red">( * )</span></label>
    <input type="text" class="form-control" id="recipients_name" name="recipients_name"  
    aria-required="true" required="required">
</div>								
<div class="form-group">
    <label for="email">Email <span style="color:red">( * )</span></label>
    <input type="email"  class="form-control" id="recipients_email" name="recipients_email"  aria-required="true" required="required">
</div>
<div class="form-group">
    <label for="phone">Điện thoại</label>
    <input type="text"  class="form-control" id="recipients_phone" name="recipients_phone"  >
  </div>
<div class="form-group">
   <label for="company">Di động <span style="color:red">( * )</span></label>
   <input type="text" class="form-control" id="recipients_handphone" name="recipients_handphone" aria-required="true" required="required">
</div>
 <div class="form-group">
    <label for="address">Địa chỉ <span style="color:red">( * )</span></label>
    <input type="text" class="form-control" id="recipients_address" name="recipients_address"  aria-required="true" required="required">
  </div>		
<div class="form-group">
    <label for="city_id">Tỉnh/TP <span style="color:red">( * )</span></label>								  
    <select class="form-control" id="recipients_city_id" name="recipients_city_id"  aria-required="true" required="required">
    	<option value="0">--Chọn--</option>
		<?php 
		$arrCity = $model->getListCity();
		if(!empty($arrCity)){
			foreach ($arrCity as $city) {
				?>
				<option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>	
				<?php
			}
		}
		?>
    </select>
    <label  id="error_recipients_city_id" style="display:none;color:red">Vui lòng chọn 1 Tỉnh/TP.</label>
  </div>								  				     
  <div class="form-group">
    <label for="address">Ngày giao<span style="color:red">( * )</span></label>
    <input type="text"  class="form-control datetime" id="delivery_date" name="delivery_date"  aria-required="true" required="required">
  </div>
  <div class="form-group">
    <label for="address">Ghi chú đơn hàng</label>
    <textarea type="text" class="form-control" id="order_note" name="order_note" rows="5"></textarea>
  </div>
  <div class="row" style="margin-bottom:20px"></div>	
</div>

</div>

<style type="text/css">
span.error{
  color: red !important;
}
</style>
<script type="text/javascript">
$(function(){
  $('.datetime').datetimepicker({
        format:'d-m-Y H:i'
    });
    $('#check_same').click(function(){        
        $('#recipients_name').val($('#buyer_name').val());
        $('#recipients_email').val($('#buyer_email').val());
        $('#recipients_phone').val($('#buyer_phone').val());
        $('#recipients_handphone').val($('#buyer_handphone').val());
        $('#recipients_address').val($('#buyer_address').val());
        $('#recipients_city_id').val($('#buyer_city_id').val());
    }); 
});
</script>