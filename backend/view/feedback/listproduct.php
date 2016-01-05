<?php
require_once "model/Backend.php";
$model = new Backend;
$type = (int) $_GET['type'];
$link = "index.php?mod=feedback&act=listproduct&type=".$type ;

$listTotal = $model->getListFeedbackByType($type, -1, -1);

$total_record = count($listTotal);
$limit = 50;
$total_page = ceil($total_record / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$list = $model->getListFeedbackByType($type, $offset, $limit);

?>
<div class="row">
    <div class="col-md-12"> 
    <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=feedback&act=report'">BACK</button>   
         <div class="box-header">
                <h3 class="box-title">Danh sách SP feedback : 
                    <span style="color:#134A24">
                        <?php 
                        if($type == 1) echo "Tôi đang phân vân với sản phẩm khác.";
                        if($type == 2) echo "Tôi chỉ click thử thôi nhưng chưa muốn mua.";
                        if($type == 3) echo "Tôi muốn mua sản phẩm này lúc khác.";
                        if($type == 4) echo "Ý kiến khác.";
                        ?>
                    </span>

                </h3>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <div style="margin-bottom:20px;">
                   
                </div>
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>                       
                        <th style="width:40%">Tên SP</th>                        
                        <th>Số lần </th>                                                
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
                            <a href="index.php?mod=product&act=form&id=<?php echo $row['id']; ?>" target="_blank">
                                <?php echo $row['product_name']; ?>
                            </a>
                        </td>                        
                        <td><?php echo number_format($model->countFeedBackByType($row['id'], $type)); ?></td>                                                
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