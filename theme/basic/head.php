<!--게시판 추출 head.php 파일 상단부분-->
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php') ;
/* 최신글 추출 게시판 추가 */
include_once(G5_LIB_PATH.'/latest_group.lib.php');
/* 인기글 랭킹 게시판 추가 */
include_once(G5_LIB_PATH.'/latest_hit.lib.php');

// 상단 파일 경로 지정 : 이 코드는 가능한 삭제하지 마십시오.
if ($config['cf_include_head'] && is_file(G5_PATH.'/'.$config['cf_include_head'])) {
    include_once(G5_PATH.'/'.$config['cf_include_head']);
    return; // 이 코드의 아래는 실행을 하지 않습니다.
	
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

?>
<!--//게시판 추출 head.php 파일 상단부분-->

<div class="body-innerwrapper">
    
    <!--==================================
    =            START Header            =
    ===================================-->
    <header>
        <!-- top-bar -->
        <div class="header-top-bar">            
            <div class="container">                
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="top-right">
                            <!--<div class="newedge-date">
                                <span>	Monday, 11 January 2017 </span>
                            </div> --> <!-- //date -->
                            <div class="newedge-language">
                                <select class="cs-select cs-skin-border">
                                    <!-- <option value="" disabled selected>Language</option> -->
                                    <option value="Korean" selected>한국어</option>
                                    <option value="English">English</option>
                                    <option value="Chinese">Chinese</option>                                        
                                    <option value="Japanese">Japanese</option>
                                </select>
                            </div> <!-- //language -->

                            <?php /*?><div class="newedge-login">
                                <a href="#" role="button" data-toggle="modal" data-target="#login">
                                    <i class="fa fa-user"></i>
                                </a>
                                <!-- Login modal -->
                                <div id="login" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                                                <h1 class="text-left">Log in</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="post" id="login-form">
                                                    <fieldset class="userdata">
                                                        <input id="username" placeholder="Username" type="text" name="username" class="form-control">
                                                        <input id="password" type="password" placeholder="Password" name="password" class="form-control">
                                                        <div class="remember-wrap">
                                                            <input id="remember" type="checkbox" name="remember" class="inputbox" value="yes">
                                                            <label for="remember">Remember Me</label>
                                                        </div>
                                                        <div class="button-wrap pull-left">
                                                            <input type="submit" name="Submit" class="btn btn-block btn-success" value="Log in">
                                                        </div>
                                                        <p class="forget-name-link pull-left">
                                                            Forgot <a href="#">
                                                            Username</a> or <a href="#">
                                                            Password</a>
                                                        </p>
                                                    </fieldset>
                                                </form>
                                            </div> <!--/Modal body-->
                                            <div class="modal-footer">
                                                New Here? <a href="#">
                                                Create an account</a>
                                            </div> <!--/Modal footer-->
                                        </div> <!-- Modal content-->
                                    </div> <!-- /.modal-dialog -->
                                </div> <!-- //Login modal -->
                            </div><?php */?> <!-- //login -->
                            <?php /*?><div class="newedge-search">
                                <div class="search-icon-wrapper">
                                    <i class="fa fa-search"></i>
                                </div>
                                <div class="search-wrapper">
                                    <form action="#" method="post">
                                        <input name="searchword" maxlength="200" class="inputboxnewedge-top-search" type="text" size="20" placeholder="Search ...">
                                        <i id="search-close" class="fa fa-close"></i>
                                    </form>
                                </div> <!-- //search-wrapper -->
                            </div> <!-- //search --><?php */?>
                        </div> <!-- //top-right -->
                    </div> 
                </div> <!-- //row -->
            </div>
        </div>
        <div id="newedge-top-bar">               
            <div class="container">                    
                <div class="row">
                    <div class="visible-lg col-md-4 col-sm-2 col-xs-12 text-right">
                        <div class="header-logo">
                            <a href="<?php echo G5_URL ?>/index.php"><img src="<?= G5_IMG_URL ?>/logo.jpg" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 text-center">
                        <div class="search-chart-list">								
                            <div class="header-search">
                                <form action="#">
                                    <input type="search" placeholder="검색어입력">
                                    <button type="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- //container -->
        </div> <!-- //top-bar -->

        <!-- navigation mobile version -->
        <div id="mobile-nav-bar" class="mobile-nav-bar visible-sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="visible-sm visible-xs col-sm-12">
                        <div class="mobile-logo pull-left">
                            <a href="/index.php"><img src="<?= G5_IMG_URL ?>/logo.jpg" alt="logo"></a>
                        </div>
                        <a id="offcanvas-toggler" class="pull-right" href="#"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- navigation -->
        <nav id="navigation-bar" class="navigation hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list-inline megamenu-parent">
                            <!--<li class="has-child">
                                <a href="javascript:void(0)">Pages</a>
                                <div class="dropdown-inner">
                                    <ul class="dropdown-items">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="advertisement.html">Advertisement</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="comingsoon.html">Coming Soon</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                        <li class="has-child">
                                            <a href="javascript:void(0)">Parent</a>
                                            <div class="dropdown-inner sub-dropdown-inner">
                                                <ul class="dropdown-items">
                                                    <li><a href="javascript:void(0)">Sub Child 01</a></li>
                                                    <li><a href="javascript:void(0)">Sub Child 02</a></li>
                                                    <li><a href="javascript:void(0)">Sub Child 03</a></li>
                                                    <li class="has-child">
                                                        <a href="javascript:void(0)">Parent</a>
                                                        <div class="dropdown-inner sub-dropdown-inner">
                                                            <ul class="dropdown-items">
                                                                <li><a href="javascript:void(0)">Sub Child 01</a></li>
                                                                <li><a href="javascript:void(0)">Sub Child 02</a></li>
                                                                <li><a href="javascript:void(0)">Sub Child 03</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <li><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
                            <!--<li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=news">뉴스</a></li>-->
                            <li><a href="<?php echo G5_URL ?>/bbs/home_news.php">뉴스</a></li>
                            <li class="has-child">
                                <a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=wanted">구인구직</a>
                                <div class="dropdown-inner">
                                    <ul class="dropdown-items">
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=wanted">구인</a></li>
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=resume">구직</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=domestic">국내출원</a></li>
                            <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=overseas">해외출원</a></li>
                            <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=trans">특허기술번역</a></li>
                            <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=drawing">특허도면서비스</a></li>
                            <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=search">특허검색서비스</a></li>
                            <li class="has-child">
                                <a href="javascript:void(0)">링크</a>
                                <div class="dropdown-inner">
                                    <ul class="dropdown-items">
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=book">도서</a></li>
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=vod">VOD</a></li>
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=country">각국특허청</a></li>
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=firm">특허법률사무소</a></li>
                                        <li><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=edu">특허전문교육기관</a></li>
                                    </ul>
                                </div>	
                            </li>
                        </ul>
                    </div> <!-- col-sm-12 -->
                </div> <!-- //row -->
            </div> <!-- //container -->
        </nav> <!-- //navigation -->
    </header>
    <!--====  End of Header  ====-->
    
    <section id="wrap">
      <div class="container">
