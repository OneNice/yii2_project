<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dough */

$this->title = 'Редактирование теста: ' . $model->dough;
$this->params['breadcrumbs'][] = ['label' => 'Doughs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dough, 'url' => ['view', 'id' => $model->dough]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dough-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
