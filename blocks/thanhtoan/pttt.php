  <div class="col-md-8" style="padding-top:20px;">												
	<div class="radio">
	  <label>
	    <input type="radio" name="method_id" id="method_id1" value="1" class="required">
	    <span class="pttt">Chuyển khoản qua ngân hàng</span>
	  </label>
		  <div class="row" style="padding-left:20px">
			<div class="col-md-12 content_pttt">
				<?php echo $arrText[3];?>
			</div><!--col md 12-->
		</div>
	</div>							
	<div class="radio" style="margin-top:20px">
	  <label>
	    <input type="radio" name="method_id" id="method_id2" value="2" class="required">
	    <span class="pttt">Thanh toán tại cửa hàng</span>
	  </label>
	  <div class="row" style="padding-left:20px">
	  	<div class="col-md-12 content_pttt">
	  		<?php echo $arrText[4];?>
	  	</div>
	  </div>
	</div>

	<div class="radio" style="margin-top:20px">
	  <label>
	    <input type="radio" name="method_id" id="method_id3" value="3" class="required">
	    <span class="pttt">Giao hàng thu tiền tận nơi (COD)</span>
	  </label>
	  <div class="row" style="padding-left:20px">
	  	<div class="col-md-12 content_pttt">
	  		<?php echo $arrText[5];?>
	  	</div>
	  </div>
	</div>
</div>