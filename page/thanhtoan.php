<div class="secondary_page_wrapper">

<div class="container">
	<ul class="breadcrumbs">

		<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
		<li>Thanh toán</li>

	</ul>

	<h2 class="page_title">Thanh toán</h2>

	<?php include "blocks/payment/thanh-vien.php"; ?>	

	<form action="ajax/order.php" method="post" id="payment-form">
		
		<?php include "blocks/payment/thong-tin-nguoi-mua.php"; ?>
		
		<?php include "blocks/payment/thong-tin-nguoi-nhan.php"; ?>
		
		<?php include "blocks/payment/phuong-thuc.php"; ?>

		<?php include "blocks/payment/don-hang.php"; ?>
		
	</form>
</div><!--/ .container-->

</div><!--/ .page_wrapper-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript">
$(function(){
  
	$("#payment-form").validate({
		messages: {			
			method_id: "Vui lòng chọn phương thức thanh toán"
		}				
		}					
	);
	$('#payment-form').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
                    
        },
        complete: function(data) {         
        	swal({   title: "Đặt hàng thành công",   
			text: "Cảm ơn quý khách, đơn hàng của quý khách đã được ghi nhận.",   
			type: "success",        			  
			confirmButtonText: "OK",  
			 closeOnConfirm: false }, 
			 function(){   
				location.href='http://<?php echo $_SERVER["SERVER_NAME"]?>';		
			});	
        			
        }
    }); 
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