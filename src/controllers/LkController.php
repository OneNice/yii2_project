<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 11.05.2019
 * Time: 22:34
 */

namespace app\controllers;


use app\models\Messages;
use app\models\News;
use app\models\Order;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;

class LkController extends Controller
{
    public $layout = 'lk';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(){

        $orders = Order::findAll(['user_id' => \Yii::$app->user->identity['id']]);

        $lastorders = Order::find()->where([
            'user_id' => \Yii::$app->user->identity['id']
        ])->limit(5)->orderBy(['time' => SORT_DESC])->all();


        $sum = 0; $last_array = [];
        foreach ($orders as $order) {

            foreach ($order->getOrderitems()->all() as $item) {

                $sum += $item->pizza->price;

            }
        }

        foreach ($lastorders as $order) {
            $sum_l = 0;
            foreach ($order->getOrderitems()->all() as $item) {

                $sum_l += $item->pizza->price;

            }

            $buf = [
                'id' => $order->id,
                'time' => $order->time,
                'price' => $sum_l,
                'status' => $order->status,
            ];
            array_push($last_array, $buf);
        }
        $array = [
            'order_count' => Count($orders),
            'order_sum' => $sum,
        ];

        $lastnews = News::find()->limit(3)->all();
        $messages = Messages::findAll([
            'user_id' => \Yii::$app->user->identity['id'],
            'checked' => '0'
        ]);


        return $this->render('index', compact('array','last_array', 'lastnews', 'messages'));
    }

    public function actionRemmess(){
        $messages = Messages::findOne([
            'user_id' => \Yii::$app->user->identity['id'],
            'id' => \Yii::$app->request->get('id')
        ]);
        $messages->checked = 1;
        $messages->save();
        echo 'ok';
        exit;
    }

    public function actionSettings(){
        $model = User::findOne(\Yii::$app->user->identity['id']);
        $modelOld = $model->password;

        if ($model->load(\Yii::$app->request->post())) {

            if($model->password == '' || $model->password == null) {
                $model->password = $modelOld;
            }
            else $model->password = \Yii::$app->security->generatePasswordHash($model->password);
            $model->save();


            return $this->redirect(['/lk/settings']);

        }
        $model->password = '';
        return $this->render('settings', compact('model'));
    }
    public function actionOrders(){

        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->where([
                'user_id' => \Yii::$app->user->identity['id']
            ]),
            'sort' => [
                'defaultOrder' => [
                    'time' => SORT_DESC
                ]
            ]
        ]);
        if(!$dataProvider) return $this->goHome();
        return $this->render('orders', compact('dataProvider'));
    }
    public function actionOrderview(){

        $model = Order::findOne([
            'id' => \Yii::$app->request->get('id'),
            'user_id' => \Yii::$app->user->identity['id']
        ]);

        if(!$model ) return $this->goHome();
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getOrderitems()
        ]);
        if(!$dataProvider) return $this->goHome();



        return $this->render('orderview', compact('model','dataProvider'));
    }

}