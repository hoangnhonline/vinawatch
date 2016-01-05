<?php 

$url = "../index.php?mod=product&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = (int) $_POST['product_id'];

$table = "product";

$cateTypeArr = $_POST['cate_type_id'];
$arrCate = $_POST['cate_id'];

$arr['deal_amount'] = $deal_amount = (int) $_POST['deal_amount'];
$arr['da_ban'] = $da_ban = (int) $_POST['da_ban'];

$arr['start_date'] = $start_date = $_POST['start_date']!='' ? strtotime($_POST['start_date']) : 0;
$arr['end_date'] = $end_date = $_POST['end_date']!='' ? strtotime($_POST['end_date']) : 0;

$arr['product_code'] = $product_code = $model->processData($_POST['product_code']);
$arr['product_name'] = $product_name = $model->processData($_POST['product_name']);
$arr['name_en'] = $name_en = $model->processData($_POST['name_en']);

$arr['product_alias'] = $product_alias = $model->changeTitle($product_name);

$arr['is_hot'] = $is_hot = (int) $_POST['is_hot'];
$arr['is_new'] = $is_new = (int) $_POST['is_new'];
$arr['hidden'] = $hidden = (int) $_POST['hidden'];
$arr['trangthai'] = $trangthai = (int) $_POST['trangthai'];
$arr['is_saleoff'] = $is_saleoff = (int) $_POST['is_saleoff'];

$arr['percent_deal'] = $percent_deal = $_POST['percent_deal'];

$arr['size'] = $size = $_POST['size'];
$arr['color'] = $color = $_POST['color'];

$arr['price'] = $price = str_replace(",","", $_POST['price']);
$arr['price_saleoff'] = $price_saleoff = str_replace(",","", $_POST['price_saleoff']);

$arr['display_order'] = 1;

$arr['description'] = $description = nl2br($_POST['description']);

$arr['content'] = $content = mysql_real_escape_string($_POST['content']);

$arr['guide_use'] = $guide_use = mysql_real_escape_string($_POST['guide_use']);

$arr['guarantee'] = $guarantee = $_POST['guarantee'];
$arr['created_at'] = $created_at = time();
$arr['updated_at'] = $updated_at = time();

$meta_title = $model->processData($_POST['meta_title']);

$meta_description = $model->processData($_POST['meta_description']);

$meta_keyword = $model->processData($_POST['meta_keyword']);

if($meta_title =='') $meta_title = $product_name;
if($meta_description =='') $meta_description = $product_name;
if($meta_keyword =='') $meta_keyword = $product_name;

$arr['meta_title'] = $meta_title;
$arr['meta_description'] = $meta_description;
$arr['meta_keyword'] = $meta_keyword;
$arr['image_url'] = $image_url = str_replace('../', '', $_POST['image_url']);
$arr['video_url'] = $video_url = $_POST['video_url'];

$str_image = $_POST['str_image'];
//san pham cung loai
if(isset($_POST['sprelate']) && count($_POST['sprelate'])>0){
    $arr['product_relate'] = implode(',', $_POST['sprelate']);    
}else{
    $arr['product_relate'] = null;
}
if($id > 0) {	
	$arr['id'] = $id;
	$model->update($table,$arr);
    $model->insertProductCate($arrCate, $id);
	$arrTmp = array();
    if($str_image){
        $arrTmp = explode(';', $str_image);
    }            
    if(!empty($arrTmp)){
        foreach ($arrTmp as $url1) {
            if($url1){                       
                $url_1 =  str_replace('.', '_2.', $url1);                        
                mysql_query("INSERT INTO images VALUES(null,'$url1','$url_1',$id,1,1)") or die(mysql_error().$sql);                
            }
        }
    }
	header('location:'.$url);
}else{
	$id = $model->insert($table,$arr);

    $model->insertProductCate($arrCate, $id);

	$arrTmp = array();
    if($str_image){
        $arrTmp = explode(';', $str_image);
    }    
    if(!empty($arrTmp)){
        foreach ($arrTmp as $url) {
            if($url){                       
                $url_1 =  str_replace('.', '_2.', $url);                        
                mysql_query("INSERT INTO images VALUES(null,'$url','$url_1',$id,1,1)") or die(mysql_error());
            }
        }
    }	
}
header('location:'.$url);