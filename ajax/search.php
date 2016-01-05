<?php
require_once "../backend/model/Frontend.php";
$model = new Fontend;

$cate_id = isset($_POST['cate_id']) ? $_POST['cate_id'] : -1;
$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
$giatu = isset($_POST['giatu']) ? $_POST['giatu']  : '';
$giaden = isset($_POST['giaden']) ? $_POST['giaden'] : '';
$age_range = isset($_POST['age_range']) ? $_POST['age_range'] : '';
$hot = isset($_POST['hot']) ? $_POST['hot'] : '';
$is_new = isset($_POST['is_new']) ? $_POST['is_new'] : '';
$is_saleoff = isset($_POST['is_saleoff']) ? $_POST['is_saleoff'] : '';
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$catetype = isset($_POST['catetype']) ? $_POST['catetype'] : '';
$page = isset($_POST['page_search']) ? (int) $_POST['page_search'] : 1;

//$cate_id = $_POST['cate_id'];

$cate_id = $cate_id == 0 ?  -1 : $cate_id;

$page_show = 5;
if($catetype !=''){
   $arrTotal = $model->getListProductCateTypeSearch($catetype,$giatu,$giaden, -1, -1); 
} else {
   $arrTotal = $model->getListProductCate($keyword,$parent_id,$cate_id,$giatu,$giaden,$age_range,$hot,$is_saleoff,$is_new, -1, -1);  
}

$limit = 20;

$total_page = ceil($arrTotal['total'] / $limit);

$offset = $limit * ($page - 1);
if($catetype != ''){
   $arrList = $model->getListProductCateTypeSearch($catetype,$giatu,$giaden,$offset, $limit); 
} else {
   $arrList = $model->getListProductCate($keyword,$parent_id,$cate_id,$giatu,$giaden,$age_range,$hot,$is_saleoff,$is_new,$offset, $limit);  
}
$link = $_SERVER['REQUEST_URI'];
if(strpos($link,"?trang") >0 ){
  $link = strstr($link, '?trang', true);  
}
?>
<div class="section_offset" id="list-product-search">
      <div class="table_layout" id="products_container">
        <div class="table_row" >
        <?php
                if(!empty($arrList['data'])){
                $i = ($page-1) * 21;
                foreach($arrList['data'] as $value){
                $i++;
            ?>
          <div class="table_cell ">
            <div class="product_item">
                <?php if($value['percent_deal'] > 0){ ?>
				<div class="sale-percent"> -<?php echo $value['percent_deal']?>%</div>
				<?php } ?>
                <div class="image_wrap" onclick='location.href="<?php echo $model->getLinkProduct($value['id']); ?>/<?php echo $value['product_alias']; ?>.html"'>

    				<img src="<?php echo $value['image_url']; ?>" alt="">
    
    				<!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->
    
    				<div class="actions_wrap">
    
    					<div class="centered_buttons">
    						<?php if(isset($_SESSION['user']) && $_SESSION['user']){ ?>
    						<a href="javascript:;" class="button_dark_grey middle_btn quick_view" data-value="<?php echo $value['id']?>" >Yêu thích</a>
    						<?php } ?>
    						<a href="<?php echo $model->getLinkProduct($value['id']); ?>/<?php echo $value['product_alias']; ?>.html" class="button_blue middle_btn add_to_cart">Xem ngay</a>
    
    					</div><!--/ .centered_buttons -->
    					
    				
    				</div><!--/ .actions_wrap-->
    				
    				<!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->
    
    			</div><!--/. image_wrap-->
                <div class="description">
					<a href="<?php echo $model->getLinkProduct($value['id']); ?>/<?php echo $value['product_alias']; ?>-<?php echo $value['id']?>.html"><?php echo $value['product_name']; ?></a>
					<div class="clearfix product_info">
						<p class="product_price alignleft">
							<b>
							<?php 
							if($value['price_saleoff'] > 0){
								echo number_format($value['price_saleoff'],0,",","."); 
							}else{
								echo number_format($value['price'],0,",","."); 
							}
							?>đ
							</b>
						</p>
						<p class="product_price_saleoff alignright">
							<b>
							<?php 
							if($value['price_saleoff'] > 0){
								echo number_format($value['price'],0,",",".")." đ"; 
							}
							?>
							</b>
						</p>
					</div>
				</div>
            </div>
          </div>
          <?php if( $i%3 == 0 ) echo "</div><div class='table_row'>";  }}else{ ?>          
          <h3 style="color:red;font-style:italic;text-align:center">Không tìm thấy sản phẩm nào !</h3>
          <?php } ?>        
        </div>
        
      </div>
      <?php  if(!empty($arrList['data'])){ ?>
	<footer class="bottom_box on_the_sides">

		<div class="left_side">
			

		</div>

		<div class="right_side">
			<?php echo $model->phantrang($page,$page_show,$total_page,$link); ?>  									

		</div>

	</footer>
	<?php } ?>
</div>