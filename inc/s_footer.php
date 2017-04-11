			</div>
            <div class="col-lg-3 s_tab">
            	<div class="" style="background:#f9f9f9;border:1px solid #d6d6d6">
                	<!--정보 게시판 최신글-->
                	<div class="section-title">
                      <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07">IF</span>-->뉴스</h3>
                      <!--<div class="pull-right see-all"> <a href="#">See all</a> </div>--> 
                    </div>
                    <div class="colgroup"> 
                      <!-- contents -->
                      <div class="content con2_set pat bdwrap"> 
                        <!-- Tabs -->
                        <div id="tabs">
                          <ul class="tabs_list">
                            <li class="t1 active"><a href="#tabs-1">특허</a></li>
                            <li class="t2"><a href="#tabs-2">상표/디자인</a></li>
                            <li class="t3"><a href="#tabs-3">기술정보</a></li>
                            <li class="t4"><a href="#tabs-4">테크+</a></li>
                            <li class="t5"><a href="#tabs-5">국제</a></li>
                            <li class="t6" style="border-right: 0px solid rgb(194, 195, 198);"><a href="#tabs-6">산업</a></li>
                          </ul>
                          
                          <!-- Tabs-1 -->
                          <div id="tabs-1" style="display: block;">
                            <!--<h2>특허</h2>-->
                            <div class="group1">
                                <?php /*?><?php
                                            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                                            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                                            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                                            echo latest('section_basic', "Patent", 5, 25);
                                            ?><?php */?>
                                <?=latest("basic", "news|특허", 4, 25)?>
                            </div>
                            <!-- /group1 --> 
                          </div>
                          <!-- //Tabs-1 --> 
                          
                          <!-- Tabs-2 -->
                          <div id="tabs-2" style="display: none;">
                            <!--<h2>상표/디자인</h2>-->
                             <div class="group1"><?=latest("basic", "news|상표디자인", 2, 25)?></div>
                            <!-- /group1 --> 
                          </div>
                          <!-- /tabs-2 --> 
                          <!-- //Tabs-2 --> 
                          
                          <!-- Tabs-3 -->
                          <div id="tabs-3" style="display: none;">
                            <!--<h2>기술정보</h2>-->
                            <div class="group1"><?=latest("basic", "news|기술정보", 3, 25)?></div>
                            <!-- /group1 --> 
                          </div>
                          <!-- //Tabs-3 --> 
                          
                          <!-- Tabs-4 -->
                          <div id="tabs-4" style="display: none;">
                            <!--<h2>테크+</h2>-->
                            <div class="group1"><?=latest("basic", "news|테크+", 1, 25)?></div>
                            <!-- /group1 --> 
                          </div>
                          <!-- //Tabs-4 --> 
                          
                          <!-- Tabs-5 -->
                          <div id="tabs-5" style="display: none;">
                            <!--<h2>국제</h2>-->
                            <div class="group1"><?=latest("basic", "news|국제", 6, 25)?></div>
                            <!-- /group1 --> 
                          </div>
                          <!-- //Tabs-5 --> 
                          
                          <!-- Tabs-6 -->
                          <div id="tabs-6" style="display: none;">
                            <!--<h2>산업</h2>-->
                            <div class="group1"><?=latest("basic", "news|산업", 7, 25)?></div>
                            <!-- /group1 --> 
                          </div>
                    
                          <!-- //Tabs-6 --> 
                          
                        </div>
                        <!-- //Tabs --> 
                      </div>
                      <!-- //contents --> 
                    </div>
                    <!--//정보 게시판 최신글-->
                    <!--광고-->
                    <div class="section-title">
                      <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->광고</h3>
                    </div>
                    <div class="ad_r">
                        <ul>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad1.jpg" alt="img" style="height:85px" title=""></a></li>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad2.jpg" alt="img" style="height:85px"></a></li>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad3.jpg" alt="img" style="height:85px"></a></li>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad4.jpg" alt="img" style="height:85px"></a></li>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad5.jpg" alt="img" style="height:85px"></a></li>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad6.jpg" alt="img" style="height:85px"></a></li>
                            <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad7.jpg" alt="img" style="height:85px"></a></li>
                        </ul>
                    </div>   
                   <!--//광고-->     
                   <div class="popular-news">
						<h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->오늘의 핫클릭</h3>
						<ul class="popular-news-list">
							<li><?php echo latest_hit("hit", "news", '5', '18'); ?> </li>
						</ul>
					</div>
                    <!--//오늘의 핫클릭-->     
                </div>
			</div>
        </div>
    </div>
</section>

<!--==================================
=            START FOOTER            =
===================================-->

