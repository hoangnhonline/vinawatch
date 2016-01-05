<div class="secondary_page_wrapper">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="Trang chủ">Trang chủ</a></li>
			<li><a href="tin-tuc.html" title="Tin tức">Tin tức</a></li>
			<li><?php echo $data['article_title']; ?></li>
		</ul>
		<div class="row">
			<?php include "blocks/news/left.php"; ?>
			<?php include "blocks/news/cate.php"; ?>			
		</div>
		</div>
</div>