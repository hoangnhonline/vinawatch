<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

			<div class="secondary_page_wrapper">

				<div class="container">

					<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

					<ul class="breadcrumbs">

						<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
						<li>Giỏ hàng</li>

					</ul>

					<section class="section_offset">

						<h1>Giỏ hàng</h1>

						<!-- - - - - - - - - - - - - - Shopping cart table - - - - - - - - - - - - - - - - -->

						<div class="table_wrap">

							<table class="table_type_1 shopping_cart_table">

								<thead>

									<tr>
										<th class="product_image_col">Hình ảnh</th>
										<th class="product_title_col">Tên SP</th>										
										<th>Giá</th>
										<th class="product_qty_col">Số lượng</th>
										<th>Thành tiền</th>
										<th class="product_actions_col">Thao tác</th>
									</tr>

								</thead>

								<tbody>
									<?php if(!empty($_SESSION['cart'])){ 
                                        $tongtien = 0;
                                        foreach ($_SESSION['cart'] as $product) {                                          
                                          $tongtien+= $product['tientheosp'];
                                        ?>
									<tr id="tr_<?php echo $product['id']; ?>">											
										<td class="product_image_col" data-title="<?php echo $product['product_name']; ?>">
											
											<a href="#" title="<?php echo $product['product_name']; ?>">
                        <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>" title="<?php echo $product['product_name']; ?>">
                      </a>

										</td>

										<td data-title="<?php echo $product['product_name']; ?>">

											<a href="#" class="product_title" title="<?php echo $product['product_name']; ?>">
                        <?php echo $product['product_name']; ?>
                      </a>

										</td>		

										<td class="subtotal" data-title="Price">
											
											<?php echo number_format($product['giatien'],0,",","."); ?>&nbsp;₫

										</td>

										<td data-title="Quantity">

											<div class="qty min clearfix">

												<button class="theme_button minus" data-value="<?php echo $product['id']; ?>">&#45;</button>
												<input type="text" name="" value="<?php echo $product['soluong']; ?>">
												<button class="theme_button plus" data-value="<?php echo $product['id']; ?>">&#43;</button>

											</div><!--/ .qty.min.clearfix-->

										</td>

										<td class="total" data-title="Total" id="tien_<?php echo $product['id']; ?>">

											<?php echo number_format($product['tientheosp'],0,",","."); ?>&nbsp;₫

										</td>
										<td data-title="Action">											

											<a href="javascript:;" class="button_dark_grey icon_btn remove_product" data-value="<?php echo $product['id']; ?>" title="Xóa sản phẩm này">
                        <i class="icon-cancel-2"></i>
                      </a>

										</td>
									</tr>	
									<?php } ?>
									<tr>
										<td colspan="4" align="right"><h3>Tổng tiền</h3></td>
										<td colspan="2" class="total"><h3 class="tongtien"><?php echo number_format($tongtien,0,",","."); ?>&nbsp;₫</h3></td>
									</tr>

									<?php } ?>							

								</tbody>

							</table>

						</div><!--/ .table_wrap -->						
						<footer class="bottom_box on_the_sides">
							<?php if(!empty($_SESSION['cart'])){ ?>
							<div class="left_side">

								<a title="Tiếp tục mua hàng" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="button_blue middle_btn" >
                  Tiếp tục mua hàng
                </a>							

							</div>

							<div class="right_side">

								<a href="thanh-toan.html" class="button_blue middle_btn" title="Thanh toán">
                  Thanh toán
                </a>

							</div>
							<?php }else{ ?>
							<h3>Chưa có sản phẩm nào!</h3>
							<?php } ?>

						</footer>

					</section>

				</div>

			</div>
 <script>
      $(function(){        
        $('a.remove_product').click(function(){
            var product_id = $(this).attr('data-value');  
            if(confirm('Xóa sản phẩm này ra khỏi giỏ hàng?')){       
              $.ajax({
                url: "ajax/cart.php",
                type: "POST",
                dataType :'json',
                async: true,
                data: {                             
                    'action' : 'remove',
                    'product_id' : product_id
                },
                success: function(data){                                                                 
                    $('#tr_'+product_id).remove();
                    var tongtien =   data.tongtien;
                    var tongsp =   data.tongsp;
                    $('.tongtien').html(addCommas(tongtien) + ' đ');
                    $('#open_shopping_cart').attr('data-amount',tongsp); 
                }
              });
            }
        });
         $('.minus').click(function(){          
            var obj = $(this);
            var product_id = obj.attr('data-value');              
            var soluong = parseInt(obj.next().val());            
            if(soluong > 1){
              obj.next().val(soluong-1);
              $.ajax({
                url: "ajax/cart.php",
                type: "POST",
                dataType :'json',
                async: true,
                data: {                             
                    'action' : 'giam',
                    'product_id' : product_id
                },
                success: function(data){  
                  var tientheosp = data.tientheosp; 
                  var tongtien =   data.tongtien;
                  var tongsp =   data.tongsp;
                  $('#tien_'+product_id).html(addCommas(tientheosp) + ' đ'); 
                  $('.tongtien').html(addCommas(tongtien) + ' đ');   
                  $('#open_shopping_cart').attr('data-amount',tongsp);
                }
              });
            }
        });
         $('.plus').click(function(){          
            var obj = $(this);
            var product_id = obj.attr('data-value');              
            var soluong = parseInt(obj.prev().val());            
            if(soluong < 100){
              obj.prev().val(soluong+1);
              $.ajax({
                url: "ajax/cart.php",
                type: "POST",
                dataType :'json',
                async: true,
                data: {                             
                    'action' : 'tang',
                    'product_id' : product_id
                },
                success: function(data){  
                  var tientheosp = data.tientheosp; 
                  var tongtien =   data.tongtien;
                  var tongsp =   data.tongsp;
                  $('#tien_'+product_id).html(addCommas(tientheosp) + ' đ'); 
                  $('.tongtien').html(addCommas(tongtien) + ' đ');  
                  $('#open_shopping_cart').attr('data-amount',tongsp);    
                  
                }
              });
            }
        });
      });
function addCommas(nStr)
{
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}
  </script>