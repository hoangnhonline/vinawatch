<title>Danh mục sản phẩm</title>
<?php

$page_show = 5;
$keyword = '';
$arrTotal = $model->getListProductCateType($cate_type_id_s, -1, -1);
$limit = 15;
$page = isset($_GET['trang']) ? (int) $_GET['trang'] : 1;
$total_page = ceil($arrTotal['total'] / $limit);
$offset = $limit * ($page - 1);

$arrList = $model->getListProductCateType($cate_type_id_s,$offset, $limit);
$link = $_SERVER['REQUEST_URI'];
if(strpos($link,"?trang") >0 ){
  $link = strstr($link, '?trang', true);  
}

?>
<div class="secondary_page_wrapper">

	<div class="container">

		<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

		<ul class="breadcrumbs">

			<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">Trang chủ</a></li>
			<li><a href="#"><?php echo $arrDetailCateType['cate_type_name']; ?></a></li>								
			<li><?php if($hot==1) { ?>Sản phẩm bán chạy <?php } if($is_saleoff == 1){ ?>Sản phẩm khuyến mãi <?php } ?></li>

		</ul>

		<div class="row">

			<?php include "blocks/cate/left.php"; ?>
			<main class="col-md-9 col-sm-8">

				

				<!-- - - - - - - - - - - - - - End of today's deals - - - - - - - - - - - - - - - - -->

				<section class="section_offset">

					<h2><?php if($hot==1) { ?>Sản phẩm bán chạy <?php } if($is_saleoff == 1){ ?>Sản phẩm khuyến mãi <?php } ?></h2>				

				</section>

				<!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->

				<div class="section_offset" id="list-product-search">

				
					<div class="table_layout" id="products_container">
						<div class="table_row">
						<?php
				                if(!empty($arrList['data'])){
				                $i = ($page-1) * 21;
				                foreach($arrList['data'] as $value){
				                $i++;
				            ?>
						

							<!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
							
							<div class="table_cell">

								<div class="product_item">
									<?php if($value['percent_deal'] > 0){ ?>
									<div class="sale-percent"> -<?php echo $value['percent_deal']?>%</div>
									<?php } ?>
									<!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->

									<div class="image_wrap" onclick='location.href="<?php echo $model->getLinkProduct($value['id']); ?>/<?php echo $value['product_alias']; ?>.html"'>

										<img src="<?php echo $value['image_url']; ?>" alt="">

										<!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->

										<div class="actions_wrap">

											<div class="centered_buttons">
												<?php if($_SESSION['user']){ ?>
												<a href="javascript:;" class="button_dark_grey middle_btn quick_view" data-value="<?php echo $value['id']?>" >Yêu thích</a>
												<?php } ?>
												<a href="<?php echo $model->getLinkProduct($value['id']); ?>/<?php echo $value['product_alias']; ?>.html" class="button_blue middle_btn add_to_cart">Xem ngay</a>

											</div><!--/ .centered_buttons -->
											
										
										</div><!--/ .actions_wrap-->
										
										<!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

									</div><!--/. image_wrap-->

									<!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->

									<!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->

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
<form id="frmSearchProduct" method="post" action="ajax/search.php" >
	<input type="hidden" name="giatu" value="-1" id="giatu" />
	<input type="hidden" name="giaden" value="-1" id="giaden" />
	<input type="hidden" name="page_search" value="1" id="page_search" />
	<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $parent_id; ?>" />
    <input type="hidden" name="catetype" id="catetype" value="<?php echo $cate_type_id_s;?>" />
</form>
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
    $('#is_saleoff').val(-1);
        $('#is_new').val(-1);
      $('input.check_price').prop('checked',false);
      $(this).prop('checked',true);
      $('#giatu').val($(this).attr('min'));
      $('#giaden').val($(this).attr('max'));
      search();
  });  
  $(document).on('click','.pagination a',function(){
    $('#page_search').val($(this).attr('data-page'));
    search();
  });
});
function search(){
  $.ajax({
        url: $('#frmSearchProduct').attr('action'),
        type: "POST",
        async: false,
        dataType:'html',
        data: $( "#frmSearchProduct" ).serialize(),
        success: function(data){                  
          $('#list-product-search').html(data);    
        }
  });
}
</script>