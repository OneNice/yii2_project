<?php


use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetLogin;
use app\assets\LkAsset;

LkAsset::register($this);
$this->beginPage();
?>
<!doctype html>
<html class="no-js" lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <div class="slimscroll-menu" id="remove-scroll">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                            <span>
                                <img src="/img/upload/Frame.png" alt="" height="46">
                            </span>
                </a>
            </div>
            <div class="user-box">

            </div>


            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <!--<li class="menu-title">Navigation</li>-->
                    <li>
                        <a href="/">
                            <i class="fi-monitor"></i> <span> В магазин </span>
                        </a>
                    </li>
                    <li>
                        <a href="/lk">
                            <i class="fi-monitor"></i> <span> Личный кабинет </span>
                        </a>
                    </li>
                    <li>
                        <a href="/lk/orders">
                            <i class="fi-paper "></i> <span> Заказы </span>
                        </a>
                    </li>
                    <li>
                        <a href="/lk/settings">
                            <i class="fi-cog"></i> <span> Настройки </span>
                        </a>
                    </li>


                </ul>

            </div>
            <!-- Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- Top Bar Start -->
        <div class="topbar">

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">



                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="/img/upload/avatar.png" alt="user" class="rounded-circle"> <span class="ml-1"><?= Yii::$app->user->identity['login'] ?> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

                            <!-- item-->
                            <a href="/" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>На главную</span>
                            </a>
                            <!-- item-->
                            <a href="/lk/settings" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>Настройки</span>
                            </a>

                            <!-- item-->
                            <a href="/logout" class="dropdown-item notify-item">
                                <i class="fi-power"></i> <span>Выйти</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li>
                        <div class="page-title-box">
                            <h4 class="page-title">Профиль пользователя </h4>
                        </div>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->



        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">


                <?= $content ?>


            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            2019 © Finizza.by
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>