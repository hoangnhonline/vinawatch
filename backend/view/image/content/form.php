<?php 
require_once "model/Backend.php";
$model = new Backend;

$link = "index.php?mod=content&act=list";
$data = array();
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

    $data = $model->getDetail('content', $id);           
}
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=content&act=list'">Back</button>
        <form method="post"  action="controller/Content.php" enctype="multipart/form-data">

        <div class="col-md-9">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> nhận xét <?php echo (isset($id) && $id> 0) ? " : ".$data['name_event'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>                
                <input type="hidden" value="<?php echo $id; ?>" name="id" />

                <?php } ?>
                <input type="hidden" value="1" name="type" />                
            </div><!-- /.box-header -->

            <div class="nav-tabs-custom">

                <div class="button">                    

                    <div class="row">
                            
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>Họ Tên<span class="required"> ( * ) </span></label>
                                <input type="text" name="name" id="name" class="form-control required" value="<?php if(!empty($data)) echo $data['name']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Chức danh<span class="required"> ( * ) </span></label>
                                <input type="text" name="description" id="description" class="form-control required" value="<?php if(!empty($data)) echo $data['description']; ?>" />
                            </div>                              
                           
                            <div class="form-group">
                                <label>Ảnh</label>                                
                                <input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                                <br />
                                <span style="color:red;font-size:18px;font-weight:bold">
                                    Size ::
                                    100 x 100 px
                                    <input type="hidden" name="size_default" value="<?php echo $size; ?>"/>
                                </span>
                                <div id="from_sv">
                                    <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php if(!empty($data['image_url'])) echo "../".$data['image_url']; ?>" /><br />
                                    <?php if(!empty($data['image_url'])){ ?>
                                    <img id="img_thumnails" src="../<?php echo $data['image_url']; ?>" height="100" />
                                    <?php }else{ ?>
                                    <img id="img_thumnails" src="static/img/no_image.jpg" width="100" />
                                    <?php } ?>
                                    <button class="btn btn-default" type="button" onclick="BrowseServer('Images:/','image_url')" >Upload</button>
                                </div>
                                <div id="from_cp" style="display:none;padding:15px;margin-bottom:10px">
                                    <input type="file" name="image_url_upload" />
                                </div>


                            </div> 
                            <div class="form-group">
                                <label>Nhận xét</span></label>
                                <textarea name="content" id="content" class="form-control" rows="5"><?php if(!empty($data)) echo $data['content']; ?></textarea>
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
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
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

</script>
<script type="text/javascript">

$(function(){
	
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
