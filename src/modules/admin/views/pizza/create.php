<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Pizza */

$this->title = 'Создать пиццу';
$this->params['breadcrumbs'][] = ['label' => 'Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'sizes', 'doughs', 'ingredients')) ?>

</div>
