<footer>
			    <div class="divider"></div>
			    <div class="container info" style="position: relative;">
			        <!--<div class="footer-tet"></div>-->
			        <!--<div class="footer-tet-right"></div>-->
			        <div class="row">
			            <div class="col-md-4 col-sm-4 col-xs-12 border-dash">
			                <div class="box_title"><?php echo $arrText[5];?></div>
			                <div id="Subscribe">
			                    <?php echo $arrText[6];?>
			                    <div class="row">
			                        <div class="col-md-12 form-subscribe">
			                            <div class="col-md-10" style="padding:0px">
			                            	<input class="form-control" placeholder="" />
			                            </div>
			                            <div class="col-md-2" id="div_btn_send">
			                            	<button class="btn btn-danger" style="color: #FFF;  background-color: #DB2827; margin-top: 1px; height: 36px;  width: 80px;">Send</button>
			                            </div>
			                        </div>
			                        <div class="col-md-12 clearfix" style="margin-top:10px">
			                            <div class="row">
			                                <div class="col-sm-2 col-xs-2">
			                                    <a href="http://facebook.com/bibomart.com.vn" title="facebook">
			                                        <img src="css/images/facebook_icon.png" title="facebook" alt="facebook">
			                                    </a>
			                                </div>
			                                <div class="col-sm-2 col-xs-2">
			                                    <a href="https://plus.google.com/111619072028536744590/post" title="google">
			                                        <img src="css/images/google.png" title="google" alt="google">
			                                    </a>
			                                </div>
			                                <div class="col-sm-2 col-xs-2">
			                                    <a href="https://twitter.com/bibomartonline" title="twitter">
			                                        <img src="css/images/twitter.png" title="twitter" alt="twitter">
			                                    </a>
			                                </div>
			                                <div class="col-sm-2 col-xs-2">
			                                    <a href="https://www.pinterest.com/bibomart/" title="pinterest">
			                                        <img src="css/images/pinterest.png" title="pinterest" alt="pinterest">
			                                    </a>
			                                </div>
			                                <div class="col-sm-2 col-xs-2">
			                                    <a href="https://www.youtube.com/" title="youtube">
			                                        <img src="css/images/youtube.png" title="youtube" alt="youtube">
			                                    </a>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-2 col-sm-2 col-xs-12 padding-foot">
			                <?php
		                      $arrBlock1 = $model->getDetailBlockFooter(3);           
		                      ?>
			                <div class="box_title"><?php echo $arrBlock1['data']['block_name']; ?></div>
			                <ul class="footnav">
			                    <?php foreach($arrBlock1['link'] as $link ){ ?>
	                          <li><a title="<?php echo $link['text_link']; ?>"  href="<?php echo $link['link_url']; ?>"><?php echo $link['text_link']; ?></a></li>
	                          <?php } ?>
			                </ul>
			            </div>
			            <div class="col-md-3 col-sm-3 col-xs-12 padding-foot">
			                <?php
		                      $arrBlock2 = $model->getDetailBlockFooter(4);           
		                      ?>
			                <div class="box_title"><?php echo $arrBlock2['data']['block_name']; ?></div>
			                <ul class="footnav">
			                    <?php foreach($arrBlock2['link'] as $link ){ ?>
	                          <li><a title="<?php echo $link['text_link']; ?>" href="<?php echo $link['link_url']; ?>"><?php echo $link['text_link']; ?></a></li>
	                          <?php } ?>
			                </ul>
			            </div>
			            <div class="col-md-3 col-sm-3 col-xs-12 padding-foot">
			                <?php
		                      $arrBlock3 = $model->getDetailBlockFooter(9);           
		                      ?>
			                <div class="box_title"><?php echo $arrBlock3['data']['block_name'];?></div>
			                <ul class="footnav">
			                    <?php foreach($arrBlock3['link'] as $link ){ ?>
	                          <li><a title="<?php echo $link['text_link']; ?>"  href="<?php echo $link['link_url']; ?>"><?php echo $link['text_link']; ?></a></li>
	                          <?php } ?>
			                </ul>
			            </div>
			        </div>
			    </div>

			    <div class="copyright">
			        <div class="container">
			            <div class="row copyright-content">
			                <div class="col-md-8 col-sm-8 col-xs-12 text-center">
			                    <img src="images/logo-bottom.jpg" style="height: 66px;margin-right:10px" align="left" alt="logo bottom" title="logo bottom">			               
			                    <?php echo $arrText[7];?>
			                </div>
			                <div class="col-md-4 col-xs-12">
			                    <a href="http://online.gov.vn/HomePage/CompanyDisplay.aspx?DocId=2287" target="_blank" title="Đã đăng ký với bộ công thương">
			                        <img class="pull-right" alt="Đã đăng ký với bộ công thương" title="Đã đăng ký với bộ công thương" style="margin-left: 23px;height: 66px;" src="images/bocongthuong.png">
			                    </a>
			                    <img src="images/barcode.jpg" alt="bar code" title="bar code" class="pull-right" style="height: 66px;">
			                </div>
			            </div>			            			          
			        </div>
			    </div>
			  
			</footer>