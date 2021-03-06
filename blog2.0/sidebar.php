   <div class="sideBar">
     <section class="hot-recomm">
            <h2 class="side-title">热门推荐</h2>
              <?php
              $args = array( 'numberposts' => 1, 'orderby' => 'rand', 'post_status' => 'publish' );
              $rand_posts = get_posts( $args );
              foreach( $rand_posts as $post ) : ?>
            <div class="big-hot">
              <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=160&w=300&zc=1" alt="<?php the_title(); ?>" />
                <h3><?php the_title(); ?></h3>
              </a>
            </div>
            <?php endforeach; ?>

            <?php
              $args = array( 'numberposts' => 15, 'orderby' => 'rand', 'post_status' => 'publish' );
              $rand_posts = get_posts( $args );
              foreach( $rand_posts as $post ) : ?>

            <dl>
              <dd class="dl-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></dd>

            </dl>
            <?php endforeach; ?>
       </section>

       <section class="hot-recomm">
          <h2 class="side-title">热门文章</h2>

          <?php
            $post_num = 15; // 设置调用条数
            $args = array(
                  'post_password' => '',
                      'post_status' => 'publish', // 只选公开的文章.
                      'post__not_in' => array($post->ID),//排除当前文章
                      'caller_get_posts' => 1, // 排除置顶文章.
                      'orderby' => 'comment_count', // 依评论数排序.
                      'posts_per_page' => $post_num
            );
                    $query_posts = new WP_Query();
                    $query_posts->query($args);
                    while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>

          <dl>
            <dd class="dl-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></dd>

          </dl>
          <?php } wp_reset_query();?>
          

       </section>
       <section class="hot-tag">
          <h2 class="side-title">热门标签</h2>
          <div class="hote-taglist">
            <?php wp_tag_cloud('smallest=8&largest=22'); ?>
          </div>
       </section>
       <section class="art-place">
          <h2 class="side-title">文章归档</h2>
          <div class="art-placelist">
            <?php wp_get_archives('limit=10'); ?>
          </div>
       </section>
       <section class="side-contact">
          <div class="side-conT"><h3>联系我啊  么么哒!</h3></div>
          <div class="side-conS">
             <a href="http://www.weibo.com/xdlumia" target="_blank">&#xe61b;</a>
             <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=xdq@live.cn" target="_blank">&#xe61c;</a>
             <a href="#" title="214005111" target="_blank">&#xe61e;</a>
             <a href="http://wpa.qq.com/msgrd?v=3&uin=214005111&site=qq&menu=yes" target="_blank">&#xe61d;</a>
          </div>
       </section>
   </div>