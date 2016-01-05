<?php 
require_once "model/Backend.php";
$model = new Backend;

$link = "index.php?mod=banner&act=list";
$data = array();
$position_id = (int) $_GET['position_id'];
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

    $data = $model->getDetailBanner($id);           
}
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=banner&act=list&position_id=<?php echo $position_id; ?>'">Back</button>
        <form method="post"  action="controller/Banner.php" enctype="multipart/form-data">

        <div class="col-md-9">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> banner<?php echo (isset($id) && $id> 0) ? " : ".$data['name_event'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>                
                <input type="hidden" value="<?php echo $id; ?>" name="banner_id" />

                <?php } ?>

            </div><!-- /.box-header -->

            <div class="nav-tabs-custom">

                <div class="button">                    

                    <div class="row">
                            
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>Tên sự kiện/ banner<span class="required"> ( * ) </span></label>
                                <input type="text" name="name_event" id="name_event" class="form-control required" value="<?php if(!empty($data)) echo $data['name_event']; ?>" />
                            </div>  
                            <div class="form-group">
                                <label>Loại<span class="required"> ( * ) </span></label>								
                                <select class="form-control required" name="type_id" id="type_id">
                                    <option value="1" <?php if(!empty($data) && $data['type_id']=="1") echo "selected";?>  >
                                        Không có liên kết
                                    </option>
                                    <option value="2" <?php if(!empty($data) && $data['type_id']=="2")  echo "selected";?> >
                                        Liên kết đến nội dung
                                    </option>
                                    <option value="3" <?php if(!empty($data) && $data['type_id']=="3") echo "selected"; ?>  >
                                        Liên kết đến 1 URL
                                    </option>                                    
                                </select>
                            </div>      
                            <input type="hidden" name="position_id" value="<?php echo $position_id; ?>"/>                                                                             
                            <div class="form-group">
                                <label>Ảnh đại diện</label>                                
                                <input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                                <br />
                                <span style="color:red;font-size:18px;font-weight:bold">
                                    Size ::
                                    <?php 
                                    if($position_id==1) $size = "810 x 480 px";
                                    if($position_id==2) $size = "190 x 240 px";
                                    if($position_id==3) $size = "380 x 190 px";
                                    if($position_id==4) $size = "380 x 190 px";
                                    if($position_id==5) $size = "380 x 190 px";
                                    if($position_id==6) $size = "262 x 0 px";
                                    echo $size;
                                    ?>
                                    <input type="hidden" name="size_default" value="<?php echo $size; ?>"/>
                                </span>
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
                            <div class="form-group" id="lien-ket" style="display:none;">
                                <label>Liên kết</label>
                                <input type="text" name="link_url" id="link_url" class="form-control" value="<?php if(!empty($data['link_url'])) echo $data['link_url']; ?>" />
                            </div>  
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input type="text" name="start_time" id="start_time" class="form-control datetime" value="<?php if(!empty($data['start_time'])) echo date('d-m-Y H:i',$data['start_time']); ?>" />
                            </div> 
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <input type="text" name="end_time" id="end_time" class="form-control datetime" value="<?php if(!empty($data['end_time'])) echo date('d-m-Y H:i',$data['end_time']); ?>" />
                            </div>                      
                            <div class="form-group">                                
                                <input type="checkbox" name="status" id="status" value="0" <?php if($data['status']==0) echo "checked"; ?> />                                
                                <label style="color:red">Tắt</label>
                            </div>
                        </div>                   
                    </div>               
                </div>
            </div><!-- nav-tabs-custom -->

        </div><!-- /.col -->        

        <div class="col-md-12 nav-tabs-custom">
            <div class="row">               
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Giới thiệu ngắn</span></label>
                        <textarea name="description" id="description" class="form-control" rows="5"><?php if(!empty($data)) echo $data['description']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">               
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nội dung chi tiết</span></label>
                        <textarea name="content" id="content" class="form-control" rows="10"><?php if(!empty($data)) echo $data['content']; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="button">
                <button class="btn btn-primary btnSave" type="submit" >Save</button>
                <button class="btn btn-primary" type="button" onclick="location.href='index.php?mod=banner&act=list&position_id=<?php echo $position_id; ?>'">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
configEditor['height'] = '250px';
var editor = CKEDITOR.replace('content',configEditor);
$(function(){
	$('#type_id').change(function(){
		if($(this).val()==3){
			$('#lien-ket').show();
		}else{
			$('#lien-ket').hide();		
		}
	});
	<?php if($data['type_id']==3){ ?>
		$('#lien-ket').show();
	<?php } ?>
    $('.datetime').datetimepicker({
        format:'d-m-Y H:i'
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
