<div style="padding:10px;background-color:#FFF">
<style type="text/css">
    .tb-no-border {
        color: #363636;
        font-family: opensans-regular, tahoma;
        font-size: 14px;
    }
table th {
    padding: 0px !important;
}
.table-list {
  border-left: solid 1px #ccc;
  border-top: solid 1px #ccc;
  background-color: #fff;
}
table.new th, table.new td {
  color: #363636;
  border-right: 1px dotted #d7d7d7;
}
table.new td:first-child {
  border-left: 0;
  /* text-align: center; */
}
table.new td:first-child {
  border-left: 0;
  /* text-align: center; */
}
table.shopping tr td {
  padding: 0 8px !important;
}
table.new td {
  border-top: 5px solid white;
  border-right: 1px dotted #d7d7d7;
  border-bottom: 5px solid white;
  padding: 0 5px;
}
        .tb-no-border tr td:first-child {
            color: #8f8f8f;
            font-family: opensans-regular, tahoma;
            font-size: 14px;
            padding-top: 5px;
        }

        .tb-no-border tr td {
            color: #363636;
            font-family: opensans-regular, tahoma;
            font-size: 14px;
            padding-top: 5px;
        }

    @media \0screen {
        .gh-header-group {
            text-align: left;
        }
    }
    .gh-header-group {
  height: 40px;
  line-height: 40px;
  border: 1px solid #d7d7d7;
  padding-left: 10px;
  background-color: #e6e6e6;
  font-size: 14px;
  font-family: opensans-regular, tahoma;
  color: #363636;
}
.table-list th {
  color: #363636;
  font-family: opensans-regular, tahoma;
  background-color: #e6e6e6;
  padding: 10px 8px;
  border-right: solid 1px #ccc;
  border-bottom: solid 1px #ccc;
  font-size: 14px;
}
</style>

<div style="clear:both"></div>
<div style="padding-top: 20px">
    <div class="col-md-6">
        <table style="margin-bottom: 20px;" class="tb-no-border thong-tin" cellpadding="0" cellspacing="0" border="0" width="100%">
            <tbody><tr>
                <th colspan="2">
                    <div class="gh-header-group new">
                        Thông tin người mua
                    </div>
                </th>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            
                 <tr>
                <td style="width: 162px;">Họ tên
                </td>
                <td>:
                        <span id="span_buyer_name"></span>
                </td>
            </tr>
            <tr>
                <td>Email
                </td>
                <td>:
                        <span id="span_buyer_email"></span>
                </td>
            </tr>
            <tr>
                <td>Điện thoại
                </td>
                <td>:
                        <span id="span_buyer_phone"></span>
                </td>
            </tr>
            <tr>
                <td>Di động
                </td>
                <td>:
                        <span id="span_buyer_handphone"></span>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ
                </td>
                <td>:
                        <span id="span_buyer_address"></span>
                </td>
            </tr>
                 
            
            
        </tbody>
        </table>
    </div>
    <div class="col-md-6">
          <table style="margin-bottom: 20px;" class="tb-no-border thong-tin" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>
            <th colspan="2">
                <div class="gh-header-group new">
                    Thông tin người nhận
                </div>
            </th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        
            <tr>
                <td style="width: 162px;">Họ tên
                </td>
                <td>:
                        <span id="span_recipients_name"></span>
                </td>
            </tr>
            <tr>
                <td>Email
                </td>
                <td>:
                        <span id="span_recipients_email"></span>
                </td>
            </tr>
            <tr>
                <td>Điện thoại
                </td>
                <td>:
                        <span id="span_recipients_phone"></span>
                </td>
            </tr>
            <tr>
                <td>Di động
                </td>
                <td>:
                        <span id="span_recipients_handphone"></span>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ
                </td>
                <td>:
                        <span id="span_recipients_address"></span>
                </td>
            </tr>
          
    </tbody>
    </table> 
    
    </div>
    <div class="col-md-12">
        <p><span style="font-weight:bold">Ghi chú đơn hàng: </span><span id="p_ghichu"></span></p>
        <p><span style="font-weight:bold">Phương thức thanh toán: </span><span id="choose_pttt"></span></p>       
    </div> 
    <div style="font-family: robotocondensed-regular, tahoma; font-size: 18px; color: #363636; margin-bottom: 10px;">
        Thông tin giỏ hàng
    </div>
    <div class="cart-order">
        <table class="shop_table cart responsive" cellspacing="0">
            <thead>
              <tr>
                <th class="product-name">Sản phẩm</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">Tổng</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($_SESSION['cart'])){ 
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $product) {                                          
                  $tongtien+= $product['tientheosp'];
                ?>
              <tr class="cart_item" id="tr_<?php echo $product['id']; ?>">                                
                <td style="size:14px"><?php echo $product['product_name']; ?></td>
                <td class="product-price"><span class="amount"><?php echo number_format($product['giatien']); ?>&nbsp;₫</span></td>
                <td class="product-quantity"><div class="quantity buttons_added">                    
                    <?php echo $product['soluong']; ?>                                       
                  </div>
              </td>
                <td class="product-subtotal"><span class="amount" id="tien_<?php echo $product['id']; ?>"><?php echo number_format($product['tientheosp']); ?>&nbsp;₫</span></td>
              </tr>                                
              <?php } ?>
              <tr>
                <td colspan="3" style="text-align:right"><h4>Tổng cộng&nbsp;&nbsp;&nbsp;</h4></td>
                <td style="text-align:right"><h4><?php echo number_format($tongtien); ?>&nbsp;₫</h4></td>
              </tr>

            <?php } ?>  
            </tbody>
          </table>
    </div>
    <br>   
    <div class="clear-all">
    </div>
</div>              
                </div>