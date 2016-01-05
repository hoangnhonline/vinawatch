<?php
require_once "model/Backend.php";
$modelBE = new Backend;

$link = "index.php?mod=order&act=list";
$link_form  = "";
if (isset($_GET['customer_name']) && trim($_GET['customer_name']) != '') {
    $customer_name = $_GET['customer_name'];      
    $link.="&customer_name=$customer_name";
    $link_form.="&customer_name=$customer_name";
} else {
    $customer_name = '';
}
if (isset($_GET['phone_number']) && trim($_GET['phone_number']) != '') {
    $phone_number = $_GET['phone_number'];      
    $link.="&phone_number=$phone_number";
     $link_form.="&phone_number=$phone_number";
} else {
    $phone_number = '';
}

if (isset($_GET['email']) && trim($_GET['email']) != '') {
    $email = $_GET['email'];      
    $link.="&email=$email";
    $link_form.="&email=$email";
} else {
    $email = '';
}

if (isset($_GET['status']) && $_GET['status'] > 0) {
    $status = (int) $_GET['status'];      
    $link.="&status=$status";
    $link_form.="&status=$status";
} else {
    $status = -1;
}

if (isset($_GET['order_type']) && $_GET['order_type'] > 0) {
    $order_type = (int) $_GET['order_type'];      
    $link.="&order_type=$order_type";
    $link_form.="&order_type=$order_type";
} else {
    $order_type = -1;
}


if(isset($_GET['fromdate'])){
    $fromdate = $_GET['fromdate'];
}else{
    $fromdate = "01-".date('m')."-".date('Y');
}
$link_form.="&fromdate=$fromdate";
if(isset($_GET['todate'])){
    $todate = $_GET['todate'];
}else{
    $todate = date('d-m-Y',time());
}
$link_form.="&todate=$todate";
$intfromdate = null;
if ($fromdate)
{
    list($intDay, $intMonth, $intYear) = explode('-', $fromdate);
    $intfromdate = mktime(0, 0, 0, $intMonth, $intDay, $intYear);
    $intfromdate -= 60;
}
$inttodate = null;
if ($todate)
{
    list($intDay, $intMonth, $intYear) = explode('-', $todate);
    $inttodate = mktime(0, 0, 0, $intMonth, $intDay, $intYear);
    $inttodate += 60 * 60 * 24;
}

//$mave='',$order_code="",$customer_name="",$phone_number="",
//$email="",$status=-1,$order_type=-1,$is_pay=-1,$fromdate=-1,$todate=-1,$offset = -1, $limit = -1
$arrTotal = $modelBE->getListOrder($customer_name,$phone_number,$email,$status,$order_type,$intfromdate,$inttodate, -1, -1);
$limit = 64;
$total_page = ceil($arrTotal['total'] / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$arrList = $modelBE->getListOrder($customer_name,$phone_number,$email,$status,$order_type,$intfromdate,$inttodate,$offset, $limit);
?>
<style>
input.text_order {
    width: 130px;
    border: 1px solid #ccc;
    height: 25px;
}
select.select_search{
    width:130px;
}
#search_advance td{
    text-align: left;
}

