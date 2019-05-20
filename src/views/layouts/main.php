<?php


use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
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

    <script> var path = '<?= PATH ?>', userGlobal = '<?= isset($_SESSION['user']) ? 1 : 'false' ?>';</script>
    <?php
    if(isset($_SESSION['error'])){ ?>
        <div class="error_message"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']);
    } else if(isset($_SESSION['success'])) { ?>
        <div class="success_message"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']);
    }
    ?>
    <header>
        <a href="/"><img class="logo" src="/img/upload/Frame.png" alt="" ></a>
        <ul><?= \app\widgets\Categories::widget() ?></ul>
        <span class="cart">
            <span class="cart_top"><span>0</span> руб.</span>
            <span class="cart_bottom"><span>0</span> товаров</span>
        </span>
        <?php if(Yii::$app->user->isGuest){ ?>
            <div class="account">
                <a href="/login" class="signin">Вход</a>
                <a href="/signup" class="signup">Регистрация</a>
            </div>
        <?php } else{ ?>
            <div class="account">
                <a href="/lk" class="signlk">ЛК</a>
                <?php if($_SESSION['user']['admin']) { ?><a href="/admin/" class="signlk">Админ</a> <?php } ?>
                <a href="/logout" class="signout">Выход</a>
            </div>
        <?php }?>
    </header>
    <nav>
        <div class="menu_fixed">
            <ul><?= \app\widgets\Categories::widget() ?></ul>
            <span class="cart">
                <span class="cart_top"><span>0</span> руб.</span>
                <span class="cart_bottom"><span>0</span> товаров</span>
            </span>
        </div>
    </nav>

    <div class="cart_push">
        <div class="my_cart">

        </div>
    </div>

    <div class="content">
        <?= $content ?>
    </div>

    <footer>
        <div class="content">
            <div class="flex flex-wrap">
                <div class="item">
                    <h4>Пиццерия</h4>
                    <ul>
                        <li>Условия доставки</li>
                        <li>Карта</li>
                    </ul>
                </div>
                <div class="item">
                    <h4>Новости</h4>
                    <ul>
                        <li>Акции</li>
                        <li>Новости</li>
                        <li></li>
                    </ul>
                </div>
                <div class="item">
                    <h4>Обратная связь</h4>
                    <ul>
                        <li>Оставить отзыв</li>
                    </ul>
                </div>
            </div>
        </div>
        <img src="/img/upload/footer.png" alt="">
    </footer>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
