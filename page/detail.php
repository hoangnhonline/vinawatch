<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=762425253817317";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

			<div class="secondary_page_wrapper">

				<div class="container">

					<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

					<ul class="breadcrumbs">

						<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
						<li><a href="#" title="<?php echo $arrDetailCateType['cate_type_name']; ?>"><?php echo $arrDetailCateType['cate_type_name']; ?></a></li>
						<li><a href="<?php echo $arrDetailCate['cate_alias']; ?>.html" title="<?php echo $arrDetailCate['cate_name']; ?>"><?php echo $arrDetailCate['cate_name']; ?></a></li>						
						<li><?php echo $data['product_name']; ?></li>

					</ul>

					<div class="row">

						<main class="col-md-9 col-sm-8">

							<section class="section_offset">

								<div class="clearfix">

									<div class="single_product">
										<?php if(!empty($arrDetailProduct['images'])){ ?>
										<div class="image_preview_container">

											<img id="img_zoom" data-zoom-image="<?php echo $arrDetailProduct['images'][0]['url']; ?>" src="<?php echo $arrDetailProduct['images'][0]['url']; ?>" alt="">

											<button class="button_grey_2 icon_btn middle_btn open_qv"><i class="icon-resize-full-6"></i></button>

										</div><!--/ .image_preview_container-->
										<?php } ?>

										<!-- - - - - - - - - - - - - - End of image preview container - - - - - - - - - - - - - - - - -->

										<!-- - - - - - - - - - - - - - Prodcut thumbs carousel - - - - - - - - - - - - - - - - -->
										
										<div class="product_preview">

											<div class="owl_carousel" id="thumbnails">
												 <?php
												 if(!empty($arrDetailProduct['images'])){
								                foreach ($arrDetailProduct['images'] as $images) {                
								                ?>
												<a href="#" data-image="<?php echo $images['url']; ?>" data-zoom-image="<?php echo $images['url']; ?>" title="<?php echo $data['product_name']; ?>">

													<img src="<?php echo $images['url']; ?>" data-large-image="<?php echo $images['url']; ?>" alt="<?php echo $data['product_name']; ?>" title="<?php echo $data['product_name']; ?>">

												</a>
												<?php } } ?>

											</div><!--/ .owl-carousel-->

										</div><!--/ .product_preview-->									
										

									</div>
									<input type="hidden" id="product_id" value="<?php echo $data['id']; ?>">
									<!-- - - - - - - - - - - - - - End of product image column - - - - - - - - - - - - - - - - -->

									<!-- - - - - - - - - - - - - - Product description column - - - - - - - - - - - - - - - - -->

									<div class="single_product_description">

										<h3 class="offset_title"><a href="#" title="<?php echo $data['product_name']; ?>"><?php echo $data['product_name']; ?></a></h3>									

										<div class="description_section v_centered">											

										</div>

										<div class="description_section">

											<table class="product_info">

												<tbody>

													<tr>

														<td>Thương hiệu: </td>
														<td><a href="#" title="<?php echo $arrDetailCateType['cate_type_name']; ?>"><?php echo $arrDetailCateType['cate_type_name']; ?></a></td>

													</tr>

													<tr>

														<td>Tình trạng: </td>
														<td><span class="in_stock">
															<?php if($data['trangthai']==1) echo "Còn hàng" ;
																if($data['trangthai']==2) echo "Hết hàng"; 
																if($data['trangthai']==3) echo "Hàng sắp về";
															?>
														</span></td>

													</tr>

													<tr>

														<td>Mã sản phẩm: </td>
														<td><?php echo $data['product_code']; ?></td>

													</tr>

												</tbody>

											</table>

										</div>
										<?php if($data['description']){ ?>
										<hr>

										<div class="description_section">

											<p><?php echo $data['description']; ?></p>

										</div>
										<?php } ?>

										<hr>

										<p class="product_price">
											<s><?php if($data['price_saleoff'] > 0){ echo number_format($data['price'],0,",",".")." ₫"; }else{ number_format($data['price'],0,",",".")." ₫"; } ?> </s> 
											<b class="theme_color">
												<?php if($data['price_saleoff']>0){ ?>
												<?php echo number_format($data['price_saleoff'],0,",","."); ?> ₫
												<?php }else{ ?>
												<?php echo number_format($data['price'],0,",","."); ?> ₫
												<?php } ?>
											</b>
										</p>										
										
										<div class="buttons_row">
											<?php if($data['trangthai']==1){ ?>
											<button id="btnDatMua"class="buyinstallment fancybox.ajax" href="ajax/dat-hang.php" data-value="<?php echo $data['id']; ?>">
										        Đặt Mua, giao tận nơi
										    <span>(Xem miễn phí, không thích không mua)</span>
										    </button>
										    <button class="buysupermarket fancybox.ajax" id="btnGiuHang" href="ajax/dat-hang.php" data-value="<?php echo $data['id']; ?>">
										        Đặt giữ hàng tại cửa hàng
										    <span>(Đến CH xem hàng, không thích không mua)</span>
										    </button>
										    <?php } ?>
										    <?php if($data['trangthai']==3){ ?>
										    <button class="buyonline fancybox.ajax" id="btnDatTruoc" href="ajax/dat-hang.php" data-value="<?php echo $data['id']; ?>">
							                    Đặt Trước Ngay
							                </button>		
							                <?php } ?>																				

										</div>
                                        <div class="share-social">
                                            <span class='st_facebook' displayText='Facebook'></span>
                                            <span class='st_twitter' displayText='Tweet'></span>
                                            <span class='st_linkedin' displayText='LinkedIn'></span>
                                            <span class='st_pinterest' displayText='Pinterest'></span>
                                            <span class='st_email' displayText='Email'></span>
                                            <span class='st_sharethis' displayText='ShareThis'></span>
                                        </div>
										<!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

									</div>

									<!-- - - - - - - - - - - - - - End of product description column - - - - - - - - - - - - - - - - -->

								</div>

							</section><!--/ .section_offset -->

							<!-- - - - - - - - - - - - - - End of product images & description - - - - - - - - - - - - - - - - -->

							<!-- - - - - - - - - - - - - - Tabs - - - - - - - - - - - - - - - - -->

							<div class="section_offset">

								<div class="tabs type_2">

									<!-- - - - - - - - - - - - - - Navigation of tabs - - - - - - - - - - - - - - - - -->

									<ul class="tabs_nav clearfix">

										<li><a href="#tab-1" title="Chi tiết">Chi tiết</a></li>
										<li><a href="#tab-2" title="Hướng dẫn sử dụng">Hướng dẫn sử dụng</a></li>									

									</ul>								
									

									<div class="tab_containers_wrap">

										<!-- - - - - - - - - - - - - - Tab - - - - - - - - - - - - - - - - -->

										<div id="tab-1" class="tab_container">

											<?php echo $data['content']; ?>

										</div><!--/ #tab-1-->

										<!-- - - - - - - - - - - - - - End tab - - - - - - - - - - - - - - - - -->

										<!-- - - - - - - - - - - - - - Tab - - - - - - - - - - - - - - - - -->

										<div id="tab-2" class="tab_container">

											<?php echo $data['guide_use']; ?>

										</div><!--/ #tab-2-->										

										<!-- - - - - - - - - - - - - - End tab - - - - - - - - - - - - - - - - -->

									</div><!--/ .tab_containers_wrap -->

									<!-- - - - - - - - - - - - - - End of tabs containers - - - - - - - - - - - - - - - - -->

								</div><!--/ .tabs-->
								<div class="col-md-12" style="text-align:center;margin-top:15px;margin-bottom:30px">
									<?php if($data['trangthai']==1){ ?>
									<div class="col-md-6" style="text-align:right">
										<button id="btnDatMua"class="buyinstallment fancybox.ajax" href="ajax/dat-hang.php" data-value="<?php echo $data['id']; ?>">
									        Đặt Mua, giao tận nơi
									    <span>(Xem miễn phí, không thích không mua)</span>
									    </button>
									</div>
									<div class="col-md-6" style="text-align:left">
									    <button class="buysupermarket fancybox.ajax" id="btnGiuHang" href="ajax/dat-hang.php" data-value="<?php echo $data['id']; ?>">
									        Đặt giữ hàng tại cửa hàng
									    <span>(Đến CH xem hàng, không thích không mua)</span>
									    </button>
										</div>
								    <?php } ?>
								    <?php if($data['trangthai']==3){ ?>
								    <button class="buyonline fancybox.ajax" id="btnDatTruoc" href="ajax/dat-hang.php" data-value="<?php echo $data['id']; ?>">
					                    Đặt Trước Ngay
					                </button>		
					                <?php } ?>		
								</div>
							</div><!--/ .section_offset -->

							<?php include "blocks/detail/san-pham-cung-loai.php"; ?>							
                            
                            <div class="fb-comments" data-href="http://vinawatch.vn/<?php echo $arrDetailCate['cate_alias'].'/'.$data['product_alias']; ?>.html" data-width="820" data-numposts="10"></div>
						</main><!--/ [col]-->

						<?php include "blocks/detail/right.php"; ?>

					</div><!--/ .row-->

				</div><!--/ .container-->

			</div><!--/ .page_wrapper-->
