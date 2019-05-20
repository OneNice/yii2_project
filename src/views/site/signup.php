<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SignUp';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'login') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'phone') ?>
<?= $form->field($model, 'adr') ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-block btn-custom waves-effect waves-light']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>