</style>
<div class="row">
    <div class="col-md-12">    
         <div class="box-header">
                <h3 class="box-title">Danh sách đơn hàng</h3>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="box_search">                                    
                   <table width="100%" id="search_advance">
                        <tr style="height:40px">                            

                            <td>Họ tên</td>
                            <td><input type="text" class="text_order" id="customer_name" name="customer_name" value="<?php echo (trim($customer_name)!='') ? $customer_name: ""; ?>" /> </td>
                            <td>Điện thoại</td>
                            <td><input type="text" class="text_order" id="phone_number" name="phone_number" value="<?php echo (trim($phone_number)!='') ? $phone_number: ""; ?>" /> </td>
                            <td>Email</td>
                            <td><input type="text" class="text_order" id="email" name="email" value="<?php echo (trim($email)!='') ? $email: ""; ?>" /> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Thanh toán</td>
                            <td>
                                <select name="order_type" class="select_search" id="order_type">
                                    <option value="-1">Tất cả</option>
                                    <option value="1" <?php echo ($_GET['order_type']==1) ? "selected" : ""; ?>>Đặt mua</option>                        
                                    <option value="2" <?php echo ($_GET['order_type']==2) ? "selected" : ""; ?>>Đặt giữ hàng</option>                        
                                    <option value="3" <?php echo ($_GET['order_type']==3) ? "selected" : ""; ?>>Đặt trước</option>                        
                                </select>
                            </td>
                            <td>Trạng thái</td>
                            <td>
                                <select name="status" class="select_search" id="status">
                                    <option value="-1">Tất cả</option>
                                    <option value="2" <?php echo ($_GET['status']==1) ? "selected" : ""; ?>>Mới</option>
                                    <option value="1" <?php echo ($_GET['status']==2) ? "selected" : ""; ?>>Đang xử lý</option>                                                            
                                    <option value="4" <?php echo ($_GET['status']==4) ? "selected" : ""; ?>>Hoàn thành</option>
                                    <option value="3" <?php echo ($_GET['status']==3) ? "selected" : ""; ?>>Huỷ</option>
                                </select>
                            </td>                            

                            <td>Từ ngày</td>
                            <td>
                                <input type="text" class="text_order" id="fromdate" name="fromdate" value="<?php echo (trim($fromdate)!='') ? $fromdate: ""; ?>" /> 
                            </td>

                            <td>Đến ngày</td>
                            <td>
                                <input type="text" class="text_order" id="todate" name="todate" value="<?php echo (trim($todate)!='') ? $todate: ""; ?>" /> 
                            </td>
                            <td><button class="btn btn-primary btn-sm right" id="btnSearch" type="button">Tìm kiếm</button></td>
                        </tr>                       
                   </table>                                     

            </div>
            <div class="box-body">                
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody><tr>
                        <th style="width: 1%">STT</th>
                        <th>Sản phẩm</th>
                        <th>Người mua</th>
                        <th>Email</th>
                        <th style="text-align:right">Điện thoại</th>  
                        <th>Ngày mua</th>                        
                        <th>Ngày giao</th>                        
                        <th style="text-align:center">Trạng thái</th>    
                        <th style="width: 40px">Thao tác</th>
                    </tr>
                    <?php
                    if(!empty($arrList['data'])){
                    $i = ($page-1) * $limit;                    
                    foreach($arrList['data'] as $row){
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>                                                
                        <td>
                            <a href="index.php?mod=product&act=form&id=<?php echo $row['product_id']; ?>" target="_blank">
                                <?php echo $model->getProductName($row['product_id']); ?>
                            </a>
                        </td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td align="right"><?php echo $row['phone_number']; ?></td>                 
                        <td><?php echo date('d-m-Y H:i',$row['created_at']); ?></td>  
                        <td><?php echo date('d-m-Y',$row['delivery_date']); ?>
                            <br />
                            Trước <?php echo $row['delivery_hour']; ?> giờ
                            
                        </td>                          
                        <td style="text-align:center"><?php 
                        $status = $row['status'];
                        if($status == 2) echo '<span class="label label-warning">Đang xử lý</span>';
                        if($status == 1) echo '<span class="label label-success">Mới</span>';                        
                        if($status == 3) echo '<span class="label label-danger">Hủy</span>';
                        if($status == 4) echo '<span class="label label-info">Hoàn thành</span>';
                        ?>
                        </td>    
                                              
                        <td style="white-space:nowrap">
                            <a title="Click để xem chi tiết" href="index.php?mod=order&act=detail&order_id=<?php echo $row['id']; ?><?php echo $link_form; ?>"     

                                <i class="fa fa-fw fa-file-text-o"></i>

                            </a>
                            <a title="Click để chỉnh sửa" href="index.php?mod=order&act=form&order_id=<?php echo $row['id']; ?><?php echo $link_form; ?>">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a title="Click để xóa" href="javascript:;" id="<?php echo $row['id']; ?>" mod="order" class="link_delete" >    
                                <i class="fa fa-fw fa-trash-o"></i>
                            </a>    
                            
                        </td>
                    </tr>      
                    <?php }  }else{ ?>              
                    <tr>
                        <td colspan="11" class="error_data">Không tìm thấy dữ liệu!</td>
                    </tr>
                    <?php } ?>             
                </tbody></table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <!--
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>-->
                <?php echo $modelBE->phantrang($page, PAGE_SHOW, $total_page, $link); ?>
            </div>
        </div><!-- /.box -->                           
    </div><!-- /.col -->
   
</div>
<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(function(){
        $('#fromdate,#todate').datepicker({            
            dateFormat: "dd-mm-yy" ,
            changeMonth: true,
            changeYear: true               
        });        
        $('#filter_id').change(function(){
            var id = $(this).val();
            if(id==1){
                $('.ticket_code').hide();
                $('.order_code').show();
            }else{
                $('.ticket_code').show();   
                $('.order_code').hide();
            }
        });
        $('#order_type,#status,#sort_column,#sort_value').change(function(){
            search();
        });
        $('#btnSearch').click(function(){
            search();
        });
        $('#email,#customer_name,#code,#order_code,#phone_number').keypress(function (e) {
          if (e.which == 13) {
            search();
          }
        });
    });   
    function search(){
        var str_link = "index.php?mod=order&act=list";
        var tmp = $('#filter_id').val();        
        tmp = $('#order_type').val();
        if(tmp > 0){
            str_link += "&order_type=" + tmp ;
        }
        tmp = $('#status').val();
        if(tmp > 0){
            str_link += "&status=" + tmp ;
        }
        tmp = $('#sort_column').val();
        if(tmp){
            str_link += "&sort_column=" + tmp ;
        }
        tmp = $('#sort_value').val();
        if(tmp){
            str_link += "&sort_value=" + tmp ;
        }       
        tmp = $.trim($('#customer_name').val());
        if(tmp != ''){
            str_link += "&customer_name=" + tmp ;   
        }
        tmp = $.trim($('#phone_number').val());
        if(tmp != ''){
            str_link += "&phone_number=" + tmp ;   
        }
        tmp = $.trim($('#email').val());
        if(tmp != ''){
            str_link += "&email=" + tmp ;   
        }  
        tmp = $.trim($('#fromdate').val());
        if(tmp != ''){
            str_link += "&fromdate=" + tmp ;   
        }
        tmp = $.trim($('#todate').val());
        if(tmp != ''){
            str_link += "&todate=" + tmp ;   
        }         
        location.href= str_link;
    }   
</script>