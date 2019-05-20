<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\modules\admin\models\Type;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Pizza */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pizza-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if(is_array($model->type_id)) { ?>
        <?= $form->field($model, 'type_id')->dropDownList($model->type_id, ['prompt' => '']) ?>
    <?php } else { ?>
        <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(Type::find()->all(),'id', 'name')) ?>
    <?php } ?>

    <?php if(is_array($model->type_id)) { ?>
        <?= $form->field($model, 'category_id')->dropDownList($model->category_id, ['prompt' => '']) ?>
    <?php } else { ?>
        <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(),'id', 'name')) ?>
    <?php } ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <div class="form-group">
        <label for="">Ингредиенты</label>
        <select name="ingr[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
            <?php foreach ($ingredients as $item) { ?>

                <?php if($ingredients_sel) {?>
                    <option <?php if(in_array($item['id'], $ingredients_sel)) { echo 'selected'; }?> value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php } else { ?>

                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
            <?php } } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Размеры</label>
        <select name="size[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
            <?php foreach ($sizes as $size) { ?>

                <?php if($sizes_sel) {?>
                    <option <?php if(in_array($size['size'], $sizes_sel)) { echo 'selected'; }?> value="<?= $size['size'] ?>"><?= $size['size'] ?></option>
                <?php } else { ?>

                <option value="<?= $size['size'] ?>"><?= $size['size'] ?></option>
            <?php }} ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Тесто</label>
        <select name="dough[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
            <?php foreach ($doughs as $dough) { ?>

                <?php if($doughs_sel) {?>
                    <option <?php if(in_array($dough['dough'], $doughs_sel)) { echo 'selected'; }?> value="<?= $dough['dough']  ?>"><?= $dough['dough'] ?></option>
                <?php } else { ?>

                <option value="<?= $dough['dough']  ?>"><?= $dough['dough'] ?></option>
            <?php }} ?>
        </select>
    </div>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'composition')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'additional')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'new')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sale')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
