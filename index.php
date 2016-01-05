<?php 
session_start();
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
date_default_timezone_set ('Asia/Saigon');
require_once 'routes.php';
require_once "backend/model/Frontend.php";
$model = new Fontend;
$detailCoupon = $model->getDetail('coupon', 1);
$start_date_coupon = $detailCoupon['start_date'];
$end_date_coupon = $detailCoupon['end_date'];
$status_coupon = $detailCoupon['status'];
if($status_coupon && strtotime($start_date_coupon) <= time() && strtotime($end_date_coupon) >= time() && !$_COOKIE['snp_snppopup'])
{
	$haveCoupon = 1;
}else{
	$haveCoupon = 0;
}
?>
<!doctype html>
<html lang="vi">
	<head>		
		<title><?php echo $seo['meta_title']; ?></title>				
		<base href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">		
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $seo['meta_description']; ?>">
		<meta name="keyword" content="<?php echo $seo['meta_keyword']; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="DC.title" content="Dong ho nam nu chinh hang" />
		<meta name="geo.region" content="VN" />
		<meta name="geo.placename" content="Ho Chi Minh City" />
		<meta name="geo.position" content="10.764754;106.707497" />
		<meta name="ICBM" content="10.764754, 106.707497" />
		<link rel="shortcut icon" type="image/x-icon" href="images/fav_icon.ico">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/m.css">
		<link rel="stylesheet" href="js/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="js/owlcarousel/owl.carousel.css">
        <link rel="stylesheet" href="jquery.bxslider.css"/>
		<link rel="stylesheet" href="js/arcticmodal/jquery.arcticmodal.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css">
		<link rel="stylesheet" href="js/fancybox/source/helpers/jquery.fancybox-thumbs.css">
		<link rel="stylesheet" type="text/css" href="css/reset.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/theme18.css"/>
        <link rel="stylesheet" href="css/style-menu-mobi.css">
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/modernizr.js"></script>
        				
		<!--[if lte IE 9]>
			<link rel="stylesheet" type="text/css" href="css/oldie.css">
		<![endif]-->
        
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "ur-b88eaad4-4b4c-cfda-463c-a7a43af9a6ce", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	</head>
	<body class="front_page">
		<?php if($mod == "cate" || $mod == "catetype"){ ?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<?php } ?>
		<!-- - - - - - - - - - - - - - Old ie alert message - - - - - - - - - - - - - - - - -->

		<!--[if lt IE 9]>

			<div class="ie_alert_message">

				<div class="container">

					<div class="on_the_sides">

						<div class="left_side">

							<i class="icon-attention-5"></i> <span class="bold">Attention!</span> This page may not display correctly. You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</span>

						</div>
	
						<div class="right_side">

							<a target="_blank" href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_black">Update Now!</a>

						</div>

					</div>

				</div>

			</div>
				
		<![endif]-->
		<div class="wide_layout" id="wide_layout">		
			<!-- Sidebar -->
			  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
			      <ul class="nav sidebar-nav">
			          <li class="sidebar-brand">
			              <a href="#">
			                 Vinawatch.vn
			              </a>
			          </li>
			          <li>
			              <a href="#">Đồng hồ Seiko</a>
			          </li>
			          <li>
			              <a href="#">Đồng hồ Titan</a>
			          </li>
			          <li>
			              <a href="#">Đồng hồ Casino</a>
			          </li>
			          <li class="dropdown open">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Đồng hồ Titan <span class="caret"></span></a>
			            <ul class="dropdown-menu" role="menu">
			              <li> <a title="Dây da nam" href=""> Dây da nam </a> </li>
			              <li> <a title="Dây da nữ" href=""> Dây da nữ </a> </li>
			              <li> <a title="Đồng hồ nam" href=""> Đồng hồ nam </a> </li>
			              <li> <a title="Automatic" href=""> Automatic </a> </li>
			              <li> <a title="Đồng hồ nữ" href=""> Đồng hồ nữ </a> </li>
			            </ul>
			          </li>
			          <li>
			              <a href="#">Đồng hồ Op</a>
			          </li>
			          <li>
			              <a href="#">Đồng hồ Citizen</a>
			          </li>
			      </ul>
			  </nav><!-- /#sidebar-wrapper -->
		 
	  <div id="page-content-wrapper">
	  
	    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
	      <span class="hamb-top"></span>
	      <span class="hamb-middle"></span>
	      <span class="hamb-bottom"></span>
	    </button>
	  
			<header id="header" class="type_6">
				<?php include "blocks/top-cart.php"; ?>
				<?php include "blocks/bottom-cart.php"; ?>
				<div class="sticky_initialized" id="main_navigation_wrap">
			        <div class="container">
			  
			              <div class="sticky_inner type_2">
			                <div class="tit"> <a id="dmsp">Danh mục sản phẩm</a> </div>
			                <!--/ .nav_item--> 
			  
			                <div class="nav_item">
			                  <nav class="main_navigation">
			                    <ul class="sub-menu">
			                      <li class="current"> <a href="http://vinawatch.vn/">Trang chủ</a> </li>
			                      <li> <a href="http://vinawatch.vn/gioi-thieu.html">Giới thiệu</a> </li>
			                      <li><a href="http://vinawatch.vn/tin-tuc.html">Tin tức</a></li>
			                      <li><a href="http://vinawatch.vn/bao-hanh.html">Bảo hành</a></li>
			                      <li><a href="http://vinawatch.vn/huong-dan-mua-hang.html">Hướng dẫn mua hàng</a></li>
			                      <li><a href="http://vinawatch.vn/lien-he.html">Liên hệ</a></li>
			                    </ul>
			                  </nav>
			                  <!--/ .main_navigation--> </div>
			              </div>
			              <!--/ .sticky_inner --> 
			          
			        </div>
			        <!--/ .container--> 
			        
			      </div>
				
			</header>			
			<div class="page_wrapper <?php if($mod ==""){echo 'bg';}?>">
                              
				<div class="container" style="<?php if($mod !=""){echo 'position:relative;';}?>">
					<?php
                    include "blocks/menutop.php"; 				
					if($mod==""){
					    
						include "blocks/whyshopme.php";
						include "blocks/deal.php";					
						include "blocks/cate-home.php";
                        include "blocks/review.php";
					}else{
						include "page/".$mod.".php";
					} 
					?>					
					<?php if(!empty($seo['seo_text'])){?>
					<div class="row col-md-12" style="margin-top:20px">
						<h1 class="seo_title"><?php echo $seo['seo_title']; ?></h1>
						<?php echo $seo['seo_text']; ?>
					</div>
					<?php } ?>
				</div><!--/ .container-->

			</div><!--/ .page_wrapper-->			
			<?php include "blocks/footer.php"; ?>
				</div><!-- /#page-content-wrapper -->

		</div><!--/ [layout]-->	
	
		<?php //include "blocks/social.php"; ?>
		<script src="js/queryloader2.min.js"></script>
		<script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
        <script src="js/jquery.ck.min.js"></script>
		<script src="js/fancybox/source/jquery.fancybox.pack.js"></script>
		<script src="js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
		<script src="js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
        <script src="js/jquery.fancybox.min.js"></script>        
		<script src="js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/owlcarousel/owl.carousel.min.js"></script>
		
		<script src="js/arcticmodal/jquery.arcticmodal.js"></script>
		<script src="js/colorpicker/colorpicker.js"></script>
		<script src="js/retina.min.js"></script>	
		<script src="js/theme.plugins.js"></script>
		<script src="js/theme.core.js"></script>
		<script src="js/jquery.countdown.plugin.min.js"></script>
		<script src="js/jquery.countdown.min.js"></script>
        <script src="js/auto-complete.js"></script>
        <script src="js/jquery.izilla.touchMenuHover.min.js"></script>
        <script src="jquery.bxslider.js"></script>
        <script type="text/javascript">
                var homeSearchAffixDomEle= $.id("home_search_affix");
                $(function(){
                $(window).scroll(function(){ $('.ac_results').hide(); });
                affixOnScrollAction(homeSearchAffixDomEle, 700);
                });
                homeSearchAffixDomEle.on('affix-top.bs.affix', function () { 
                $.id('header_search').appendTo($('.search'));
                $.id('header_search_text').removeAttr('fixed');
                $.id('header_history_keyword').show();
                $.id('header_search').removeClass('header_search_fixed').addClass('header_search');
                //simpleTipRemove(); 
                })
                homeSearchAffixDomEle.on('affix.bs.affix', function () { 
                $.id('header_search').appendTo($.id('header_search_load'));
                $.id('header_search_text').attr('fixed', 1);
                $.id('header_history_keyword').hide();
                $.id('header_search').removeClass('header_search').addClass('header_search_fixed');
                })
                </script>
		<script type="text/javascript">
