<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tops */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tops-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php //$form->field($model, 'image')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'pizza_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
