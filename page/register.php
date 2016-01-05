<?php 
if(isset($_GET['ref'])){
    $refer= $_GET['ref'].".html";
}else{
    $refer="cap-nhat-thong-tin.html";
}        
?>

<div class="col-md-12" style="padding-left:0px;padding-right:0px;padding-top: 20px;margin-top: 10px;background-color:#FFF;margin-bottom:20px;">
 	   
   <!-- show title -->
	<div class="clearfix"></div>
   <!-- show title -->
   	<div class="col-md-5">
		<form id="loginForm" method="post"  name="loginForm" action="ajax/user.php">
		<div class="cold-md-12" style="background-color:#FFF;height:350px;padding:10px">
			<h3>Bạn đã là thành viên tại donghonghia.com</h3>
			<div class="form-group">
	    <label for="fullname">Tên đăng nhập</label>
	    <input type="text" class="form-control" id="username_login" name="username_login"  aria-required="true" required="required">
	  </div>
	  <input name="action" value="login" type="hidden" />
	   <div class="form-group">
	    <label for="address">Mật khẩu</label>
	    <input type="password" class="form-control" id="password_login" name="password_login"  aria-required="true" required="required">
	  </div>
	  <div style="text-align:right;margin-top:7px">	  	
	  	<button type="submit" class="button_blue middle_btn" >Đăng nhập</button>
	  	<button type="button" class="button_blue middle_btn" onclick="location.href='http://<?php echo $_SERVER['SERVER_NAME']; ?>'" style="background-color:#000">Quay lại</button>
	      		  
	  </div>
	</div>
	</form>
	  
		</div>

	<div class="col-md-7">
		<form id="regisForm" name="regisForm" action="ajax/user.php" method="post">
			<input name="action" value="register" type="hidden" />		
		<div class="col-md-10">
		<h3>Thông tin tài khoản</h3>
		<div class="form-group">
		    <label for="username">Tên truy cập <span class="error">( * )</span></label>
		    <input type="text" class="form-control" id="username" name="username"  aria-required="true" required="required">
		  </div>
		   <div class="form-group">
		    <label for="password">Mật khẩu <span class="error">( * )</span></label>
		    <input type="password" class="form-control" id="password" name="password"  aria-required="true" required="required">
		  </div>
		  
		   <div class="form-group">
		    <label for="password2">Nhập lại MK <span class="error">( * )</span></label>
		    <input type="password" class="form-control" id="password2" name="password2"  aria-required="true" required="required">
		  </div>		   
		
		<h3 style="margin-top:15px">Thông tin chi tiết</h3>	
		<div class="form-group">
		    <label for="city_id">Tỉnh/TP <span class="error">( * )</span></label>								  
		    <select class="form-control" id="city" name="city"  aria-required="true" class="required" required="required">
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
		    <label class="error" id="error_city_id" style="display:none;">Vui lòng chọn 1 Tỉnh/TP.</label>
		  </div>
		  <div class="form-group">
		    <label for="email">Email <span class="error">( * )</span></label>
		    <input type="email" class="form-control" id="email" name="email"  aria-required="true" required="required">
		  </div>
		  <div class="form-group">
		    <label for="fullname">Họ Tên <span class="error">( * )</span></label>
		    <input type="text" class="form-control" id="full_name" name="full_name"  aria-required="true" required="required">
		  </div>
		   <div class="form-group">
		    <label for="address">Địa chỉ <span class="error">( * )</span></label>
		    <input type="text" class="form-control" id="address" name="address"  aria-required="true" required="required">
		  </div>
		  
		   <div class="form-group">
		    <label for="phone">Điện thoại</label>
		    <input type="text" class="form-control" id="phone" name="phone"  >
		  </div>
		   <div class="form-group">
		    <label for="company">Di động <span class="error">( * )</span></label>
		    <input type="text" class="form-control" id="handphone" name="handphone" aria-required="true" required="required">
		  </div>
		  <div style="margin-top:7px">
	      <button type="submit" class="button_blue middle_btn" id="btnRegister">Đăng ký</button>
	      <button type="button" class="button_blue middle_btn" onclick="location.href='http://<?php echo $_SERVER['SERVER_NAME']; ?>'" style="background-color:#000">Hủy</button>		  
	  </div>
		</div><!--/col-md-10-->
		</form>

		  <div class="row" style="margin-bottom:20px"></div>	
		</div><!--/col-md-7-->
	
</div><!--/col-md-12-->
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<style type="text/css">
.error{
	color:red;
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
</style>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<script type="text/javascript">
$(function(){
	$('#loginForm').validate();
	$("#regisForm").validate({
			rules: {				
				username: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 5
				},
				password2: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				}		
			}
		});
	$('#username').blur(function(){
		var username = $.trim($(this).val());
		$.ajax({
            url: "ajax/user.php",
            type: "POST",
            async: true,
            data: {
                'action' : 'checkUserName',
                'username' : username
            },
            success: function(data){                    
                if($.trim(data)==0){
                	alert('Tên đăng nhập đã được sử dụng.');                    
                    $('#username').focus();
                }
            }
        });		
	});
	$('#email').blur(function(){
		var email = $.trim($(this).val());
		$.ajax({
            url: "ajax/user.php",
            type: "POST",
            async: true,
            data: {
                'action' : 'checkEmail',
                'email' : email
            },
            success: function(data){                    
                if($.trim(data)==0){
                	alert('Email đã được sử dụng.');
                    $('#email').focus();
                }
            }
        });		
	});
	$('#regisForm').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $("#dialog" ).dialog();         
        },
        complete: function(data) {  
        	if($.trim(data)!='Đăng ký thành viên thành công.'){        		
        		swal({   title: "OK",   
        			text: "Đăng ký thành viên thành công!",   
        			type: "success",        			  
        			confirmButtonText: "OK",  
        			 closeOnConfirm: false }, 
        			 function(){   
        				location.href='<?php echo $refer; ?>.';		
        			});
        		
        	}else{    
           		Sexy.info('<h1>Thông báo</h1><br/><p>' + data + '</p>');
       		}
        }
    }); 
    $('#loginForm').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
                   
        },
        complete: function(data) {  
        	
        	if($.trim(data.responseText)=='success'){
        		location.href='<?php echo $refer; ?>';
        	}else{    
           		swal('Error','Tên đăng nhập hoặc mật khẩu không chính xác!','error');
       		}
        }
    }); 
});
</script>