<main class="col-md-9 col-sm-8">

	<h2>Tin tức</h2>
	<?php  if(!empty($arrList['data'])){ ?>
	<header class="top_box on_the_sides">

		<div class="left_side v_centered">
		</div>

		<div class="right_side">

			<?php echo $model->phantrang($page,$page_show,$total_page,$link); ?>

		</div>

	</header>
	<?php } ?>

	<!-- - - - - - - - - - - - - - List of entries - - - - - - - - - - - - - - - - -->

	<ul id="main_blog_list" class="list_of_entries list_view">
		<?php
        if(!empty($arrList['data'])){
        $i = 0;
        foreach($arrList['data'] as $row){
        $i++;
      ?>
		<li>

			<!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
			
			<article class="entry">

				<!-- - - - - - - - - - - - - - Entry image - - - - - - - - - - - - - - - - -->

				<a href="tin-tuc/<?php echo $row['article_alias']; ?>.html" class="thumbnail entry_image" title="<?php echo $row['article_title']; ?>">
					
					<img style="width:200px" src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['article_title']; ?>" title="<?php echo $row['article_title']; ?>">

				</a>

				<!-- - - - - - - - - - - - - - End of entry image - - - - - - - - - - - - - - - - -->

				<h4 class="entry_title">
					<a href="tin-tuc/<?php echo $row['article_alias']; ?>.html" title="<?php echo $row['article_title']; ?>">
						<?php echo $row['article_title']; ?>
					</a>
				</h4>

				<div class="entry_meta">

				</div>

				<p>﻿<?php echo $row['description']; ?></p>

				<a href="tin-tuc/<?php echo $row['article_alias']; ?>.html" class="button_grey middle_btn" title="<?php echo $row['article_title']; ?>">
					Chi tiết
				</a>

			</article>

		</li>
		<?php } } ?>
		

	</ul>

	<!-- - - - - - - - - - - - - - End of list of entries - - - - - - - - - - - - - - - - -->
	<?php  if(!empty($arrList['data'])){ ?>
	<footer class="bottom_box on_the_sides">

		<div class="left_side">

			

		</div>

		<div class="right_side">

			<?php echo $model->phantrang($page,$page_show,$total_page,$link); ?>

		</div>

	</footer>
	<?php } ?>


</main><!--/ [col]-->