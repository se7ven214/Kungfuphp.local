<?php
/*
 * The single template file 
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
                	<?php  if ( have_posts() ) :  while ( have_posts() ) : the_post(); wpb_set_post_views(get_the_ID());
?>
                	<aside id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 no-padding-left wix-single-post')?>>
                    	<?php $wix_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <?php if($wix_feat_image){ ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $wix_feat_image; ?>" class="img-responsive" alt="banner" /></a>
                        <?php } ?>
                        <h2 class="post-titel"><?php wix_title(); ?></h2>
                        <div class="post-box-link">
                        	<ul>
								<?php wix_entry_meta();?>                                
                            </ul>
                        </div>
                        <div class="wix-post-content">
                        	<?php the_content();
							wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wix' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
							?>
                        </div>
                        <div class="post-box-link tag">
                        	<ul>
                                <li><?php echo get_the_tag_list('Tags: ',', ','');?></li>
                            </ul>
						</div>
                    </aside>
                    
                </div>
                <div class="col-md-12">
						<span class="default-pagination-next"><?php previous_post_link('&laquo; %link', '%title', true); ?> <b color="green"><= Bài trước</b></span>
                        <span class="default-pagination-previous"><b color="green">Bài kế tiếp =></b> <?php next_post_link('&laquo; %link', '%title', true); ?></span>
                </div>
				<?php
					endwhile; endif;
				?>
                <?php comments_template(); ?>
		        <div ><?php echo do_shortcode('[fbcomments]'); ?></div>
                
            </article>
            
        </div>

    </div>
</section>
<!-- Details End  -->
<?php
get_footer();
?>
