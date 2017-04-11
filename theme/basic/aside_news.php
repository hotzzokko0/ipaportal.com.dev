<div class="col-lg-3-5 s_tab pull-right">
    <div> 
        <!--정보 게시판 최신글-->
        
        
        <div class="colgroup"> 
            <!-- contents -->
            <div class="content con2_set pat bdwrap"> 
            <div class="section-title">
            <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07">IF</span>-->뉴스
                <div class="lt_more pull-right"> <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=news"><span class="sound_only">뉴스</span>더보기 <i class="fa fa-plus"></i></a> </div>
            </h3>
            <!--<div class="pull-right see-all"> <a href="#">See all</a> </div>--> 
            
        </div>
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
                        <div class="group1">
                            <?=latest("basic", "news|상표디자인", 2, 25)?>
                        </div>
                        <!-- /group1 --> 
                    </div>
                    <!-- /tabs-2 --> 
                    <!-- //Tabs-2 --> 
                    
                    <!-- Tabs-3 -->
                    <div id="tabs-3" style="display: none;"> 
                        <!--<h2>기술정보</h2>-->
                        <div class="group1">
                            <?=latest("basic", "news|기술정보", 3, 25)?>
                        </div>
                        <!-- /group1 --> 
                    </div>
                    <!-- //Tabs-3 --> 
                    
                    <!-- Tabs-4 -->
                    <div id="tabs-4" style="display: none;"> 
                        <!--<h2>테크+</h2>-->
                        <div class="group1">
                            <?=latest("basic", "news|테크+", 1, 25)?>
                        </div>
                        <!-- /group1 --> 
                    </div>
                    <!-- //Tabs-4 --> 
                    
                    <!-- Tabs-5 -->
                    <div id="tabs-5" style="display: none;"> 
                        <!--<h2>국제</h2>-->
                        <div class="group1">
                            <?=latest("basic", "news|국제", 6, 25)?>
                        </div>
                        <!-- /group1 --> 
                    </div>
                    <!-- //Tabs-5 --> 
                    
                    <!-- Tabs-6 -->
                    <div id="tabs-6" style="display: none;"> 
                        <!--<h2>산업</h2>-->
                        <div class="group1">
                            <?=latest("basic", "news|산업", 7, 25)?>
                        </div>
                        <!-- /group1 --> 
                    </div>
                    
                    <!-- //Tabs-6 --> 
                    
                </div>
                <!-- //Tabs --> 
            </div>
            <!-- //contents --> 
        </div>
        <!--//정보 게시판 최신글--> 
    </div>
    
    <div class="popular-news m-t-5">
        <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->오늘의 핫클릭</h3>
        <ul class="popular-news-list m-t-10">
            <li><?php echo latest_hit("hit", "news", '5', '18'); ?> </li>
        </ul>
    </div>
    <!--//오늘의 핫클릭--> 
    
    <!--광고-->
    <div class="bdwrap m-t-5"> 
    	 <div class="section-title">
            <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->광고</h3>
        </div>  
    
        <div class="ad_r p-all-5">
            <ul>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad1.jpg" alt="img" style="height:85px" title=""></a></li>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad2.jpg" alt="img" style="height:85px"></a></li>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad3.jpg" alt="img" style="height:85px"></a></li>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad4.jpg" alt="img" style="height:85px"></a></li>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad5.jpg" alt="img" style="height:85px"></a></li>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad6.jpg" alt="img" style="height:85px"></a></li>
                <li><a href="#"><img class="img-100p latest-post-image" src="<?= G5_IMG_URL ?>/ad7.jpg" alt="img" style="height:85px"></a></li>
            </ul>
        </div>
    </div>
    <!--//광고-->
    
</div>
