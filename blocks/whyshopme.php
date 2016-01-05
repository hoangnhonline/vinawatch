<div class="row col-md-12 whyshopme">
    <div class="wpb_column vc_column_container vc_col-sm-12" style="margin-top: 35px; margin-bottom: 30px;">
        <h2 class="titles a-center with-subtitle"><span><span id="shopmew"><?php echo $arrText[14]; ?></span></span></h2>
        <span class="subtitle a-center"><?php echo $arrText[15]; ?></span>
    </div>
    <?php $arrNhanxet = $model->getList('content', 0, 3, array('type' => 2));
    $countTinDung = 0;    
    foreach ($arrNhanxet['data'] as $key => $value) {
        $countTinDung++;
    ?>
    <div class="col-md-4">
        <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element ">
                <div class="wpb_wrapper">
                    <h3 style="text-align: left;">
                        <img width="32" height="32" alt="ly do tin dùng <?php echo $countTinDung; ?>" src="<?php echo $value['image_url']?>" class="alignleft" >
                        <span style="font-size: 14pt; line-height: 23px;">
                            <?php echo $value['title']; ?>
                        </span>
                    </h3>
                </div>
            </div>
            <div class="wpb_text_column wpb_content_element ">
                <div class="wpb_wrapper">
                    <p style="margin: 0; float: left;">
                    <?php echo $value['content']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>    
    <div style="width: 100%; display: block; text-align: center; margin-top: 0px; float: left;"><img src="http://vinawatch.vn/upload/icon/hoa-van.png" /></div>
</div>