<input type="hidden" id="shop_success" value="0" />
<a class="fancybox" href="#inline1" id="successLink" >&nbsp;</a>
<a class="fancybox2" href="#inline2" id="feedbackLink" >&nbsp;</a>

<div id="inline1" style="display: none;" class="col-md-12">
	<div class="col-md-4">
		<img src="images/hotline.jpg" alt="hotline" title="hotline" align="left" class="thumbnail" style="margin-right:10px">
	</div>	
	<div class="col-md-8">
			<h3>Đặt hàng thành công!</h3>
	        <label>Cám ơn <span id="gioi-tinh-kh"></span> <span id="name-kh"></span> đã cho chúng tôi cơ hội được phục vụ.</label>
	        <p>
	            <strong>Thông tin đơn hàng</strong><br>
	            - Sản phẩm : <?php echo $data['product_name']; ?>
	            <br>
	            - Giá : <?php if($data['price_saleoff']>0){ ?>
						<?php echo number_format($data['price_saleoff'],0,",","."); ?> ₫
						<?php }else{ ?>
						<?php echo number_format($data['price'],0,",","."); ?> ₫
						<?php } ?>
	        </p>
	    <br>
	    <br>
	    Khi cần trợ giúp, vui lòng gọi <b>0913.66.55.13</b> (8g30-22g00)  
	</div>
