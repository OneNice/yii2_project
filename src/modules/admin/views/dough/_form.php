<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dough */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dough-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dough')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Созранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