$(function(){	
	jQuery('.bxslider').bxSlider({
      minSlides: 1,
      maxSlides: 1,
      slideWidth: 190,
      slideMargin: 5,
    auto: true
    });
    
     jQuery("#various2").fancybox({
        'modal' : true,
        'padding' : 0      
    });
     
     <?php if($haveCoupon == 1){ ?>
     jQuery('#various2').click();
     <?php } ?>
     jQuery('#btnClosePopup').click(function(){
       $.ajax({
            url: "ajax/cookie-ajax.php"            
        });
        jQuery.fancybox.close();
     });
});

$(document).ready(function() {
	var s = $("#fixboxsearch");
	var pos = s.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		//s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
		if (windowpos >= pos.top) {
			s.addClass("stick");
            $('#catemenu').css('display', 'block');
            $('#cart').css('display', 'none');
            $('#hoversearch').css('width', '80%');
            $('#hoversearch input').css('width', '60%');
            $('#results').css('left', '227px');
		} else {
			s.removeClass("stick");
            $('#catemenu').css('display', 'none');
            $('#cart').css('display', 'block');
            $('#hoversearch').css('width', '100%');
            $('#hoversearch input').css('width', '100%-300px');
            $('#results').css('left', '5px');	
		}
	});
    
});   
		</script>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",21696]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script> 		<!-- Button trigger modal -->
