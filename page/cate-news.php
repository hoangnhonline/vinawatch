<?php
$cate_id = (int) $cate_id == 0 ? 22 : $cate_id;
$detailCate  = $model->getDetailCateArticles($cate_id);
$page_show = 5;
$arrTotal = $model->getListArticles($cate_id, -1, -1);
$limit = 20;
$page = 1;
$page = (isset($_GET['trang'])) ? (int) $_GET['trang'] : 1;
$total_page = ceil($arrTotal['total'] / $limit);
$offset = $limit * ($page - 1);
$arrList = $model->getListArticles($cate_id, $offset, $limit);
$link = 'danh-muc/'.$detailCate['cate_alias']."-".$detailCate['cate_id'].".html";
?>		
<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

			<div class="secondary_page_wrapper">

				<div class="container">

					<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

					<ul class="breadcrumbs">

						<li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">Trang chủ</a></li>
						<li>Tin tức</li>
						<li><?php echo $detailCate['cate_name']; ?></li>

					</ul>

					<div class="row">

						<?php include "blocks/news/left.php"; ?>

						<?php include "blocks/news/right.php"; ?>

					</div><!--/ .row-->

				</div><!--/ .container-->

			</div><!--/ .page_wrapper-->
			
			<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->