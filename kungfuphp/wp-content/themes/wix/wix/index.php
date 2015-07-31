<?php
/**
 * The main template file.
 */	
get_header();
query_posts( 'posts_per_page=6' );
$i=1;
?>
<!-- Details Start  -->
<section class="detail-section">
	<div class="container">
	<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
    	<div class="row details-mian">
            
            <article class="col-md-9 no-padding-left" >
                <h1>
                    Bài viết mới nhất
                    <span class="arrow"></span>
                </h1>
            	<div class="detail-inner masonry-container">
                <?php  if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>  
                        <?php 
                            $style = ($i==5 || $i==6) ? "":"border-bottom: 1px solid #e6e6e6;";
                            $i++;
                        ?>            
                    <div class="col-md-4 box" style="<?php echo $style; ?>">
                    	<div class="article">
                        	<?php $wix_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
                        	<div class="post-box-img" style="width:150px;float:left">

                            	<?php if($wix_feat_image){ ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $wix_feat_image; ?>" alt="banner" /></a>
								<?php } else { ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="banner" /></a>
                                <?php } ?>
                                <div class="post-box-hover">
                                	<div class="post-box-hover-center">
                                    <div class="post-box-hover-center1">
                                    	<a href="<?php echo get_permalink(); ?>"><i class="zoom-icon"></i></a>
                                   	</div>
                                    </div>
                                </div>
                            </div>                               
                           
                            <div class="post-box-details" style="margin-left:10px;width:210px;float:left">
                            <a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a>
                               <?php  the_excerpt(); ?>
                            </div>
                             <div class="post-box-link" style="width:300px;float:left">
                        		<ul>
                                	<?php wix_entry_meta();?>
                               </ul>
                            </div>                            
                        </div>
                    </div>        

                <?php endwhile; endif; // end have_posts() ?>    			
                    </div>
      
                    <!--Pagination Start-->
                    <!--<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
                    <?php if(is_plugin_active('faster-pagination/ft-pagination.php')) {?>
                        <?php faster_pagination();?>
                    <?php }else { ?>
                    <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
                    <div class="col-md-12">
                        <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
                    	<span class="default-pagination-next"><?php previous_posts_link(); ?></span>
                        <span class="default-pagination-previous"><?php next_posts_link(); ?></span>                 	
                     <?php } ?>
                    </div>
                    <?php } ?>
                    <?php }//is plugin active ?>
                    <!--Pagination End-->
                <h1>
                    Chủ đề mới 
                    <span class="arrow"></span>
                </h1>
                <div class="detail-inner masonry-container">
                <?php  if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>  
                        <?php 
                            $style = ($i==5 || $i==6) ? "":"border-bottom: 1px solid #e6e6e6;";
                            $i++;
                        ?>            
                    <div class="topic">
                        <div class="article">                             
                           
                            <div style="<?php echo $style; ?>margin-left:10px;width:100%;float:left;margin-bottom:10px">
                           <div class="StatBox AnswersBox HasAnswersBox">
                            <span>Comments</span>
                            18
                            </div>
                            <div class="StatBox ViewsBox">
                            <span>Views</span>
                            356
                            </div>
                            <div class="ItemContent Discussion">
                                <a style="color:#282828" href="<?php the_permalink(); ?>"><?php  the_title(); ?></a>
                            <div class="Meta">
                            <span class="Announcement">Announcement</span>
                            <span class="CommentCount">19 comments</span>
                            <span class="LastCommentBy">
                            Most recent by
                                <a href="/index.php?p=/profile/15732/SreenivasKanumuru">SreenivasKanumuru</a>
                            </span>
                            <span class="LastCommentDate">July 22</span>
                            <span>
                                <a class="Category" href="/index.php?p=/categories/vtiger-crm-mobile-apps">vtiger CRM - Mobile Apps</a>
                            </span>
                            </div>
                            </div>
                               <?php  //the_excerpt(); ?>
                            </div>                       
                        </div>
                    </div>        

                <?php endwhile; endif; // end have_posts() ?>               
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
