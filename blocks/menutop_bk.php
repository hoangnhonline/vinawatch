<link rel="stylesheet" href="css/stylecate.css" />
<script type="text/javascript">
    
var vatgiaConfig= {
    con_ajax_path: "/ajax/",
    con_css_path: "http://static.vatgia.com/20151009/cache/css/v4/",
    con_image_server: "http://media.vatgia.vn",
    con_redirect: "L2hvbWUv",
    con_root_path: "/home/",
    
    use_logged: 0,
    use_id: -1,
    use_loginname: "",
    use_avatar: "",
    use_supplier: 0,
    use_sso_login: true,
    
    cat_id: 0,
    cat_root_id: 0,
    cat_parent_id: 0,
    cat_has_child: 0,
    cat_fashion: 0,
    
    login_config: {
    default_loginname: "",
    default_password: "",
    array_check_form: ["0{#}{#}loginname{#}Tên đăng nhập", "0{#}{#}password{#}Mật khẩu"]
    },
    
    cache_data: [],
    isIElowVersion: false,
    keyword: "",
    outside_click: [],
    resize_event: {},
    window_width: (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth) - 17,
    window_height: (window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight),
    
    // Check scroll Up or Down
    scroll_action: false,
    scroll_offset: 0
    };
    document.domain= "<?php echo $_SERVER['SERVER_NAME']; ?>";
    
    </script>
    <script src="http://static.vatgia.com/20151009/cache/js/jquery.min.js?v=20151009" type="text/javascript"></script>
    <script src="http://static.vatgia.com/20151009/cache/js/v4/functions_main.js?v=20151009" type="text/javascript"></script>
    <script src="http://static.vatgia.com/20151009/cache/js/avim.js?v=20151009" type="text/javascript"></script>
    <script src="http://static.vatgia.com/20151009/cache/js/jquery.carousel.js?v=20151009" type="text/javascript"></script>
    <script src="http://static.vatgia.com/20151009/cache/js/jquery.hoverIntent.js?v=20151009" type="text/javascript"></script>
    <script src="http://static.vatgia.com/20151009/cache/js/jquery.menu-aim.js?v=20151009" type="text/javascript"></script>
