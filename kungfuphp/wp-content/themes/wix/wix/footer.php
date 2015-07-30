<?php wp_footer(); ?><footer>

	<div class="container">

    	<div class="footer">

    	<?php 

			$wix_options = get_option( 'wix_theme_options' );

			if(!empty($wix_options['footertext'])) {

				echo wp_filter_nohtml_kses($wix_options['footertext']);

			}

			 echo "Đối tác : <a href='http://shopnhoibong.com' rel='external nofollow' target='_blank' title='Shop Nhồi Bông'>Shop Nhồi Bông</a>&nbsp; .Copyright 09-11-2014 © by <a href='http://kungfuphp.com' title='học php online miễn phí'>Kungfu PHP</a> Version 2.0.";	

		?>

        </div>    

    </div>

</footer>



</body>

</html>