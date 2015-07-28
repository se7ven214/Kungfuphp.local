<?php 
/*
 * Template Name: Right Sidebar
*/
get_header();
?>
<!-- Details Start  -->
<section class="detail-section">
	<div class="container">
    	<div class="row details-mian right-sidebar">        	
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
			<div><?php comments_template(); ?></div>
			<div><?php echo do_shortcode('[fbcomments]'); ?></div>
                    </aside>
                    <?php
					endwhile; endif;
					?>
                </div>
            </article>
            <?php 
			get_sidebar();
			?>
        </div>
	</div>
</section>
<!-- Details End  -->
<?php
get_footer();
?>
