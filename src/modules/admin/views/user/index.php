<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
            'email:email',
            [
                'attribute' => 'role',
                'value' => function($data){
                    if($data->role == 'admin')
                        return "<span class='badge badge-purple badge-pill'>".$data->role."</span>";
                    if($data->role == 'guest')
                        return "<span class='badge badge-danger badge-pill'>".$data->role."</span>";
                    return "<span class='badge badge-secondary badge-pill'>".$data->role."</span>";
                    },
                'format' => 'raw'
            ],
            'name',
            'phone',
            'adr:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
