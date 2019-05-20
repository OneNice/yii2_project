<?php

use yii\helpers\Html;
use app\modules\admin\assets\AdminAppAsset;


AdminAppAsset::register($this);
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

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <!--<li class="menu-title">Navigation</li>-->
                    <li class="menu-title">Главная</li>
                    <li>
                        <a href="/admin/">
                            <i class="fi-air-play"></i> <span> Главная </span>
                        </a>
                    </li>

                    <li class="menu-title">Администрирование</li>

                    <li>
                        <a href="/admin/order">
                            <i class="fi-air-play"></i><span class="badge badge-success float-right">Hot</span> <span> Заказы </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" mdi mdi-pig "></i><span> Пользователи </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/user">Просмотреть</a></li>
                            <li><a href="/admin/user/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Товары</li>
                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-reorder-horizontal "></i><span> Категории </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/category">Все категории</a></li>
                            <li><a href="/admin/category/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" mdi mdi-sort  "></i><span> Типы </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/type">Все типы</a></li>
                            <li><a href="/admin/type/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-shopping  "></i><span> Товар </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/pizza">Все товары</a></li>
                            <li><a href="/admin/pizza/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" mdi mdi-rice "></i><span> Ингредиенты </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/ingredient">Все ингредиенты</a></li>
                            <li><a href="/admin/ingredient/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-ray-start-arrow "></i><span> Размеры </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/size">Все</a></li>
                            <li><a href="/admin/size/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" mdi mdi-radiobox-blank  "></i><span> Тесто </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/dough">Все</a></li>
                            <li><a href="/admin/dough/create">Добавить</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Дизайн</li>

                    <li>
                        <a href="javascript: void(0);"><i class=" mdi mdi-arrange-bring-forward"></i><span> Слайдер </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/tops">Просмотреть</a></li>
                            <li><a href="/admin/tops/create">Добавить</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Информация</li>

                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-alarm-light   "></i><span> Новости </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/news">Просмотреть</a></li>
                            <li><a href="/admin/news/create">Добавить</a></li>
                        </ul>
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
                            <img src="/img/icons/avatar.png" alt="user" class="rounded-circle"> <span class="ml-1"><?= Yii::$app->user->identity['login'] ?> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="text-overflow m-0">Привет!</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>Настройки</span>
                            </a>
                            <!-- item-->
                            <a href="/" target="_blank" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>На сайт</span>
                            </a>

                            <!-- item-->
                            <a href="/logout" class="dropdown-item notify-item">
                                <i class="fi-power"></i> <span>Выход</span>
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
                            <h4 class="page-title">Панель управления</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Добро пожаловать!</li>
                            </ol>
                        </div>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<?php if(isset($_SESSION['errors'])){ ?>
    <script>
        $.toast({
            heading: 'Ох, что-то пошло не так',
            text: '<?= $_SESSION['errors'] ?>',
            position: 'top-right',
            loaderBg: '#a93532',
            icon: 'error',
            hideAfter: 3000,
            stack: 1
        });
    </script>
    <?php unset($_SESSION['errors']); } ?>

<?php if(isset($_SESSION['success'])){ ?>
    <script>
        $.toast({
            heading: 'Ура!',
            text: '<?= $_SESSION['success'] ?>',
            position: 'top-right',
            loaderBg: '#08a97c',
            icon: 'success',
            hideAfter: 3000,
            stack: 1
        });
    </script>
    <?php unset($_SESSION['success']); } ?>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
