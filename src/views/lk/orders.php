<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  app\modules\admin\models\Size;
use  app\modules\admin\models\Dough;
use yii\grid\GridView;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'price',
            'time',
            'phone:ntext',
            'adr:ntext',
            [
                'attribute' => 'status',
                'value' => function($data){
                    if($data->status=='Не готов') return '<span class="badge badge-danger badge-pill">Не готов</span>';
                    else return "<span class='badge badge-custom badge-pill'>$data->status</span>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'Просмотр',
                'value' => function($data){
                    return "<a href='/lk/orderview?id={$data->id}'><span class='fi fi-eye'></span></a>";
                },
                'format' => 'raw'
            ],
        ],
    ]); ?>
</div>
</div>
</div>
</div>