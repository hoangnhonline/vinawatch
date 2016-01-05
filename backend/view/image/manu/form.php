<?php 
require_once "model/Backend.php";
$model = new Backend;

$link = "index.php?mod=manu&act=list";
$data = $arrCateType = array();
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

    $data = $model->getDetailManu($id);   
    $arrCateType = $model->getListCateTypeManu($id);          
}
$arrListCateType = $model->getListCateType();
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=manu&act=list'">Danh sách</button>
        <form method="post"  action="controller/Manu.php" enctype="multipart/form-data">

        <div class="col-md-6">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> logo <?php echo (isset($id) && $id> 0) ? " : ".$data['manu_name'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>
                <input type='hidden' name='display_order' value="<?php echo $data['display_order']; ?>">
                <input type="hidden" value="<?php echo $id; ?>" name="manu_id" />

                <?php } ?>

            </div><!-- /.box-header -->

            <div class="nav-tabs-custom">

                <div class="button">                    

                    <div class="row">
                            
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>Tên logo <span class="required"> ( * ) </span></label>
                                <input type="text" name="manu_name" id="manu_name" class="form-control required" value="<?php if(!empty($data)) echo $data['manu_name']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Menu danh mục</label>
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <?php 
                                    $i = 0;
                                    foreach ($arrListCateType as $ct) {
                                        $i++;                                        
                                    ?>
                                    <input type="checkbox" name="catetype_id[]" id="catetype_id<?php echo $ct['id'];?>" 
                                    <?php if(in_array($ct['id'], $arrCateType)) echo "checked"; ?>
                                    value="<?php echo $ct['id']; ?>"> 
                                    <label for="catetype_id<?php echo $ct['id'];?>"><?php echo $ct['cate_type_name']; ?></label><br>
                                    <?php 
                                    if($i%4==0) echo "</div><div class='col-md-4'>";
                                    } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>                                                                                   
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                                <div id="from_sv">
                                    <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php if(!empty($data['image_url'])) echo "../".$data['image_url']; ?>" /><br />
                                    <?php if(!empty($data['image_url'])){ ?>
                                    <img id="img_thumnails" src="../<?php echo $data['image_url']; ?>" height="200" />
                                    <?php }else{ ?>
                                    <img id="img_thumnails" src="static/img/no_image.jpg" width="200" />
                                    <?php } ?>
                                    <button class="btn btn-default" type="button" onclick="BrowseServer('Images:/','image_url')" >Upload</button>
                                </div>
                                <div id="from_cp" style="display:none;padding:15px;margin-bottom:10px">
                                    <input type="file" name="image_url_upload" />
                                </div>

                            </div>
                            <input type="hidden" value="1" name="is_hot" />
                            <input type="hidden" value="0" name="hidden" />                            
                        </div>                   
                    </div>               
                </div>
            </div><!-- nav-tabs-custom -->

        </div><!-- /.col -->

        <div class="col-md-6">

            <!-- Custom Tabs -->
            <div style="clear:both;margin-bottom:30px"></div>
            <div class="box-header">
                
            </div><!-- /.box-header -->
           
        </div><!-- /.col -->

        <div class="col-md-12 nav-tabs-custom">
            <div class="row">               
              <input type="hidden" value="" name="description" /> 
            </div>

            <div class="button">
                <button class="btn btn-primary btnSave" type="submit" >Save</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="static/ckfinder/ckfinder.js"></script>
<script type="text/javascript">

function split(val) {
    return val.split(/;\s*/);
}

function extractLast(term) {
    return split(term).pop();
}
function BrowseServer( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_thumnails').attr('src', fileUrl).show();
}
$(function(){
    <?php if(isset($_GET['cate_type_id'])){ ?>
        $('#cate_type_id').val(<?php echo $_GET['cate_type_id'];?>)
    <?php } ?>

});
</script>
<script type="text/javascript">
$(function(){
    $('#manu_name').blur(function(){
        if($('#meta_title').val()==''){
            $('#meta_title').val($(this).val());
        }
        if($('#meta_keyword').val()==''){
            $('#meta_keyword').val($(this).val());
        }
        if($('#meta_description').val()==''){
            $('#meta_description').val($(this).val());
        }        
    });
    $('#choose_img_sv').click(function(){
        $('#from_sv').show();
        $('#from_cp').hide();
    });
    $('#choose_img_cp').click(function(){
        $('#from_cp').show();
        $('#from_sv').hide();
    }); 
});      
</script>
