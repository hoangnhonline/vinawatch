<?php 
//ini_set('display_errors', 1);
//phpinfo();
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$product_id = (int) $_POST['product_id'];
$detail = $model->getDetailProduct($product_id);
$data = $detail['data'];
$type = (int) $_POST['type'];
//1 : giao hang , 2 : giu hang , 3 : dat truoc

?>
<div class="wrap_cart" id="wrap_cart">
    <form id="orderForm" action="ajax/payment.php" method="post">
        <div class="col-md-12">
            <div class="col-md-5">
                <p style="text-align:center">
                    <img src="<?php echo $data['image_url']; ?>" width="120" />
                </p>
                <h3 class="clearfix" style="margin-top:5px"><?php echo $data['product_name']; ?></h3>
                <h2 class="product_price">
                  <?php if($data['price_saleoff'] > 0) { 
                    echo number_format($data['price_saleoff'],0, ",", ".");
                  }else{
                    echo number_format($data['price'],0, ",", ".");
                  } ?>
                </h2>
                <div class="clearfix">
                    <p>
                        <input type="checkbox" id="btnMaGiamGia" value="1" name="use_voucher"/>
                        <label for="btnMaGiamGia">Sử dụng mã giảm giá</label>
                    </p>
                    <div id="ma_giam_gia_div"  class="col-md-12" style="display:none;margin-top:7px">
                        <input class="form-control" placeholder="Nhập mã giảm giá" name="voucher_code" id="voucher_code">
                    </div>
                </div>
                <div style="margin-top:10px">
                    <p>
                        <input type="checkbox" id="btnXuatHoaDon" value="1" name="export_order"/>
                        <label for="btnXuatHoaDon">Xuất hóa đơn công ty</label>
                        
                    </p>
                    <div id="xuat_hoa_don_div"  class="col-md-12" style="display:none;margin-top:7px">
                        <input class="form-control" placeholder="Tên công ty" name="company_name" id="company_name">
                        <input class="form-control" placeholder="Địa chỉ" name="company_address" id="company_address">
                        <input class="form-control" placeholder="Mã số thuế" name="tax_no" id="tax_no">
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <h4>Điền thông tin người mua</h4>
                <input type="radio" name="gender" id="gender-1" class="radio" checked value="1">
                <label for="gender-1">Anh</label>
                <input type="radio" name="gender" id="gender-2" class="radio" value="2">
                <label for="gender-2">Chị</label>
                <br />
                <input class="form-control" style="margin-top:7px;" placeholder="Họ tên của bạn (bắt buộc)" required name="customer_name" id="customer_name" value="<?php if(isset($_SESSION['user']['full_name'])) echo $_SESSION['user']['full_name']; ?>"/>
                <input class="form-control" placeholder="Số di động (bắt buộc)" required name="phone_number" id="phone_number" value="<?php if(isset($_SESSION['user']['handphone'])) echo $_SESSION['user']['handphone']; ?>"/>
                <input class="form-control" type="email" placeholder="Email (không bắt buộc, dùng để gửi xác nhận)" required name="email" id="email" value="<?php if(isset($_SESSION['user']['email'])) echo $_SESSION['user']['email']; ?>"/>
                <br />
                <?php if($type == 2){ ?>
                <p style="margin-top:10px;clear:both;margin-bottom:5px">Chọn thời gian nhận hàng</p>               
                <?php }else{ ?>
                 <p style="margin-top:10px;clear:both;margin-bottom:5px">Nhập địa chỉ, thời gian để NHẬN HÀNG NHANH</p>

                <select class="form-control" style="width:48%;margin-right:10px;height:35px" name="city_id" id="city_id">
                    <?php $cityArr = $model->getListCity(); 
                    if(!empty($cityArr)){
                      foreach ($cityArr as $city) {                     
                    ?>
                    <option value="<?php echo $city['city_id'];?>"><?php echo $city['city_name'];?></option>
                    <?php } } ?>
                </select>
                <select class="form-control" style="width:48%;height:35px" id="state_id" name="state_id">
                  <?php $stateArr = $model->getListStateByCity(1); 
                    if(!empty($stateArr)){
                      foreach ($stateArr as $state) {                     
                    ?>
                    <option value="<?php echo $state['id']; ?>"><?php echo $state['state_name']; ?></option>
                    <?php }} ?>
                </select>
                <input class="form-control" id="address" name="address" placeholder="Nhập số nhà, tên đường để nhận hàng" type="text" value="<?php if(isset($_SESSION['user']['address'])) echo $_SESSION['user']['address']; ?>" required>
                <?php } ?>                
                 <select class="form-control" style="width:48%;margin-right:10px;height:35px" id="delivery_date" name="delivery_date">
                    <?php $arrDate = $model->calDayDelivery(); 
                    foreach ($arrDate as $key => $d) {                     
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $d; ?></option>
                    <?php } ?>
                </select>
                <select class="form-control" style="width:48%;height:35px" name="delivery_hour">
                    <?php $arrHour = $model->calHourDelivery(); 
                    foreach ($arrHour as $h) {                     
                    ?>
                    <option value="<?php echo $h; ?>">Trước <?php echo $h; ?> giờ</option>
                    <?php } ?>
                </select>
                <button class="xacnhan" type="submit" id="btnXacNhan">Xác nhận</button>
            </div>
        </div>
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="order_type" value="<?php echo $type; ?>">
        <?php if(isset($_SESSION['user'])){ ?>
        <input type="hidden" name="customer_id" value="<?php echo $_SESSION['user']['id']; ?>">
        <?php } ?>
    </form>
</div>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<script type="text/javascript">
  $(function(){
    $('#city_id').change(function(){
      $.ajax({
            url: "ajax/state.php",
            type: "POST",
            async: true,
            data: {                             
                'city_id' : $(this).val()
            },
            success: function(data){            
                $('#state_id').html(data);             
            }
        });       
    });
    $('#btnXacNhan').click(function(){
       if($('#btnMaGiamGia').prop("checked") == true){
          if($('#voucher_code').val()==""){
            alert('Vui lòng nhập mã giảm giá'); return false;
          }
       }
       if($('#btnXuatHoaDon').prop('checked') == true){
          if($('#company_name').val()==""){
            alert('Vui lòng nhập tên công ty'); return false;
          }
          if($('#company_address').val()==""){
            alert('Vui lòng nhập địa chỉ công ty'); return false;
          }
          if($('#tax_no').val()==""){
            alert('Vui lòng nhập mã số thuế'); return false;
          }  
       }
    });    
    $('#orderForm').validate();
    $('#orderForm').ajaxForm({
            beforeSend: function() {                
            },
            uploadProgress: function(event, position, total, percentComplete) {              
            },
            complete: function(data) {
                $('#shop_success').val(1);              
                location.href="dat-hang-thanh-cong.html";                
            }
        });
    });
</script>

<style type="text/css">
.form-control,.radio {
    margin-bottom: 7px;
}
.xacnhan {
  float: left;
  width: 100%;
  padding: 15px 20px;
  font-size: 16px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  border: 0;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: inset 0 -3px 0 0 #c24d03;
  -webkit-box-shadow: inset 0 -3px 0 0 #c24d03;
  box-shadow: inset 0 -3px 0 0 ##AC0E0F;
  background: #ED1C24;
  margin-right: 12px;
  cursor: pointer;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('#btnMaGiamGia').click(function(){
        $('#ma_giam_gia_div').slideToggle();
    });
    $('#btnXuatHoaDon').click(function(){
        $('#xuat_hoa_don_div').slideToggle();
    });
    
});
</script>