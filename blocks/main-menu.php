<nav class="main_navigation">

	<ul>

		<li <?php if($mod=="") echo 'class="current"'; ?>>
			<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">Trang chủ</a>
		</li>
		<li <?php if($mod=="content" && $page_id == 1) echo 'class="current"'; ?>>
			<a href="gioi-thieu.html">Giới thiệu</a>
		</li>
		<li <?php if($mod=="news" || $mod=="detail-news") echo 'class="current"'; ?>><a href="tin-tuc.html">Tin tức</a></li>
		<li <?php if($mod=="content" && $page_id == 5) echo 'class="current"'; ?>><a href="bao-hanh.html">Bảo hành</a></li>
		<li <?php if($mod=="content" && $page_id == 2) echo 'class="current"'; ?>><a href="huong-dan-mua-hang.html">Hướng dẫn mua hàng</a></li>
		<li <?php if($mod=="contact") echo 'class="current"'; ?>><a href="lien-he.html">Liên hệ</a></li>		

	</ul>

</nav><!--/ .main_navigation-->