<?php get_header(); ?>
<div class="container center-block">
<div class="notfound">
      <img class="nf-l" src="<?php bloginfo('template_directory'); ?>/images/img404.gif" alt="">
      <div class="nf-r">
        <img src="<?php bloginfo('template_directory'); ?>/images/img4042.jpg" alt="">
        <p>哎呀，你好像迷路了<br>不要慌！<em id="timeleft">5</em>秒后返回首页</p>
        <a href="/">返回首页</a>
      </div>
    </div>
</div>
<script type="text/javascript">

  var i = 4;
  setInterval(function(){
    if (i<0) {
      location.href="http://www.dreamwq.com";
    }else{
      document.getElementById('timeleft').innerHTML = i--;
    }
  },1000)


</script>
<?php get_footer(); ?>