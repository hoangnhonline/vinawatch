<?php
$cate_id = $parent_id = -1;
$page_show = 5;
if(isset($_GET['tu-khoa'])){
  $keyword = $_GET['tu-khoa'];  
}else{
  $keyword= null;
}
if(strlen($keyword) > 3){

 	$giatu = isset($_GET['min']) ? (int) $_GET['min'] : -1;
 	$giaden = isset($_GET['max']) ? (int) $_GET['max'] : -1;
  	$arrTotal = $model->getListProductSearch($keyword, $giatu, $giaden, -1, -1);
  	$limit = 18;
  	$page = isset($_GET['trang']) ? (int) $_GET['trang'] : 1;
  	$total_page = ceil($arrTotal['total'] / $limit);
  	$offset = $limit * ($page - 1);
  	$arrList = $model->getListProductSearch($keyword, $giatu, $giaden, $offset, $limit);
  
$link = $_SERVER['REQUEST_URI'];
$link_s = strstr($link, '.html', -1);
$link_s = $link_s.".html";
if(strpos($link,"&trang") >0 ){
  $link = strstr($link, '&trang', true);  
}
if(strpos($link,"?trang") >0 ){
  $link = strstr($link, '?trang', true);  
}
}

?>
<div class="secondary_page_wrapper">

	<div class="container">

		<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

		<ul class="breadcrumbs">

			<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
			<li><a href="#">Tìm kiếm</a></li>		

		</ul>

		<div class="row">

			<?php include "blocks/cate/left.php"; ?>
			<main class="col-md-9 col-sm-8">

				

				<!-- - - - - - - - - - - - - - End of today's deals - - - - - - - - - - - - - - - - -->

				<section class="section_offset">

					<h2>Kết quả tìm kiếm</h2>				
					<p style="font-weight: bold; font-size: 17px;margin-bottom:15px;float:left">
							Từ khóa: <span style="color:#ED1C24"><?php echo $model->processData($_GET['tu-khoa']); ?></span>

						</p>
				</section>

				<!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->

				<div class="section_offset" id="list-product-search">				
					<div class="table_layout" id="products_container">

						
						<div class="table_row">
						<?php
								if($arrTotal['total'] == 1) $cl = 'col-md-4';
								elseif($arrTotal['total'] == 2) $cl = 'col-md-6';
								else $cl = '';
				                if(!empty($arrList['data'])){
				                $i = ($page-1) * 21;
				                foreach($arrList['data'] as $value){
				                $i++;
				            ?>
						

							<!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
							
							<div class="table_cell <?php echo $cl; ?>">

								<div class="product_item">
									<?php if($value['percent_deal'] > 0){ ?>
									<div class="sale-percent"> -<?php echo $value['percent_deal']?>%</div>
									<?php } ?>
									<!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->
									<div class="image_wrap" style="cursor:pointer" onclick="location.href='<?php echo $model->getLinkProduct($value['product_id']); ?>/<?php echo $value['product_alias']; ?>.html'">
										
											<img src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['product_name']; ?>">
										

										<!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->

										<div class="actions_wrap">

											<div class="centered_buttons">												
												<a href="<?php echo $model->getLinkProduct($value['product_id']); ?>/<?php echo $value['product_alias']; ?>.html" class="button_blue middle_btn add_to_cart">
													Xem ngay
												</a>

											</div><!--/ .centered_buttons -->
											
										
										</div><!--/ .actions_wrap-->
										
										<!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

									</div><!--/. image_wrap-->

									<!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->

									<!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->

									<div class="description">
										
										<a href="<?php echo $model->getLinkProduct($value['product_id']); ?>/<?php echo $value['product_alias']; ?>.html">
											<?php echo $value['product_name']; ?>
										</a>

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
								</div><!--/ .product_item-->

							</div>

							<!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->

							
						<?php if( $i%3 == 0 ) echo "</div><div class='table_row'>"; }}else{ ?>
			            <h3 style="background-color:#FFF;padding:10px">Chưa có sản phẩm nào!</h3>
			            <?php } ?>
						</div><!--/ .table_row -->
						
				

					</div><!--/ .table_layout -->
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

				<!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->

			</main>

		</div><!--/ .row -->

	</div><!--/ .container-->

</div>

<input type="hidden" name="link" value="<?php echo $link_s; ?>" id="link_search" />
<input type="hidden" name="min" value="<?php echo $giatu; ?>" id="giatu" />
<input type="hidden" name="max" value="<?php echo $giaden; ?>" id="giaden" />


<style type="text/css">
ul.pagination li.active, .pager li.active {
  background-color: #0096d4;
  color: #FFF;
}
div.pagination ul li, ul.pagination li {
  display: inline-block;
  overflow: hidden;
  padding: 0;
  float: left;
  margin: 4px 1px;
}
</style>
<script>
  $(function(){   
  $('input.check_price').click(function(){
      var obj = $(this);
      var check = $(this).prop('checked');
      var min = $(this).attr('min');
      var max = $(this).attr('max');
      $('input.check_price').prop('checked',false);
      
      if(check==true){        
        obj.prop('checked',true);
        $('#giatu').val($(this).attr('min'));
        $('#giaden').val($(this).attr('max'));
      }else{        
        obj.prop('checked',false);
        $('#giatu').val(-1);
        $('#giaden').val(-1);
      }
      search();
  });
  $(document).on('click','.pagination a',function(){
    $('#page_search').val($(this).attr('data-page'));
    search();
  });
});
function search(){
  var link = $('#link_search').val() + '?tu-khoa=<?php echo $model->processData($_GET["tu-khoa"]); ?>';
   
  var tmp = $('#giatu').val();
  if(tmp >= 0){
    link += "&min=" + $('#giatu').val();
  }
  var tmp = $('#giaden').val();
  if(tmp > 0){
    link += "&max=" + $('#giaden').val();
  }
  location.href= link;
}
</script>