<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>APTS :: @yield('title')</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/morrisjs/morris.css" />
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body class="theme-black">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="assets/images/logo.svg" width="48" height="48" alt="APTS"></div>
        <p>Илтимос кутинг...</p>
    </div>
</div>
<div class="overlay_menu">
    <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
    <div class="container">
        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="input-group m-b-0">
                        <input type="text" class="form-control" placeholder="Қидириш...">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="social">
                    <a class="icon" href="https://www.facebook.com/thememakkerteam" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                    <a class="icon" href="https://www.behance.net/thememakker" target="_blank"><i class="zmdi zmdi-behance"></i></a>
                    <a class="icon" href="#"><i class="zmdi zmdi-twitter"></i></a>
                    <a class="icon" href="#"><i class="zmdi zmdi-linkedin"></i></a>
                    <p>Coded by WrapTheme<br> Designed by <a href="http://thememakker.com/" target="_blank">thememakker.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div><!-- Overlay For Sidebars -->
<nav class="navbar">
    <div class="container">
        <ul class="nav navbar-nav">
            <li>
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="h-bars"></a>
                    <a class="navbar-brand" href="index"><img src="assets/images/logo-black.svg" width="35" alt="APTS"><span class="m-l-10">APTS 1.0</span></a>
                </div>
            </li>
            <li class="search_bar">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Қидириш...">
                </div>
            </li>
            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
                <ul class="dropdown-menu pullDown">
                    <li><a href="mail-inbox.html"><i class="zmdi zmdi-email m-r-10"></i><span>Mail</span></a></li>
                    <li><a href="contact.html"><i class="zmdi zmdi-accounts-list m-r-10"></i><span>Contacts</span></a></li>
                    <li><a href="chat.html"><i class="zmdi zmdi-comment-text m-r-10"></i><span>Chat</span></a></li>
                    <li><a href="invoices.html"><i class="zmdi zmdi-arrows m-r-10"></i><span>Invoices</span></a></li>
                    <li><a href="events.html"><i class="zmdi zmdi-calendar-note m-r-10"></i><span>Calendar</span></a></li>
                    <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows m-r-10"></i><span>Notes</span></a></li>
                    <li><a href="javascript:void(0)"><i class="zmdi zmdi-view-column m-r-10"></i><span>Taskboard</span></a></li>
                </ul>
            </li>
            <li  class="dropdown notifications badgebit"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                    <div class="notify">
                        <span class="heartbit"></span>
                        <span class="point"></span>
                    </div>
                </a>
                <ul  class="dropdown-menu pullDown">
                    <li class="header">Янги хабарлар</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object" src="assets/images/xs/avatar5.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Дадаханов С.М. <span class="time">13 минут аввал</span></span>
                                            <span class="message">27.12.2021 й. санасига қадар тест топширишингиз зарур </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object" src="assets/images/xs/avatar6.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Grayson <span class="time">22min ago</span></span>
                                            <span class="message">You have 5 unread emails in your inbox.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object" src="assets/images/xs/avatar3.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Sophia <span class="time">31min ago</span></span>
                                            <span class="message">OrderPlaced: You received a new oder from Tina.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Isabella <span class="time">35min ago</span></span>
                                            <span class="message">Lara added a comment in Blazing Saddles.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All</a> </li>
                </ul>
            </li>
            <li hidden class="dropdown task badgebit"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i>
                    <div class="notify">
                        <span class="heartbit"></span>
                        <span class="point"></span>
                    </div>
                </a>
                <ul class="dropdown-menu pullDown">
                    <li class="header">Project</li>
                    <li class="body">
                        <ul class="menu tasks list-unstyled">
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="text-muted">Clockwork Orange <span class="float-right">29%</span></span>
                                    <div class="progress">
                                        <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="text-muted">Blazing Saddles <span class="float-right">78%</span></span>
                                    <div class="progress">
                                        <div class="progress-bar l-slategray" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="text-muted">Project Archimedes <span class="float-right">45%</span></span>
                                    <div class="progress">
                                        <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="text-muted">Eisenhower X <span class="float-right">68%</span></span>
                                    <div class="progress">
                                        <div class="progress-bar l-coral" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="text-muted">Oreo Admin Templates <span class="float-right">21%</span></span>
                                    <div class="progress">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="21" aria-valuemin="0" aria-valuemax="100" style="width: 21%;"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="javascript:void(0);">View All</a></li>
                </ul>
            </li>
            <li class="float-right">
                <a href="javascript:void(0);" class="fullscreen" data-provide="fullscreen"><i class="zmdi zmdi-fullscreen"></i></a>
                <a href="javascript:void(0);" class="btn_overlay"><i class="zmdi zmdi-sort-amount-desc"></i></a>
                <a hidden href="javascript:void(0);" class="js-right-sidebar"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
                <a href="/" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="menu-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="h-menu">
                    <li class="open active"><a href="index"><i class="zmdi zmdi-home"></i></a></li>

                    <li><a href="javascript:void(0)">Бахолаш</a>
                        <ul class="sub-menu">
                            <li><a href="#">Ижро интизоми бўйича</a></li>
                            <li><a href="#">Меҳнат интизоми бўйича</a></li>
                            <li><a href="#">Техника хавфсизлиги бўйича</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0)">Ҳисоботлар</a>
                        <ul class="sub-menu">
                            <li><a href="normal-tables.html">Ходимлар рейтинги</a></li>
                            <li hidden><a href="#">Jquery Datatables</a></li>
                            <li hidden><a href="#">Editable Tables</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Диаграммалар</a>
                        <ul class="sub-menu">
                            <li><a href="#">Диаграмма 1</a></li>
                            <li hidden><a href="#">Flot</a></li>
                            <li hidden><a href="#">ChartJS</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Тестлар</a>
                        <ul class="sub-menu">
                            <li><a href="#">Тестлар билан ишлаш</a></li>
                            <li><a href="#">Тест графиклари</a></li>
                            <li><a href="#">Тест натижалари</a></li>

                        </ul>
                    </li>

                    <li><a href="javascript:void(0)">Ходимлар</a>
                        <ul class="sub-menu">
                            <li><a href="#">Ходимлар базаси</a></li>

                        </ul>
                    </li>

                    <li><a href="javascript:void(0)">Луғатлар</a>
                        <ul class="sub-menu ">
                            <li>
                                <ul class="sub-menu-two">
                                    <li><a href="#">Техника хафсизлиги бўйича қоидабузарликлар</a></li>
                                    <li><a href="#">Меҳнат интизоми бўйича қоидабузарликлар</a></li>
                                    <li><a href="#">Ижро интизоми бўйича қоидабузарликлар</a></li>
                                    <li><a href="#">Лавозимлар рўйхати</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li><a href="javascript:void(0)">Администратор панели</a>
                        <ul class="sub-menu">
                            <li><a href="#">Фойдаланувчилар</a></li>
                            <li><a href="#">Роллар</a></li>

                        </ul>
                    </li>
                    <li><a href="#">Профил</a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>
