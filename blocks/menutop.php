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
              
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
           
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php $arr = $model->getListBannerByPosition(1,-1); ?>
            <?php
              if(!empty($arr)){           
                $countSide = 0;
                  foreach($arr as $img){                        
                    $countSide++;
                        $link_url = "";
                        if($img['type_id'] == 2){
                            $link_url = "su-kien/".$img['name_en']."-".$img['id'].".html";
                        }
                        if($img['type_id'] == 3){
                            $link_url = $img['link_url'];
                        }
              ?>
              <div class="item <?php echo $countSide == 1  ? "active" : ""; ?>">
                <?php if($link_url!=""){ ?><a href="<?php echo $link_url;?>"><?php } ?>
                  <img src="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_event']; ?>"/>
               <?php if($link_url!=""){ ?></a><?php } ?>
              </div>
              <?php }} ?>              
            </div>
          
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
      </div>
      <div class="banner-main2">
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
        <?php if($link_url1!=""){ ?><a href="<?php echo $link_url1;?>"><?php } ?>
                  <img src="<?php echo $img1['image_url']; ?>" alt="<?php echo $img1['name_event']; ?>"/>
                <?php if($link_url1!=""){ ?></a><?php } ?>
        <?php }} ?>
        
      </div>
  </div>
</div>