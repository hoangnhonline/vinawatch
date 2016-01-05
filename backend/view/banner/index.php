<div class="row">
    <div class="col-md-12">
        <div class="row">
    <h3 style="color:red;text-align:center;margin-bottom:20px">Click vào vị trí banner cần quản lý</h3>
    <!--<div class="col-md-12" >    
        <div class="col-md-12" style="border: 5px solid red;margin-bottom:3px;height:70px" >
            <h3>Menu</h3>
        </div>
        <div class="col-md-9" style="border: 5px solid red;margin-bottom:3px;height:150px">
            <h3><a href="index.php?mod=banner&act=list&position_id=10000">Vị trí 1</a></h3>
        </div>
        <div class="col-md-3" style="border: 5px solid red;margin-bottom:3px;height:150px;border-left:0px">
            <h3><a href="index.php?mod=banner&act=list&position_id=2">Vị trí 2</a></h3>
        </div>
        <div class="col-md-4" style="border: 5px solid red;margin-bottom:3px;height:150px">
            <h3><a href="index.php?mod=banner&act=list&position_id=3">Vị trí 3</a></h3>
        </div>
        <div class="col-md-4" style="border: 5px solid red;margin-bottom:3px;height:150px;border-left:0px">
            <h3><a href="index.php?mod=banner&act=list&position_id=4">Vị trí 4</a></h3>
        </div>
        <div class="col-md-4" style="border: 5px solid red;margin-bottom:3px;height:150px;border-left:0px">
            <h3><a href="index.php?mod=banner&act=list&position_id=5">Vị trí 5</a></h3>
        </div>        
    </div>-->
    </div>
    </div>
    <div class="col-md-12">
        <h3>
            <a href="index.php?mod=banner&act=list&position_id=1">-Slideshow trang chủ</a>
        </h3>
    </div>
    <div class="col-md-12">
        <h3>
            <a href="index.php?mod=banner&act=list&position_id=2">-Banner trang chủ</a>
        </h3>
    </div>
    <div class="col-md-12">
        <h3>
            <a href="index.php?mod=banner&act=list&position_id=6">-Vị trí 6 : trang tin tức</a>
        </h3>
    </div>
    <div class="col-md-12">
        <h3>
            <a href="index.php?mod=banner&act=list&position_id=7">-Vị trí 7 : trang danh mục</a>
        </h3>
    </div>
    <div class="col-md-12">
        <h3>
            <a href="index.php?mod=banner&act=list&position_id=8">-Vị trí 8 : trang chi tiết</a>
        </h3>
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
    $('#img_thumnails').attr('src',fileUrl).show();
}
function BrowseServerIcon( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileFieldIcon; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileFieldIcon( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_icon').attr('src', fileUrl).show();
}
</script>
<script type="text/javascript">
configEditor['height'] = '100px';
var editor = CKEDITOR.replace( 'content',configEditor);    

</script>
