<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if ( is_home() ) {
    bloginfo('name'); echo " - "; bloginfo('description');
} elseif ( is_category() ) {
    single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {
    single_post_title();
} elseif (is_search() ) {
    echo "搜索结果"; echo " - "; bloginfo('name');
} elseif (is_404() ) {
    echo '页面未找到!';
} else {
    wp_title('',true);
} ?></title>
<meta name="baidu-site-verification" content="zykm03Lpss" />
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" />
<!-- 兼容IE，chrome=1试用的前提是必须安装了chrome浏览器 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- 兼容国内浏览器，直接采用高速模式渲染页面 -->
<meta name="renderer" content="webkit">
<!-- 添加到主屏后的标题（iOS 6 新增） -->
<meta name="apple-mobile-web-app-title" content="冬瓜的博客">
<!-- iPhone 6 plus上是180×180，iPhone 6 是120x120 -->
<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/images/retinahd_icon.png">
<!-- iPhone 和 iTouch，默认 57x57 像素，必须有 -->
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-57x57-precomposed.png" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png">
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fonts/iconfont.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php wp_head(); ?>
</head>
<body>
<header>
   <div class="center-block">
        <ul class="top_l">
            <li><a href="/home">主页</a></li>
            <li><a href="/">博客</a></li>
        </ul>
        <ul class="top_r">
            <?php
                $current_user = wp_get_current_user();
                if ( 0 == $current_user->ID ) {
            ?>
                <li><a href="/register">注册（邀请码）</a></li>
                <li><a href="/login">登录</a></li>
            <?php
                } else {
            ?>
                <li>你好，<?php echo $current_user->display_name;?></li>
                <li><a href="<?php bloginfo('url'); ?>/author/<?php echo $current_user->user_login;?>">个人中心</a></li>
                <?php
                if( $current_user->roles[0] == 'administrator'|| $current_user->roles[0] == 'editor') {
                ?>
                <li><a href="<?php bloginfo('url'); ?>/wp-admin">高级管理</a></li>
                <?php
                }
                ?>
                <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">注销</a></li>
            <?php
                }
            ?> 
        </ul>
     </div>
</header>
<nav class="blog-nav">
  <div class="center-block">
    <div class="blog-logo">
      <a href="/" class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/blog-logo.png" height="50"></a>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'blog-nav-menu') );?>
    <?php get_search_form(); ?>
  </div>
</nav>

<!-- 移动端菜单 -->
<div class="m-nav">
  <div class="m-menu-ico">
   <div class="ico-menu"></div>
  </div>
    <a href="/" class="mlogo"><img src="<?php bloginfo('template_directory'); ?>/images/blog-logo.png" height="30"></a>
  <div class="m-search">
     <div class="search-ico"> 
     </div>
  </div>
   <?php wp_nav_menu( array( 'theme_location' => 'home-menu', 'container_class' => 'm-menu') );?>
    <div class="m-searchbox">
      <?php get_search_form(); ?>
   </div>
</div>