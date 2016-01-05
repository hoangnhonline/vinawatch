<div class="row">
	<?php            
$cateTypeArr = $model->getListCateType();
    $i = 0;

    if(!empty($cateTypeArr)){                   

    foreach($cateTypeArr as $catetype){

    $i++;
    $cate_type_id = $catetype['id'];

?>
<div class="category_box">
<div style="background-color:#fafaf8; margin-top: -10px;">
      <div class="col-md-2 col-sm-4 col-xs-12"  style="padding-left:0px;padding-right:3px"> 
        <a href="javascript:;" class="menu-danh-muc" title="<?php echo $catetype['cate_type_name']; ?>">
          <div class="title" > 
            <h2> <?php echo $catetype['cate_type_name']; ?> </h2>
          </div>
        </a>
        
             <?php 
              $arrManu = $model->getListDetailManuCateType($cate_type_id);              
              if(!empty($arrManu)){
              ?>
              <div style="text-align:center;padding-left:10px !important;">
              <ul class="bxslider">
            <!-- Wrapper for slides -->
            
              <?php
                $k = 0;
                foreach ($arrManu as $manus) {                  
                  $k++;           

              ?>
              <li><img src="<?php echo $manus['image_url'];?>" alt="<?php echo $manus['manu_name'];?>" /></li>              
              <?php } ?>                         
            
</ul>
           </div>
            <?php } ?>
            
        <div  style="position: relative; overflow: hidden; width: auto;">
        <ul class="sub_category hidden-xs" style="overflow: hidden; width: auto;">        	
        	 <?php 
            $arrCateBlock = $model->getCateCap1ByCateType($cate_type_id);
            if(!empty($arrCateBlock)){
              foreach ($arrCateBlock as $cate) {
          ?>
                    <li>
            <h3>              
              <a title="<?php echo $cate['cate_name']; ?>" href="<?php echo $cate['cate_alias']; ?>.html"> 
                <?php echo $cate['cate_name']; ?> 
              </a> 
            </h3>
          </li> 
          <?php }} ?>         
                           
                  </ul>
                  <div style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 310px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
        <div style="clear:both"></div>       
      </div>
      <div class="col-md-4  hidden-sm hidden-xs banner"> <a title="Xem chi tiết" href="#">
        <img src="<?php echo $catetype['image_url']; ?>" alt="<?php echo $catetype['cate_type_name']; ?>" style="display: inline;"></a> 
      </div>
      <div class="items col-md-6 col-sm-8 col-xs-12">
                  <?php 
		        $arrProductHot = $model->getListProductHomePage($cate_type_id,6); 
		        if(!empty($arrProductHot)){
		          foreach ($arrProductHot as $product_hot) {
		            
		        ?>
                   <div class="col-md-4 col-sm-4 col-xs-12 item">
				                    <div class="thumb"> 
                              <a title="<?php echo $product_hot['product_name']; ?>" href="<?php echo $cate['cate_alias']; ?>/<?php echo $product_hot['product_alias']; ?>.html">
				                <img src="<?php echo $product_hot['image_url']; ?>" alt="<?php echo $product_hot['product_name']; ?>" title="<?php echo $product_hot['product_name']; ?>" style="display: inline;"></a> 
				            </div>
				        <div class="item_content">
				          
				            <h4 class="item_title">
  				            <a title="<?php echo $product_hot['product_name']; ?>" 
  				            href="<?php echo $cate['cate_alias']; ?>/<?php echo $product_hot['product_alias']; ?>.html" title="<?php echo $product_hot['product_name']; ?>">
                      <?php echo $product_hot['product_name']; ?>
                      </a>
                    </h4>
				            <div class="clearfix product_info">

                      <p class="product_price alignleft">
                        <b>
                        <?php 
                        if($product_hot['price_saleoff'] > 0){
                          echo number_format($product_hot['price_saleoff'],0,",","."); 
                        }else{
                          echo number_format($product_hot['price'],0,",","."); 
                        }
                        ?>đ
                        </b>
                      </p>
                      <p class="product_price_saleoff alignright">
                        <b>
                        <?php 
                        if($product_hot['price_saleoff'] > 0){
                          echo number_format($product_hot['price'],0,",",".")." đ"; 
                        }
                        ?>
                        </b>
                      </p>

                    </div>
				          </div>
				        </div>  
				        <?php }} ?>                
				              
				      </div>
				      <div class="clearfix"></div>
				    </div></div>	
				    <?php }} ?>

				   
				      <div class="clearfix"></div>			    
				</div>
