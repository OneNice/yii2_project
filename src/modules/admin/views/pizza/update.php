<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Pizza */

$this->title = 'Редактирование пиццы: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pizza-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'sizes', 'doughs', 'ingredients', 'sizes_sel', 'doughs_sel', 'ingredients_sel')) ?>

</div>
