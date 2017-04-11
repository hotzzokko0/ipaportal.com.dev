<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Newedge Magazine News Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="img/favicon.png">

  <!-- CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/cs-select.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/nanoscroller.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/presets/preset1.css">
  <link rel="stylesheet" href="css/responsive.css">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head> <!-- head -->
  <body class="sticky-header">
    <div class="body-innerwrapper">
    
    <!--==================================
    =            START Header            =
    ===================================-->
    <header>
      <!-- top-bar -->
      <div id="newedge-top-bar">
        <div class="container">
          <div class="row">
            <div id="logo" class="col-xs-4 col-sm-3 col-md-3 hidden-sm hidden-xs">
              <a href="index.html"><img src="img/logo.png" alt="logo"></a>
            </div> <!-- //logo -->
            <div class="col-sm-12 col-md-9">
              <div class="top-right">
                <div class="newedge-date">
                  <span>  Monday, 11 January 2016 </span>
                </div> <!-- //date -->
                <div class="newedge-language">
                  <select class="cs-select cs-skin-border">
                    <!-- <option value="" disabled selected>Language</option> -->
                    <option value="English" selected>en</option>
                    <option value="German">de</option>
                    <option value="Arabic">ar</option>
                  </select>
                </div> <!-- //language -->
  
                <div class="newedge-login">
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
                </div> <!-- //login -->
                <div class="newedge-search">
                  <div class="search-icon-wrapper">
                    <i class="fa fa-search"></i>
                  </div>
                  <div class="search-wrapper">
                    <form action="#" method="post">
                      <input name="searchword" maxlength="200" class="inputboxnewedge-top-search" type="text" size="20" placeholder="Search ...">
                      <i id="search-close" class="fa fa-close"></i>
                    </form>
                  </div> <!-- //search-wrapper -->
                </div> <!-- //search -->
              </div> <!-- //top-right -->
            </div> 
          </div> <!-- //row -->
        </div> <!-- //container -->
      </div> <!-- //top-bar -->
  
      <!-- navigation mobile version -->
      <div id="mobile-nav-bar" class="mobile-nav-bar">
        <div class="container">
          <div class="row">
            <div class="visible-sm visible-xs col-sm-12">
              <div class="mobile-logo pull-left">
                <a href="index.html"><img src="img/logo.png" alt="logo"></a>
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
                <li class="has-child">
                  <a href="index.html">Home</a>
                  <div class="dropdown-inner">
                    <ul class="dropdown-items">
                      <li><a href="index2.html">Home 2</a></li>
                    </ul>
                  </div>
                </li>
                <li class="has-child menu-justify">
                  <a href="article-categories.html">Social Media</a>
                  <div class="dropdown-inner container dropdown-menu-full-wrapper">
                    <div class="dropdown-menu-full vertical-tabs">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-3">
                              <ul class="tab-btns" role="tablist">
                                <li class="active"><a href="#facebook" data-toggle="tab">Facebook</a></li>
                                <li><a href="#twitter" data-toggle="tab">Twitter</a></li>
                                <li><a href="#youtube" data-toggle="tab">Youtube</a></li>
                                <li><a href="#pinterest" data-toggle="tab">Pinterest</a></li>
                                <li><a href="#dribble" data-toggle="tab">Dribble</a></li>
                                <li><a href="#g-plus" data-toggle="tab">Google Plus</a></li>
                              </ul>
                            </div> <!-- //col-sm-3 -->
  
                            <div class="col-sm-9">
                              <div class="tab-content simple-article-overlay">
                                <div role="tabpanel" class="tab-pane active" id="facebook">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium01.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium02.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium03.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                  </div> <!-- //row -->
                                </div> <!-- //tab-pane -->
                                <div role="tabpanel" class="tab-pane" id="twitter">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium04.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium05.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium06.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                  </div> <!-- //row -->
                                </div> <!-- //tab-pane -->
                                <div role="tabpanel" class="tab-pane" id="youtube">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium07.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium08.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium09.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                  </div> <!-- //row -->
                                </div> <!-- //tab-pane -->
                                <div role="tabpanel" class="tab-pane" id="pinterest">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium10.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium11.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium12.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                  </div> <!-- //row -->
                                </div> <!-- //tab-pane -->
                                <div role="tabpanel" class="tab-pane" id="dribble">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium13.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium14.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium15.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                  </div> <!-- //row -->
                                </div> <!-- //tab-pane -->
                                <div role="tabpanel" class="tab-pane" id="g-plus">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium16.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium01.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                    <div class="col-sm-4">
                                      <article class="item">
                                        <div class="article-inner">
                                          <div class="overlay"></div>
                                          <div class="img-wrapper"><img class="img-100p latest-post-image" src="img/article-img/medium02.jpg" alt="img"></div>
                                          <div class="post-share-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                                          </div> <!-- //post-share-social -->
                                          <div class="article-info">
                                            <h4 class="entry-title">
                                              <a href="single-article.html">Proin suscipit luctus orci placerat fringilla</a>
                                            </h4>
                                          </div>
                                        </div>
                                      </article>
                                    </div>
                                  </div> <!-- //row -->
                                </div> <!-- //tab-pane -->
                              </div> <!-- //tab-content -->
                            </div> <!-- //col-sm-9 -->
                          </div> <!-- //row -->               
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li><a href="article-categories.html">Tech</a></li>
                <li class="has-child active">
                  <a href="javascript:void(0)">Pages</a>
                  <div class="dropdown-inner">
                    <ul class="dropdown-items">
                      <li class="active"><a href="about.html">About Us</a></li>
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
                </li>
                <li><a href="article-categories.html">Entertainment</a></li>
                <li><a href="article-categories.html">Business</a></li>
                <li><a href="article-categories.html">Fashion</a></li>
                <li><a href="article-categories.html">Video</a></li>
                <li><a href="article-categories.html">Leadership</a></li>
                <li><a href="article-categories.html">Explore</a></li>
              </ul>
            </div> <!-- col-sm-12 -->
          </div> <!-- //row -->
        </div> <!-- //container -->
      </nav> <!-- //navigation -->
    </header>
    <!--====  End of Header  ====-->
    
    
    <!--==================================
    =            START PAGE TITLE        =
    ===================================-->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-wrapper page-title-wrapper2">
            <div class="container">
              <h2 class="pull-left title"> <span class="cat-icon"><i class="fa fa-group"></i> </span> About Us</h2>
              <!-- breadcrumb -->
              <ol class="breadcrumb pull-right">
                <li><a href="index.html">Home</a></li>
                <li class="active">About Us</li>
              </ol> <!-- //breadcrumb -->
            </div> <!-- //container -->
          </div> <!-- //page-title-wrapper -->
        </div>
      </div> <!-- //row -->
    </section>
    <!--====  End of PAGE TITLE  ====-->
    
    
    
    <!--==================================
    =            START MAIN WRAPPER      =
    ===================================-->
    <section class="main-wrapper history-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="history-info">
              <p class="title">Story, Mission, Vision</p>
              <h2 class="subtitle">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.
              </h2>
              <div class="row">
                <div class="col-sm-6">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                </div>
                <div class="col-sm-6">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                  </p>
                </div>
              </div> <!-- //row -->
            </div> <!-- //advertisment-info -->
          </div>
        </div> <!-- //row -->
    
        <div class="our-history">
          <div class="row">
            <div class="col-sm-8">
              <p class="title">Monthly Uniques Vistors</p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
              </p>            
            </div>
            <div class="col-sm-3 col-sm-offset-1">
              <div class="counter">
                <h3 class="title">65M</h3>
                <p>
                 Monthly Uniques Vistors
                </p>
              </div> <!-- //counter -->
            </div>
          </div> <!-- //row -->
          
          <div class="row">
            <div class="col-sm-8">
              <p class="title">Social Media Followers</p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
              </p>            
            </div>
            <div class="col-sm-3 col-sm-offset-1">
              <div class="counter">
                <h3 class="title">100K</h3>
                <p>
                 Monthly Uniques Vistors
                </p>
              </div> <!-- //counter -->
            </div>
          </div> <!-- //row -->
    
          <div class="row">
            <div class="col-sm-8">
              <p class="title">Monthly Shares</p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
              </p>            
            </div>
            <div class="col-sm-3 col-sm-offset-1">
              <div class="counter">
                <p class="title">21K</p>
                <p>
                 Monthly Uniques Vistors
                </p>
              </div> <!-- //counter -->
            </div>
          </div> <!-- //row -->
        </div> <!-- //our-history -->
      </div> <!-- //container -->
    </section>
    <!--====  End of MAIN WRAPPER  ====-->
    
    
    
    <!--==================================
    =            START FOOTER            =
    ===================================-->
    <footer>
      <div class="footer-wrapper">
        <div class="container">
          <div class="row">
            <div id="bottom1" class="col-sm-6 col-md-3 custom">
              <p class="footer-logo"><img src="img/bottom-logo.png" alt="logo"></p>
              <p class="footer-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
              <div class="footer-contact">
                <p>
                  <span>Email:</span>
                  info@yourcompnay.com
                </p>
                <p>
                  <span>Fax:</span>
                  +0123 4567 8910
                </p>
              </div>
            </div> <!-- //bottom1 -->
            
            <div id="bottom2" class="col-sm-6 col-md-3">
              <div class="bottom-menu">
                <h3 class="title">Quick Link</h3>
                <div class="pull-left">
                  <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="advertisement.html">Advertisement</a></li>
                    <li><a href="article-categories.html">Category</a></li>
                    <li><a href="#">Forums</a></li>
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
            </div> <!-- //bottom2 -->
            
            <div id="bottom3" class="col-sm-6 col-md-3">
              <div class="">
                <h3 class="title">Tag Cloud</h3>
                <div class="tags">
                  <a class="tag-name" href="#">World</a>
                  <a class="tag-name" href="#">Sports</a>
                  <a class="tag-name" href="#">Politics</a>
                  <a class="tag-name" href="#">Media</a>
                  <a class="tag-name" href="#">Logic</a>
                  <a class="tag-name" href="#">Fashion</a>
                  <a class="tag-name" href="#">Culture</a>
                  <a class="tag-name" href="#">Business</a>
                  <a class="tag-name" href="#">Art</a>
                </div>
              </div>
            </div> <!-- //bottom3 -->
            
            <div id="bottom4" class="col-sm-6 col-md-3">
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
            </div> <!-- //bottom4 -->
          </div> <!-- //row -->
        </div>  <!-- //container -->
      </div> <!-- //footer-wrapper --> 
    
      <div class="copyright-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="copyright"> Copyright © 2015 <a href="http://joomshaper.com">New Edge.</a> All rights reserved.</p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="pull-right">Design &amp; Devleopment by&nbsp;<a href="http://www.joomshaper.com/">JOOMSHAPER</a></p>
            </div>
          </div>  <!-- //row -->
        </div> <!-- //container -->
      </div> <!-- //copyright-wrapper -->
    </footer>
    <!--====  End of FOOTER  ====-->
    
    <!-- Offcanvas Start-->
    <div class="offcanvas-overlay"></div>
    <div class="offcanvas-menu visible-sm visible-xs">
      <a href="#" class="close-offcanvas"><i class="fa fa-remove"></i></a>
      <div class="offcanvas-inner">
        <h3 class="title">Search</h3>
        <div class="search">
          <form action="#" method="post">
            <input name="searchword" maxlength="200" class="inputbox search-query" type="text" placeholder="Search ...">
          </form>
        </div>
        <ul>
          <li>
            <a href="index.html">Home</a>
            <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-01" aria-expanded="false" aria-controls="collapse-menu-01"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
            <ul class="collapse" id="collapse-menu-01" aria-expanded="false">
              <li><a href="index2.html">Home 2</a></li>
            </ul>
          </li>
          <li><a href="article-categories.html">Social Media</a></li>
          <li><a href="article-categories.html">Tech</a></li>
          <li class="active">
            <a href="article-categories.html">Pages</a>
            <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-02" aria-expanded="false" aria-controls="collapse-menu-02"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
            <ul class="collapse" id="collapse-menu-02" aria-expanded="false">
              <li class="active"><a href="about.html">About Us</a></li>
              <li><a href="advertisement.html">Advertisement</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="comingsoon.html">Coming Soon</a></li>
              <li><a href="404.html">404 Page</a></li>
              <li>
                <a href="javascript:void(0)">Parent</a>
                <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-03" aria-expanded="false" aria-controls="collapse-menu-03"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                <ul class="collapse" id="collapse-menu-03" aria-expanded="false">
                  <li><a href="javascript:void(0)">Sub Child 01</a></li>
                  <li><a href="javascript:void(0)">Sub Child 02</a></li>
                  <li><a href="javascript:void(0)">Sub Child 03</a></li>
                  <li>
                    <a href="javascript:void(0)">Parent</a>
                    <span role="button" class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-04" aria-expanded="false" aria-controls="collapse-menu-04"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                    <ul class="collapse" id="collapse-menu-04" aria-expanded="false">
                      <li><a href="javascript:void(0)">Sub Child 01</a></li>
                      <li><a href="javascript:void(0)">Sub Child 02</a></li>
                      <li><a href="javascript:void(0)">Sub Child 03</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="article-categories.html">Business</a></li>
          <li><a href="article-categories.html">Fashion</a></li>
          <li><a href="article-categories.html">Video</a></li>
          <li><a href="article-categories.html">Leadership</a></li>
          <li><a href="article-categories.html">Explore</a></li>
        </ul>
      </div>
    </div>
    <!-- end Offcanvas -->
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <!-- select menu -->
    <script src="js/classie.js"></script>
    <script src="js/selectFx.js"></script>
    <!-- slider -->
    <script src="js/jquery.nanoscroller.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- sitcky menu -->
    <script src="js/jquery.sticky.js"></script>
    <!-- custom js -->
    <script src="js/main.js"></script>
    </div>
  </body>
</html>