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
                    $popularpost  = new WP_Query( array( 'posts_per_page' => 10, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
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

                            <div class="col-md-9 topic box">
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
                                <a href="<?php echo esc_attr(get_permalink(get_the_ID())); ?>"><?php echo $thread->getTitle(); ?></a>
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
	             
	          
                    <?php
                        $data_json = '{"info":{ "app_id":"ATD_51", "app_secret":"HdvaBrEUzCcbec3cOaKGFCkeUZT2y2TzUKW8/3xW8kzxnQDLH9+LGtCVA1/DUEy7i/YwXesKFuI/qufqiokazQ==" },
                                     "location":"27,28", "skills":"13,16,34,21,22,23,31,36,43,11,434,445,229", "limit":"0,6"}';
                        $url = "http://partner.topdev.vn/api/getJobs";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        $response  = curl_exec($ch);
                        $results = json_decode($response);
                        // $results->token;
                        //echo "<pre>";print_r($results->data);

                        curl_close($ch);
                        //exit();
                        
                    ?>

		            <h1 style="margin-top:50px">
		                    Tuyển dụng	                 
		            </h1>
		              <div class="detail-inner masonry-container">
		            <?php 
		            $args = array( 'posts_per_page' => 6, 'offset'=> 1, 'category' => 57 );
					$posts_array = get_posts( $args ); ?>
					<ul>
					<?php foreach ( $results->data as $post ) : 
					// $wix_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
                    ?>
					
					<?php
                        $min_salary = $post->salary_min;
                        $max_salary = $post->salary_max;
                        $salary = ($min_salary==0 && $max_salary==0) ? "TThuận":$min_salary.'-'.$max_salary;
                    ?>
						<li class="col-md-4 box">
							<div class="row recruitment">
								<p>
                                    <a href="https://topdev.vn/partners/detail-jobs/<?php echo $post->alias; ?>/?token=<?php echo  $results->token; ?>"><?php echo $post->title; ?></a>
                                </p>
                                <p>
                                <p class="col-md-12 no-padding-left">
                                    <span class="span-cell tooltips" style="width:28%" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lương">
                                        <img src="http://kungfuphp.local/wp-content/uploads/2015/01/clock.png" />: <?php echo $salary; ?>
                                    </span>
                                    <span class="span-cell tooltips" style="width:23%" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Year">
                                        <img src="http://kungfuphp.local/wp-content/uploads/2015/01/clock.png" />: >1 năm
                                    </span>
                                    <span class="span-cell tooltips" style="width:14%" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="So luong">
                                        <img src="http://kungfuphp.local/wp-content/uploads/2015/01/rankings.png" />: <?php echo $post->qty; ?>
                                    </span>
                                    <span class="span-cell tooltips" style="width:30%" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Noi lam viec">
                                        <img src="http://kungfuphp.local/wp-content/uploads/2015/01/location.png" />: Hồ Chí Minh
                                    </span>
                                </p>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 no-padding" style="text-align: right;">
                                    <a style="top:10px;left:-25px" class="btn btn-orange btn-apply-job" href="https://topdev.vn/partners/detail-jobs/<?php echo $post->alias; ?>/?token=<?php echo  $results->token; ?>" target="_blank">Apply</a>
                                </div>
                               
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
    <div class="modal-header" style="background:#BB2828;color:#fff">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Bình chọn</h4>
    </div>
    <div class="modal-body">
   <label>Bạn thấy giao diện mới của KungfuPHP như thế nào?</label>
    </div>
    <div class="modal-footer">
   <form method="post" action="<?php get_home_url(); ?>">
   <table class="layout-vote">
   <tr>
   <td>
   		<input type="radio" class="radio_item" value="1" name="cus_cm" id="radio1" hidden>
		<label class="label_item" for="radio1"> <img class="vote1" id="tuyetvoi" src="<?php echo get_template_directory_uri(); ?>/images/vote1.png"/> </label>
   </td>
   <td>
   		<input type="radio" class="radio_item" value="2" name="cus_cm" id="radio2" hidden>
		<label class="label_item" for="radio2"> <img class="vote2" id="tamon" src="<?php echo get_template_directory_uri(); ?>/images/vote2.png"/> </label>
   </td>
   <td>
   		<input type="radio" class="radio_item" value="3" name="cus_cm" id="radio3" hidden>
		<label class="label_item" for="radio3"> <img class="vote3" id="xaute" src="<?php echo get_template_directory_uri(); ?>/images/vote3.png"/> </label>
   </td>
   </tr> 
   </table>
   <span style="float:left">* Click vào hình để chọn.</span>
   <!--button type="submit" class="btn btn-primary">Gửi</button-->
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
        //$('#myModal').modal('show');
        setInterval(function(){if($email_frm == 1 && $ur_sh != 'closed' ){$('#myModal').modal('show'); $email_frm = 0;}}, 5000);
        $('.close').click(function(){
            <?php $_SESSION['c_rcm'] = 'closed'; ?>
        });
    });
    var tuyetvoi = "tuyetvoi";
    var tamon = "tuyetvoi";
    var xaute = "tuyetvoi";
    $("#tuyetvoi").bind( "click", function() {
        <?php
            $myfile = "vote.txt";
            //$current = file_get_contents($myfile);
            $current1 = ",Tuyetvoi";
            file_put_contents($myfile, $current1,FILE_APPEND | LOCK_EX);
        ?>
       
    	$('#myModal').modal('hide');
        return false;
    	});
    $("#tamon").bind( "click", function() {
    	 <?php
            $myfile = "vote.txt";
            //$current = file_get_contents($myfile);
            $current2 = ",Tamon";
            file_put_contents($myfile, $current2,FILE_APPEND | LOCK_EX);
        ?>
       
        $('#myModal').modal('hide');
        return false;
 	   });
    $("#xaute").bind( "click", function() {
    	 <?php
            $myfile = "vote.txt";
            //$current = file_get_contents($myfile);
            $current3 = ",Xaute";
            file_put_contents($myfile, $current3,FILE_APPEND | LOCK_EX);
        ?>
        
        $('#myModal').modal('hide');
        return ;
 	   });

</script>
