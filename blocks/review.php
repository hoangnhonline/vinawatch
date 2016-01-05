<div class="row col-md-12 review">
    <h2 class="titles a-center with-subtitle"><span><span id="reviewkh"><?php echo $arrText[22]; ?></span></span></h2>
    <?php $arrNhanxet = $model->getList('content', 0, 3, array('type' => 1));    
    foreach ($arrNhanxet['data'] as $key => $value) {
        
    ?>
    <div class="col-md-4">
        <div class="avatar">
            <img src="<?php echo $value['image_url']; ?>" />
        </div>
        <div class="comment">
            <div><?php echo $value['content']; ?></div>
            <div><span class="name_coment"><?php echo $value['name']; ?></span><br /><span class="cty"><?php echo $value['description']; ?></span></div>
        </div>
        <div class="clear"></div>
    </div>    
    <?php } ?>
</div>