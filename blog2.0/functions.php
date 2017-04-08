<?php
// 自定义菜单
register_nav_menus(
array(
'home-menu' => __( '首页菜单' ),
'footer-menu' => __( 'footer' ),
)
);


if ( function_exists('add_theme_support') ) add_theme_support('post-thumbnails'); function catch_first_image() { global $post, $posts; $first_img = ''; ob_start(); ob_end_clean(); $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); $first_img = $matches [1] [0]; if(empty($first_img)){ $random = mt_rand(1, 20); echo get_bloginfo ( 'stylesheet_directory' ); echo '/images/random/tb'.$random.'.jpg'; } return $first_img; }
/*  获取文章首张缩略图地址 */
add_theme_support('post-thumbnails');  




//输出缩略图地址
function post_thumbnail_src(){
  global $post;
  if( $values = get_post_custom_values("thumb") ) { //输出自定义域图片地址
    $values = get_post_custom_values("thumb");
    $post_thumbnail_src = $values [0];
  } elseif( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
    $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
    $post_thumbnail_src = $thumbnail_src [0];
  } else {
    $post_thumbnail_src = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if(!empty($matches[1][0])){
      $post_thumbnail_src = $matches[1][0];   //获取该图片 src
    }else{  //如果日志中没有图片，则显示随机图片
      $random = mt_rand(1, 5);
      $post_thumbnail_src = get_template_directory_uri().'/images/random/'.$random.'.jpg';
      //如果日志中没有图片，则显示默认图片
      //$post_thumbnail_src = get_template_directory_uri().'/images/default_thumb.jpg';
    }
  };
  echo $post_thumbnail_src;
}

?>

<?php
function remove_open_sans_from_wp_core() {
wp_deregister_style( ‘open-sans’ );
wp_register_style( ‘open-sans’, false );
wp_enqueue_style(‘open-sans’,”);
}
add_action( ‘init’, ‘remove_open_sans_from_wp_core’ );
?>

<?php
// Remove Open Sans that WP adds from frontend   
if (!function_exists('remove_wp_open_sans')) :   
function remove_wp_open_sans() {   
wp_deregister_style( 'open-sans' );   
wp_register_style( 'open-sans', false );   
}
// 前台删除Google字体CSS   
add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
// 后台删除Google字体CSS   
add_action('admin_enqueue_scripts', 'remove_wp_open_sans'); 
endif;


/* 访问计数 */
function record_visitors()
{
  if (is_singular())
  {
    global $post;
    $post_ID = $post->ID;
    if($post_ID)
    {
      $post_views = (int)get_post_meta($post_ID, 'views', true);
      if(!update_post_meta($post_ID, 'views', ($post_views+1)))
      {
      add_post_meta($post_ID, 'views', 1, true);
      }
    }
  }
}
add_action('wp_head', 'record_visitors');
 
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ',$after = '次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
?>


