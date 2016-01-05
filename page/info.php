<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

<div class="secondary_page_wrapper">

	<div class="container">

		<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

		<ul class="breadcrumbs">

			<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
			<li>Cập nhật thông tin</li>

		</ul>

		<!-- - - - - - - - - - - - - - End of breadcrumbs - - - - - - - - - - - - - - - - -->

		<div class="row">

			<?php include "blocks/user/left.php"; ?>

			<main class="col-md-9 col-sm-8">
				<h1>Cập nhật thông tin</h1>
				<div class="col-md-12">
					<form id="regisForm" name="regisForm" action="ajax/user.php" method="post">
						<input name="action" value="info" type="hidden" />		
					<div class="col-md-10">			   
					<?php $user = $_SESSION['user']; ?>					
					<div class="form-group">
					    <label for="city_id">Tỉnh/TP <span class="error">( * )</span></label>								  
					    <select class="form-control" id="city" name="city"  aria-required="true" class="required" required="required">
					    	<option value="0">--Chọn--</option>
							<?php 
							$arrCity = $model->getListCity();
							if(!empty($arrCity)){
								foreach ($arrCity as $city) {
									?>
									<option <?php if($user['city_id']==$city['city_id']) echo "selected"; ?> value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>	
									<?php
								}
							}
							?>
					    </select>
					    <label class="error" id="error_city_id" style="display:none;">Vui lòng chọn 1 Tỉnh/TP.</label>
					  </div>
					  <div class="form-group">
					    <label for="email">Email <span class="error">( * )</span></label>
					    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" aria-required="true" required="required">
					  </div>
					  <div class="form-group">
					    <label for="fullname">Họ Tên <span class="error">( * )</span></label>
					    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $user['full_name']; ?>"  aria-required="true" required="required">
					  </div>
					   <div class="form-group">
					    <label for="address">Địa chỉ <span class="error">( * )</span></label>
					    <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>"  aria-required="true" required="required">
					  </div>
					  
					   <div class="form-group">
					    <label for="phone">Điện thoại</label>
					    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" >
					  </div>
					   <div class="form-group">
					    <label for="company">Di động <span class="error">( * )</span></label>
					    <input type="text" class="form-control" id="handphone" name="handphone" value="<?php echo $user['handphone']; ?>" aria-required="true" required="required">
					  </div>			 		  
				      <button style="margin-top:10px" type="submit" class="button_blue middle_btn"  id="btnRegister" >Cập nhật</button>
				      		  
					</form>
					  <div class="row" style="margin-bottom:20px"></div>	
					  </div>

			</main><!--/ [col]-->

		</div><!--/ .row-->

	</div><!--/ .container-->

</div><!--/ .page_wrapper-->

<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<script type="text/javascript">
$(function(){	
	$("#regisForm").validate({
		rules: {								
			email: {
				required: true,
				email: true
			}		
		}
	});	

	$('#regisForm').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $("#dialog" ).dialog();         
        },
        complete: function(data) {  
        	console.log(data);
        	if($.trim(data.responseText)=='ok'){        		
        		swal({   title: "OK",   
        			text: "Cập nhật thông tin thành công.",   
        			type: "success",        			  
        			confirmButtonText: "OK",  
        			 closeOnConfirm: false }, 
        			 function(){   
        				window.location.reload();
        			});
        		
        	}else{    
           		swal('Error','Có lỗi xảy ra!','error');
       		}
        }
    });    
});
</script>