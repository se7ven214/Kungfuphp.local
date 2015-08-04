<?php
/**
 * The main template file.
 */
get_header();
query_posts( 'posts_per_page=6' );
$i=1;
if(!empty($_POST['cus_cm'])){
 $cus_cm = $_POST['cus_cm'];
 $file = "survey_infomation.txt";
 $file_open = fopen($file, "a") or die("Unable to open file!");
 $line = $cus_cm.',';
 fwrite($file_open, $line);
 fclose($file_open);
}
?>

<!-- Details Start  -->
<section class="detail-section">
	<div class="container">
	<?php //echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
    <!-- <div class="row"> -->
        <div class="yourclass">
              <?php
                    $popularpost  = new WP_Query( array( 'posts_per_page' => 8, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                    while ( $popularpost->have_posts() ) :
                        $popularpost->the_post();
                        $i++;
                ?>
                        <div>
                            <div class="article">
                                <?php $wix_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
                                <div class="post-box-img">
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

                                <div class="post-box-details" >
                                <a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                ?>
            </div>
        <!-- </div> -->
    	<div class="row details-mian">
            <article class="col-md-9 no-padding-left" >
                <h1>
                    Bài viết mới nhất               
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
                </h1>
                <?php
                $currentSort = !empty($_GET['sort']) ? $_GET['sort'] : 'newest';
                if (!ctype_alnum($currentSort)) $currentSort = 'newest';
                ?>
                <div class="cma-content">
                <ul class="cma-thread-orderby">
                    <a href="<?php echo esc_attr(add_query_arg(array('sort' => 'newest'), get_pagenum_link(0))); ?>"><li<?php if( $currentSort == 'newest' ): ?> class="cma-current-sort"<?php endif; ?>><?php _e('Mới nhất', 'cm-answers'); ?></li></a>
                    <a href="<?php echo esc_attr(add_query_arg(array('sort' => 'hottest'), get_pagenum_link(0))); ?>"><li<?php if( $currentSort == 'hottest' ): ?> class="cma-current-sort"<?php endif; ?>><?php _e('Hot nhất', 'cm-answers'); ?></li></a>
                    <a href="<?php echo esc_attr(add_query_arg(array('sort' => 'votes'), get_pagenum_link(0))); ?>"><?php if( CMA_AnswerThread::isRatingAllowed() ): ?><li<?php if( $currentSort == 'votes' ): ?> class="cma-current-sort"<?php endif; ?>><?php _e('Votes nhiều nhất', 'cm-answers'); ?></li></a><?php endif; ?>
                    <a href="<?php echo esc_attr(add_query_arg(array('sort' => 'views'), get_pagenum_link(0))); ?>"><li<?php if( $currentSort == 'views' ): ?> class="cma-current-sort"<?php endif; ?>><?php _e('Xem nhiều nhất', 'cm-answers'); ?></li></a>
                </ul>
                </div>
                <div class="cma-clear"></div>
                <div class="detail-inner masonry-container">
                        <?php

                        $args = array('post_type' => 'cma_thread');
                        $posttt = new WP_Query( $args );
                        while($posttt->have_posts()):
                            $posttt->the_post();
                            $thread = CMA_AnswerThread::getInstance(get_the_ID());
                            ?>

                            <div class="col-md-12 topic">
                            <div class="article">
                            <div style="margin-left:10px;width:100%;float:left;margin-bottom:10px">
                            <div class="StatBox ViewsBox AnswersBox" style="background: #73a550;color: #FFF;">
                            <span>Bình luận</span>
                            <?php
                            $numberOfAnswers = $thread->getNumberOfAnswers();
                            echo $numberOfAnswers; ?>
                            </div>
                            <div class="StatBox ViewsBox">
                            <span>Xem</span>
                            <?php
                                $views = $thread->getViews();
                                echo $views;
                            ?>
                            </div>
                            <?php if( CMA_AnswerThread::isRatingAllowed() ): ?>
                            <div class="StatBox HasAnswersBox">
                            <span>Thích</span>
                            <?php
                                $votes = $thread->getVotes();
                                                echo $votes;
                            ?>
                            </div>
                            <?php endif; ?>
                            <div class="ItemContent Discussion">
                                <a style="color:#282828" href="<?php echo esc_attr(get_permalink(get_the_ID())); ?>"><?php echo $thread->getTitle(); ?></a>
                            <div class="Meta">
                            <span class="Announcement"><?php echo $thread->getLastPosterName();?></span>
                            <span class="LastCommentDate"><?php printf(__('updated %s by %s', 'cm-answers'),
                                    	CMA_AnswerThread::renderDaysAgo($thread->getUnixUpdated()), $thread->getLastPosterName()); ?></span>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_query();
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="cma-pagination col-md-12" style="float: left;width: 100%;"><a href="http://kungfuphp.local/answers" style="    background: #58585A none repeat scroll 0 0;
                    height: 38px;
                    line-height: 1;
                    padding: 5px 5px;
                    text-align: center;
                    color:#fff;">Xem thêm</a></div>
	             
	            <div class="detail-inner masonry-container">
		            <h1>
		                    Tuyển dụng	                 
		            </h1>
		            <?php 
		            $args = array( 'posts_per_page' => 6, 'offset'=> 1, 'category' => 57 );
					$posts_array = get_posts( $args ); ?>
					<ul>
					<?php foreach ( $posts_array as $post ) : setup_postdata( $post );
					$wix_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
					
					
						<li class="col-md-4">
							<div class="recruitment">
								<img src="<?php echo $wix_feat_image; ?>" style="height: 30px"/><br>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
						</li>
						
					<?php endforeach; 
					wp_reset_postdata();?>
					</ul>
	            </div>
            </article>
            <?php
             get_sidebar();
            ?>

        </div>
   <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document" style="position: absolute;top: 36%;left: 27%;">
  <div class="modal-content">
    <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Modal title</h4>
    </div>
    <div class="modal-body">
   <label>Ban thay giao dien moi cua kungfuphp co dep hem?</label>
    </div>
    <div class="modal-footer">
   <form method="post" action="<?php get_home_url(); ?>">
   <table>
   <tr>
    <td><input type="radio" name="cus_cm" value="1">like a shit</td>
    <td><input type="radio" name="cus_cm" value="2">Good<br></td>
    <td><input type="radio" name="cus_cm" value="3">Need to improve</td>
   </tr> 
   </table>
   <button type="submit" class="btn btn-primary">Send</button>
   </form>
    </div>
  </div>
   </div>
 </div>
</section>
<!-- Details End  -->
<?php
 get_footer();
?>
<script type="text/javascript">
    var $email_frm = 1;
    var $ur_sh = '<?php echo $_SESSION['c_rcm']; ?>';
    $( document ).ready(function() {
        setInterval(function(){if($email_frm == 1 && $ur_sh != 'closed' ){$('#myModal').modal('show'); $email_frm = 0;}}, 3000);
        $('.close').click(function(){
            <?php $_SESSION['c_rcm'] = 'closed'; ?>
        });
    });
</script>