<aside hidden class="right_menu">
    <div id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting">Setting</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity">Activity</a></li>
        </ul>
        <div class="tab-content slim_scroll">
            <div class="tab-pane slideRight active" id="setting">
                <div class="card">
                    <div class="header">
                        <h2><strong>Colors</strong> Skins</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin list-unstyled m-b-0">
                            <li data-theme="black" class="active">
                                <div class="black"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>General</strong> Settings</h2>
                    </div>
                    <div class="body">
                        <ul class="setting-list list-unstyled m-b-0">
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Report Panel Usage</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2">Email Redirect</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">Notifications</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">Auto Updates</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox5" type="checkbox" checked="">
                                    <label for="checkbox5">Offline</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox m-b-0">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">Location Permission</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Left</strong> Menu</h2>
                    </div>
                    <div class="body theme-light-dark">
                        <button class="t-dark btn btn-primary btn-round btn-block">Dark</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane slideLeft" id="activity">
                <div class="card activities">
                    <div class="header">
                        <h2><strong>Recent</strong> Activity Feed</h2>
                    </div>
                    <div class="body">
                        <div class="streamline b-accent">
                            <div class="sl-item">
                                <div class="sl-content">
                                    <div class="text-muted">Just now</div>
                                    <p>Finished task <a href="" class="text-info">#features 4</a>.</p>
                                </div>
                            </div>
                            <div class="sl-item b-info">
                                <div class="sl-content">
                                    <div class="text-muted">10:30</div>
                                    <p><a href="">@Jessi</a> retwit your post</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">12:30</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">1 days ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">2 days ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">3 days ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">4 Week ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">5 days ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">5 Week ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">3 Week ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">1 Month ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

@yield('main_content')

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- sparkline Plugin Js -->
<script src="assets/plugins/chartjs/Chart.bundle.js"></script> <!-- Chart Plugins Js -->
<script src="assets/plugins/chartjs/polar_area_chart.js"></script><!-- Polar Area Chart Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
<script src="assets/js/pages/charts/polar_area_chart.js"></script>
</body>
</html>