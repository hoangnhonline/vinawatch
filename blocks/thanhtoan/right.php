<div class="col-md-12" style="padding-left:0px;padding-right:0px">
 	   
   <!-- show title -->
	<div class="page_title"><h2><span class="title_r">Thanh toán</span></h2></div>					   
								
				<form id="example-advanced-form" action="ajax/order.php" method="post">
				    <h3>Thông tin người mua </h3>
				    <fieldset>
				        <legend><h3>Thông tin người mua </h3></legend>
				 		 <?php include "blocks/thanhtoan/thong-tin-nguoi-mua.php"; ?>				 		
				    </fieldset>
				 	<h3>Thông tin người nhận</h3>
				    <fieldset>
				        <legend><h3>Thông tin người nhận</h3></legend>
				 
				        <?php include "blocks/thanhtoan/thong-tin-nguoi-nhan.php"; ?>
				    </fieldset>
				    <h3>Phương thức thanh toán</h3>
				    <fieldset>
				        <legend><h3>Phương thức thanh toán</h3></legend>
				 
				      	<?php include "blocks/thanhtoan/pttt.php"; ?>
				    </fieldset>
				 
				    <h3>Xác nhận đơn hàng</h3>
				    <fieldset>
				        <legend><h3>Xác nhận đơn hàng</h3></legend>				 		
				        <?php include "blocks/thanhtoan/xac-nhan.php"; ?>
				    </fieldset>
				    <h3>Hoàn tất</h3>
				    <fieldset>
				        <legend><h3>Hoàn tất</h3></legend>
				 		<div id="ctl00_ctl00_MainContent_cplShopCartContent_div_info" class="" 
				 		style="margin-top: 30px">
			                    
			<style type="text/css">
			    .tb-no-border {
			        color: #363636;
			        font-family: opensans-regular, tahoma;
			        font-size: 14px;
			    }

			        .tb-no-border tr td:first-child {
			            color: #8f8f8f;
			            font-family: opensans-regular, tahoma;
			            font-size: 14px;
			            padding-top: 5px;
			        }

			        .tb-no-border tr td {
			            color: #363636;
			            font-family: opensans-regular, tahoma;
			            font-size: 14px;
			            padding-top: 5px;
			        }
			        #example-advanced-form-p-0 legend{
			        	margin-bottom: 0px !important;
			        	margin-top: 10px;
			        }
			   
			</style>

			<div style="color: #ffffff; width: 100%; background-color: #77c764; padding-left: 20px;min-height:230px">
			    <span style="font-size: 36px; font-family: opensans-regular, tahoma;">Cảm ơn quý khách !</span>
			    <p style="font-size: 16px; margin-top: 3px">
			        Đơn hàng của Quý khách đã được đặt thành công.
			    </p>
			    <ul class="ulCartComplete">
			        <li>Sẽ có nhân viên của conyeuoi.com liên hệ với Quý khách để xác nhận đơn hàng trong thời gian sớm nhất.</li>
			       
			    </ul>

			</div>			
			<div class="clear-all">
			</div>
		
			

			                    
			                </div>
				        
				    </fieldset>
				</form>
			
	
</div>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.steps.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<link rel="stylesheet" href="css/jquery.steps.css">
<style type="text/css">
.wizard > .content > .body input{
	color: #999;
}
.error {
	color:red;
}
legend{
	padding: 10px !important;
}
.bttOpenAccount {
  width: 330px;
  height: 50px;
  background-color: #ffb400 !important;
  border: none;
  border-bottom: 2px solid #fe8900;
  font-family: opensans-regular, tahoma;
  font-size: 18px;
  color: #ffffff;
  margin-top: 22px;
  cursor: pointer;
}
.btnLogin{
	  background: #E4016C;
  color: #fff;
  border-color: #e40d08;
  border-style: solid;
  border-width: 1px;
  padding-left: 10px;
  padding-right: 10px;
  height: 34px;
}
.btnBack{
	  background: #000;
  color: #fff; 
  padding-left: 10px;
  padding-right: 10px;
  height: 34px;
}
.btnBack:hover{
	  background: #000; 
}
.btnLogin:hover{
	  background: #E4016C !important;
  color: #fff;
}
span.pttt {
  color: #26a0eb;
  display: block;
  font-size: 14px;
  font-weight: bold;
  line-height: 20px;
  padding: 0 2px;
  text-transform: uppercase;
}
#method_id-error{
	margin-top: -40px;
  	font-size: 18px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
$(function(){
  
	$("#example-advanced-form").validate({
		messages: {			
			method_id: "Vui lòng chọn phương thức thanh toán"
		}				
	}					
	);
	$('#example-advanced-form').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
                    
        },
        complete: function(data) {         
        		
        			
        }
    }); 
	var form = $("#example-advanced-form").show();
 	
	form.steps({
	    headerTag: "h3",
	    bodyTag: "fieldset",
	    transitionEffect: "slideLeft",
	    onStepChanging: function (event, currentIndex, newIndex)
	    {	    
	        // Allways allow previous action even if the current form is not valid!
	        if (currentIndex > newIndex)
	        {
	            return true;
	        }
	        // Forbid next action on "Warning" step if the user is to young
	        if (newIndex === 3 && Number($("#age-2").val()) < 18)
	        {
	            return false;
	        }
	        // Needed in some cases if the user went back (clean up)
	        if (currentIndex < newIndex)
	        {
	            // To remove error styles
	            form.find(".body:eq(" + newIndex + ") label.error").remove();
	            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
	        }
	        form.validate().settings.ignore = ":disabled,:hidden";
	        return form.valid();
	    },
	    onStepChanged: function (event, currentIndex, priorIndex)
	    {
	    	
	    	if(currentIndex==3){
	    		$('table.thong-tin span').each(function(){
	    			var id = $(this).attr('id');
	    			var obj = $(this);
	    			var id = id.replace("span_", "");
	    			obj.html($('#' +id).val());
	    		});
	    		$('#p_ghichu').html($('#order_note').val());
	    		$('#choose_pttt').html($('input[name=method_id]:checked').next().html());
	    	}
	        // Used to skip the "Warning" step if the user is old enough.
	        if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
	        {
	            form.steps("next");
	        }
	        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
	        if (currentIndex === 2 && priorIndex === 3)
	        {
	            form.steps("previous");
	        }
	    },
	    onFinishing: function (event, currentIndex)
	    {
	        form.validate().settings.ignore = ":disabled";
	        $('#example-advanced-form').submit();
	        return form.valid();
	    },
	    onFinished: function (event, currentIndex)
	    {
	    	setTimeout(function(){ 
	    		location.href='http://<?php echo $_SERVER["SERVER_NAME"]; ?>?payment=success';		
	    	}, 1000);	        
	    }
	}).validate({
	    errorPlacement: function errorPlacement(error, element) { element.before(error); },
	    rules: {
	        confirm: {
	            equalTo: "#password-2"
	        }
	    }
	});

});
</script>
