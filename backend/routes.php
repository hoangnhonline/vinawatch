<?php
session_start();
require_once 'backend/model/Frontend.php';
$model = new Fontend;
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";
$arrText = $model->getListText();
function checkCat($uri) {
    require_once 'backend/model/Frontend.php';
    $model = new Fontend;
    $uri = str_replace("+", "", $uri);
    $p_detail = '#details/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_news = '#tin-tuc/[a-z0-9\-\+]+\-\d+.html#';
    $p_cate_news = '#danh-muc/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_event = '#su-kien/[a-z0-9\-\+]+\-\d+.html#';
    $p_tag = '#/tag/[a-z\-]+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_order = '#/quan-ly-don-hang+.html#';
    $p_orderdetail = '#/chi-tiet-don-hang+.html#';
    $p_info = '#/cap-nhat-thong-tin+.html#';
    $p_changepass = '#/doi-mat-khau+.html#';
    $p_logout = '#/thoat+.html#';
	$p_hot = '#/san-pham-noi-bat+.html#';
	$p_sale = '#/san-pham-giam-gia+.html#';
    $p_cart = '#/gio-hang+.html#';
    $p_register = '#/dang-ky+.html#';
    $p_about = '#/gioi-thieu+.html#';
    $p_thanhtoan = '#/thanh-toan+.html#';
	$p_tintuc = '#/tin-tuc+.html#';
    $p_cate =  '#/[a-z0-9\-]+\-+p+\d+c+\d+.html#';    
    $p_content =  '#/[a-z0-9\-]+\-+c+\d+.html#';
    $p_search = '#/tim-kiem+.html#';
    $mod = "";
    $page_id = "";
    
	if (preg_match($p_register, $uri)) {
        $mod = "register";
        if(!empty($_SESSION['user'])){         
            header('location:gio-hang.html');
        }
    }
    if (preg_match($p_cart, $uri)) {
        $mod = "cart";        
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }
    if (preg_match($p_search, $uri)) {
        $mod = "search";        
    }	
    if (preg_match($p_order, $uri)) {
        $mod = "order";               
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }
    if (preg_match($p_info, $uri)) {
        $mod = "info";        
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }
    if (preg_match($p_changepass, $uri)) {
        $mod = "changepass";
        $seo = $model->getDetailSeo(9);
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }
    if (preg_match($p_about, $uri)) {
        $mod = "about";
        $seo = $model->getDetailSeo(2);
    }
	
    if (preg_match($p_thanhtoan, $uri)) {
        $mod = "thanhtoan";       
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }

    if (preg_match($p_detail, $uri)) {
        $mod = "detail";
    }
    if (preg_match($p_detail_news, $uri)) {
        $mod = "detail-news";
    }
    if (preg_match($p_detail_event, $uri)) {
        $mod = "detail-event";
    }
	if (preg_match($p_tintuc, $uri)) {
        $mod = "news";
        $seo = $model->getDetailSeo(4);
    }
    if (preg_match($p_cate_news, $uri)) {
        $mod = "cate-news";
    }
    
    if (preg_match($p_cate, $uri)) {
        $mod = "cate";
    }
    if (preg_match($p_content, $uri)) {
        $mod = "content";
    }
	if (preg_match($p_hot, $uri)) {
        $mod = "hot";
    }
	if (preg_match($p_sale, $uri)) {
        $mod = "sale";
    }
    if (preg_match($p_contact, $uri)) {
        $mod = "contact";        
    }
    if (preg_match($p_orderdetail, $uri)) {
        $mod = "orderdetail";
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }
    if (preg_match($p_logout, $uri)) {        
        session_destroy();
        $mod = "";
        $seo = $model->getDetailSeo(1);
    }
    return array("seo"=>$seo, "mod" =>$mod,'page_id' => $page_id);
}
$uri = $_SERVER['REQUEST_URI'];
$arrRS = checkCat($uri);
$mod = $arrRS['mod'];
$page_id = $arrRS['page_id'];
$uri = str_replace(".html", "", $uri);
$tmp_uri = explode("/", $uri);
if($mod==''){
	if(isset($_GET["payment"]) && $_GET['payment']=="success"){
		unset($_SESSION["cart"]);
	}
}
switch ($mod) {
    case "news":
		$tieude_id = $tmp_uri[1];
        $arr = explode("-", $tieude_id);
		$page = (int) end($arr);
		$page = ($page==0) ? 1 : $page;
        $seo = $model->getDetailSeo(4);        
        break;
    case "cart" : 
        $seo = $model->getDetailSeo(5);
        break;
    case "register" : 
         $seo = $model->getDetailSeo(11);
         break;
    case "search" : 
        $seo = $model->getDetailSeo(10);
        break;
    case "sale" : 
        $seo = $model->getDetailSeo(12);
        break;
    case "hot" : 
        $seo = $model->getDetailSeo(13);
        break;
    case "order" : 
        $seo = $model->getDetailSeo(7); 
        break;
    case "changepass" : 
        $seo = $model->getDetailSeo(9); 
        break;
    case "thanhtoan" : 
         $seo = $model->getDetailSeo(6);
         break;
    case "contact": 
        $seo = $model->getDetailSeo(3);              
        break;
    case "info" : 
        $seo = $model->getDetailSeo(8);
        break;
    case "detail":
        $tieude_id = $tmp_uri[2];	
        $arr = explode("-", $tieude_id);
	    $product_id = (int) end($arr);
        $arrDetailProduct = $model->getDetailProduct($product_id);
        $data = $seo = $arrDetailProduct['data'];
        $cate_id = $data['cate_id'];        
        $_SESSION['view'][$product_id] = $data;        
        $arrRelated = $model->getProductRelated($cate_id,$product_id);  
        break;
    case "detail-news":
        $tieude_id = $tmp_uri[2];   
        $arr = explode("-", $tieude_id);
        $article_id = (int) end($arr);
        $data = $model->getDetailArticles($article_id);   
        $cate_id = $data['cate_id'];    
        $detailCate = $seo = $model->getDetailCateArticles($cate_id);     
	    break; 
    case "cate-news":
        $tieude_id = $tmp_uri[2];   
        $arr = explode("-", $tieude_id);
        $cate_id = (int) end($arr);
        $detailCate = $seo = $model->getDetailCateArticles($cate_id);       
        break; 
    case "detail-event":
        $tieude_id = $tmp_uri[2];   
        $arr = explode("-", $tieude_id);
        $banner_id = (int) end($arr);        
        $data = $model->getDetailBanner($banner_id);  
        $seo['meta_title'] = $data['name_event'];
        $seo['meta_description'] = $data['name_event'];
        $seo['meta_keyword'] = $data['name_event'];
        break;                  
    case "cate":
        $tieude_id = $tmp_uri[1];    
		if(strpos($tieude_id,'?trang')>0){
			$tieude_id = strstr($tieude_id, '?trang', true);
		}
        $arr = explode("-", $tieude_id);
        $tmp1 = explode('c',end($arr));    		
        $cate_id = $tmp1[1];        
        $parent_id = str_replace('p', '',$tmp1[0]);
        if($cate_id > 0){
            $arrDetailCate = $seo = $model->getDetailCate($cate_id);
        }
        if($parent_id > 0){
            $arrDetailCateParent =  $model->getDetailCate($parent_id);            
            $arrCateChildCatePage = $model->getListCateNoTreeByParent($parent_id);              
            if($cate_id == 0) $seo = $arrDetailCateParent;
        }
        break;
	 case "hot":
        $tieude_id = $tmp_uri[1];    
		if(strpos($tieude_id,'?trang')>0){
			$tieude_id = strstr($tieude_id, '?trang', true);
		}       	
        $cate_id = -1;        
        $parent_id = -1;
        break;
    case "sale":
        $tieude_id = $tmp_uri[1];    
		if(strpos($tieude_id,'?trang')>0){
			$tieude_id = strstr($tieude_id, '?trang', true);
		}       	
        $cate_id = -1;        
        $parent_id = -1;
        break;
    case "orderdetail":
        $order_id = isset($_GET['order']) ? (int) $_GET['order']: 0;        
        break;
    case "content":
        $tieude_id = $tmp_uri[1];          
        $arr = explode("-", $tieude_id);
        $tmp1 = explode('c',end($arr));        
        $page_id = $tmp1[1]; 
        $data = $seo = $model->getDetailPage($page_id);
        break;
    case "page":
        $rs_article = $modelHome->getDetailPage($page_id);
        $arrDetailPage = mysql_fetch_assoc($rs_article);
        break;
    default :    
        $seo = $model->getDetailSeo(1);
        break;
}
?>
