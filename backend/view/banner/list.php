<?php
require_once "model/Backend.php";
$model = new Backend;
$link = "index.php?mod=banner&act=list";
$position_id = (int) $_GET['position_id'];
$arrList = $model->getListBannerByPosition($position_id);
?>
<div class="row">
    <div class="col-md-12">
        <div id="breadcrumb">
            <ul>
                <li>Dashboard</li>
                <li class="arrow"><img src="img/arrow.png"></li>
                <li>
                    <a href="index.php?mod=banner&act=index">Banner</a>
                </li>
                <li class="arrow"><img src="img/arrow.png"></li>
                <li>
                    <a href="index.php?mod=cate&act=list&position_id=<?php echo $position_id ; ?>"> vị trí <?php echo $position_id; ?></a>
                </li>
            </ul>
        </div>        
        <button class="btn btn-primary btn-sm right" 
        onclick="location.href='index.php?mod=banner&act=form&position_id=<?php echo $position_id; ?>'">
        Tạo mới</button>        
        <button class="btn btn-primary btn-sm right" 
        onclick="location.href='index.php?mod=banner&act=index'">
        Back</button>
        <div class="box-header">
            <h3 class="box-title">Danh sách banner :: vị trí <?php echo $position_id; ?></h3>
        </div><!-- /.box-header -->
        <div class="box">
            
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <thead>
                        <tr>
                            <th width="1%">STT</th>
                            <th width="1%" style="white-space:nowrap">Tên sự kiện/ Banner</th>
                            <th width="30%">Liên kết</th>   
                            <th width="20%">Ảnh banner</th>   
                            <th width="20%">Loại banner</th>                      
                            <th width="7%"  style="white-space:nowrap">Ngày bắt đầu</th>                            
                            <th width="7%" style="white-space:nowrap">Ngày kết thúc</th>
                            <th width="7%" style="white-space:nowrap">Trạng thái</th>
                            <th width="1%" style="white-space:nowrap">Thao tác</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php

                        $i = 0;

                        if(!empty($arrList)){                   

                        foreach($arrList as $value){

                        $i++;

                        ?>
                         <tr id="row-<?php echo $value['id']; ?>">
                           <td width="1%"><?php echo $i; ?></th>
                            <td width="1%" style="white-space:nowrap"><?php echo $value['name_event']; ?></td>
                            <td width="30%"><?php echo $value['link_url']; ?></td>   
                            <td width="20%">
                                <img src="../<?php echo $value['image_url'];?>" width="98%" />
                            </td>   
                            <td width="20%">
                                <?php 
                                if($value['type_id']==1) echo "Không có liên kết";
                                if($value['type_id']==2) echo "Liên kết đến nội dung";
                                if($value['type_id']==3) echo "Liên kết đến 1 url";
                                ?>
                            </td>                      
                            <td width="7%"  style="white-space:nowrap">
                                <?php echo $value['start_time'] > 0 ? date('d-m-Y H:i',$value['start_time']) : ""; ?>
                            </td>                            
                            <td width="7%" style="white-space:nowrap">
                                    <?php echo ($value['end_time'] > 0) ? date('d-m-Y H:i',$value['end_time']) : ""; ?>
                            </td>
                            <td width="7%" style="white-space:nowrap;text-align:center">
                                <?php echo ($value['status']==0) ? "<span style='color:red'>Tắt</span>" : "<span style='color:blue'>Bật</span>"; ?>                             
                            </td>
                            <td width="1%" style="white-space:nowrap;text-align:center">

                                <a href="index.php?mod=banner&act=form&id=<?php echo $value['id']; ?>&position_id=<?php echo $position_id?>" title="Click để chỉnh sửa">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                
                                <a title="Click để xóa" href="javascript:;" alias="<?php echo $value['name_event']; ?>" id="<?php echo $value['id']; ?>" mod="banner" class="link_delete" >    
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
            </div><!-- /.box-body -->
            <div class="box-footer clearfix"></div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->
</div>