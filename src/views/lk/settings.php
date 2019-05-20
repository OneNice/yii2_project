<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>


<div class="row">
    <div class="col-md-12">
        <div class="card-box">

            <div class="tops-form">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>


                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>


                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'adr')->textarea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>
