<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 11.05.2019
 * Time: 22:18
 */

namespace app\controllers;


use app\models\Order;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex(){

        $id = \Yii::$app->request->get('status');
        $order = Order::findOne($id);
        if($order) {
            $status = $order->status;
            return $this->render('index', compact('id', 'status'));
        }
        else return $this->goHome();
    }
}