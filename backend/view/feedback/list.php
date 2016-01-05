<?php
require_once "model/Backend.php";
$model = new Backend;
$product_id = (int) $_GET['product_id'];
$link = "index.php?mod=feedback&act=list&product_id=".$product_id ;
$detailProduct = $model->getDetailProduct($product_id);

$listTotal = $model->getListFeedbackByProduct($product_id, -1, -1);

$total_record = count($listTotal);

$total_page = ceil($total_record / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$list = $model->getListFeedbackByProduct($product_id, $offset, LIMIT);

?>
<div class="row">
    <div class="col-md-12">    
         <div class="box-header">
                <h3 class="box-title">Danh sách feedback SP : 
                    <span style="color:#134A24"><?php echo $detailProduct['data']['product_name']; ?></span>

                </h3>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <div style="margin-bottom:20px;">
                    <table class="table table-bordered table-striped" style="width:50%">
                        <thead>
                            <tr>
                                <th>Nội dung</th>
                                <th style="text-align:right">Số lần</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tôi đang phân vân với sản phẩm khác.</td>
                                <td width="100px" style="text-align:right"><?php echo number_format($model->countFeedBackByType($product_id,1)); ?></td>
                            </tr>
                            <tr>
                                <td>Tôi chỉ click thử thôi nhưng chưa muốn mua.</td>
                                <td style="text-align:right"><?php echo number_format($model->countFeedBackByType($product_id,2)); ?></td>
                            </tr>
                            <tr>
                                <td>Tôi muốn mua sản phẩm này lúc khác.</td>
                                <td style="text-align:right"><?php echo number_format($model->countFeedBackByType($product_id,3)); ?></td>
                            </tr>
                            <tr>
                                <td>Ý kiến khác.</td>
                                <td style="text-align:right"><?php echo number_format($model->countFeedBackByType($product_id,4)); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>                       
                        <th style="width:40%">Nội dung</th>                        
                        <th>Ngày feedback</th>                        
                        <th style="width: 1%">Action</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;;
                    if(!empty($list)){
                        foreach ($list as $row) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>                      
                        <td>
                            <?php 
                                if($row['type']==1){
                                    echo "Tôi đang phân vân với sản phẩm khác. ";
                                }elseif($row['type']==2){
                                    echo "Tôi chỉ click thử thôi nhưng chưa muốn mua. ";
                                }elseif($row['type']==3){
                                    echo "Tôi muốn mua sản phẩm này lúc khác. ";
                                }else{
                                    echo "Ý kiến khác. ";
                                }
                            ?>
                        </td>                        
                        <td><?php echo date('d-m-Y H:i',$row['created_at']); ?></td>                        
                        <td style="white-space:nowrap;text-align:center">                            
                            <a href="javascript:;" alias="<?php echo $row['email']; ?>" id="<?php echo $row['id']; ?>" mod="feedback" class="link_delete" >    
                                <i class="fa fa-fw fa-trash-o"></i>
                            </a>    
                            
                        </td>
                    </tr>      
                    <?php } } ?>              
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
                <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>
            </div>
        </div><!-- /.box -->                           
    </div><!-- /.col -->
   
</div>