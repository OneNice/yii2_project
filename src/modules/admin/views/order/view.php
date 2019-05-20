<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  app\modules\admin\models\Size;
use  app\modules\admin\models\Dough;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы готовы удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                        return "<span class='badge badge-custom badge-pill' data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"id → ".$data->pizza->id."\">".$data->pizza->name."</span>";
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
                        ($data->pizza->price *
                            (((float)(Size::findOne(['size' => $data['size']])->k) != 0) ? (float)(Size::findOne(['size' => $data['size']])->k) : 1 ) *
                            (((float)(Dough::findOne(['dough' => $data['dough']])->k) != 0) ? Dough::findOne(['dough' => $data['dough']])->k : 1))
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
