<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  app\modules\admin\models\Size;
use  app\modules\admin\models\Dough;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
<div class="order-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                'id',
            [
                'attribute' => 'price',
                'value' => function($data){
                    return "<span class='badge badge-pink'>".($data->price)." руб</span>";
                },
                'format' => 'raw',
            ],
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
        ],
    ]) ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'pizza_id',
                'value' => function($data){
                    return "<span class='badge badge-custom badge-pill' data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"От ".$data->pizza->price." руб.\">".$data->pizza->name."</span>";
                },
                'format' => 'raw',
            ],
            'dough',
            'size',
            'quantity',
            [
                'attribute' => 'Цена',
                'value' => function($data){
                    return "<span class='badge badge-pink'>".
                        (
                            $data->pizza->price *
                            (((float)(Size::findOne(['size' => $data['size']])->k) != 0) ? (float)(Size::findOne(['size' => $data['size']])->k) : 1 ) *
                            (((float)(Dough::findOne(['dough' => $data['dough']])->k) != 0) ? Dough::findOne(['dough' => $data['dough']])->k : 1)
                            )
                        ." руб</span>";
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'Итог',
                'value' => function($data){
                    return "<span class='badge badge-pink'>".
                        ($data->pizza->price *
                            $data->quantity *
                            (((float)(Size::findOne(['size' => $data['size']])->k) != 0) ? (float)(Size::findOne(['size' => $data['size']])->k) : 1 ) *
                            (((float)(Dough::findOne(['dough' => $data['dough']])->k) != 0) ? Dough::findOne(['dough' => $data['dough']])->k : 1))
                        ." руб</span>";
                },
                'format' => 'raw',
            ]
        ],
    ]); ?>
</div>
</div>
</div>
</div>
