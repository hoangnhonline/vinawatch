<div class="col-md-12" style="padding-left:0px; padding-right:0px;padding-top: 20px;margin-top: 10px;">
 	   
   <!-- show title -->
	<div class="page_title row"><h2><span class="title_r">Thành viên</span></h2></div>	   
   <!-- show title -->
   	<?php include "blocks/user/left.php"; ?>
	<div class="col-md-9">
		<form id="changepassForm" name="changepassForm" action="ajax/user.php" method="post">
			<input name="action" value="changepass" type="hidden" />		
		<div class="col-md-8">
		<span class="userfields_info">Đổi mật khẩu</span>
		<div class="form-group">
		    <label for="username">Mật khẩu cũ <span class="error">( * )</span></label>
		    <input type="password" class="form-control" id="old_pass" name="old_pass"  aria-required="true" required="required">
		    <span id="error_old_pass"></span>
		  </div>
		   <div class="form-group">
		    <label for="password">Mật khẩu mới <span class="error">( * )</span></label>
		    <input type="password" class="form-control" id="password" name="password"  aria-required="true" required="required">
		  </div>
		  
		   <div class="form-group">
		    <label for="password2">Nhập lại mật khẩu mới <span class="error">( * )</span></label>
		    <input type="password" class="form-control" id="password2" name="password2"  aria-required="true" required="required">
		  </div>		   
		
	      <button type="submit" class="btn btn-primary" id="btnChangePass">Cập nhật</button>		  
		</form>
		  <div class="row" style="margin-bottom:20px"></div>	
		  </div>	
	</div><!--col md 7-->
	
	</div>
	</div>
	
		
												 					  
</div>	
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
	$("#changepassForm").validate({
		rules: {				
			old_pass: {
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
			}				
		}
	});
	
    $('#changepassForm').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
                   
        },
        complete: function(data) {  
        	
        	if($.trim(data.responseText)=='ok'){
        		swal({   title: "Cập nhật thành công!",   
        			text: "Vui lòng đăng nhập lại với mật khẩu mới.",   
        			type: "success",        			  
        			confirmButtonText: "OK",  
        			 closeOnConfirm: false }, 
        			 function(){   
        				location.href='dang-ky.html';		
        			});
        	}else{    
           		swal('Error','Mật khẩu cũ không đúng.','error');
       		}
        }
    }); 
});
</script>