<div id="menu" style="<?php if($mod==""){echo 'display:block;';}else{echo 'display:none;position: absolute;top:-3px; left:0; z-index:9999;';}?>">
    <div class="container_width" id="menu_list">
    <div class="wrapper">
    <h2>Toàn bộ danh mục</h2>
    <ul class="menu_root" id="menu_home_root">
        <?php
        $cateTypeArr = $model->getListCateType();
		  $i = 0;

		  if(!empty($cateTypeArr)){       

		  foreach($cateTypeArr as $catetype){

		  $i++;
		  $cate_type_id = $catetype['id'];
          if($i==1){
          ?>
          <li idata="<?php echo $cate_type_id;?>" class="selected"><a href="<?php echo 'http://vinawatch.vn/'.$catetype['cate_type_alias'].'.html';?>" ><?php echo $catetype['cate_type_name']; ?><b class="arrow_down"></b></a></li>
          <?php  
          } elseif($i>1 && $i<count($cateTypeArr)){
          ?>
          <li idata="<?php echo $cate_type_id;?>" class=""><a href="<?php echo 'http://vinawatch.vn/'.$catetype['cate_type_alias'].'.html';?>" ><?php echo $catetype['cate_type_name']; ?><b class="arrow_down"></b></a></li>
          <?php  
          }elseif($i==count($cateTypeArr)){
          ?>
          <li idata="<?php echo $cate_type_id;?>" class="empty"><a href="<?php echo 'http://vinawatch.vn/'.$catetype['cate_type_alias'].'.html';?>" ><?php echo $catetype['cate_type_name']; ?><b class="arrow_down"></b></a></li>
          <?php  
          }
        ?>
        
        <?php }}  ?>
    </ul>
    <ul id="menu_home_navigate" style="display: none;">
        <?php 
        $cateTypeArr = $model->getListCateType();
		  $i = 0;

		  if(!empty($cateTypeArr)){       

		  foreach($cateTypeArr as $catetype){

		  $i++;
		  $cate_type_id = $catetype['id'];
        ?>
        <li id="menu_home_<?php echo $cate_type_id;?>" class="navigate" style="display: block;">
            <div class="banner" id="vatgia_home_menu_<?php echo $cate_type_id;?>"></div>
            <div class="fl">
                <?php 
                $arrCateBlock = $model->getCateCap1ByCateType($cate_type_id);
					    if(!empty($arrCateBlock)){
					      foreach ($arrCateBlock as $cate) {
                ?>
                <div class="sub"><a href="<?php echo $cate['cate_alias']; ?>.html" class="hot" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Danh mục cấp 2 trở lên"><?php echo $cate['cate_name']; ?></a></div>
                <?php
                }}
                ?>
            </div>
        </li>
        <?php }}?>  
    </ul>
    </div>
    </div>
    <?php $arr = $model->getListBannerByPosition(1,-1); ?>
    <?php
      if(!empty($arr)){           
          foreach($arr as $img){                        
            
                $link_url = "";
                if($img['type_id'] == 2){
                    $link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
                }
                if($img['type_id'] == 3){
                    $link_url = $img['link_url'];
                }
      ?>
    <div class="menu_content effects" id="menu_content_<?php echo $cate_type_id;?>" style="display:block">
        <div style="background: #004167;">
            <div class="container_width">
                <div class="wrapper">
                    <a href="<?php echo $link_url;?>" class="banner">
                        <img src="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_event']; ?>" class="main_banner"/>
                    </a>

                    <div class="small_banner">
                        <?php $arrSmall = $model->getListBannerByPosition(2,-1); ?>
                        <?php
                          if(!empty($arrSmall)){           
                              foreach($arrSmall as $img1){                        
                                
                                    $link_url1 = "";
                                    if($img1['type_id'] == 2){
                                        $link_url1 = "su-kien/".$img1['name_en']."-".$img1['id'].".html";
                                    }
                                    if($img1['type_id'] == 3){
                                        $link_url1 = $img1['link_url'];
                                    }
                          ?>
                        <a href="<?php echo $link_url1;?>">
                            <img src="<?php echo $img1['image_url']; ?>" alt="<?php echo $img1['name_event']; ?>" class="translateX">
                        </a>     
                        <?php }}?>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }}?>
    <style>
    /* Event menu */
    #menu_event_promotions{
    background: rgba(255, 255, 255, .8);
    background: #F2F2F2\9;
    box-shadow: inset -1px -1px 2px 0 rgba(0,0,0,0.4), inset 2px 0 4px -2px rgba(0,0,0,0.4);
    min-height: 480px;
    left: 0;
    position: absolute;
    top: 0;
    width: 152px;
    z-index: 1;
    }
    #menu_event_promotions ul{
    padding: 0 9px;
    }
    #menu_event_promotions ul li{
    border-bottom: dotted 1px #D7D5D2;
    padding: 9px 0;
    z-index: 3;
    }
    #menu_event_promotions ul li.new{
    background: url(http://static.vatgia.com/20151009/cache/css/v4/new.gif) no-repeat right top;
    }
    #menu_event_promotions ul li a{
    display: block;
    font-size: 12px;
    max-height: 28px;
    overflow: hidden;
    position: relative;
    }
    #menu_event_promotions ul li:last-child a{
    border-bottom: none;
    }
    
    /* Event carousel */
    #carousel_event_promotions .carousel-indicators{
    bottom: 10px;
    font-size: 12px;
    left: 50%;
    transform: translateX(-50%);
    *margin-left: -200px;
    text-align: center;
    }
    #carousel_event_promotions .carousel-indicators li{
    background-color: #000;
    border-radius: 12px;
    box-shadow: none;
    color: #FFF;
    height: 12px;
    padding: 5px;
    text-indent: 0;
    width: 12px;
    }
    #carousel_event_promotions .carousel-indicators li.active{
    background-color: #C40000;
    }
    #carousel_event_promotions .carousel-inner .effects .main_banner{
    opacity: 1;
    }
    /*
    #carousel_event_promotions .carousel-inner .effects .main_banner{
    -webkit-transform: scale(1,1);
    -webkit-transition: 0 4s linear;
    transform: scale(1,1);
    transition: transform 4s linear;
    }
    */
    </style>
    <div style="display: none; background-color: rgb(255, 204, 217);" class="menu_content ab-dark" id="menu_content_event" data-ab-yaq="84.857">
    <div class="container_width">
    <div class="wrapper">
    <div class="hidden" id="menu_event_promotions"></div>
    <div class="carousel carousel-fade slide" id="carousel_event_promotions">
    <ol class="carousel-indicators">
    <li data-slide-to="0" data-target="#carousel_event_promotions" class="">1</li><li data-slide-to="1" data-target="#carousel_event_promotions" class="">2</li><li data-slide-to="2" data-target="#carousel_event_promotions" class="">3</li><li data-slide-to="3" data-target="#carousel_event_promotions" class="active">4</li><li data-slide-to="4" data-target="#carousel_event_promotions" class="">5</li><li data-slide-to="5" data-target="#carousel_event_promotions" class="">6</li>
    </ol>
    <div class="carousel-inner">
    <div class="item ab-dark" style="background-color: rgb(235, 0, 128);" data-ab-yaq="84.857"><a rel="nofollow" target="_blank" href="/home/redirect.php?url=L2UvcXVhLXRhbmctY2hvLW5hbmctMjAtMTAuaHRtbD92Z3M9dGhfbm9pYm9fZ2hwbnNfSG9tZXR1bmdidW5nbXVhc2FtODEwNDgwXzIwLzEw" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Banner TOP - seasons"><img data-ab-parent=".item,#menu_content_event" data-adaptive-background="1" src="/event_pictures/jbg1444814208.jpg" alt="QUÀ TẶNG CHO NÀNG 20-10" class="main_banner" data-ab-color="rgb(235,0,128)"></a></div><div class="item ab-light" style="background-color: rgb(255, 214, 208);" data-ab-yaq="225.575"><a rel="nofollow" target="_blank" href="/home/redirect.php?url=aHR0cDovL3d3dy52YXRnaWEuY29tL2UvZ2lhLXJlLWtob25nLW5nby14b2EtdGFuLW5vaS1sby1tdWEtbXVhLXRvaS5odG1sP3V0bV9zb3VyY2U9SG9tZXR1bmdidW5nbXVhc2FtODEwNDgwJnV0bV9tZWRpdW09Y3BjJnV0bV9jYW1wYWlnbj1naWEgcmUga2hvbmcgbmdvIHhvYSB0YW4gbm9pIGxvIG11YSBtdWEgdG9pJnZncz10Y19ub2lib19naHBuc19Ib21ldHVuZ2J1bmdtdWFzYW04MTA0ODBfU2xvdDE=" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Banner TOP - seasons"><img data-ab-parent=".item" data-adaptive-background="1" src="/event_pictures/dim1444625405.png" alt="Giá rẻ không ngờ-Xóa tan nỗi lo mùa mưa tới" class="main_banner" data-ab-color="rgb(255,214,208)"></a></div><div class="item ab-dark" style="background-color: rgb(1, 70, 137);" data-ab-yaq="57.007"><a rel="nofollow" target="_blank" href="/home/redirect.php?url=aHR0cDovL3d3dy52YXRnaWEuY29tL3ByZW1pdW1zdG9yZSZtb2R1bGU9cHJvZHVjdCZ2aWV3PWRldGFpbCZyZWNvcmRfaWQ9MzQ5ODM2Mj92Z3M9dGhfbm9pYm9fSG9tZXR1bmdidW5nbXVhc2FtODEwNDgwXzFfaXBob25lNHM=" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Banner TOP - seasons"><img data-ab-parent=".item" data-adaptive-background="1" src="/event_pictures/zhg1444191856.jpg" alt="LẮC TAY CAO CẤP" class="main_banner" data-ab-color="rgb(1,70,137)"></a></div><div class="item ab-light effects active" style="background-color: rgb(255, 204, 217);" data-ab-yaq="220.731"><a rel="nofollow" target="_blank" href="/home/redirect.php?url=L2UvZ2lhLXJlLWdpYXQtbWluaC10aGljaC1sYS1tdWEtbmdheS5odG1sP3V0bV9zb3VyY2U9SG9tZXR1bmdidW5nbXVhc2FtODEwNDgwJnV0bV9tZWRpdW09Y3BjJnV0bV9jYW1wYWlnbj1naWEtcmUtZ2lhdC1taW5oJnZncz10Y19ub2lib19naHBuc19Ib21ldHVuZ2J1bmdtdWFzYW04MTA0ODBfU2xvdDE=" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Banner TOP - seasons"><img data-ab-parent=".item" data-adaptive-background="1" src="/event_pictures/xvp1444029455.png" alt="Giá rẻ giật mình,thích là mua ngay" class="main_banner" data-ab-color="rgb(255,204,217)"></a></div><div class="item ab-dark" style="background-color: rgb(254, 65, 1);" data-ab-yaq="114.215"><a rel="nofollow" target="_blank" href="/home/redirect.php?url=L2UvZ2lhLWR1bmctZ2lhLXJlLWRvbmctZ2lhLWR1b2ktMjAway5odG1sP3Zncz10aF9ub2lib19naHBuc19Ib21ldHVuZ2J1bmdtdWFzYW04MTA0ODBfZ2lhZHVuZw==" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Banner TOP - seasons"><img data-ab-parent=".item" data-adaptive-background="1" src="/event_pictures/mmi1443692850.jpg" alt="GIA DỤNG GIÁ RẺ - ĐỒNG GIÁ DƯỚI 200K" class="main_banner" data-ab-color="rgb(254,65,1)"></a></div><div class="item ab-light" style="background-color: rgb(218, 213, 207);" data-ab-yaq="213.811"><a rel="nofollow" target="_blank" href="/home/redirect.php?url=L2UvY2hhbi1nYS1naWEtdG90LWNoaS10dS0xMTktMDAwZC5odG1sP3Zncz10aF9ub2lib19naHBuc19Ib21ldHVuZ2J1bmdtdWFzYW04MTA0ODBfY2hhbmdh" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Banner TOP - seasons"><img data-ab-parent=".item" data-adaptive-background="1" src="/event_pictures/qoh1443434331.jpg" alt="Chăn ga giá tốt - Chỉ từ 119.000đ" class="main_banner" data-ab-color="rgb(218,213,207)"></a></div></div>
    </div>
    <div class="small_banner"><div class="translateX" id="vatgia_new_home_190x480"><div id="myadBan_17973" style="width:190px;height:480px;background: none;position: relative;font-size: 0;text-align: center;overflow:hidden;" class="first " onmouseout="" onmouseover=""><a href="http://ad.vatgia.com/a/b_click.php?data=eyJiYW5faWQiOiIxNzk3MyIsInBvc19pZCI6IjE0NiIsIndlYl9pZCI6MywiYmFuX2xpbmsiOiJodHRwOlwvXC92YXRnaWEuY29tXC9IeXVuRGFlQmlkZXQmbW9kdWxlPXByb2R1Y3Qmdmlldz1kZXRhaWwmcmVjb3JkX2lkPTUyNzAyMzA,dmdzPXRoX25vaWJvX0hvbWVkYW5obXVjbmhvMTkwNDgwIiwiY2F0X2lkIjowfQ--" target="_blank" style="" title=""><img src="http://media.myad.vn/photo/users_b_upload/2015/10/vzb1443757096.jpg" style="width : auto;"></a></div></div></div>
    </div>
    </div>
    </div>
    <script src="http://static.vatgia.com/20151009/cache/js/jquery.adaptive.backgrounds.js?v=20151009" type="text/javascript"></script>
    <script type="text/javascript">
    // Lay color theo anh lam background
    $.adaptiveBackground.run({coordinate: {x: 1, y: 1}});
    
    $(function(){
    if(menuEventConfig.menuDomEle.find('.new').length) menuHLinkConfig.eventDomEle.addClass('new')
    
    var time_change_slide = 5000;
    
    // Neu di chuyen vao khu vuc event menu thi event carousel chay theo vong tron
    elem_on = '.a_event_promotions, #menu_event_promotions';
    $(document)
    .on('mouseenter', elem_on, function(){
    menuEventConfig.menuDomEle.show();
    menuHLinkConfig.eventDomEle.addClass('active');
    menuHomeConfig.eventCtDomEle.show(); // Hien slide event
    slideEventConfig.index_change = -1;
    slideEventConfig.slideDomEle.carousel('cycle');
    menuHomeConfig.rootListDomEle.removeClass("hover selected");
    menuHomeConfig.autoInterval && clearInterval(menuHomeConfig.autoInterval); // Dung slide menu root
    })
    .on('mouseleave', elem_on, function(e){
    if(!$(e.relatedTarget).is('.a_event_promotions') && !$(e.relatedTarget).parents().is('#menu_event_promotions')) menuHLinkConfig.eventDomEle.removeClass('active');
    menuEventConfig.menuDomEle.hide();
    // Slide phai chay den index nay truoc khi chuyen sang slide menu root
    slideEventConfig.index_change = parseInt(slideEventConfig.pageDomEle.find('.active').attr('data-slide-to'));
    })
    
    // Them hieu ung vao slide dau tien
    slideEventConfig.itemDomEle.eq(0).addClass('effects');
    
    // Cau hinh cho carousel - co cai nay phai bo data-ride trong html
    slideEventConfig.slideDomEle.carousel({ interval: time_change_slide, pause: 'hover', wrap: true });
    
    // Khi hover chuot vao phan trang carousel
    slideEventConfig.pageListDomEle.hoverIntent(
    function (e) {
       var slideIndex = parseInt($(this).attr('data-slide-to')) || 0;
       slideEventConfig.slideDomEle.carousel(slideIndex);
       slideEventConfig.slideDomEle.carousel('pause');
       slideEventConfig.index_change = -1; // Khong tu chay slide menu root
    }
    )
    
    // Slide xong
    $(document).on('slide.bs.carousel', '#carousel_event_promotions', function (e) {
    
    // Item hien tai
    var item_index = $(e.relatedTarget).index();
    
    // Thay doi background noi dung
    var background = slideEventConfig.itemDomEle.eq(item_index).css('background-color');
    menuHomeConfig.eventCtDomEle.css('background-color', background);
    
    // Them hieu ung cho item carousel
    setTimeout(function(){
    slideEventConfig.itemDomEle.removeClass('effects')
    slideEventConfig.itemDomEle.eq(item_index).addClass('effects')
    }, 100); // Dung event carousel
    
    // Kiem tra khi den index nao thi chuyen sang slide menu
    var item_index_change = slideEventConfig.index_change ? slideEventConfig.index_change : slideEventConfig.pageListDomEle.length - 1;
    
    // Chuyen sang slide menu
    if(item_index == item_index_change){
    slideEventConfig.index_change = null;
    slideEventConfig.slideDomEle.carousel('pause'); // Dung event carousel
    setTimeout(function(){
    autoChangeMenu(); // Load slide menu root
    menuHomeConfig.autoInterval && clearInterval(menuHomeConfig.autoInterval); // Dung slide menu root
    menuHomeConfig.autoInterval = setInterval(autoChangeMenu, time_change_slide); // Tu dong chay slide menu root
    }, time_change_slide);
    }
    })
    
    })
    </script>
