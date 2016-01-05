<?php
require_once "model/Backend.php";
$model = new Backend;

$cateTypeArr = $model->getListCateType();
$cateArr = $model->getListCate();
$cateArrNoTree = $model->getListCateNoTree();
$limit = 20;
$link = "index.php?mod=product&act=list";
$link_form = "";
$page_show = 20;
if (isset($_GET['product_code']) && $_GET['product_code'] != '') {
    $product_code = $_GET['product_code'];      
    $link.="&product_code=$product_code";
    $link_form .="&product_code=$product_code";
} else {
    $product_code = '';
}
if (isset($_GET['product_name']) && $_GET['product_name'] != '') {
    $product_name = $_GET['product_name'];      
    $link.="&product_name=$product_name";
    $link_form.="&product_name=$product_name";
} else {
    $product_name = '';
}
if (isset($_GET['is_hot']) && $_GET['is_hot'] > -1) {
    $is_hot = (int) $_GET['is_hot'];      
    $link_form.="&is_hot=$is_hot";
    $link.="&is_hot=$is_hot";
} else {
    $is_hot = -1;
}
if (isset($_GET['is_saleoff']) && $_GET['is_saleoff'] > -1) {
    $is_saleoff = (int) $_GET['is_saleoff'];      
    $link.="&is_saleoff=$is_saleoff";
    $link_form.="&is_saleoff=$is_saleoff";
} else {
    $is_saleoff = -1;
}

if (isset($_GET['is_new']) && $_GET['is_new'] > -1) {
    $is_new = (int) $_GET['is_new'];      
    $link.="&is_new=$is_new";
    $link_form.="&is_new=$is_new";
} else {
    $is_new = -1;
}
if (isset($_GET['trangthai']) && $_GET['trangthai'] > -1) {
    $trangthai = (int) $_GET['trangthai'];      
    $link.="&trangthai=$trangthai";
    $link_form.="&trangthai=$trangthai";
} else {
    $trangthai = -1;
}
if (isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0) {
    $cate_type_id = (int) $_GET['cate_type_id'];      
    $link.="&cate_type_id=$cate_type_id";
    $link_form.="&cate_type_id=$cate_type_id";
} else {
    $cate_type_id = -1;
}

if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
    $cate_id = (int) $_GET['cate_id'];      
    $link.="&cate_id=$cate_id";
    $link_form.="&cate_id=$cate_id";
} else {
    $cate_id = -1;
}

$arrTotal = $model->getListProduct($product_code,$product_name,$cate_type_id,$cate_id,$is_new,$is_saleoff,$is_hot,$trangthai, -1, -1);

$total_page = ceil($arrTotal['total'] / 20);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = 20 * ($page - 1);

$arrList = $model->getListProduct($product_code,$product_name,$cate_type_id,$cate_id,$is_new,$is_saleoff,$is_hot,$trangthai,$offset,$limit);

?>
<form id="exportForm" action="export.php">
    <input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
    <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
    <input type="hidden" name="cate_type_id" value="<?php echo $cate_type_id; ?>">    
    <input type="hidden" name="cate_id" value="<?php echo $cate_id; ?>">    
    <input type="hidden" name="is_new" value="<?php echo $is_new; ?>">
    <input type="hidden" name="is_saleoff" value="<?php echo $is_saleoff; ?>">
    <input type="hidden" name="is_hot" value="<?php echo $is_hot; ?>">
    <input type="hidden" name="trangthai" value="<?php echo $trangthai; ?>">
</form>