</div>	
<div id="inline2" style="display: none;" class="col-md-12">
		
	<div class="col-md-12">
			<h3>Tại sao bạn không đặt mua sản phẩm ?</h3>
	       
	    <ul>
	    	<li style="margin-bottom:12px"><input checked type="radio" name="ykien" id="ykien_1" value="1">
				<label for="ykien_1">Tôi đang phân vân với sản phẩm khác. </label> </li>
	    	<li style="margin-bottom:12px"><input type="radio" name="ykien" id="ykien_2" value="2">
				<label for="ykien_2">Tôi chỉ click thử thôi nhưng chưa muốn mua. </label> </li>
			<li style="margin-bottom:12px"><input type="radio" name="ykien" id="ykien_3" value="3">
				<label for="ykien_3">Tôi muốn mua sản phẩm này lúc khác. </label> </li>
			<li style="margin-bottom:12px"><input type="radio" name="ykien" id="ykien_4" value="4">
				<label for="ykien_4">Ý kiến khác. </label> </li>
	    </ul>
	    <div class="col-md-12" style="text-align:center;margin-top:15px">
	    	<button class="button_dark_grey middle_btn" form="leave_comment" type="button" onclick="return $('.fancybox-close').click(); ">BỎ QUA</button>
	    	<button class="button_blue middle_btn" id="btnPhanHoi">PHẢN HỒI</button>
	    </div>
	</div>
