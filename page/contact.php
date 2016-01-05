<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

<div class="secondary_page_wrapper">

	<div class="container">

		<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

		<ul class="breadcrumbs">

			<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">Trang chủ</a></li>
			<li>Liên hệ</li>

		</ul>

		<div class="row">

			<aside class="col-md-3 col-sm-4">

				<!-- - - - - - - - - - - - - - Information - - - - - - - - - - - - - - - - -->

				<section class="section_offset">

					<h3>Thông tin</h3>
					 <?php
                      $arrInfo = $model->getDetailBlockFooter(10);           
                      ?>
					<ul class="theme_menu">
						<?php foreach($arrInfo['link'] as $link ){ ?>
						<li><a href="<?php echo $link['link_url']; ?>"><?php echo $link['text_link']; ?></a></li>	
						<?php } ?>
					</ul>

				</section><!--/ .section_offset -->			

				<section class="section_offset">

					<h3><?php echo $arrText[12];?></h3>

					<div class="theme_box">

						<p class="form_caption"><?php echo $arrText[13];?></p>

						<form class="newsletter subscribe clearfix" novalidate>

							<input type="email" name="sc_email" placeholder="">

							<button class="button_blue def_icon_btn"></button>

						</form>

					</div><!--/ .theme_box-->

				</section>

			</aside><!--/ [col]-->

			<main class="col-md-9 col-sm-8">

				<h2 class="page_title">Liên hệ</h2>

				<section class="section_offset">
					
					<h3></h3>

					<div class="theme_box">
						<form id="contactForm" name="contactForm" action="ajax/contact.php" method="post">

							<ul>
							
								<li class="row">

									<div class="col-sm-6">
									
										<label for="full_name" class="required">Họ tên</label>
										<input type="text" required name="full_name" id="full_name">

									</div><!--/ [col]-->

									<div class="col-sm-6">

										<label for="email" class="required">Email</label>
										<input type="email" required name="email" id="email" >

									</div><!--/ [col]-->

								</li><!--/ .row -->

								<li class="row">

									<div class="col-xs-12">

										<label for="phone">Điện thoại</label>
										<input type="text" name="phone" id="phone" >

									</div><!--/ [col]-->

								</li><!--/ .row -->
								<li class="row">

									<div class="col-xs-12">

										<label for="title" class="required">Tiêu đề</label>
										<input type="text" name="title" id="title"  aria-required="true" required="required">

									</div><!--/ [col]-->

								</li><!--/ .row -->

								<li class="row">

									<div class="col-xs-12">

										<label for="content" class="required">Nội dung</label>
										<textarea id="content" required name="content" rows="6"></textarea>

									</div><!--/ [col]-->

								</li><!--/ .row -->

							</ul>

						</form><!--/ .contactform -->

						<!-- - - - - - - - - - - - - - End of contact form - - - - - - - - - - - - - - - - -->

					</div><!--/ .theme_box -->

					<footer class="bottom_box on_the_sides">

						<div class="left_side">
						
							<button class="button_dark_grey middle_btn" type="submit" 
							form="contactForm">Gửi</button>

						</div>

						<div class="right_side">

							<p class="prompt">Bắt buộc</p>

						</div>

					</footer>

				</section>

				<section class="section_offset">

					<h3>Thông tin liên hệ</h3>

					<div class="theme_box">

						<div class="row">

							<div class="col-sm-5">

								<div class="proportional_frame">								
									<iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=31+Nguy%E1%BB%85n+T%E1%BA%A5t+Th%C3%A0nh,+13,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=31+nguy&amp;sll=37.0625,-95.677068&amp;sspn=39.780156,81.123047&amp;ie=UTF8&amp;hq=&amp;hnear=31+Nguy%E1%BB%85n+T%E1%BA%A5t+Th%C3%A0nh,+13,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=10.764719,106.707416&amp;spn=0.009486,0.015428&amp;z=16&amp;iwloc=A&amp;output=embed" height="100%" width="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
								</div>

							</div><!--/ [col]-->

							<div class="col-sm-7">

								<p class="form_caption"><h3 style="color:#AC0E0F"><?php echo $arrText[8];?></h3></p>

								<ul class="c_info_list">

									<li class="c_info_location"><?php echo $arrText[9];?></li>
									<li class="c_info_phone"><?php echo $arrText[10];?></li>
									<li class="c_info_mail"><a href="mailto:#"><?php echo $arrText[11];?></a></li>									

								</ul>

							</div><!--/ [col]-->

						</div><!--/ .row -->

					</div><!--/ .theme_box -->

				</section>

			</main><!--/ [col]-->

		</div><!--/ .row-->

	</div><!--/ .container-->

</div><!--/ .page_wrapper-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#contactForm').validate();
    $('#contactForm').ajaxForm({
            beforeSend: function() {                
            },
            uploadProgress: function(event, position, total, percentComplete) {              
            },
            complete: function(data) {  
              console.log(data);
              if($.trim(data.responseText)=='success'){           
                swal({   
                  title: "OK",   
                  text: "Gửi thông tin liên hệ thành công!",   
                  type: "success",                
                  confirmButtonText: "OK",  
                   closeOnConfirm: false }, 
                   function(){   
                    window.location.reload();
                  });
                
              }else{    
                  swal('Error',"Có lỗi xảy ra!",'error');
                  $('#btnReset').click();
              }
            }
        });
    });
</script>