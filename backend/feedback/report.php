<?php
ini_set('display_errors',1);
require_once "model/Backend.php";
$model = new Backend;
$phanvan = $model->feedbackTotal(1);
$clickthu = $model->feedbackTotal(2);
$luckhac = $model->feedbackTotal(3);
$khac = $model->feedbackTotal(4);
?>
<div class="row">
    <div class="col-md-12">    
         <div class="box-header">
                <h3 class="box-title">Report feedback total </h3>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <div style="margin-bottom:20px;">
                    <table class="table table-bordered table-striped" style="width:50%">
                        <thead>
                            <tr>
                                <th>Nội dung</th>
                                <th style="text-align:right">Số SP</th>
                                <th style="text-align:right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tôi đang phân vân với sản phẩm khác.</td>
                                <td width="100px" style="text-align:right"><?php echo number_format($phanvan); ?></td>
                                <td>
                                    <a href="index.php?mod=feedback&act=listproduct&type=1" >
                                        Xem danh sách SP
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tôi chỉ click thử thôi nhưng chưa muốn mua.</td>
                                <td style="text-align:right"><?php echo number_format($clickthu); ?></td>
                                <td>
                                    <a href="index.php?mod=feedback&act=listproduct&type=2" >
                                        Xem danh sách SP
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tôi muốn mua sản phẩm này lúc khác.</td>
                                <td style="text-align:right"><?php echo number_format($luckhac); ?></td>
                                <td>
                                    <a href="index.php?mod=feedback&act=listproduct&type=3" >
                                        Xem danh sách SP
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ý kiến khác.</td>
                                <td style="text-align:right"><?php echo number_format($khac); ?></td>
                                <td>
                                    <a href="index.php?mod=feedback&act=listproduct&type=4" >
                                        Xem danh sách SP
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               
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
            </div>
        </div><!-- /.box -->                           
    </div><!-- /.col -->
   
</div>