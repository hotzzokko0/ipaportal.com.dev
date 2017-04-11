<!--==================================
=            START FOOTER            =
===================================-->

<footer>
<div class="footer-wrapper">
<div class="container">
  <div class="row">
    <div id="bottom1" class="col-sm-12 col-md-12">
      <p class="footer-logo">(주)아이피어브로드</p>
      <!--<p class="footer-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>-->
      <div class="footer-contact">
        <p><!--<span>Email:</span>-->대표 : 서성호 주소 : 서울특별시 강남구 테헤란로 238, 15층(역삼동, 성림대봉빌딩)</p>
        <p><!--<span>Fax:</span>-->대표전화 : 02-557-8081</p>
        <p>사업자번호 : 430-88-00117 통신판매업 : 제 2015-서울강남-03751 호</p>
      </div>
      <div class="copyright-wrapper">
        <p class="copyright"> Copyright &copy; 2017 <a href="http://joomshaper.com">IPabroad Portal.</a> All rights reserved.</p>
      </div>
    </div>
    <!-- //bottom1 --> 
  </div>
  <!-- //container --> 
</div>
<!-- //footer-wrapper -->

</footer>
<!--====  End of FOOTER  ====--> 

<!-- Offcanvas Start-->
<div class="offcanvas-overlay"></div>
<div class="offcanvas-menu visible-sm visible-xs"> <a href="#" class="close-offcanvas"><i class="fa fa-remove"></i></a>
  <div class="offcanvas-inner">
    <h3 class="title">Search</h3>
    <div class="search">
      <form action="#" method="post">
        <input name="searchword" maxlength="200" class="inputbox search-query" type="text" placeholder="Search ...">
      </form>
    </div>
    <ul>
      <li> <a href="index.php">홈</a> <!--<<span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-01" aria-expanded="false" aria-controls="collapse-menu-01"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
        ul class="collapse" id="collapse-menu-01" aria-expanded="false">
          <li><a href="index2.html">Home2</a></li>
        </ul>--> 
      </li>
      <li><a href="#">뉴스</a></li>
      <li><a href="#">구인구직</a></li>
      <!--<li> <a href="article-categories.html">Pages</a> <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-02" aria-expanded="false" aria-controls="collapse-menu-02"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
        <ul class="collapse" id="collapse-menu-02" aria-expanded="false">
          <li><a href="about.html">About Us</a></li>
          <li><a href="advertisement.html">Advertisement</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="comingsoon.html">Coming Soon</a></li>
          <li><a href="404.html">404 Page</a></li>
          <li> <a href="javascript:void(0)">Parent</a> <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-03" aria-expanded="false" aria-controls="collapse-menu-03"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
            <ul class="collapse" id="collapse-menu-03" aria-expanded="false">
              <li><a href="javascript:void(0)">Sub Child 01</a></li>
              <li><a href="javascript:void(0)">Sub Child 02</a></li>
              <li><a href="javascript:void(0)">Sub Child 03</a></li>
              <li> <a href="javascript:void(0)">Parent</a> <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-04" aria-expanded="false" aria-controls="collapse-menu-04"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                <ul class="collapse" id="collapse-menu-04" aria-expanded="false">
                  <li><a href="javascript:void(0)">Sub Child 01</a></li>
                  <li><a href="javascript:void(0)">Sub Child 02</a></li>
                  <li><a href="javascript:void(0)">Sub Child 03</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>-->
      <li><a href="#">국내출원</a></li>
      <li><a href="#">해외출원</a></li>
      <li><a href="#">정보</a></li>
    </ul>
  </div>
</div>
<!-- end Offcanvas --> 

<!--<script src="--><?//= G5_JS_URL ?><!--/jquery.min.js"></script>-->
<!--<script src="--><?//= G5_JS_URL ?><!--/bootstrap.min.js"></script>-->
<script src="<?= G5_JS_URL ?>/smoothscroll.js"></script>
<!-- select menu --> 
<script src="<?= G5_JS_URL ?>/classie.js"></script>
<script src="<?= G5_JS_URL ?>/selectFx.js"></script>
<!-- slider --> 
<script src="<?= G5_JS_URL ?>/jquery.nanoscroller.js"></script>
<script src="<?= G5_JS_URL ?>/owl.carousel.min.js"></script>
<script src="<?= G5_JS_URL ?>/jquery.flexslider-min.js"></script>
<!-- sitcky menu --> 
<script src="<?= G5_JS_URL ?>/jquery.sticky.js"></script>
<!-- custom js --> 
<script src="<?= G5_JS_URL ?>/main.js"></script>
<script src="<?= G5_JS_URL ?>/tablist.js"></script>
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

<!-- } 콘텐츠 끝 -->
<?php /*?>
<hr>

<!-- 하단 시작 { -->
<div id="ft">
    <?php echo popular('theme/basic'); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
    <?php echo visit('theme/basic'); // 접속자집계, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
    <div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/ft.png" alt="<?php echo G5_VERSION ?>"></div>
    <div id="ft_company">
    </div>
    <div id="ft_copy">
        <div>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보취급방침</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a>
            Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.<br>
            <a href="#hd" id="ft_totop">상단으로</a>
        </div>
    </div>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">모바일 버전으로 보기</a>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?><?php */?>
