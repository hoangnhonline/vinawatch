<main class="col-md-9 col-sm-8">
	<section class="section_offset">

		<h2><?php echo $data['article_title']; ?></h2>

		<!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
		
		<article class="entry single">

			<!-- - - - - - - - - - - - - - Entry meta - - - - - - - - - - - - - - - - -->

			<div class="entry_meta">

				<div class="alignleft">

					<span><i class="icon-calendar"></i> <?php echo date('d-m-Y',$data['created_at']); ?></span>								

				</div>

				<div class="alignright">

					

				</div>

			</div><!--/ .entry_meta-->

			<!-- - - - - - - - - - - - - - End of entry meta - - - - - - - - - - - - - - - - -->

			<h4 class="entry_title">
				<a href="tin-tuc/<?php echo $data['article_alias']; ?>.html" title="<?php echo $data['article_title']; ?>">
					<?php echo $data['article_title']; ?>
				</a>
			</h4>

			<!-- - - - - - - - - - - - - - Entry image - - - - - - - - - - - - - - - - -->

			<img src="<?php echo $data['image_url']; ?>" class="alignleft" alt="<?php echo $data['article_title']; ?>"  title="<?php echo $data['article_title']; ?>" width="300">

			<!-- - - - - - - - - - - - - - End of entry image - - - - - - - - - - - - - - - - -->

			<p>﻿<?php echo $data['description']; ?></p>

			<div class="col-md-12">
				<?php echo $data['content']; ?>
			</div>
			
		</article>

		<!-- - - - - - - - - - - - - - End of entry - - - - - - - - - - - - - - - - -->

		<footer class="bottom_box">

			Nguồn: <?php echo $data['source']; ?>

		</footer>

	</section>
	<section class="section_offset">

		<h3>Tin liên quan</h3>

		<div class="table_layout related_posts">

			<div class="table_row">

				<!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
				<?php         
		        $arrRelated = $model->getArticlesRelated($data['cate_id'],$article_id,0,3);
		        if(!empty($arrRelated)){ 
		            foreach ($arrRelated as $value) {                
		        ?>
				<div class="table_cell">

					<article class="entry">
						
						<!-- - - - - - - - - - - - - - Thumbnail - - - - - - - - - - - - - - - - -->

						<a href="tin-tuc/<?php echo $value['article_alias']; ?>.html" class="entry_thumb" title="<?php echo $value['article_title']; ?>">

							<img  title="<?php echo $value['article_title']; ?>" height="100" src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['article_title']; ?>">

						</a>

						<!-- - - - - - - - - - - - - - End of thumbnail - - - - - - - - - - - - - - - - -->

						<div class="wrapper">

							<h6 class="entry_title">
								<a href="tin-tuc/<?php echo $value['article_alias']; ?>.html" title="<?php echo $value['article_title']; ?>">
									<?php echo $value['article_title']; ?>
								</a>
							</h6>

							<!-- - - - - - - - - - - - - - Byline - - - - - - - - - - - - - - - - -->

							<div class="entry_meta">

								<span><i class="icon-calendar"></i> <?php echo date('d-m-Y',$value['created_at']); ?></span>												

							</div><!--/ .byline-->

							<!-- - - - - - - - - - - - - - End of byline - - - - - - - - - - - - - - - - -->

						</div><!--/ .wrapper-->

					</article><!--/ .clearfix-->

				</div>

				<?php }} ?>

				<!-- - - - - - - - - - - - - - End of entry - - - - - - - - - - - - - - - - -->

			</div>

		</div>						

	</section>
</main>