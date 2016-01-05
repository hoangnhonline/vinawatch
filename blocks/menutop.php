<link rel="stylesheet" href="css/stylecate.css" />
<div class="section-menu-banner">
  <div class="wrapper">
    <ul class="menu-category-product">
        <?php 
$cateTypeArr = $model->getListCateType();
  $i = 0;

  if(!empty($cateTypeArr)){       

  foreach($cateTypeArr as $catetype){

  $i++;
  $cate_type_id = $catetype['id'];
?>
      <li class="has-sub"><a href="<?php echo $catetype['cate_type_alias'];?>.html">
        <?php echo $catetype['cate_type_name']; ?>
        <b class="arrow_down"></b></a>
        <ul class="menu-child">
             <?php 
        $arrCateBlock = $model->getCateCap1ByCateType($cate_type_id);
                if(!empty($arrCateBlock)){
                  foreach ($arrCateBlock as $cate) {
        ?>
          <li><a href="<?php echo $cate['cate_alias']; ?>.html"><?php echo $cate['cate_name']; ?></a></li>
          <?php
        }}
        ?>
        </ul>
      </li>
<?php }}?>                
    </ul>
    <div class="banner-main">
      <img src="http://vinawatch.vn/upload/images/2015/12/12/banner2-2.jpg">
    </div>
    <div class="banner-main2">
      <img src="http://vinawatch.vn/upload/images/2015/12/12/bannerleft-4.jpg">
      <img src="http://vinawatch.vn/upload/images/2015/12/12/bannerleft-5.jpg">
    </div>
  </div>
</div>