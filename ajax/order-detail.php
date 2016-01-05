<?php
require_once "../backend/model/Backend.php";
$modelBE = new Backend;
$link = "index.php?mod=order&act=detail";
$order_id = (int) $_POST['id'];
$arrDetail = $modelBE->getDetailOrder($order_id);
var_dump($arrDetail);die;
?>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Thông tin đơn hàng
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                       <div class="col-md-12" >
                          <table class="table table-bordered tbl_value">
                             <tr>
                              <td width="200px">Mã đơn hàng </td>
                              <td class="value"><?php echo $arrDetail['order_code']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Ngày đặt hàng</td>
                              <td class="value"><?php echo date('d-m-Y H:i',$arrDetail['created_at']); ?></td>
                            </tr>
                            <tr>
                              <td>Ngày giao hàng </td>
                              <td class="value"><?php echo date('d-m-Y H:i',$arrDetail['delivery_date']); ?></td>
                            </tr>
                            <tr>
                              <td>Số lượng sản phẩm </td>
                              <td class="value"><?php echo number_format($arrDetail['total_amount'],0, ",", "."); ?></td>
                            </tr>
                            <tr>
                              <td>Giá trị sản phẩm</td>
                              <td class="value"><?php echo number_format($arrDetail['sub_total'],0, ",", ".") ;?></td>
                            </tr>
                            <tr>
                              <td>VAT</td>
                              <td class="value"><?php echo $arrDetail['vat']; ?> %</td>
                            </tr>
                            <tr>
                              <td>Phí giao hàng</td>
                              <td class="value"><?php echo number_format($arrDetail['ship'],0, ",", "."); ?></td>
                            </tr>
                            <tr>
                              <td>Tổng tiền</td>
                              <td class="value"><?php echo number_format($arrDetail['total'],0, ",", "."); ?></td>
                            </tr>  
                            <tr>
                              <td>Phương thức thanh toán </td>
                              <td class="value"><?php  if($arrDetail['method_id'] > 0) echo $modelBE->getMethodById($arrDetail['method_id']); ?></td>
                            </tr>                                                  
                            
                            <tr>
                              <td>Ghi chú</td>
                              <td class="value"><?php echo $arrDetail['order_note']; ?></td>
                            </tr>
                            
                          </table>                           
                           
                      </div>  
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Sản phẩm đơn hàng
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tbody><tr>
                            <th style="width: 1%">STT</th>                                           
                            <th style="text-align:left" width="300px">Tên sản phẩm </th> 
                            <th>Ảnh</th> 
                            <th style="text-align:right">Số lượng </th>  
                            <th style="text-align:right">Đơn giá</th>  
                            <th style="text-align:right">Thành tiền</th>                                                                                                          
                        </tr>
                        <?php                    
                        $i = ($page-1) * $limit;                    
                       while($row = mysql_fetch_assoc($rs)){                        
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>                                                
                            <td><?php echo $row['product_name']; ?></td>
                            <td><img src="<?php echo $modelBE->getImageById($row['product_id']); ?>" width="80" /></td>                                                
                            <td align="right"><?php echo $row['amount']; ?></td>  
                            <td align="right"><?php echo number_format($row['price'],0, ",", "."); ?></td>
                            <td align="right"><?php echo number_format($row['total'],0, ",", "."); ?></td>
                        </tr>      
                        <?php } ?>            
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Thông tin người mua
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                      <div class="col-md-12" >
                          <table class="table table-bordered tbl_value">
                            <tr>
                              <td width="200px">Họ tên</td>
                              <td class="value"><?php echo $arrDetail['buyer_name']; ?></td>
                            </tr>
                             <tr>
                              <td width="200px">Giới tính</td>
                              <td class="value"><?php echo $arrDetail['buyer_gender']==1 ? "Nam" : "Nữ"; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Địa chỉ</td>
                              <td class="value"><?php echo $arrDetail['buyer_address']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Tỉnh/TP</td>
                              <td class="value"><?php echo $modelBE->getCityById($arrDetail['buyer_city_id']); ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Email</td>
                              <td class="value"><?php echo $arrDetail['buyer_email']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">ĐT bàn</td>
                              <td class="value"><?php echo $arrDetail['buyer_phone']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Di động</td>
                              <td class="value"><?php echo $arrDetail['buyer_handphone']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">CMND</td>
                              <td class="value"><?php echo $arrDetail['buyer_indentity_card']; ?></td>
                            </tr>                           
                          </table>                           
                           
                      </div>   
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Thông tin người nhận
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body">
                     <div class="col-md-12" >
                          <table class="table table-bordered tbl_value">
                            <tr>
                              <td width="200px">Họ tên</td>
                              <td class="value"><?php echo $arrDetail['recipients_name']; ?></td>
                            </tr>
                             <tr>
                              <td width="200px">Giới tính</td>
                              <td class="value"><?php echo $arrDetail['recipients_gender']==1 ? "Nam" : "Nữ"; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Địa chỉ</td>
                              <td class="value"><?php echo $arrDetail['recipients_address']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Tỉnh/TP</td>
                              <td class="value"><?php echo $modelBE->getCityById($arrDetail['recipients_city_id']); ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Email</td>
                              <td class="value"><?php echo $arrDetail['recipients_email']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">ĐT bàn</td>
                              <td class="value"><?php echo $arrDetail['recipients_phone']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">Di động</td>
                              <td class="value"><?php echo $arrDetail['recipients_handphone']; ?></td>
                            </tr>
                            <tr>
                              <td width="200px">CMND</td>
                              <td class="value"><?php echo $arrDetail['recipients_indentity_card']; ?></td>
                            </tr>                           
                          </table>                           
                           
                      </div> 
                  </div>
                </div>
              </div>
            </div>
                
           
<style type="text/css">
  td.value{
    font-weight: bold;
    font-size:16px;
    background-color: #FFF !important;
  }
  .tbl_value td{
    background-color: #f9f9f9
  }
</style>
