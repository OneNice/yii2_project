<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-login">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"form-group row m-b-20\"><div class=\"col-12\"><div class=\"checkbox checkbox-custom\">{input} {label}</div></div>{error}</div>",
        ]) ?>

    <div class="form-group row text-center m-t-10">
        <div class="col-12">
            <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-custom waves-effect waves-light', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Ещё нету аккаунта? <a href="page-register.html" class="text-dark m-l-5"><b>Регистрация</b></a></p>
        </div>
    </div>

</div>
