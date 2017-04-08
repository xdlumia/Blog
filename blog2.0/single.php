<?php get_header(); ?>
<div class="container center-block">
   <div class="content-box">
      <div class="article">
        <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
         <h1><?php the_title(); ?></h1>
         <div class="focus-element">
           <span><a href="#"><?php echo get_avatar( get_the_author_email() ); ?>xdlumia</a></span>
           <span><i>&#xe606;</i><?php the_time('Y-m-d') ?></span>
           <span><i>&#xe621;</i><?php post_views('','次'); ?></span>
           <span><i>&#xe612;</i>条评论</span>
           <span><i>&#xe620;</i><?php edit_post_link('编辑'); ?></span>
         </div>
         <div class="articel-con">
           <p><?php the_content(); ?></p>


               <?php  $custom_fields = get_post_custom_keys($post_id);
                if (!in_array ('copyright', $custom_fields)) : ?>               
                 转载请注明出处
               <?php else: ?>               
               <?php  $custom = get_post_custom($post_id);
                  $custom_value = $custom['copyright']; ?>               
                 <div class="postcopyright"> 
                  原文:<a target="_blank" target="_blank" rel="nofollow" href="<?php echo $custom_value[0] ?>" >
                   <?php echo $custom_value[0] ?></a>
               </div>
               <?php endif; ?>               
         </div>
         <ul class="cat_related">
           <h2>相关文章</h2>
           <?php
        global $post;
        $cats = wp_get_post_categories($post->ID);
        if ($cats) {
            $args = array(
                  'category__in' => array( $cats[0] ),
                  'post__not_in' => array( $post->ID ),
                  'showposts' => 5,
                  'caller_get_posts' => 1
              );
          query_posts($args);

          if (have_posts()) {
            while (have_posts()) {
              the_post(); update_post_caches($posts); ?>
           <li>
              <!-- <a class="img" href="<?php the_permalink(); ?>" target="_blank"><img src="images/0001.png" alt="<?php the_title(); ?>"></a> -->
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
           </li>
           <?php
            }
          }
          else {
            echo '<li>* 暂无相关文章</li>';
          }
          wp_reset_query();
        }

        else {
          echo '<li>* 暂无相关文章</li>';
        }
        ?>
        </ul>
        <?php endif; ?>
      </div>
     <!-- 评论代码 -->
     <?php comments_template('', true);?>

      
   </div>
  
   <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>