</div>
<script type="text/javascript">
var menuHomeConfig= {
menuDomEle: $.id("menu"),
rootDomEle: $.id("menu_home_root"),
rootListDomEle: $.id("menu_home_root").find("li"),
rootLength: 16,
childDomEle: $.id("menu_home_navigate"),
rootSelected: 0,
cacheList: [],
autoInterval: null,
leaveTimeout: null,
eventCtDomEle: $.id("menu_content_event")
};

var menuHLinkConfig= {
menuDomEle: $.id("menu_link"),
eventDomEle: $.id("menu_link").find('.a_event_promotions')
};

var menuEventConfig= {
menuDomEle: $.id("menu_event_promotions"),
menuListDomEle: $.id("menu_event_promotions").find("li"),
menuADomEle: $.id("menu_event_promotions").find("li a")
};

var slideEventConfig= {
slideDomEle: $.id("carousel_event_promotions"),
itemDomEle: $.id("carousel_event_promotions").find(".item"),
imgDomEle: $.id("carousel_event_promotions").find(".main_banner"),
sImgDomEle: $.id("carousel_event_promotions").find(".small_banner"),
pageDomEle: $.id("carousel_event_promotions").find(".carousel-indicators"),
pageListDomEle: $.id("carousel_event_promotions").find(".carousel-indicators li"),
index_change: null
};

