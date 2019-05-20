<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Size */

$this->title = 'Редактирование пиццы: ' . $model->size;
$this->params['breadcrumbs'][] = ['label' => 'Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->size, 'url' => ['view', 'id' => $model->size]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="size-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
