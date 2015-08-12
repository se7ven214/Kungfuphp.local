<?php
/*
 * The main page template file.
 */
get_header();
?>
<!-- Details Start  -->
<section class="detail-section">
	<div class="container">
    	<div class="row details-mian">
        	<?php 
			get_sidebar();
			?>
            <article class="col-md-8">
            	<div class="wix-inner-post">
                	<?php  if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
                	<aside class="col-md-12 no-padding-left wix-single-post">
                    	<?php $wix_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); if($wix_feat_image!="") { ?>
                                <img class="img-responsive" src="<?php echo $wix_feat_image; ?>" alt="Banner" />
                                <?php } ?>
                        <h2 class="post-titel"><?php wix_title(); ?></h2>                     
                        <div class="wix-post-content">
                        	<?php the_content();?>
                        </div>
                    </aside>
                    <?php
					endwhile; endif;
					?>
                </div>
				<?php comments_template(); ?>
				<div><?php echo do_shortcode('[fbcomments]'); ?></div>
            </article>
        </div>
      </div>
</section>
<!-- Details End  -->
<?php
get_footer();
?>
<script type="text/javascript">
    var ATDOptions = {};
    ATDOptions.opt = {widget_parent:'topdev-d9b7293cc3f9695fffd8acf01666b25d', client_id:'d9b7293cc3f9695fffd8acf01666b25d',widget_width:1300,widget_height:1300};
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = '//topdev.vn/affiliate/getIframe/type/2/client_id/d9b7293cc3f9695fffd8acf01666b25d';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>