function autoChangeMenu(){
var key= (menuHomeConfig.rootSelected == 0 ? 0 : menuHomeConfig.rootDomEle.find(".selected").index() + 1);
if(key >= menuHomeConfig.rootLength) key = 0;
var iData= menuHomeConfig.rootListDomEle.eq(key).attr("iData");
changeMenu(iData);
menuHomeConfig.rootSelected= iData;
menuHomeConfig.rootListDomEle.removeClass("hover selected");
menuHomeConfig.rootListDomEle.eq(key).addClass("selected");
};

function changeMenu(id){
// Khi chay slide menu root
menuHLinkConfig.eventDomEle.removeClass('active');
menuHomeConfig.eventCtDomEle.hide(); // An event carousel 
slideEventConfig.slideDomEle.carousel('pause'); // Dung event carousel

if(menuHomeConfig.rootSelected == id) return;
if(menuHomeConfig.rootSelected > 0) document.getElementById("menu_content_" + menuHomeConfig.rootSelected).style.display = "none";
var domEle= $("#menu_content_" + id); //alert(domEle);
$("#menu_content_" + id).removeClass("effects").css("display", "block");
if(typeof(vatgiaConfig.cache_data["menu_content_" + id]) == "undefined"){
//vatgiaConfig.cache_data["menu_content_" + id]= $.ajax({ url: vatgiaConfig.con_ajax_path + "load_menu_content.php?iData=" + id, cache: false, async: false }).responseText;
//domEle.html(vatgiaConfig.cache_data["menu_content_" + id]);
domEle.find(".main_banner").load(function(){ domEle.addClass("effects"); });
}
else setTimeout(function(){ domEle.addClass("effects"); }, 100);
}

