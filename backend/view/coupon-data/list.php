<?php
$table = "coupon_data";
$link = "index.php?mod=coupon-data&act=list";
$listTotal = $model->getList($table, -1, -1);

$total_record = $listTotal['total'];

$limit = 50;
$total_page = ceil($total_record / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$arrList = $model->getList($table, $offset, $limit);
?>
<div class="row">
    <div class="col-md-12">
        <div id="breadcrumb">
            <ul>
                <li>Dashboard</li>
                <li class="arrow"><img src="img/arrow.png"></li>
                <li>
                    <a href="index.php?mod=coupon-data&act=list">KH nhận mã giảm giá</a>
                </li>
            </ul>
        </div>                              
        <div class="box-header">
            <h3 class="box-title">Danh sách khách hàng đăng ký nhận mã giảm giá</h3>
        </div><!-- /.box-header -->
        <div class="box">
            
            <div class="box-body">
                Total : <?php echo $listTotal['total']; ?>
                <table class="table table-bordered table-striped" id="tbl_list">
                    <thead>
                        <tr>
                            <th width="1%">STT</th>
                            <th width="20%" style="white-space:nowrap">Họ Tên</th>
                            
                            <th width="20%">Email</th>   
                            <th width="20%">Điện thoại</th>   
                            <th width="10%">Mã giảm giá</th>   
                            <th width="20%">Thời gian ĐK</th>
                            <th width="1%" style="white-space:nowrap">Thao tác</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php

                        $i = 0;

                        if(!empty($arrList['data'])){                   

                        foreach($arrList['data'] as $value){

                        $i++;

                        ?>
                         <tr id="row-<?php echo $value['id']; ?>">
                           <td width="1%"><?php echo $i; ?></th>
                            <td width="1%" style="white-space:nowrap">
                                <?php echo $value['name']; ?>
                            </td>                            
                            <td width="30%"><?php echo $value['email']; ?></td>   
                            <td width="20%"><?php echo $value['phone']; ?></td>   
                            <td width="20%"><?php echo $value['code']; ?></td>   
                            <td width="20%"><?php echo date('d-m-Y H:i', $value['created_at']); ?></td>   
                            
                            
                            <td width="1%" style="white-space:nowrap;text-align:center">
                                
                                <a title="Click để xóa" href="javascript:;" alias="<?php echo $value['name']; ?>" id="<?php echo $value['id']; ?>" mod="coupon_data" class="link_delete" >    
                                    <i class="fa fa-fw fa-trash-o"></i>
                                </a>  
                                
                            </td>
                        </tr>                         
                        <?php } }else{ ?>   
                        <tr>
                            <td colspan="9" class="error_data">Không tìm thấy dữ liệu!</td>
                        </tr>
                        <?php } ?>
                      
                    </tbody>
                </table>
                 <div class="box-footer clearfix">
                            
                            <?php echo $model->phantrang($page, 10, $total_page, $link); ?>
                        </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix"></div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->
</div>