<?php /*?><?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    $group_file = G5_THEME_PATH.'/group.php';
    if(is_file($group_file)) {
        require_once($group_file);
        return;
    }
    unset($group_file);
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/group.php');
    return;
}

if(!$is_admin && $group['gr_device'] == 'mobile')
    alert($group['gr_subject'].' 그룹은 모바일에서만 접근할 수 있습니다.');

$g5['title'] = $group['gr_subject'];
include_once('./_head.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?><?php */?>
<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/g_board.php');
    return;
}
if(!$is_admin && $group['gr_device'] == 'mobile')
    alert($group['gr_subject'].' 그룹은 모바일에서만 접근할 수 있습니다.');
$g5['title'] = "Notice & Free";
$gr_id ='board';
include_once('./_head.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?>

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
                        <?=latest("roll_issue", "news", 6, 100)?>
                        <?php /*?><?=latest_all("theme/roll_issue","all",6,40);?> <?php */?>
                        <!-- //article-slider --> 
                        <!--뉴스스탠드 & 유로서비스-->
                        <?php /*?><ul class="newss_list m-t-5">
                            <div class="section-title">
                                <h3 class="stitle"><i class="fa fa-bell-o"></i> 뉴스스탠드</h3>
                            </div>
                            <!-- //section-title -->
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
                            <li class="col-sm-2 col-xs-4"><a href="#" target="_blank" class="newssa"><img src="img/joongang.gif" alt="중앙일보"></a> </li>
                        </ul><?php */?>
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
                                <li><?php echo latest_hit("hit", "news", '7', '18'); ?> </li>
                            </ul>
                        </div>
                    </div>
                    <!--//오늘의 핫클릭--> 
                </div>
                <!-- //row -->                 
                
            </div>
            <!-- //Latest News -->
            <div class="row m-t-5">
                <div class="col-sm-9">
                    
                    <div class="colgroup"> 
                        <!-- 분야별 뉴스 -->
                        <div class="content con2_set pat bdwrap">
                        
                            <div class="section-title">
                                <h3 class="stitle"><i class="fa fa-bell-o"></i> 최신뉴스</h3>
                            </div>
                            <?=latest("skin_latest_g10", "news|특허", 4, 20)?>
                            
                        </div>
                        <!-- //contents --> 
                    </div>
                </div>
                <div class="col-sm-3">
                
                	<div class="bdwrap">
                        <div class="section-title">
                            <h3 class="stitle"> <!--<span class="cat-icon"><i class="fa fa-star-o"></i></span>-->유료서비스</h3>
                        </div>
                        <div class="row p-all-5" style="padding-bottom: 0 !important">
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item">
                                    <div class="latest-video-inner media">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/abrd.jpg) center no-repeat">
                                            <!--<p class="vp-cat">해외출원</p>-->
                                            <h4 class="entry-title"><a href="#">해외출원</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->
                            
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item media">
                                    <div class="latest-video-inner">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/drw.jpg) center no-repeat">
                                            <h4 class="entry-title"><a href="#">도면</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item --> 
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item">
                                    <div class="latest-video-inner media">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/trans.jpg) right no-repeat">
                                            <!--<p class="vp-cat">해외출원</p>-->
                                            <h4 class="entry-title"><a href="#">번역</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->
                            
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item media">
                                    <div class="latest-video-inner">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/des.jpg) center no-repeat">
                                            <h4 class="entry-title"><a href="#">디자인</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item --> 
                            <div class="col-sm-6">
                                <div class="latest-video sub-leading-item">
                                    <div class="latest-video-inner media">
                                        <div class="img-wrapper media-left"> <a href="#"><i class="play-icon fa fa-play-circle-o"></i></a> </div>
                                        <div class="video-post-info media-body" style="background:url(<?php echo G5_URL ?>/img/sea.jpg) center no-repeat">
                                            <!--<p class="vp-cat">해외출원</p>-->
                                            <h4 class="entry-title"><a href="#">검색</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //sub-leading-item -->
                            
                            <div class="col-sm-6">
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
                        </div>
                    </div>
                
                	
                    
                </div>
            </div>
            
            <div class="row m-t-5">
            	<div class="col-sm-9 paid-info">                	
                    <div class="colgroup row">
                    	<div class="col-md-12">
                            <div class="section-title" style="border-bottom:none;">
                                <h3 class="stitle bg-white">분야별 주요뉴스</h3>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <?php /*?><?php echo latest("m_gallery", "news", 4, 25); ?><?php */?>
                            <?=latest("section_list", "news|특허", 3, 20)?> 
                        </div>  
                        <div class="col-md-6">
                            <?=latest("section_list", "news|상표디자인", 3, 20)?> 
                        </div>  
                        <div class="col-md-6">
                            <?=latest("section_list", "news|기술정보", 2, 20)?> 
                        </div>  
                        <div class="col-md-6">
                            <?php /*?><?php echo latest("m_gallery", "news", 4, 25); ?><?php */?>
                            <?=latest("section_list", "news|테크+", 4, 20)?> 
                        </div>   
                        <div class="col-md-6">
                            <?php /*?><?php echo latest("m_gallery", "news", 4, 25); ?><?php */?>
                            <?=latest("section_list", "news|국제", 4, 20)?> 
                        </div>   
                        <div class="col-md-6">
                            <?php /*?><?php echo latest("m_gallery", "news", 4, 25); ?><?php */?>
                            <?=latest("section_list", "news|산업", 4, 20)?> 
                        </div>                      
                    </div>
                </div>
                <div class="col-sm-3">
                	<div class="bdwrap">                    
                        <div class="section-title">
                            <h3 class="stitle"> <!--<span class="cat-icon cat-icon-color07 ">IF</span>-->광고</h3>
                        </div>
                        <div class="ad_r p-all-5">
                            <ul>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad1.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad2.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad3.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad4.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad5.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad6.jpg" alt="img" style="height:85px"></a></li>
                                <li><a href="#"><img class="img-100p latest-post-image" src="../img/ad7.jpg" alt="img" style="height:85px"></a></li>
                            </ul>
                        </div> 
	                </div>                   
                    <div class="m-t-5">            
					<?php echo poll('theme/poll_basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                    </div>
                    
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