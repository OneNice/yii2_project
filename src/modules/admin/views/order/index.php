<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_id',
                'value' => function($data){
                    $user = \app\models\User::findIdentity($data->user_id);
                    if($user->login == 'anonim')
                        return "<span class='badge badge-danger badge-pill'  data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"id → ".$user->id."\">".$user->login."</span>";
                    return "<span class='badge badge-custom badge-pill' data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"id → ".$user->id."\">".$user->login."</span>";
                },
                'format' => 'raw'
            ],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