<div class="row">
    <div class="col-md-12">
        <?php if($model->checkprivilege(13)){ ?>
        <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=product&act=form<?php echo $link_form; ?>'">Tạo mới</button>
        <?php } ?>
        <div class="box-header">
            <h3 class="box-title">Danh sách sản phẩm</h3>
        </div><!-- /.box-header -->
        <div class="box">
            <div class="box_search" style="font-weight:bold;text-align:left">
                <form method="get" id="form_search" name="form_search">
                    <input type="hidden" name="mod" value="product" />
                    <input type="hidden" name="act" value="list" />                    
                    Menu danh mục<select name="cate_type_id" id="cate_type_id" style="height:25px;">
                        <option value="-1">Tất cả</option>
                        <?php if(!empty($cateTypeArr)){
                            foreach($cateTypeArr as $cateType){ ?>
                            <option value="<?php echo $cateType['id']; ?>"
                            <?php if($cate_type_id == $cateType['id']) echo "selected"; ?>
                            ><?php echo $cateType['cate_type_name'] ?></option>
                            <?php }
                        } ?>                        
                    </select>
                    &nbsp;&nbsp;&nbsp;Danh mục
                    <select name="cate_id" id="cate_id" style="width:220px !important;height:25px;">
                        <option value="-1">--Tất cả--</option>                                           
                    </select>
                    &nbsp;&nbsp;&nbsp;Trạng thái
                    <select name="trangthai" id="trangthai" style="width:220px !important;height:25px;">
                        <option value='-1' <?php if($trangthai == -1) echo "selected"; ?> >Tất cả</option> 
                        <option value='1' <?php if($trangthai == 1) echo "selected"; ?> >Còn hàng</option>
                        <option value='2' <?php if($trangthai == 2) echo "selected"; ?> >Hết hàng</option>
                        <option value='3' <?php if($trangthai == 3) echo "selected"; ?> >Hàng sắp về</option>                                    
                    </select>
                    <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $parent_id; ?>"/>
                   
                    <br /><br />  
                    Mã sản phẩm &nbsp;<input type="text" name="product_code" id="product_code" value="<?php echo $product_code; ?>" />              
                    &nbsp;&nbsp;&nbsp;Tên sản phẩm &nbsp;<input type="text" name="product_name" id="product_name" value="<?php echo $product_name; ?>" />              
                    &nbsp;&nbsp;&nbsp;<input type="checkbox" name="is_hot" id="is_hot" value="1" <?php if($is_hot==1) echo "checked"; ?>>
                    <span style="color:blue">Nổi bật</span>                                         
                    &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="is_saleoff" id="is_saleoff" value="1" <?php if($is_saleoff==1) echo "checked"; ?>>
                     &nbsp;SALE OFF                   
                                     
                   &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary btn-sm right" type="submit">Tìm kiếm</button>
                    <?php if(!empty($arrList['data'])){ ?>
                    <button class="btn btn-primary btn-sm right" type="button" id="btnExport">Export</button>
                    <?php } ?>
                </form>
                
            </div>
            <div class="box-body">                
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody>
                        <tr>                            
                            <th width="1%">No.</th>
                            <th width="20%">Ảnh đại diện</th>
                            <th width="70%">Thông tin sản phẩm</th>                                                        
                            <th width="8%">Ngày tạo</th>
                            <th width="1%">Thao tác</th>
                        </tr>
                        <?php

                        $i = 0;

                        if(!empty($arrList['data'])){                   

                        foreach($arrList['data'] as $product){

                        $i++;

                        ?>
                        <tr>                            
                            <td><?php echo $i; ?></td>
                            <td >
                                <div style="position:relative;width:100%">
                                    <?php if($product['deal_amount'] > 0 || $product['da_ban'] > 0){ ?>
                                        <img src="img/deal.jpg" style="position:absolute;right:5px;top:5px;"/>
                                    <?php } ?>
                                <?php $url_image = ($product['image_url']) ? "../".$product['image_url'] : STATIC_URL."img/no_image.jpg"; ?>
                                <img class="lazy" data-original="<?php echo $url_image; ?>" width="120" />
                                </div>
                            </td>  
                            <td>
                                <div style="width:70%;float:left;">
                                Mã sản phẩm : <?php echo $product['product_code']; ?><br />
                                <a style="font-size:16px" href="index.php?mod=product&act=form&id=<?php echo $product['id']; ?><?php echo $link_form; ?>">
                                    <?php echo $product['product_name']; ?>
                                </a>                                                              
                                                 
                                <br>
                                Giá :
                                <span style="font-weight:bold  font-family: arial; font-size: 15px;  color: #db2827;  width: 90%;">
                                    <?php 
                                    if($product['price_saleoff'] > 0){
                                        echo number_format($product['price_saleoff']);
                                    }
                                    else{
                                        echo number_format($product['price']);
                                    } ?>
                                </span>&nbsp;&nbsp;&nbsp;
                                <?php if($product['price_saleoff'] > 0){ ?> <br />
                                Giá cũ : <span style="text-decoration:line-through">
                                    <?php echo number_format($product['price']); ?>
                                </span>
                                <?php } ?>
                                <?php if($product['percent_deal']){ ?>
                                &nbsp;&nbsp;&nbsp;<span style="color:red">Giảm : <?php echo $product['percent_deal']; ?>%</span>
                                <?php } ?>
                                </div>
                                <div style="with:30%;float:left">
                                <input type="checkbox" class="checkbox_ajax" data-type="is_hot" data-id="<?php echo $product['id']; ?>" <?php if($product['is_hot']==1) echo "checked"; ?>>
                                <span style="color:blue">Nổi bật ( hiện trang chủ )</span>                                                        
                                <br />
                                <input type="checkbox" class="checkbox_ajax" data-type="trangthai" data-id="<?php echo $product['id']; ?>" <?php if($product['trangthai']==1) echo "checked"; ?>>
                                <span style="color:blue">HẾT HÀNG</span>                                                    
                               
                                </div>
                                <p style="text-align:right;bottom:0px;width:100%;clear:both">
                                    <a href="index.php?mod=feedback&act=list&product_id=<?php echo $product['id']; ?>">
                                        Xem feedback
                                    </a>
                                </p>
                            </td>                                                                                  
                            <td style="white-space:nowrap"><?php echo date('d-m-Y',$product['created_at']); ?></td>                                             

                            <td style="white-space:nowrap">
                                <?php if($model->checkprivilege(14)){ ?>
                                <a href="index.php?mod=product&act=form&id=<?php echo $product['id']; ?><?php echo $link_form; ?>" title="Click để chỉnh sửa">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                <?php } ?>
                                <?php if($model->checkprivilege(15)){ ?>
                                <a href="javascript:;" alias="<?php echo $product['product_name']; ?>" id="<?php echo $product['id']; ?>" mod="product" class="link_delete" title="Click để xóa">    
                                    <i class="fa fa-fw fa-trash-o"></i>
                                </a>  
                                <?php } ?>
                            </td>
                        </tr> 

                        <?php } 
                        ?>
<tr >
                            <td colspan="5">
                                <?php echo $model->phantrang($page, 10, $total_page, $link); ?>
                            </td>
                        </tr>
<?php
                    }else{ ?>   
                        <tr>
                            <td colspan="5" class="error_data">Không tìm thấy dữ liệu!</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix"></div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->
</div>

<script type="text/javascript">
function getCateByCateType(cate_type_id,action,type){
    $.ajax({
        url: "ajax/Ajax.php",
        type: "POST",
        async: true,
        data: {                             
            'action' : action,
            'cate_type_id' : cate_type_id,
            'type' : type
        },
        success: function(data){                                                    
            $('#cate_id').html(data);
            <?php if($cate_id > 0){ ?>
            $('#cate_id').val(<?php echo $cate_id; ?>);
            <?php }else{ ?>            
            $('#cate_id').val(<?php echo $parent_id; ?>);
            <?php } ?>
        }
    }); 
}
$(document).ready(function(){
    $('#btnExport').click(function(){
        $('#exportForm').submit();
    });
    $('#cate_id').change(function(){              
        $('#form_search').submit();
    });  
    $('#cate_type_id, #trangthai').change(function(){
        $('#form_search').submit();
    })
    $('.checkbox_ajax').click(function(){
        var obj = $(this);
        var product_id = obj.attr('data-id');
        var type = obj.attr('data-type');
        var checked = obj.is(':checked');
        if(checked == true){
            if(type=='is_available'){
                var val = 0;    
            }else{
                var val = 1;    
            }            
            var mes = "Bạn có chắc chắn BẬT tính năng này ?";
        }else{
            if(type=='is_available'){
                var val = 1;    
            }else{
                var val = 0;    
            }  
            var mes = "Bạn có chắc chắn TẮT tính năng này ?";
        }
        if(confirm(mes)){
            $.ajax({
                url: "ajax/Ajax.php",
                type: "POST",
                async: true,
                data: {       
                    'action' : 'ajax-checkbox' ,                     
                    'val' : val,
                    'type' : type,
                    'product_id' : product_id
                },
                success: function(data){                                               
                    alert('Thao tác thành công!');
                }
            });
        }        
    }); 
     $('#cate_type_id').change(function(){
        getCateByCateType($(this).val(),"get-cate-by-type-product",'list');      
    });
    <?php if($cate_type_id > 0){ ?>
        getCateByCateType(<?php echo $cate_type_id; ?>,"get-cate-by-type-product",'list');       
    <?php } ?>
});    
</script>