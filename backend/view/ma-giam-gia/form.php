<?php 
require_once "model/Backend.php";
$model = new Backend;

$link = "index.php?mod=content&act=list";
$data = array();
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

    $data = $model->getDetail('coupon', $id);           
}
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=content&act=list'">Back</button>
        <form method="post"  action="controller/Coupon.php" enctype="multipart/form-data">

        <div class="col-md-9">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> nhận xét <?php echo (isset($id) && $id> 0) ? " : ".$data['name_event'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>                
                <input type="hidden" value="<?php echo $id; ?>" name="id" />

                <?php } ?>
                               
            </div><!-- /.box-header -->

            <div class="nav-tabs-custom">

                <div class="button">                    

                    <div class="row">                        
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>Tiêu đề<span class="required"> ( * ) </span></label>
                                <input type="text" name="title" id="title" class="form-control required" value="<?php if(!empty($data)) echo $data['title']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung<span class="required"> ( * ) </span></label>
                                <input type="text" name="content" id="content" class="form-control required" value="<?php if(!empty($data)) echo $data['content']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Mã giảm giá<span class="required"> ( * ) </span></label>
                                <input type="text" name="code" id="code" class="form-control required" value="<?php if(!empty($data)) echo $data['code']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Button<span class="required"> ( * ) </span></label>
                                <input type="text" name="label" id="label" class="form-control required" value="<?php if(!empty($data)) echo $data['label']; ?>" />
                            </div>
                           <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input type="text" name="start_date" id="start_date" class="form-control datetime" value="<?php if(!empty($data['start_date'])) echo $data['start_date']; ?>" />
                            </div> 
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <input type="text" name="end_date" id="end_date" class="form-control datetime" value="<?php if(!empty($data['end_date'])) echo $data['end_date']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" <?php if($data['status']==0) echo "selected"; ?>>Tắt</option>
                                    <option value="1" <?php if($data['status']==1) echo "selected"; ?>>Bật</option>
                                </select>
                            </div>       
                            <div class="button">
                                <button class="btn btn-primary btnSave" type="submit" >Save</button>
                                <button class="btn btn-primary" type="button" onclick="location.href='index.php?mod=content&act=list&position_id=<?php echo $position_id; ?>'">Cancel</button>
                            </div>
                        </div>                   
                    </div>               
                </div>
            </div><!-- nav-tabs-custom -->

        </div><!-- /.col -->             
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.datetime').datetimepicker({
        format:'d-m-Y H:i'
    });  
})
</script>