<a id="various2" href="#snppopup-exit"></a>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#couponForm').validate({
	  rules: {
	    snp_email: {
	      required: true,
	      email: true
	    }
	  }
	});
    $('#couponForm').ajaxForm({
            beforeSend: function() {   
				$('#submitForm').attr('disabled', 'disabled');
				$('#submitForm').val('Đang xử lý.....');
            },
            uploadProgress: function(event, position, total, percentComplete) {  
				$('#submitForm').attr('disabled', 'disabled');
				$('#submitForm').val('Đang xử lý.....');            
            },
            complete: function(data) {
              if($.trim(data.responseText)=='success'){           
                swal({   
                  title: "OK",   
                  text: "Đăng ký nhận mã giảm giá thành công, quý khách vui lòng kiểm tra email để biết thông tin chi tiết.",   
                  type: "success",                
                  confirmButtonText: "OK",  
                   closeOnConfirm: false }, 
                   function(){   
                    window.location.reload();
                  });
                
              }else{    
                  swal('Error',"Có lỗi xảy ra!",'error');
				  window.location.reload();                  
              }
            }
        });
    });
</script>
<script type="text/javascript">
// JavaScript Document

$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        isClosed = false;
      } else {   
        overlay.show();
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wide_layout').toggleClass('toggled');
  });  
});


</script>
	</body>
      
    <div class="snp-pop-4928 snppopup" id="snppopup-exit" style="display:none;" >
       
        <div class="snp-fb snp-theme18">
<header>
<div class="snp-topheader">CHÚC MỪNG !</div> <h2><?php echo $detailCoupon['title']; ?></h2>
</header>
<a href="javascript:void(0)" class="snp-close snp_nothanks" id="btnClosePopup"></a> 
<div class="snp-newsletter-content">
<h2><?php echo $detailCoupon['content']; ?></h2>
<form class="snp-subscribeform snp_subscribeform" method="post" id="couponForm" name="couponForm" action="ajax/ma-giam-gia.php">
    <div>
    	<input type="hidden" name="mod" value="coupon">
        <input type="text" style="margin-top:10px" aria-required="true" required="required" class="snp-field snp-field-name" placeholder="Tên của bạn" id="snp_name" name="snp_name">
        <input type="text"  aria-required="true" required="required" class="snp-field snp-field-email" placeholder="Email của bạn" id="snp_email" name="snp_email">
        <input type="text" id="snp_dienthoai" placeholder="Điện thoại của bạn" class="snp-field snp-field-dienthoai "  aria-required="true" required="required" value="" name="snp_dienthoai"> 
    </div>
    <div class="clearfix"></div>
    <input type="submit" value="<?php echo $detailCoupon['label']; ?>" id="submitForm" class="snp-subscribe-button snp-submit">
</form>
<p><small><?php echo $arrText[23]; ?></small></p> 
</div>
</div>
</div>


</html>