<div class="nav_item size_4" style="width:190px !important;padding-right:<?php if($mod !=""){?>5px;<?php }else{echo '33px;';}?> background-color: #ED1C24;">
	<a id="dmsp">Danh mục sản phẩm</a>
		<?php if($mod !=""){?><button class="open_menu"></button><?php }?>
	</div><!--/ .nav_item-->
<script type="text/javascript">
$(function(){
    if(document.URL != 'http://vinawatch.vn/'){
      $('#dmsp,.open_menu').on('mouseover', function(e){
        var dpane      = $('#menu');
        
        dpane.css('display', 'block');
        
      }).on('mouseout', function(e){
        $('#menu').css('display','none');
      });
      
      // when hovering the details pane keep displayed, otherwise hide
      $('#menu').on('mouseover', function(e){
        $(this).css('display','block');
      });
      /*$('#menu').on('mouseout', function(e){
        //this is the original element the event handler was assigned to
        var e = e.toElement || e.relatedTarget;
        if (e.parentNode == this || e.parentNode.parentNode == this || e.parentNode.parentNode.parentNode == this || e == this || e.nodeName == '#dmsp') {
          return;
        }
        $(this).css('display','none');
        console.log(e.nodeName)
      });
      
      */
  }
});

</script>