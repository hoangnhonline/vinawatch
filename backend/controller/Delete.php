<?php 
if(!isset($_SESSION)) 
{
     session_start(); 
}  
require_once "../model/Backend.php";
$model = new Backend;

$id = $_POST['id'];

$mod = $_POST['mod'];

if($mod=='post'){
    // xoa post
    $sql = "DELETE FROM post WHERE post_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	// xoa images
	$sql = "DELETE FROM images WHERE object_id = $id AND object_type = 1";
	mysql_query($sql) or die(mysql_error() . $sql);

	$sql = "DELETE FROM post_addon WHERE post_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit;
}elseif($mod=='block'){
    // xoa project
    $sql = "DELETE FROM block WHERE block_id = $id";

	mysql_query($sql) or die(mysql_error() . $sql);	
	mysql_query("DELETE FROM link WHERE block_id = $id");
	exit;
}elseif($mod=='product'){
    //xoa articles
    $sql = "DELETE FROM product WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	//xoa images
	$sql = "DELETE FROM images WHERE object_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='article_cate'){
    //xoa articles
    $sql = "DELETE FROM article_cate WHERE cate_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	//xoa images
	$sql = "DELETE FROM articles WHERE cate_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='articles'){
    //xoa articles
    $sql = "DELETE FROM articles WHERE article_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='text'){
    //xoa articles
    $sql = "DELETE FROM text WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='coupon_data'){
    //xoa articles
    $sql = "DELETE FROM coupon_data WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='city'){
    //xoa articles
    $sql = "DELETE FROM city WHERE city_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);

	$sql = "DELETE FROM state WHERE city_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='state'){
    //xoa articles
    $sql = "DELETE FROM state WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit();
}elseif($mod=='feedback'){
    //xoa articles
    $sql = "DELETE FROM feedback WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}
elseif($mod=='users'){
    //xoa articles
    $sql = "DELETE FROM users WHERE user_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='page'){
    //xoa articles
    $sql = "DELETE FROM pages WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);

	$sql = "DELETE FROM url WHERE object_id = $id AND type = 2";
	mysql_query($sql) or die(mysql_error() . $sql);
	
	exit();
}elseif($mod=='image'){
    $pk = 'image_id';
}
elseif($mod=='images'){   
    $sql = "DELETE FROM images WHERE image_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit;
}elseif($mod=="catetype"){
	//xoa articles
    $sql = "DELETE FROM cate_type WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	//xoa images
	$sql = "DELETE FROM cate WHERE cate_type_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);

	$sql = "DELETE FROM product WHERE cate_type_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit;
}elseif($mod=="cate"){	
	//xoa images
	$sql = "DELETE FROM cate WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);

	$sql = "DELETE FROM url WHERE object_id = $id AND type = 1";
	mysql_query($sql) or die(mysql_error() . $sql);

	$sql = "DELETE FROM product WHERE cate_id = $id OR parent_id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit;
}
elseif($mod=="order"){	
	//xoa images
	$sql = "DELETE FROM order_info WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);	
	exit;
}
elseif($mod=="sendcontent"){	
	//xoa images
	$sql = "DELETE FROM sendcontent WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit;
}elseif($mod=="content"){	
	//xoa images
	$sql = "DELETE FROM content WHERE id = $id";
	mysql_query($sql) or die(mysql_error() . $sql);
	exit;
}
$time = time();

$sql = "UPDATE ".$mod." SET status = 0 WHERE ".$pk." = ".$id;                 
mysql_query($sql) or die(mysql_error() . $sql);
?>