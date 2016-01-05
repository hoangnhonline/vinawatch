$(function() {
    "use strict";
    $('button.btnSave').click(function(){        
        var flag = true;
        $('input.required').each(function(){
            var value = $.trim($(this).val());            

            if(value == ''){
                alert('Vui lòng nhập đầy đủ thông tin.');
                $(this).focus();
                flag = false;
                return false;
            }
        });    
         $('select.required').each(function(){
            var value = $(this).val();                      
            if(value == 0){
                alert('Vui lòng nhập đầy đủ thông tin.');
                $(this).focus();
                flag = false;
                return false;
            }
        });  
         $('textarea.required').each(function(){
            var value = $.trim($(this).val());                        
            if(value == ''){
                alert('Vui lòng nhập đầy đủ thông tin.');
                $(this).focus();
                flag = false;
                return false;
            }
        });       
        return flag;
    });
    $('a.link_delete').click(function(){
        var obj = $(this);
        var alias = obj.attr('alias');
        if(confirm('Bạn chắc chắn xóa "' + alias +'" ?')){
            var mod =  obj.attr('mod');
            var id = obj.attr('id');
            $.ajax({
                url: "controller/Delete.php",
                type: "POST",
                async: true,
                data: {
                    'id' : id,
                    'mod' : mod
                },
                success: function(data){                    
                    obj.parent().parent().remove();
                }
            });
        }else{
            return false;
        }
    });

    $('#upload_images').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
                       
        },
        complete: function(data) {       
            var arrRes = JSON.parse(data.responseText); 
            alert(arrRes['thongbao']);
            $("#hinhanh").html(arrRes['text'] + arrRes['str_hinhanh']);
            $( "#div_upload" ).dialog('close');   
            $('#btnSaveImage').show();          
        }
    }); 
    $("#btnUpload").click(function(){
        $("#div_upload" ).dialog({
            modal: true,
            title: 'Upload images',
            width: 370,
            draggable: true,
            resizable: false            
        });
    });
    $("#add_images").click(function(){
        $( "#wrapper_input_files" ).append("<input type='file' name='images[]' /><br />");
    });
    $('a.xoa_image_upload').click(function(){
        var obj = $(this);
        var src = obj.attr('src');
        if(confirm("Remove ảnh này?")){
            var str_hinh_anh = $('#str_hinh_anh').val();
            alert(str_hinhanh);
        }else{
            return false;
        }
    });
    $('#btnSaveImageToNhaXe').click(function(){
        var str_hinh_anh = $("#str_hinh_anh").val();
        var nhaxe_id = $('#nhaxe_id').val();  
         $.ajax({
                url: "controller/Saveimage.php",
                type: "POST",
                async: true,
                data: {
                    'str_hinh_anh' : str_hinh_anh,
                    'nhaxe_id' : nhaxe_id      
                },
                success: function(data){
                    $('#str_hinh_anh').val('');
                    $('#hinhanh').html('');
                    $('#btnSaveImage').hide();
                    window.location.reload();
                }
            });    
    });
    $('select.event_change').change(function(){
        $('#form_search').submit();
    });
    $('input.text_search').keypress(function (e) {
      if (e.which == 13) {
        $('#form_search').submit();
      }
    });
    //Make the dashboard widgets sortable Using jquery UI
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    $(".box-header, .nav-tabs").css("cursor","move");
    //jQuery UI sortable for the todo list
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();;    

 
    //SLIMSCROLL FOR CHAT WIDGET
    $('#chat-box').slimScroll({
        height: '250px'
    });
  
   
    //Fix for charts under tabs
    $('.box ul.nav a').on('shown.bs.tab', function(e) {
        area.redraw();
        donut.redraw();
    });


    /* BOX REFRESH PLUGIN EXAMPLE (usage with morris charts) */
    $("#loading-example").boxRefresh({
        source: "ajax/dashboard-boxrefresh-demo.php",
        onLoadDone: function(box) {
            bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: '2006', a: 100, b: 90},
                    {y: '2007', a: 75, b: 65},
                    {y: '2008', a: 50, b: 40},
                    {y: '2009', a: 75, b: 65},
                    {y: '2010', a: 50, b: 40},
                    {y: '2011', a: 75, b: 65},
                    {y: '2012', a: 100, b: 90}
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['CPU', 'DISK'],
                hideHover: 'auto'
            });
        }
    });

    /* The todo list plugin */
    $(".todo-list").todolist({
        onCheck: function(ele) {
            //console.log("The element has been checked")
        },
        onUncheck: function(ele) {
            //console.log("The element has been unchecked")
        }
    });

});