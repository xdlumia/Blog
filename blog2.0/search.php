<?php get_header(); ?>

<div class="container center-block">
   <div class="content-box">
      <div class="seaech_nums"><i class='iconfont'>&#xe60f;</i> <?php global $wp_query;  echo '为你找到相关结果 ' . $wp_query->found_posts . ' 个'; ?></div> 
      <ul class="artList">
         <?php if(have_posts()) : ?><!--开始检测-->
         <?php while(have_posts()) : the_post(); ?><!--以下面的格式显示每篇日志--> 
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
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">  <?php echo get_avatar( get_the_author_email() ); ?> 
                  <?php the_author(); ?>
                </a>
               </span>
               <span><i>&#xe606;</i><?php the_time('Y.n.j') ?></span>
               <span><i>&#xe621;</i><?php post_views('','次'); ?></span>
             </div>
           </div>
         </li>
         <?php endwhile;?>
         <?php else : ?>
         <p class="not_found">暂时还没有任何内容</p>
         <?php endif; ?>
      </ul>
   </div>
   <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
