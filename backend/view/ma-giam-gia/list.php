<?php

$table = "coupon";

$arrList = $model->getList($table, -1, -1);
?>
<div class="row">
    <div class="col-md-12">
        <div id="breadcrumb">
            <ul>
                <li>Dashboard</li>
                <li class="arrow"><img src="img/arrow.png"></li>
                <li>
                    <a href="index.php?mod=ma-giam-gia&act=list">Mã giảm giá</a>
                </li>
            </ul>
        </div>        
                      
        <div class="box-header">
            <h3 class="box-title">Mã giảm giá</h3>
        </div><!-- /.box-header -->
        <div class="box">
            
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <thead>
                        <tr>
                            <th width="1%">STT</th>
                            <th width="1%" style="white-space:nowrap">Mã giảm giá</th>
                            <th width="20%" style="white-space:nowrap">Tiêu đề</th>
                            <th width="20%" style="white-space:nowrap">Nội dung</th>
                            <th width="10%" style="white-space:nowrap">Ngày bắt đầu</th>
                            <th width="10%" style="white-space:nowrap">Ngày kết thúc</th>
                            <th width="20%">Button</th>
                            <th width="1%">Trạng thái</th>   
                            
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
                            <td width="1%">
                                <?php echo $value['code']; ?>
                            </td>
                            <td width="20%">
                                <?php echo $value['title']; ?>
                            </td>
                            <td width="20%"><?php echo $value['content']; ?></td>   
                            <td width="20%"><?php echo $value['start_date']; ?></td>
                            <td width="20%"><?php echo $value['end_date']; ?></td>
                            <td width="20%"><?php echo $value['label']; ?></td>
                            <td width="20%"><?php echo $value['status'] == 0 ? "<span style='color:red'>Tắt</span>" : "<span style='color:blue'>Bật</span>"; ?></td>   
                            
                            
                            <td width="1%" style="white-space:nowrap;text-align:center">

                                <a href="index.php?mod=ma-giam-gia&act=form&id=<?php echo $value['id']; ?>" title="Click để chỉnh sửa">
                                    <i class="fa fa-fw fa-edit"></i>
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
            </div><!-- /.box-body -->
            <div class="box-footer clearfix"></div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->
</div>