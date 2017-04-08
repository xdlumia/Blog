<?php get_header(); ?>
<!--banner Swiper -->
 <div class="owl-carousel blog-banner">
        <?php  
    $args = array(  
    'posts_per_page' => -1,  
    'post__in' => get_option( 'sticky_posts' )  
    );  
    $sticky_posts = new WP_Query( $args );  
    while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();?>  
    
      <div class="item">
       <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_first_image() ?>" > </a>
        <div class="focus-con">
             <?php the_category(); ?>
             <h2 class="focus-title">
               <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"><?php the_title(); ?></a>
             </h2>
             <div class="focus-element">
               <span>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" >  <?php echo get_avatar( get_the_author_email() ); ?> 
                  <?php the_author(); ?>
                </a>
               </span>
               <span><i>&#xe606;</i><?php the_time('Y.n.j') ?></span>
               <span><i>&#xe621;</i><?php post_views('','次'); ?></span>
             </div>
             <p><?php _e(wp_trim_words( $post->post_content, 75,'......')) ?>...</p>
             <a href="<?php the_permalink(); ?>" class="read-more">阅读全文</a>
          </div>
      </div>
     <?php endwhile; wp_reset_query();?>    
  </div>

<div class="container center-block">
   <div class="content-box">
      <ul class="artList">
         <?php
            $post_num = 10; // 显示文章的数量.
            $args=array(
            'post_status' => 'publish',
            'paged' => $paged,
            'caller_get_posts' => 1,
            'posts_per_page' => $post_num
            );
            query_posts($args);
            // 主循环
            if ( have_posts() ) : while ( have_posts() ) : the_post();
          ?> 
         <li>
           <!-- 列表页图片 -->
           <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="artList-img">
             <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=160&w=240&zc=1" alt="<?php the_title(); ?>" />
             <i>&#xe621;</i>
           </a>
           <!-- 列表页title -->
           <div class="artList_text">
             <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h2>
             <p><?php _e(wp_trim_words( $post->post_content, 75,'......')) ?></p>
            <!-- 列表页信息 -->
             <div class="focus-element">
               <span>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" >  <?php echo get_avatar( get_the_author_email() ); ?> 
                  <?php the_author(); ?>
                </a>
               </span>
               <span><i>&#xe606;</i><?php the_time('Y.n.j') ?></span>
               <span><i>&#xe621;</i><?php post_views('','次'); ?></span>
             </div>
           </div>
         </li>
         <?php endwhile; else: endif; wp_reset_query();?> 
      </ul>
   </div>
   <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
