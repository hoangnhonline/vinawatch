<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'backend/model/Frontend.php';
$model = new Fontend;
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";
$arrText = $model->getListText();
function checkCat($uri) {

    require_once 'backend/model/Frontend.php';    
    $model = new Fontend;   

    $uri = str_replace("+", "", $uri);

    $p_detail = '#chi-tiet/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_news = '#tin-tuc/[a-z0-9\-\+]+\-\d+.html#';
     $p_cate_page = '#/[a-z0-9\-\+]+.html#';
     $p_product_detail = '#[a-z0-9\-\+]/[a-z0-9\-\+]/[a-z0-9\-\+]+.html#';
    $p_cate_news = '#danh-muc/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_event = '#su-kien/[a-z0-9\-\+]+\-\d+.html#';
    $p_tag = '#/tag/[a-z\-]+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_order = '#/quan-ly-don-hang+.html#';
    $p_orderdetail = '#/chi-tiet-don-hang+.html#';
    $p_info = '#/cap-nhat-thong-tin+.html#';
    $p_changepass = '#/doi-mat-khau+.html#';
    $p_logout = '#/thoat+.html#';
	$p_hot = '#/[a-z0-9\-]+\-+c+\d+h+\d+.html#';
	$p_sale = '#/[a-z0-9\-]+\-+c+\d+s+\d+.html#';
   

    $p_cart = '#/gio-hang+.html#';
    $p_register = '#/dang-ky+.html#';
    $p_about = '#/gioi-thieu+.html#';
    $p_thanhtoan = '#/thanh-toan+.html#';
	$p_tintuc = '#/tin-tuc+.html#';
    $p_cate =  '#/[a-z0-9\-]+\-+p+\d+.html#';    
    $p_content =  '#/[a-z0-9\-]+\-+c+\d+.html#';
    $p_search = '#/tim-kiem+.html#';
    
    $mod = $seo = "";
    $object_id = 0;   
    $arrTmp = explode('/',$uri);    
    
    if(count($arrTmp) == 4){        
        $mod = "detail";        
    }elseif(strpos($uri, 'tin-tuc/')){

        $mod = "detail-news";
        
    }elseif(strpos($uri, 'tim-kiem.')){

        $mod = "search";
        
    }elseif(strpos($uri, 'dat-hang-thanh-cong.')){

        $mod = "thanks";
        
    }elseif(strpos($uri, 'danh-muc/')){

        $mod = "cate-news";
        
    }elseif(strpos($uri, 'dang-ky')){

        $mod = "register";
        if(!empty($_SESSION['user'])){  
            $rel = isset($_GET['rel']) ? $_GET['rel'] : 'gio-hang';    
            header('location:'.$rel.'.html');
        }
        
    }elseif(strpos($uri, 'cap-nhat-thong-tin')){

        $mod = "info";        
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
       
        
    }elseif(strpos($uri, 'quan-ly-don-hang')){
       
        $mod = "order";               
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
        
    }elseif(strpos($uri, 'chi-tiet-don-hang')){
       
        $mod = "orderdetail";               
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
        
    }elseif(strpos($uri, 'doi-mat-khau')){
        $mod = "changepass";
        $seo = $model->getDetailSeo(9);
        if(empty($_SESSION['user'])){         
            header('location:dang-ky.html');
        }
    }else{ 
    	if (preg_match($p_product_detail, $uri)) {
            $mod = "product_detail";        
        }
        if (preg_match($p_cart, $uri)) {
            $mod = "cart";        
            if(empty($_SESSION['user'])){         
            //    header('location:dang-ky.html');
            }
        }
        if (preg_match($p_search, $uri)) {
            $mod = "search";        
        }	
        if (preg_match($p_cate_page, $uri)) {           
            
            $uri =  substr($uri, 1);     
            $tmp = explode(".", $uri);
            
            if($tmp[0] == "lien-he"){
                $mod = "contact";
            }elseif($tmp[0] == "thanh-toan"){
                $mod = "thanhtoan";
            }elseif($tmp[0] =="tin-tuc"){
                $mod = "news";
                $seo = $model->getDetailSeo(4);
            }else{                
                $row = $model->getDetailAlias($tmp[0]);
                if($row['type'] == 1){
                    $mod ='cate';
                }elseif($row['type'] == 2){
                    $mod ='content';
                }elseif($row['type'] == 3){
                    $mod ='catetype';
                }
                //$mod = $row['type'] == 1 ? "cate" : "content";
                $object_id = $row['object_id'];
            }
        }   
       
        if (preg_match($p_about, $uri)) {
            $mod = "about";
            $seo = $model->getDetailSeo(2);
        }
    	
        if (preg_match($p_thanhtoan, $uri)) {
            $mod = "thanhtoan";       
            if(empty($_SESSION['user'])){         
            //    header('location:dang-ky.html');
            }
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
    	if (preg_match($p_hot, $uri) || preg_match($p_sale, $uri)) { 
            $mod = "catetype";
        }
    	
        if (preg_match($p_contact, $uri)) {
            $mod = "contact";        
        }
        
        if (preg_match($p_logout, $uri)) {        
            session_destroy();
            $mod = "";
            $seo = $model->getDetailSeo(1);
        }
    }
    
    return array("seo"=>$seo, "mod" =>$mod,'object_id' => $object_id);
}

$uri = $_SERVER['REQUEST_URI'];

$arrRS = checkCat($uri);//var_dump($arrRS);die;

$mod = $arrRS['mod'];
$object_id = $arrRS['object_id']; 

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
        $product_alias = $tmp_uri[3];
        
	    $product_id = $model->getProductId($product_alias);
        $arrDetailProduct = $model->getDetailProduct($product_id);
        $data = $seo = $arrDetailProduct['data'];
        $parent_id = $data['parent_cate'];
        $cate_type_id = $data['cate_type_id'];
        $product_relate = $data['product_relate'];
        $_SESSION['view'][$product_id] = $data;        
        $arrRelated = $model->getProductRelated($parent_id,$product_id, $product_relate);         
        $arrDetailCate =$model->getDetailCate($parent_id); 
        $arrDetailCateType =$model->getDetailCateType($cate_type_id); 
        break;
    case "detail-news":
        $article_alias = $tmp_uri[2];   
        $article_id = $model->getArticleId($article_alias);
        $data = $seo = $model->getDetailArticles($article_id);   
        $cate_id = $data['cate_id'];    
        $detailCate =  $model->getDetailCateArticles($cate_id);     
	    break; 
    case "cate-news":
        $cate_alias = $tmp_uri[2];           
        $cate_id = $model->getCateArticleId($cate_alias);
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
    case "catetype":  
        $tieude_id = $tmp_uri[1];   
        if(strpos($tieude_id,'?trang')>0){
            $tieude_id = strstr($tieude_id, '?trang', true);
        }           
        
        $tmp = explode("-",$tieude_id);
        $str1 = end($tmp);
        if(strpos($str1, "h")){
            $tmp2 = explode("h", $str1);
            $hot = end($tmp2);    
            $is_saleoff = -1;
        }
        if(strpos($str1, "s")){
            $tmp2 = explode("s", $str1);
            $is_saleoff = end($tmp2);    
            $hot = -1;
        }
        
        $cate_type_id_s = $object_id;
        //echo $cate_type_id_s; die;
        $arrDetailCateType = $model->getDetailCateType($cate_type_id_s);       
        break;                 
    case "cate":
     
        $parent_id = $object_id; 

        if($parent_id > 0){
            $arrDetailCate = $seo = $model->getDetailCate($parent_id);                      
            $arrDetailCateType = $model->getDetailCateType($arrDetailCate['cate_type_id']);
        }
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
        $page_id = $object_id; 
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
