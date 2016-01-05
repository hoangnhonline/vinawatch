<section class="section_offset">

		<h3>6. Tổng quan đơn hàng</h3>

		<div class="table_wrap">

			<table class="table_type_1 order_review">

				<thead>
					
					<tr>
						
						<th class="product_title_col">Tên SP</th>						
						<th class="product_price_col">Giá</th>
						<th class="product_qty_col">Số lượng</th>
						<th class="product_total_col">Thành tiền</th>

					</tr>

				</thead>

				<tbody>
				<?php if(!empty($_SESSION['cart'])){ 
                    $tongtien = 0;
                    foreach ($_SESSION['cart'] as $product) {                                          
                      $tongtien+= $product['tientheosp'];
                    ?>
					<tr>
						
						<td data-title="Product Name">							
							<a href="javascript:;" title="<?php echo $product['product_name']; ?>" class="product_title">
								<?php echo $product['product_name']; ?>
							</a>
						</td>						

						<td data-title="Price" class="subtotal"><?php echo number_format($product['giatien'],0,",","."); ?>&nbsp;₫</td>

						<td data-title="Quantity"><?php echo $product['soluong']; ?></td>

						<td data-title="Total" class="total"><?php echo number_format($product['tientheosp'],0,",","."); ?>&nbsp;₫</td>

					</tr>
					
					<?php  }} ?>
				</tbody>

				<tfoot>

					<tr>
						
						<td colspan="3" class="bold" align="right">Tổng tiền</td>
						<td class="total"><?php echo number_format($tongtien,0,",","."); ?>&nbsp;₫</td>

					</tr>				

				</tfoot>

			</table>

		</div><!--/ .table_wrap -->

		<footer class="bottom_box on_the_sides">

			<div class="left_side v_centered">
				

			</div>

			<div class="right_side">

				<button class="button_blue middle_btn">Hoàn tất</button>

			</div>

		</footer>


	</section>