function menuHomeMouseLeave(){
menuHomeConfig.rootListDomEle.removeClass("hover");
menuHomeConfig.childDomEle.css("display", "none");
}

menuHomeConfig.menuDomEle.hover(
function(e){ clearInterval(menuHomeConfig.autoInterval); },
function(e){
if(!$(e.relatedTarget).hasClass('a_event_promotions') && slideEventConfig.index_change == null){
menuHomeConfig.autoInterval && clearInterval(menuHomeConfig.autoInterval);
menuHomeConfig.autoInterval = setInterval(autoChangeMenu, 5000);
}
if(slideEventConfig.index_change != null) slideEventConfig.slideDomEle.carousel('cycle'); // Dung event carousel
if(menuHomeConfig.eventCtDomEle.css('display') == 'block') slideEventConfig.index_change = parseInt(slideEventConfig.pageDomEle.find('.active').attr('data-slide-to'));
}
);
menuHomeConfig.rootDomEle.hover(
function(){ clearTimeout(menuHomeConfig.leaveTimeout); },
function(){ menuHomeConfig.leaveTimeout= setTimeout(function(){ menuHomeMouseLeave(); }, 200); }
);
menuHomeConfig.childDomEle.hover(
function(){ clearTimeout(menuHomeConfig.leaveTimeout); },
function(){ menuHomeConfig.leaveTimeout= setTimeout(function(){ menuHomeMouseLeave(); }, 200); }
);

$(function(){
menuHomeConfig.rootDomEle.menuAim({
activate: function(domEle){
menuHomeConfig.rootListDomEle.removeClass("hover selected");
$(domEle).addClass("hover selected");
var iData= $(domEle).attr("iData");
changeMenu(iData);
menuHomeConfig.rootSelected= iData;
if($(domEle).hasClass("empty")) menuHomeConfig.childDomEle.css("display", "none");
else{
menuHomeConfig.childDomEle.css("display", "block").find("li").css("display", "none");
$.id("menu_home_" + iData).css("display", "block");
}
},
enter: function(domEle){ if($(domEle).hasClass("selected")) $(domEle).addClass("hover"); },
exitMenu: function(){ return true; }
});
});
</script>