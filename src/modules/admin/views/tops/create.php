<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tops */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Tops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
