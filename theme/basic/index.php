<?php /*?><?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
//
//include_once('../gnuboard5/common.php'); 
//include_once(G5_LIB_PATH.'/latest.lib.php'); 
?><?php */?>
<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<?php /*?><h2 class="sound_only">최신글</h2>
<!-- 최신글 시작 { -->
<?php
//  최신글
$sql = " select bo_table
            from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
            where a.bo_device <> 'mobile' ";
if(!$is_admin)
    $sql .= " and a.bo_use_cert = '' ";
$sql .= " order by b.gr_order, a.bo_order ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    if ($i%2==1) $lt_style = "margin-left:20px";
    else $lt_style = "";
?>
    <div style="float:left;<?php echo $lt_style ?>">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/basic', $row['bo_table'], 5, 25);
        ?>
    </div>
<?php
}
?>
<!-- } 최신글 끝 --><?php */?>

<!--==================================
        =            START MAIN WRAPPER      =
        ===================================-->

<div class="row home">
    <div class="col-sm-12">
        <section class="main-wrapper bgipa p-b-5"> 
            
            <!-- Latest News -->
            <div class="newedge-latest-news"> 
                <!--IPA포털 메인뉴스-->
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9"> 
                        <!-- article-slider -->
                        <div class="img-wrapper"><!--<img class="img-100p latest-post-image" src="img/OPIS.png" alt="img" style="height:135px">-->
                                    	<img class="img-100p latest-post-image" src="img/banner_main.jpg" alt="img" style="height:135px">
                                    </div>
                        <?php /*?><div id="article-slider" class="owl-carousel">
                            <article class="item leading-item gradient-major">
                                <div class="article-inner">
                                    <div class="overlay"></div>
                                    <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/OPIS.png" alt="img" style="height:135px">
                                    </div>
                                    <div class="article-info"> 
                                        <!--삭제금지--> 
                                        <!--<p class="slide-cat"> <a href="#"> <span class="cat-icon cat-icon-color01"> E</span>2016년 12월 29일 | ipnobics </a> </p>-->
                                        <!--<a href="http://site.pisnet.kr/ipaportal.com/bbs/board.php?bo_table=news&wr_id=17&sca=%ED%8A%B9%ED%97%88">
                                        <h4 class="entry-title"> [특허] 이종특허 융합 ‘IP메디치’ 지원업체 모집 </h4>
                                        <p>한국발명진흥회는 21일 이종분야 특허 등을 활용해 제품 혁신을 꾀하는 ‘IP메디치’ 사업을 시작한다고 밝혔다. 등록특허와 실용신안(전용실시권 포함)을 보유한 중소기업을 대상으로 최대 5개월 동안 특허활용전략 컨설팅을 지원한다.</p>
                                        </a>-->
                                    </div>
                                </div>
                            </article>
                            <article class="item leading-item gradient-major">
                                <div class="article-inner">
                                    <div class="overlay"></div>
                                    <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/ship.png" alt="img" style="height:135px"></div>
                                    <!--<div class="post-share-social">
                                        <a href="#" class="fa fa-facebook"></a>
                                        <a href="#" class="fa fa-twitter"></a>
                                        <a href="#" class="fa fa-google-plus"></a>
                                        <a href="#" class="fa fa-pinterest"></a>
                                        <a href="#" class="fa fa-linkedin"></a>
                                        <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                    </div>--> <!-- //post-share-social -->
                                    <div class="article-info"> 
                                        <!--삭제금지--> 
                                        <!--<p class="slide-cat"> <a href="#"> <span class="cat-icon cat-icon-color01"> N</span>2016년 12월 29일 | ipnobics </a> </p>-->
                                        <a href="http://site.pisnet.kr/ipaportal.com/bbs/board.php?bo_table=news&wr_id=7&sca=%ED%8A%B9%ED%97%88">
                                        <h4 class="entry-title">[특허] 대우조선, 中업체 상대 ‘LNG기술 특허분쟁’ 승소</h4>
                                        <p>대우조선해양이 천연가스연료 추진선박 기술과 관련해 중국에서 진행한 특허분쟁에서 이겼다. 중국 현지업체가 대우조선 특허가 무효라고 주장했지만 받아들여지지 않았다.</p>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="item leading-item gradient-major">
                                <div class="article-inner">
                                    <div class="overlay"></div>
                                    <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/man.jpg" alt="img" style="height:135px"></div>
                                    <!--<div class="post-share-social">
                                        <a href="#" class="fa fa-facebook"></a>
                                        <a href="#" class="fa fa-twitter"></a>
                                        <a href="#" class="fa fa-google-plus"></a>
                                        <a href="#" class="fa fa-pinterest"></a>
                                        <a href="#" class="fa fa-linkedin"></a>
                                        <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                    </div>--> <!-- //post-share-social -->
                                    <div class="article-info"> 
                                        <!--삭제금지--> 
                                        <!--<p class="slide-cat"> <a href="#"> <span class="cat-icon cat-icon-color01"> N</span>2016년 12월 29일 | ipnobics </a> </p>-->
                                        <a href="http://site.pisnet.kr/ipaportal.com/bbs/board.php?bo_table=news&wr_id=25&sca=%EC%83%81%ED%91%9C%EB%94%94%EC%9E%90%EC%9D%B8">
                                        <h4 class="entry-title">[상표디자인] “브렉시트, 유럽공동체 상표·디자인에 타격”…韓·佛 변리사회 공동세미나</h4>
                                        <p>17일 오후 서울 리츠칼튼호텔에서 열린 한국·프랑스 변리사회 공동 세미나에서 미슐레 프랑스 변리사회장은 ‘브렉시트가 유럽 특허 등 지식재산제도에 미치는 영향과 외국 출원인을 위한 조언’을 주제로 발표하며 이같은 의견을 피력했다.</p>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div><?php */?>
                        <!-- //article-slider --> 
                        <!--뉴스스탠드 & 유로서비스-->
                        <ul class="newss_list m-t-10">
                            <div class="section-title">
                                <h3 class="stitle"><i class="fa fa-bell-o"></i> 최신뉴스</h3>
                            </div>
                            <?php /*?><!-- //section-title -->
                            <li class="col-sm-2 col-xs-4 bdb"><a href="#" target="_blank" class="newssa"><img src="img/asia.gif" alt="아시아경제"></a> </li>
                            <li class="col-sm-2 col-xs-4 bdb"><a href="#" target="_blank" class="newssa "><img src="img/donga.gif" alt="동아일보"></a> </li>
                            <li class="col-sm-2 col-xs-4 bdb"><a href="#" target="_blank" class="newssa"><img src="img/etnews.gif" alt="전자신문"></a> </li>
                            <li class="col-sm-2 col-xs-4 bdb"><a href="#" target="_blank" class="newssa"><img src="img/fnnews.gif" alt="파이낸셜뉴스"></a> </li>
                            <li class="col-sm-2 col-xs-4 bdb"><a href="#" target="_blank" class="newssa"><img src="img/herald.gif" alt="헤럴드경제"></a> </li>
                            <li class="col-sm-2 col-xs-4 bdb"><a href="#" target="_blank" class="newssa"><img src="img/is.gif" alt="일간스포츠"></a> </li>
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/khan.gif" alt="경향신문"></a> </li>
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/kmib.gif" alt="국민일보"></a> </li>
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/kbs.gif" alt="KBS"></a> </li>
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/sbs.gif" alt="SBS"></a> </li>
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/mbc.gif" alt="MBC"></a> </li>
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/joongang.gif" alt="중앙일보"></a> </li><?php */?>
                            <li class="col-lg-2"><a href="#" target="_blank"><img src="img/ip.jpg" alt="지적재산권" class="img-responsive"></a>
                            	<span>지적재산권</span>
                            </li>
                            <li class="col-lg-2"><a href="#" target="_blank"><img src="img/it.jpg" alt="IT" class="img-responsive"></a>
                            	<span>IT</span>
                            </li>
                            <li class="col-lg-2"><a href="#" target="_blank"><img src="img/bio.jpg" alt="바이오기술" class="img-responsive"></a>
                            	<span>바이오기술</span>
                            </li>
                            <li class="col-lg-2"><a href="#" target="_blank"><img src="img/tech.png" alt="테크+" class="img-responsive"></a>
                            	<span>테크+</span>
                            </li>
                            <li class="col-lg-2"><a href="#" target="_blank"><img src="img/science.jpg" alt="과학" class="img-responsive"></a>
                            	<span>과학</span>
                            </li>
                            <li class="col-lg-2"><a href="#" target="_blank"><img src="img/industry.jpg" alt="일반산업" class="img-responsive"></a>
                            	<span>일반산업</span>
                            </li>
                            <li class="col-lg-6">
                        	<?php echo latest("simplelatest", "news", 3, 35); ?> 
                        	</li>
                            <li class="col-lg-6">
                        	<?php echo latest("simplelatest", "news", 3, 35); ?> 
                        	</li>
                        </ul>
                        <!--//뉴스스탠드 & 유로서비스-->                  
                    </div>
                    <!-- //col-md-9 -->
                    
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div id="login"> 
						<?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>						
                    	</div>               
                        <div class=" popular-news">
                            <h3 class="stitle m-b-5"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->오늘의 핫클릭</h3>
                            <ul class="popular-news-list">
                                <li><?php echo latest_hit("hit", "news", '10', '18'); ?> </li>
                            </ul>
                        </div>
                    </div>
                    <!--//오늘의 핫클릭--> 
                </div>
                <!-- //row -->                 
                
            </div>
            <!-- //Latest News -->
            <div class="row m-t-10">
                <div class="col-sm-9">
                    
                    <div class="colgroup"> 
                        <!-- 분야별 뉴스 -->
                        <div class="content con2_set pat bdwrap">
                        
                            <div class="section-title">
                                <h3 class="stitle"><i class="fa fa-bell-o"></i> 분야별 뉴스</h3>
                            </div>
                        <!--<iframe src="http://site.pisnet.kr/ipaportal.com/bbs/board.php?bo_table=Patent" width="100%" height="500" frameborder="0" scrolling="no" onload="autoResize(this)"></iframe>--> 
                            <!-- Tabs -->
                            <div id="tabs">
                                <ul class="tabs_list">
                                    <li class="t1 active" style="width:16.666%;"><a href="#tabs-1"><br />
                                        <h3>국제</h3>
                                        </a></li>
                                    <li class="t2" style="width:16.666%;"><a href="#tabs-2"><br />
                                        <h3>정보통신기술</h3>
                                        </a></li>
                                    <li class="t3" style="width:16.666%;"><a href="#tabs-3"><br />
                                        <h3>게임</h3>
                                        </a></li>
                                    <li class="t4" style="width:16.666%;"><a href="#tabs-4"><br />
                                        <h3>자동차</h3>
                                        </a></li>
                                    <li class="t5" style="width:16.666%;"><a href="#tabs-5"><br />
                                        <h3>기술융합</h3>
                                        </a></li>
                                    <li class="t6" style="width:16.666%; border-right: 0px solid rgb(194, 195, 198);"><a href="#tabs-6"><br />
                                        <h3>인공지능</h3>
                                        </a></li>
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
                                        <?=latest("basic", "news|특허", 4, 100)?>
                                    </div>
                                    <!-- /group1 --> 
                                </div>
                                <!-- //Tabs-1 --> 
                                
                                <!-- Tabs-2 -->
                                <div id="tabs-2" style="display: none;"> 
                                    <!--<h2>상표/디자인</h2>-->
                                    <div class="group1">
                                        <?=latest("basic", "news|상표디자인", 2, 100)?>
                                    </div>
                                    <!-- /group1 --> 
                                </div>
                                <!-- /tabs-2 --> 
                                <!-- //Tabs-2 --> 
                                
                                <!-- Tabs-3 -->
                                <div id="tabs-3" style="display: none;"> 
                                    <!--<h2>기술정보</h2>-->
                                    <div class="group1">
                                        <?=latest("basic", "news|기술정보", 3, 100)?>
                                    </div>
                                    <!-- /group1 --> 
                                </div>
                                <!-- //Tabs-3 --> 
                                
                                <!-- Tabs-4 -->
                                <div id="tabs-4" style="display: none;"> 
                                    <!--<h2>테크+</h2>-->
                                    <div class="group1">
                                        <?=latest("basic", "news|테크+", 1, 100)?>
                                    </div>
                                    <!-- /group1 --> 
                                </div>
                                <!-- //Tabs-4 --> 
                                
                                <!-- Tabs-5 -->
                                <div id="tabs-5" style="display: none;"> 
                                    <!--<h2>국제</h2>-->
                                    <div class="group1">
                                        <?=latest("basic", "news|국제", 6, 100)?>
                                    </div>
                                    <!-- /group1 --> 
                                </div>
                                <!-- //Tabs-5 --> 
                                
                                <!-- Tabs-6 -->
                                <div id="tabs-6" style="display: none;"> 
                                    <!--<h2>산업</h2>-->
                                    <div class="group1">
                                        <?=latest("basic", "news|산업", 7, 100)?>
                                    </div>
                                    <!-- /group1 --> 
                                </div>
                                <!-- //Tabs-6 --> 
                                
                            </div>
                            <!-- //Tabs --> 
                        </div>
                        <!-- //contents --> 
                    </div>
                </div>
                <div class="col-sm-3">
                
                	<div class="bdwrap">
                        <div class="section-title">
                            <h3 class="stitle"> <!--<span class="cat-icon"><i class="fa fa-star-o"></i></span>-->쇼핑</h3>
                            <span><a href="#">내사건현황보기</a></span>
                        </div>
                        <div class="row p-all-10 bg-white" style="padding-bottom: 0 !important">
                        	
                            <div class="col-sm-12">
                                <div class="latest-video sub-leading-item media">
                                    <div class="latest-video-inner">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/home.jpg) center no-repeat">
                                            <h4 class="entry-title"><a href="#">국내출원</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item --> 
                        
                        
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item">
                                    <div class="latest-video-inner media">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(img/abrd.jpg) center no-repeat"> 
                                            <!--<p class="vp-cat">해외출원</p>-->
                                            <h4 class="entry-title"><a href="#">해외출원</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->
                            
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item">
                                    <div class="latest-video-inner media">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(img/trans.jpg) right no-repeat"> 
                                            <!--<p class="vp-cat">해외출원</p>-->
                                            <h4 class="entry-title"><a href="#">번역</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->
                            
                            <!-- //sub-leading-item --> 
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item">
                                    <div class="latest-video-inner media">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(img/sea.jpg) center no-repeat"> 
                                            <!--<p class="vp-cat">해외출원</p>-->
                                            <h4 class="entry-title"><a href="#">홈페이지<br />시스템개발</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->
                            
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item media">
                                    <div class="latest-video-inner">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(img/drw.jpg) center no-repeat">
                                            <h4 class="entry-title"><a href="#">도면,<br />디자인</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->                             
                            
                            <!--<div class="col-sm-6">
                                <div class="latest-video sub-leading-item media">
                                    <div class="latest-video-inner">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/des.jpg) center no-repeat">
                                            <h4 class="entry-title"><a href="#">디자인</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>-->  
                            
                        </div>
                    </div>
                
                	
                    
                </div>
            </div>
            
            <div class="row m-t-10">
            	<div class="col-sm-9 paid-info">                	
                    <div class="colgroup row">
                    	<div class="col-md-12">
                            <div class="section-title" style="border-bottom:none;">
                                <h3 class="stitle bg-none">정보서비스</h3>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article class="gradient-color02">
                                <div class="article-inner default">
                                    <div class="overlay"></div>
                                    <!--구인구직-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> 
                                    <a href="<?php echo G5_URL ?>/board.php?bo_table=wanted">
                                    <img width="351" class="img-responsive" height="168" src="img/b_recruit.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소"></a> </article>
                                    <span class="cat-title larger cat-19177 text-muted">구인구직</span>
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=wanted">
                                        <span class="sound_only">구인구직</span> 더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    
                                    <?php echo latest("simplelatest", "wanted", 5, 20); ?> 
                                    <!-- //post-share-social -->
                                    <div class="article-info">
                                        <p class="slide-cat"> <a href="#"> 
                                            <!--<span class="cat-icon"> I</span>산업--> 
                                            </a> </p>
                                        <!--<h4 class="entry-title">
                                                                                                <a href="single-article.html">Etiam feugiat dolor ac elit suscipit in elementum orci</a>
                                                                                            </h4>--> 
                                    </div>
                                    </div>
                            </article>
                        </div>
                    
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article class="gradient-color02">
                                <div class="article-inner default">
                                    <div class="overlay"></div>    
                                    
                                    <!--도서-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> 
                                    	<a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=Book&page=">
                                        <img width="351" class="img-responsive" height="168" src="img/b_book.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소">
                                        </a>
                                    </article>
                                    <span class="cat-title larger cat-19177 text-muted">영상</span>
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=book">
                                        <span class="sound_only">영상</span>더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    <?php echo latest("simplelatest", "vod", 7, 20); ?>                                   
                                       
                                    <?php /*?><!--도서-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> 
                                    	<a href="http://site.pisnet.kr/ipaportal.com/bbs/board.php?bo_table=book">
                                    	<img width="351" class="img-responsive" height="168" src="img/b_recruit.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소">
                                        </a> 
                                    </article>
                                    <span class="cat-title larger cat-19177 text-muted" style="font-family: NanumGothic;"> 도서</span> 
                                    
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="http://site.pisnet.kr/ipaportal.com/bbs/board.php?bo_table=wanted">
                                        <span class="sound_only">뉴스</span>더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    
                                    <?php echo latest_group("simplelatest", "job", 5, 20); ?> <?php */?>
                                    <!-- //post-share-social -->
                                    <?php /*?><div class="article-info">
                                        <p class="slide-cat"> <a href="#"> 
                                          <!--<span class="cat-icon"> I</span>산업--> 
                                          </a> </p>
                                        <!--<h4 class="entry-title">
                                                                                                <a href="single-article.html">Etiam feugiat dolor ac elit suscipit in elementum orci</a>
                                                                                            </h4>--> 
                                      </div><?php */?>
                                    </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article class="gradient-color02">
                                <div class="article-inner default">
                                    <div class="overlay"></div>
                                    <!--영상-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=Media&page=">
                                    <img width="351" class="img-responsive" height="168" src="img/large03.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소"></a> </article>
                                    <span class="cat-title larger cat-19177 text-muted">교육,행사</span>
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=vod">
                                        <span class="sound_only">교육,행사</span>더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    <?php echo latest("simplelatest", "edu", 7, 20); ?>                                    
                                    <!-- //post-share-social -->
                                    <div class="article-info">
                                        <p class="slide-cat"> <a href="#"> 
                                            <!--<span class="cat-icon"> I</span>산업--> 
                                            </a> </p>
                                        <!--<h4 class="entry-title">
                                                                                                <a href="single-article.html">Etiam feugiat dolor ac elit suscipit in elementum orci</a>
                                                                                            </h4>--> 
                                    </div>
                                    </div>
                            </article>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article class="gradient-color02">
                                <div class="article-inner default">
                                    <div class="overlay"></div>
                                    <!--각국특허청-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=Search&page=">
                                    <img width="351" class="img-responsive" height="168" src="img/b_search.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소"></a>
                                    </article>
                                    <span class="cat-title larger cat-19177 text-muted">통계,랭킹</span>
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=country">
                                        <span class="sound_only">통계,랭킹</span>더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    
									<?php echo latest("simplelatest", "firm", 7, 20); ?> 
                                    <!-- //post-share-social -->
                                    <div class="article-info">
                                        <p class="slide-cat"> <a href="#"> <!--<span class="cat-icon"> I</span>산업--></a> </p>
                                        <!--<h4 class="entry-title">
                                        <a href="single-article.html">Etiam feugiat dolor ac elit suscipit in elementum orci</a>
                                        </h4>--> 
                                    </div>
                                     </div>
                            </article>
                        </div>
                        
                        
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article class="gradient-color02">
                                <div class="article-inner default">
                                    <div class="overlay"></div>
                                    <!--특허법률사무소-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=firm">
                                        <img width="351" class="img-responsive" height="168" src="img/b_trans.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소">
                                        </a> 
                                    </article>
                                    <span class="cat-title larger cat-19177 text-muted">검색</span>
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=firm">
                                        <span class="sound_only">검색</span>더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    
                                    <?php echo latest("simplelatest", "country", 7, 20); ?> 
                                    <!-- //post-share-social -->
                                    <div class="article-info">
                                        <p class="slide-cat"> <a href="#"> </a> </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article class="gradient-color02">
                                <div class="article-inner default">
                                    <div class="overlay"></div>
                                    <!--특허전문교육기관-->
                                    <article itemscope="" itemtype="http://schema.org/Article" class="img-wrapper"> 
                                    <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=edu">
                                    <img width="351" class="img-responsive" height="168" src="img/b_dsgn.jpg" class="image wp-post-image no-display appear" alt="Gavel close up. Conceptual image of law and justice." title="SKT, ‘레터링 서비스’ 특허소송 1심 승소"></a> </article>
                                    <span class="cat-title larger cat-19177 text-muted">파워블로그/카페</span>
                                    <div class="lt_more pull-right m-r-10"> 
                                        <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=edu">
                                        <span class="sound_only">파워블로그/카페</span>더보기 <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    <?php echo latest("simplelatest", "book", 7, 20); ?>
                                    <!-- //post-share-social -->
                                    <div class="article-info">
                                        <p class="slide-cat"> <a href="#"> 
                                            </a> </p>
                                    </div>
                                    </div>
                            </article>
                        </div>                       
                    </div>
                </div>
                <div class="col-sm-3">
                	<div class="bdwrap">                    
                        <div class="section-title">
                            <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->광고</h3>
                        </div>
                        <div class="ad_r p-all-10 bg-white">
                            <ul>
                            	<li><iframe width="100%" height="140" src="https://www.youtube.com/embed/8FhnUMKYc_I" frameborder="0" allowfullscreen></iframe></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad1.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad2.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad3.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad4.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad5.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad6.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="img/ad7.jpg" alt="img" style="height:85px"></a></li>
                            </ul>
                        </div>
	                </div>                   
                    <?php /*?><div class="m-t-5">            
					<?php echo poll('theme/poll_basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                    </div><?php */?>
                </div>
                
            </div>
        </section>
    </div>
</div>
<!-- //row -->
</div>
<!-- // container -->
</div>
<!-- //main-wrapper --> 

<!--====  End of MAIN WRAPPER  ====-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
