<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

<div class="secondary_page_wrapper">

    <div class="container">

        <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

        <ul class="breadcrumbs">

            <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
            <li>Đặt hàng thành công</li>

        </ul>

        <!-- - - - - - - - - - - - - - End of breadcrumbs - - - - - - - - - - - - - - - - -->

        <div class="row">            
            <div id="completed" class="center medium" style="text-align:center;width:60%;margin:auto">        
            <p class="bag-title center orange" style="color:#ED1C24;font-size:20px">ĐẶT HÀNG THÀNH CÔNG</p>
            <p class="center"></p><div class="bag-thankyou">
            <img src="images/thank-you.jpg" />
        </div><p></p>
            <div id="cinner" class="center">
                <p class="l2 smaller">&nbsp;</p>
                <p class="l12 medium"><b>Cảm ơn quý khách hàng  đã lựa chọn hệ thống hatana.vn để mua sắm</b> <br>
                </p>
                <h3 style="text-align:left">Thông tin đơn hàng</h3>
                <div class="table_wrap">                    
                    <table class="table_type_1">                       
                        <tbody>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Loại đơn hàng</td>
                                <td style="text-align:left"><?php 
                                if($_SESSION['cart']['order_type']==1) echo "Giao hàng tận nơi"; 
                                if($_SESSION['cart']['order_type']==2) echo "Đặt giữ hàng"; 
                                if($_SESSION['cart']['order_type']==3) echo "Đặt trước"; 
                                ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Khách hàng</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['customer_name']; ?></td>
                            </tr>
                             <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Điện thoại</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['phone_number']; ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Email</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['email']; ?></td>
                            </tr>
                            <?php if($_SESSION['cart']['city_id'] > 0){ ?>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Tỉnh/Thành</td>
                                <td style="text-align:left"><?php echo $model->getNameCity($_SESSION['cart']['city_id']); ?></td>
                            </tr>
                            <?php } ?>
                            <?php if($_SESSION['cart']['state_id'] > 0){ ?>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Quận/Huyện</td>
                                <td style="text-align:left"><?php echo $model->getNameState($_SESSION['cart']['state_id']); ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Địa chỉ</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['address']; ?></td>
                            </tr>
                           
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Ngày giao hàng</td>
                                <td style="text-align:left"><?php echo date('d-m-Y',strtotime($_SESSION['cart']['delivery_date'])); ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Giờ giao hàng</td>
                                <td style="text-align:left">Trước <?php echo $_SESSION['cart']['delivery_hour']; ?> giờ</td>
                            </tr>
                            <?php if($_SESSION['cart']['voucher_code']!=''){ ?>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Mã giảm giá</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['voucher_code']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                <br />
                <h3 style="text-align:left">Thông tin sản phẩm</h3>
                <div class="table_wrap">
                    <?php 
                    $detailProduct = $model->getDetailProduct($_SESSION['cart']['product_id']);                    
                    ?>
                    <table class="table_type_1">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th width="150px" style="text-align:right">Giá tiền</th>
                            </tr>                        
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:left">
                                    <?php echo $detailProduct['data']['product_name']; ?>
                                </td>
                                <td style="text-align:right"><?php echo number_format($detailProduct['data']['price']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                <?php ?>
                <?php if($_SESSION['cart']['export_order']==1){ ?>
                <br />
                <h3 style="text-align:left">Thông tin xuất hóa đơn</h3>
                <div class="table_wrap">

                    <table class="table_type_1">                       
                        <tbody>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Tên CTY</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['company_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Địa chỉ CTY</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['company_address']; ?></td>
                            </tr>
                             <tr>
                                <td style="text-align:left;background-color:#F8F8F8;width:200px">Mã số thuế</td>
                                <td style="text-align:left"><?php echo $_SESSION['cart']['tax_no']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
                <br />
                
                <p class="l2 smaller">&nbsp;</p>
                <p class="orange" style="padding:10px 0 0 0; border-top:1px solid #777777">Mọi thông tin thắc mắc xin quý khách vui lòng liên hệ:</p>
               
                <p class="lightgrey">
                    <span class="bold" style="font-size:15px;text-transform:uppercase">Shop đồng hồ mắt kính Vinawatch</span><br>                   
                    Địa chỉ: 31 Nguyễn Tất Thành P13 Q4 ( gần cầu Khánh Hội Quận 1) TPHCM <br>
                    Tel: 0913.665.513<br>
                    Email: <a href="mailto:vinawatch@gmail.com" title="vinawatch@gmail.com">vinawatch@gmail.com</a><br>
                    Website: <a href="http://www.vinawatch.vn" title="www.vinawatch.vn ">www.vinawatch.vn</a>
                </p>
                <p style="padding:30px 0;">
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="btn-grey buyinstallment " title="Về trang chủ">
                        Về trang chủ
                    </a>
            </p>
            </div>
        </div>

        </div><!--/ .row-->

    </div><!--/ .container-->

</div><!--/ .page_wrapper-->
<?php unset($_SESSION['cart']); ?>
<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->