<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пиццы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пиццу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'type_id',
                'value' => function($data){
                    $cat = $data->type;
                    if($data->type->name == '-') return "<span class='badge badge-secondary badge-pill'>false</span>";
                    return "<span class='badge badge-custom badge-pill' data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"id → ".$cat->id."\">".$cat->name."</span>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    $cat = $data->category;
                    return "<span class='badge badge-custom badge-pill' data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"id → ".$cat->id."\">".$cat->name."</span>";
                },
                'format' => 'raw'
            ],
            'weight',
            'price',
            [
                'attribute' => 'composition',
                'value' => function($data){
                    if($data->composition)
                        return "<span class='badge badge-purple badge-pill'>true</span>";
                    return "<span class='badge badge-secondary badge-pill'>false</span>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'additional',
                'value' => function($data){
                    if($data->additional)
                        return "<span class='badge badge-purple badge-pill'>true</span>";
                    return "<span class='badge badge-secondary badge-pill'>false</span>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'new',
                'value' => function($data){
                    if($data->new)
                        return "<span class='badge badge-purple badge-pill'>true</span>";
                    return "<span class='badge badge-secondary badge-pill'>false</span>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'sale',
                'value' => function($data){
                    if($data->sale)
                        return "<span class='badge badge-purple badge-pill'>true</span>";
                    return "<span class='badge badge-secondary badge-pill'>false</span>";
                },
                'format' => 'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