</div>

<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="css/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="js/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="css/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript">
  $(document).ready(function() {
	$("#btnDatMua").fancybox({		
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '383px',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		ajax: {
		    type: "POST",
		    cache : false,		 
		    data: {
		    	product_id : $('#btnDatMua').attr('data-value'),
		    	type : 1
		    }
		},
		afterClose : function() {
			phanhoi();
		}
	});
	$('#feedbackLink').fancybox();
	 $(".fancybox").fancybox({
	 	maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '320px',
		autoSize	: false,
		closeClick	: false,
	 });  
	 $(".fancybox2").fancybox({
	 	maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '30%',
		height		: '193px',
		autoSize	: false,
		closeClick	: false,
	 }); 
	$('#btnGiuHang').fancybox({		
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '337px',
		autoSize	: false,
		closeClick	: false,
		//openEffect	: 'none',
		//closeEffect	: 'none',
		ajax: {
		    type: "POST",
		    cache : false,		 
		    data: {
		    	product_id : $('#btnGiuHang').attr('data-value'),
		    	type : 2
		    }
		},
		afterClose : function() {
		   phanhoi();
		}
	});
	$('#btnDatTruoc').fancybox({		
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		ajax: {
		    type: "POST",
		    cache : false,		 
		    data: {
		    	product_id : $('#btnDatTruoc').attr('data-value'),
		    	type : 3
		    }
		},
		afterClose : function() {
		   phanhoi();
		}
	});
});
  $(function(){
  	$('#btnPhanHoi').click(function(){
  		var type = $('input[name="ykien"]:checked').val();
  		var id = $('#product_id').val();
  		$.ajax({
            url: "ajax/feedback.php",
            type: "POST",
            async: true,
            data: {                             
                'id' : id,
                'type' : type
            },
            success: function(data){            
                $('.fancybox-close').click();             
            }
        }); 
  	});
    $('.btn_addtocart').click(function(){        
          var product_id = $(this).attr('data-value');     
          $.ajax({
            url: "ajax/cart.php",
            type: "POST",
            async: true,
            data: {                             
                'action' : 'add',
                'product_id' : product_id
            },
            success: function(data){            
                location.href = "gio-hang.html";              
            }
        });       
    });
  });
 function phanhoi(){
 	if($('#shop_success').val()==0){
    	$('#feedbackLink').click();  
    }	
 }
</script>
<style type="text/css">
.buyonline {
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  margin-bottom: 12px;
  background: #f59123;
  -moz-box-shadow: inset 0 -3px 0 0 #c27806;
  box-shadow: inset 0 -3px 0 0 #c27806;
  border: none;
  color: #fff;
  display: block;
  padding: 5px 0 4px;
  width: 300px;
  height: 55px;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 16px;
}
.buysupermarket {
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  margin-bottom: 12px;
  background: #fdf8cd;
  -moz-box-shadow: inset 0 -3px 0 0 #d2bf1b;
  box-shadow: inset 0 -3px 0 0 #d2bf1b;
  -webkit-box-shadow: inset 0 -3px 0 0 #d2bf1b;
  border: none;
  color: #5d5d5d;
  display: block;
  padding: 5px 0 4px;
  width: 300px;
  height: 55px;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 16px;
}
.buyinstallment {
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  margin-bottom: 12px;
  background: #ED1C24;
  border: 1px solid #fff;
  color: #fff;
  display: block;
  padding: 5px 0 4px;
  width: 300px;
  height: 55px;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 16px;
  position: relative;
}
.buyinstallment span, .buysupermarket span{
  text-transform: none;
  font-size: 12px;
  display: block;
  font-weight: 400;
  margin-top: 3px;
}
</style>