<footer>
<div class="footer-wrapper">
  <div class="container">
    <div class="row">
      <div id="bottom1" class="col-sm-6 col-md-3">
        <p class="footer-logo">IP PORTAL</p>
        <!--<p class="footer-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>-->
        <div class="footer-contact">
          <p> <span>Email:</span> mail@ipaportal.com </p>
          <p> <span>Fax:</span> +0123 4567 8910 </p>
        </div>
      </div>
      <!-- //bottom1 -->
      
      <!--<div id="bottom2" class="col-sm-6 col-md-3">
        <div class="bottom-menu">
          <h3 class="title">Quick Link</h3>
          <div class="pull-left">
            <ul class="menu">
              <li><a href="#">뉴스</a></li>
              <li><a href="#">구인구직</a></li>
              <li><a href="#">국내출원</a></li>
              <li><a href="#">해외출원</a></li>
              <li><a href="#">정보</a></li>
            </ul>
          </div>
          <div class="pull-right">
              <ul class="menu">
                <li><a href="contact.html">Contact</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="comingsoon.html">Coming Soon</a></li>
                <li><a href="404.html">404 Page</a></li>
              </ul>
            </div>
        </div>
      </div>--> 
      <!-- //bottom2 -->
      
      <div id="bottom3" class="col-sm-6 col-md-9">
        <div class="">
          <h3 class="title">Linked Site</h3>
          <div class="row list-group">          
              <div class="col-md-2">각국의 특허청</div>
              <div class="col-md-10 tags"> 
                <a class="tag-name" href="#">미국</a> <a class="tag-name" href="#">일본</a> <a class="tag-name" href="#">중국</a> <a class="tag-name" href="#">독일</a> <a class="tag-name" href="#">호주</a> <!--<a class="tag-name" href="#">Fashion</a> <a class="tag-name" href="#">Culture</a> <a class="tag-name" href="#">Business</a> <a class="tag-name" href="#">Art</a>-->
              </div>
          </div>
          <div class="row list-group">          
              <div class="col-md-2">정부기관</div>
              <div class="col-md-10 tags"> 
                <a class="tag-name" href="#">특허청</a><a class="tag-name" href="#">한국지식재산전략원</a><a class="tag-name" href="#">한국발명진흥회</a><a class="tag-name" href="#">한국지식재산연구원</a> <a class="tag-name" href="#">한국특허정보원</a>
              </div>
          </div>
          <div class="row list-group">          
              <div class="col-md-2">협회</div>
              <div class="col-md-10 tags"> 
                <a class="tag-name" href="#">한국특허학회</a><a class="tag-name" href="#">특허정보진흥센터</a><a class="tag-name" href="#">한국지식재산서비스협회</a><a class="tag-name" href="#">대한변리사회</a>
              </div>
          </div>
          <div class="row list-group">          
              <div class="col-md-2">Social</div>
              <div class="col-md-10 tags"> 
                <a class="tag-name" href="#">Twitter</a><a class="tag-name" href="#">Facebook</a><a class="tag-name" href="#">Google+</a><a class="tag-name" href="#">blog</a>
              </div>
          </div>
        </div>
      </div>
      <!-- //bottom3 -->
      
      <!--<div id="bottom4" class="col-sm-6 col-md-3">
        <div class="social-wrapper">
          <h3 class="title">Social Link</h3>
          <ul class="social-icons">
            <li><a target="_blank" href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a target="_blank" href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
            <li><a target="_blank" href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
            <li><a target="_blank" href="#"><i class="fa fa-pinterest"></i> Pinterest</a></li>
            <li><a target="_blank" href="#"><i class="fa fa-linkedin"></i> Linkedin</a></li>
          </ul>
        </div>
      </div>-->
      <!-- //bottom4 --> 
    </div>
    <!-- //row --> 
  </div>
  <!-- //container --> 
</div>
<!-- //footer-wrapper -->

<div class="copyright-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <p class="copyright"> Copyright © 2017 <a href="http://joomshaper.com">IPabroad Portal.</a> All rights reserved.</p>
      </div>
      <!--<div class="col-sm-6 col-md-6">
          <p class="pull-right">Design &amp; Devleopment by&nbsp;<a href="http://www.joomshaper.com/">JOOMSHAPER</a></p>
        </div>
      </div>--> 
      <!-- //row --> 
    </div>
    <!-- //container --> 
  </div>
  <!-- //copyright-wrapper -->
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
  
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/smoothscroll.js"></script>
  <!-- select menu --> 
  <script src="../js/classie.js"></script>
  <script src="../js/selectFx.js"></script>
  <!-- slider --> 
  <script src="../js/jquery.nanoscroller.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.flexslider-min.js"></script>
  <!-- sitcky menu --> 
  <script src="../js/jquery.sticky.js"></script>
  <!-- custom js --> 
  <script src="../js/main.js"></script>
  <script src="../js/tablist.js"></script>
</div>
</body></html>