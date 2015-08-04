<article class="col-md-3 no-padding-left">
	<div class="wix-sidebar">
	<a href="#" class="btn-new-topic"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/btn-new-topic.png"/></a>
	<div align="center" class="wix-widget">
	<h4>Chuyên Mục</h4>
	<div class="menu-right-border"></div>
	<?php
		$chuyenmuc = "<ul>";
		$args = array(
			'orderby'                  => 'cat_name',
			'order'                    => 'ASC',
		);
		$categories = get_categories($args);
		// echo "<pre>";
		// print_r($categories);
		foreach ($categories as $cat) {
			if ($cat->category_parent == 0 &&
				$cat->cat_ID == 68 || 
				$cat->cat_ID == 54 ||
				$cat->cat_ID == 4 ||
				$cat->cat_ID == 1 ||
				$cat->cat_ID == 2 ||
				$cat->cat_ID == 3 ||
				$cat->cat_ID == 61
				) {
				$chuyenmuc .= "<a href='".get_category_link($cat->cat_ID)."'><li>{$cat->cat_name}</li></a>";
			}
		}
		$chuyenmuc .= "</ul>";
		echo $chuyenmuc;
	?>
	</div>
	<img class="wix-widget" src="http://dantri4.vcmedia.vn/IpvqqPNo8LbbZCFrwHAnH3aJqFylB/Image/2015/06/anh-tin-26.05-3a29d.jpg"/>
	<img class="wix-widget" src="http://www.sapuwa.vn//uploads/images/news/2013/Tuyen%20dung/tuyen-dung-t52013-vi-tri-giam-sat-kinh-doanh-sales-sup-516201331753pm.jpg"/>
	<img class="wix-widget"  src="http://sonnptnt.hanoi.gov.vn/sonn/portal/uploads/40f3a71513ef06a25e53061e51bb0953.jpg"/>
	<img class="wix-widget" src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/quang-cao.png"/>
	<div align="center" class="wix-widget">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- ads header -->
                <ins class="adsbygoogle adsbygoogle-sidebar"
                     data-ad-client="ca-pub-6007272368450164"
                     data-ad-slot="2173074738"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
    </div>
	<?php
		dynamic_sidebar('sidebar-1');
	?>
    </div>
</article>