<?php
if(!defined("moonstudio")) return header("Location: /");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title><? echo $title; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?=$realdir?>/adminpanel/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=$realdir?>/adminpanel/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=$realdir?>/adminpanel/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=$realdir?>/adminpanel/css/theme.css" rel="stylesheet" media="all">
    <!-- Jquery JS-->
    <script src="<?=$realdir?>/adminpanel/vendor/jquery-3.2.1.min.js"></script>
</head>


<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="/admin">
                            <img src="<?=$realdir?>/assets/img/logo.png" alt="">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="<?=$realdir?>/admin">
                                <i class="fas fa-table"></i>Главная</a>
                        </li>
                        <li>
                            <a href="/">
                                <i class="fas fa-cubes"></i>Сайт</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/servers">
                                <i class="fas fa-server"></i></i>Серверы</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/category">
                                <i class="fas fa-list"></i>Категории</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/tovar">
                                <i class="fas fa-shopping-basket"></i>Товары</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/promo">
                                <i class="fas fa-cart-arrow-down"></i>Промо-коды</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/otziv">
                                <i class="fas fa-server"></i></i>Отзывы</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/settings">
                                <i class="fas fa-cog"></i>Настройки сайта</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?=$realdir?>/admin">
                    <img src="<?=$realdir?>/assets/img/logo.png" alt="">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?=$realdir?>/admin">
                                <i class="fas fa-table"></i>Главная</a>
                        </li>
                        <li>
                            <a href="/">
                               <i class="fas fa-cubes"></i>Сайт</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/servers">
                                <i class="fas fa-server"></i></i>Серверы</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/category">
                                <i class="fas fa-list"></i>Категории</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/tovar">
                                <i class="fas fa-shopping-basket"></i>Товары</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/promo">
                                <i class="fas fa-cart-arrow-down"></i>Промо-коды</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/otziv">
                                <i class="fas fa-server"></i></i>Отзывы</a>
                        </li>
                        <li>
                            <a href="<?=$realdir?>/admin/settings">
                                <i class="fas fa-cog"></i>Настройки сайта</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?=$realdir?>/assets/img/logo1.png" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><? echo $_SESSION['name']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?=$realdir?>/assets/img/logo1.png" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><? echo $_SESSION['name']; ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?=$realdir?>/logout">
                                                    <i class="zmdi zmdi-power"></i>Выйти</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <? require_once $page; ?>

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Bootstrap JS-->
    <script src="<?=$realdir?>/adminpanel/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=$realdir?>/adminpanel/vendor/slick/slick.min.js">
    </script>
    <script src="<?=$realdir?>/adminpanel/vendor/wow/wow.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/animsition/animsition.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=$realdir?>/adminpanel/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=$realdir?>/adminpanel/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?=$realdir?>/adminpanel/js/main.js"></script>

</body>
</html>
