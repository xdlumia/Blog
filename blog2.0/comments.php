<div class="comments_beigin">
<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
?>


<?php
if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
// if there's a password
// and it doesn't match the cookie
?>
<li class="decmt-box">
<p><a href="#addcomment">请输入密码再查看评论内容.</a></p>
</li>
<?php
} else if ( !comments_open() ) {
?>
<li class="decmt-box">
<p><a href="#addcomment">评论功能已经关闭!</a></p>
</li>
<?php
} else if ( !have_comments() ) {
?>
<li class="decmt-box">
<p><a href="#addcomment">还没有任何评论，你来说两句吧</a></p>
</li>
<?php
} else {
wp_list_comments('type=comment&callback=aurelius_comment');
}
?>


<?php if ( comments_open() ) : ?>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('你需要先 <a href="%s">登录</a> 才能发表评论.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>
<?php $defaults = array(
'comment_notes_before' => '',
'label_submit' => __( '提交评论' ),
'comment_notes_after' =>''
);
comment_form($defaults);
endif;
else : ?>
<p><?php _e('对不起评论已经关闭.'); ?></p>
<?php endif; ?>

</div>