<?php


use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetLogin;


AppAssetLogin::register($this);
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

<body class="account-pages">
<?php $this->beginBody() ?>

<!-- Begin page -->
<div class="accountbg" style="background: url('admin_assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>

<div class="wrapper-page account-page-full">

    <div class="card">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="/img/upload/Frame.png" alt="" height="46"></span>
                        </a>
                    </h2>


                    <?= $content ?>

                </div>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <p class="account-copyright">© <a href="/">Finizza.by</a>, 2019 </p>
    </div>

</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>