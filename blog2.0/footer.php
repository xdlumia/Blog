
<footer>
   <div class="friendlink">
     <div class="center-block">
       <h2>友情链接：</h2>
       <ul>
         <li><a href="#">it之家</a></li>
         <li><a href="#">it之家</a></li>
         <li><a href="#">it之家</a></li>
         <li><a href="#">it之家</a></li>
         <li><a href="#">it之家</a></li>
       </ul>
     </div>
   </div>
   <a href="/home" class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a>
   <ul class="nav">
     <li><a href="/">博客首页</a></li>
     <li><a href="/home" target="_blank">个人主页</a></li>

   </ul>
   <ul class="social">
      <li><a class="icon-qq1" href="http://wpa.qq.com/msgrd?v=3&amp;uin=214005111&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"></a></li>
     <li><a class="icon-iconfontweibo" href="http://weibo.com/u/3119916730" target="_blank" rel="nofollow"></a></li>
     <li><a class="icon-facebook" href="https://www.facebook.com/xdlumia" target="_blank" rel="nofollow"></a></li>
     <li><a class="icon-googleplus" href="https://plus.google.com/u/0/" target="_blank" rel="nofollow"></a></li>
   </ul>
   <div class="bottom"><p style="color:#999; font-size: 13px;">© 2015-2017 Dreamwq.com 版权所有-京ICP备16000487号</p></div>
</footer>
<!-- JavaScript脚本 -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<!-- Swiper JS -->
<script src="<?php bloginfo('template_directory'); ?>/js/owl.js"></script>
<!-- 更改滚动条 -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.nicescroll.js"></script>
<!-- 让页面流畅滚动 让导航贴住顶部 -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.sticky.js"></script> 

<script>
var owl = $('.owl-carousel'); 
owl.owlCarousel({
    items: 1,
    loop:true,
    animateOut: 'fadeOut',
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{    
        765:{
          items:1
        }
    }
});


// loading
$(window).load(function(){
  $(".preloader").delay(600).fadeOut("slow")
});

// niceScroll

// $("html").niceScroll();


// Stick menu
if($(window).width()>540){
$("nav").sticky({topSpacing:0});
}
// var navH = $("nav").offset().top;
//  //滚动条事件
//  $(window).scroll(function(){
//   var scroH = $(this).scrollTop();
//   if(scroH>=navH){
//     $("nav").addClass('navfixed')
//   }else if(scroH<navH){
//      $("nav").removeClass("navfixed")
//   }
//  })




//主页移动端菜单
$(document).on('click',".m-menu-ico",function(){
  $(".m-menu-ico").toggleClass('on');
  $(".m-menu").slideToggle("fast");
  $(".m-searchbox").slideUp("fast");
})

$(document).on('click',".m-search",function(){
  $(".m-search").toggleClass('on');
  $(".m-searchbox").slideToggle("fast");
  $(".m-menu").slideUp("fast");
})

if($(window).width()<=540){
  $(".m-nav").sticky({topSpacing:0});
  $(".m-menu").on("click",function(){
    $(this).hide("fast");
    $('.m-menu-ico').removeClass('on')
  });
}

// 搜索按钮
$(".blog-nav form .text").on("click",function(){
  $(".blog-nav form ").animate({width:"200px"},"fast")

})
</script>
<?php wp_footer(); ?>

<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<!-- 页面自动推送链接 -->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https'){
   bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  }
  else{
  bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</body>
</html>