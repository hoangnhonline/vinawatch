<?php
$arrCustom = array('type' => 2);

$table = "content";

$arrList = $model->getList($table, -1, -1, $arrCustom);
?>
<div class="row">
    <div class="col-md-12">
        <div id="breadcrumb">
            <ul>
                <li>Dashboard</li>
                <li class="arrow"><img src="img/arrow.png"></li>
                <li>
                    <a href="index.php?mod=tin-dung&act=list">Tin dùng</a>
                </li>
            </ul>
        </div>        
        <button class="btn btn-primary btn-sm right" 
        onclick="location.href='index.php?mod=tin-dung&act=form'">
        Tạo mới</button>               
        <div class="box-header">
            <h3 class="box-title">Danh sách tin dùng</h3>
        </div><!-- /.box-header -->
        <div class="box">
            
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <thead>
                        <tr>
                            <th width="1%">STT</th>                            
                            <th width="1%" style="white-space:nowrap">Icon</th>
                            <th width="20%" style="white-space:nowrap">Tiêu đề</th>                            
                            <th width="50%">Nội dung</th>
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
                                <img src="../<?php echo $value['image_url']; ?>" />
                            </td>                              
                            <td width="30%"><?php echo $value['title']; ?></td> 
                            <td width="70%"><?php echo $value['content']; ?></td>   
                            
                            
                            <td width="1%" style="white-space:nowrap;text-align:center">

                                <a href="index.php?mod=tin-dung&act=form&id=<?php echo $value['id']; ?>" title="Click để chỉnh sửa">
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